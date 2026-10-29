<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WebiaAddon;
use App\Models\WebiaOrder;
use App\Models\WebiaOrderLog;
use App\Models\WebiaPackage;
use App\Models\WebiaPayment;
use App\Models\WebiaTemplate;
use App\Services\Midtrans;
use App\Services\OrderMail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use RuntimeException;
use Throwable;

class WebiaOrderController extends Controller
{
    public function __construct(private Midtrans $midtrans, private OrderMail $orderMail) {}

    public function index(Request $request): View
    {
        $filter = $request->string('filter')->toString();
        $query = WebiaOrder::whereBelongsTo($request->user())->with('package')->latest();

        if ($filter === 'menunggu_pembayaran') {
            $query->whereIn('status', ['awaiting_payment', 'rejected']);
        } elseif ($filter === 'menunggu_verifikasi') {
            $query->where('status', 'payment_uploaded');
        } elseif ($filter === 'dikerjakan') {
            $query->where('status', 'paid')->where('delivery_status', '!=', 'delivered');
        } elseif ($filter === 'selesai') {
            $query->where('delivery_status', 'delivered');
        } else {
            $filter = null;
        }

        $orders = $query->get();

        return view('orders.index', compact('orders', 'filter'));
    }

    public function create(Request $request): View
    {
        $packages = WebiaPackage::where('is_active', true)->orderBy('sort_order')->get();
        $addons = WebiaAddon::where('is_active', true)->orderBy('name')->get();
        $selectedPackage = $packages->firstWhere('slug', $request->string('package')->toString());
        $selectedTemplate = WebiaTemplate::where('is_active', true)
            ->find($request->string('template')->toInteger());

        return view('orders.create', compact('packages', 'addons', 'selectedPackage', 'selectedTemplate'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'package_id' => ['required', Rule::exists('webia_packages', 'id')->where('is_active', true)],
            'category_slug' => ['nullable', 'string', 'max:80'],
            'template_id' => ['nullable', Rule::exists('webia_templates', 'id')->where('is_active', true)],
            'addon_ids' => ['nullable', 'array'],
            'addon_ids.*' => ['integer', Rule::exists('webia_addons', 'id')->where('is_active', true)],
            ...auth()->check() ? [] : [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            ],
        ]);

        $package = WebiaPackage::findOrFail($validated['package_id']);
        $template = isset($validated['template_id']) ? WebiaTemplate::findOrFail($validated['template_id']) : null;
        $addons = WebiaAddon::whereKey($validated['addon_ids'] ?? [])->get();

        // Guest: akun dibuat otomatis; email sudah terdaftar dipakai tanpa password baru.
        $plainPassword = null;
        $user = User::where('email', $validated['email'] ?? $request->user()->email)->first();
        if ($user === null) {
            $plainPassword = Str::password(12);
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => $plainPassword,
            ]);
        }

        $order = $this->createOrder($user, $validated['category_slug'] ?? null, $package, $template, $addons);
        $this->orderMail->sendCredentials($order, $plainPassword);

        if ($request->user() === null) {
            session(['guest_order' => ['email' => $user->email, 'order_number' => $order->order_number]]);
        }

        return auth()->check()
            ? redirect()->route('orders.show', $order)
            : redirect()->route('orders.success');
    }

    public function show(Request $request, WebiaOrder $order): View
    {
        abort_unless($order->user_id === $request->user()->id, 404);
        $order->load(['package', 'template', 'logs', 'payments']);
        $pendingPayment = $order->payments->where('status', 'created')->last();

        return view('orders.show', compact('order', 'pendingPayment'));
    }

    public function uploadReceipt(Request $request, WebiaOrder $order): RedirectResponse
    {
        abort_unless($order->user_id === $request->user()->id, 404);
        abort_unless(in_array($order->status, ['awaiting_payment', 'rejected'], true), 422);

        $validated = $request->validate([
            'payment_receipt' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
            'payment_note' => ['nullable', 'string', 'max:500'],
        ]);

        $newPath = $request->file('payment_receipt')->store('payment-receipts');
        $oldPath = $order->payment_receipt_path;
        try {
            DB::transaction(function () use ($order, $request, $validated, $newPath): void {
                $lockedOrder = WebiaOrder::whereKey($order->id)->lockForUpdate()->firstOrFail();
                abort_unless(in_array($lockedOrder->status, ['awaiting_payment', 'rejected'], true), 422);
                $oldStatus = $lockedOrder->status;

                $lockedOrder->update([
                    'payment_receipt_path' => $newPath,
                    'payment_note' => $validated['payment_note'] ?? null,
                    'status' => 'payment_uploaded',
                ]);
                WebiaOrderLog::create([
                    'webia_order_id' => $lockedOrder->id,
                    'actor_id' => $request->user()->id,
                    'from_status' => $oldStatus,
                    'to_status' => 'payment_uploaded',
                ]);
            });
        } catch (Throwable $exception) {
            Storage::disk('local')->delete($newPath);

            throw $exception;
        }

        if ($oldPath) {
            Storage::disk('local')->delete($oldPath);
        }

        $this->orderMail->notifyAdmins($order);

        return redirect()->route('orders.show', $order)->with('status', 'Bukti pembayaran berhasil dikirim.');
    }

    public function pay(Request $request, WebiaOrder $order): RedirectResponse
    {
        abort_unless($order->user_id === $request->user()->id, 404);
        abort_unless(in_array($order->status, ['awaiting_payment', 'rejected'], true), 422);

        try {
            $payment = DB::transaction(function () use ($order): WebiaPayment {
                $lockedOrder = WebiaOrder::whereKey($order->id)->lockForUpdate()->firstOrFail();
                abort_unless(in_array($lockedOrder->status, ['awaiting_payment', 'rejected'], true), 422);

                // Kunci order membuat klik bersamaan memakai satu sesi; sesi baru menggantikan sesi yang kedaluwarsa.
                foreach ($lockedOrder->payments()->where('status', 'created')->latest()->get() as $created) {
                    if ($created->snap_redirect_url !== null && ($created->expires_at === null || $created->expires_at->isFuture())) {
                        return $created;
                    }
                }

                return $this->midtrans->createTransaction($lockedOrder, $this->nextMidtransOrderId($lockedOrder));
            });
        } catch (RuntimeException $exception) {
            report($exception);

            return redirect()->route('orders.show', $order)->with('status', 'Pembayaran Midtrans gagal dibuat. Coba lagi sebentar.');
        }

        if ($payment->snap_redirect_url === null) {
            return redirect()->route('orders.show', $order)->with('status', 'Pembayaran Midtrans gagal dibuat. Coba lagi sebentar.');
        }

        return redirect()->away($payment->snap_redirect_url);
    }

    public function checkStatus(Request $request, WebiaOrder $order): RedirectResponse
    {
        abort_unless($order->user_id === $request->user()->id, 404);

        $payment = $order->payments()->where('status', 'created')->latest()->first();

        if ($payment === null) {
            return redirect()->route('orders.show', $order)->with('status', 'Belum ada pembayaran Midtrans untuk dicek.');
        }

        $result = $this->midtrans->status($payment->midtrans_order_id);

        if ($result === null) {
            return redirect()->route('orders.show', $order)->with('status', 'Status Midtrans belum bisa diambil. Coba lagi sebentar.');
        }

        $this->midtrans->applyNotification($payment, $result);

        $message = match ($this->midtrans->mapTransactionStatus((string) data_get($result, 'transaction_status'))) {
            'paid' => 'Pembayaran berhasil dikonfirmasi.',
            'failed' => 'Pembayaran gagal. Silakan bayar ulang.',
            'expired' => 'Sesi pembayaran sudah kedaluwarsa. Silakan bayar ulang.',
            default => 'Pembayaran masih menunggu.',
        };

        return redirect()->route('orders.show', $order)->with('status', $message);
    }

    private function nextMidtransOrderId(WebiaOrder $order): string
    {
        return 'WEB-'.$order->id.'-'.str_pad((string) ($order->payments()->count() + 1), 2, '0', STR_PAD_LEFT);
    }

    public function saveBusinessData(Request $request, WebiaOrder $order): RedirectResponse
    {
        abort_unless($order->user_id === $request->user()->id, 404);

        $requiredForSite = $order->supportsCustomerSite() ? 'required' : 'nullable';
        $validated = $request->validate([
            'business_name' => ['required', 'string', 'max:120'],
            'tagline' => ['nullable', 'string', 'max:150'],
            'whatsapp' => [$requiredForSite, 'string', 'regex:/^[0-9+\-\s]{6,20}$/'],
            'description' => ['nullable', 'string', 'max:1000'],
            'address' => [$requiredForSite, 'string', 'max:255'],
            'city' => [$requiredForSite, 'string', 'max:120'],
            'address_url' => ['nullable', 'url:http,https', 'max:500'],
            'instagram' => ['nullable', 'string', 'max:80'],
        ]);

        DB::transaction(function () use ($order, $validated): void {
            $lockedOrder = WebiaOrder::whereKey($order->id)->lockForUpdate()->firstOrFail();
            abort_unless($lockedOrder->status === 'paid' && $lockedOrder->delivery_status !== 'delivered', 422);

            $lockedOrder->update([
                'business_data' => $validated,
            ]);
        });

        return redirect()->route('orders.show', $order)->with('status', 'Data bisnis berhasil disimpan.');
    }

    /** @param Collection<int, WebiaAddon> $addons */
    private function createOrder(User $user, ?string $categorySlug, WebiaPackage $package, ?WebiaTemplate $template, Collection $addons): WebiaOrder
    {
        for ($attempt = 0; $attempt < 5; $attempt++) {
            try {
                return DB::transaction(function () use ($user, $categorySlug, $package, $template, $addons): WebiaOrder {
                    $order = WebiaOrder::create([
                        'user_id' => $user->id,
                        'order_number' => $this->orderNumber(),
                        'webia_package_id' => $package->id,
                        'package_snapshot' => ['name' => $package->name, 'price' => $package->price],
                        'webia_template_id' => $template?->id,
                        'template_snapshot' => $template ? ['name' => $template->name, 'slug' => $template->slug, 'category_slug' => $template->category_slug] : null,
                        'category_slug' => $template?->category_slug ?? $categorySlug,
                        'addon_ids' => $addons->modelKeys(),
                        'addon_snapshot' => $addons->map(fn (WebiaAddon $addon): array => [
                            'id' => $addon->id,
                            'name' => $addon->name,
                            'price' => $addon->price,
                        ])->all(),
                        'status' => 'awaiting_payment',
                        'total_price' => $package->price + $addons->sum('price'),
                    ]);

                    WebiaOrderLog::create([
                        'webia_order_id' => $order->id,
                        'actor_id' => $user->id,
                        'to_status' => 'awaiting_payment',
                    ]);

                    return $order;
                });
            } catch (QueryException $exception) {
                if (! str_contains(strtolower($exception->getMessage()), 'order_number') || $attempt === 4) {
                    throw $exception;
                }
            }
        }

        throw new QueryException('', '', [], new RuntimeException('Nomor order gagal dibuat.'));
    }

    private function orderNumber(): string
    {
        return 'WEB-'.now()->format('ymd').'-'.Str::upper(Str::random(4));
    }
}
