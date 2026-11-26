<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WebiaAddon;
use App\Models\WebiaOrder;
use App\Models\WebiaOrderLog;
use App\Models\WebiaPackage;
use App\Models\WebiaPayment;
use App\Models\WebiaTemplate;
use App\Services\AiQuotaService;
use App\Services\Midtrans;
use App\Services\OrderMail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use RuntimeException;
use Throwable;

class WebiaOrderController extends Controller
{
    public function __construct(private Midtrans $midtrans, private OrderMail $orderMail) {}

    public function index(Request $request): View
    {
        $filter = $request->string('filter')->toString();
        $ownedOrders = WebiaOrder::whereBelongsTo($request->user());
        $orderStats = [
            'total' => (clone $ownedOrders)->count(),
            'waiting' => (clone $ownedOrders)->whereIn('status', ['awaiting_payment', 'rejected'])->count(),
            'in_progress' => (clone $ownedOrders)->where('status', 'paid')->where('delivery_status', '!=', 'delivered')->count(),
            'completed' => (clone $ownedOrders)->where('delivery_status', 'delivered')->count(),
        ];
        $query = (clone $ownedOrders)->with(['package', 'template'])->latest();

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

        return view('orders.index', compact('orders', 'filter', 'orderStats'));
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

    public function store(Request $request): RedirectResponse|JsonResponse
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
        if ($template !== null && $package->templates()->exists() && ! $package->templates()->whereKey($template)->exists()) {
            throw ValidationException::withMessages(['template_id' => 'Template tidak tersedia dalam paket yang dipilih.']);
        }
        $addons = WebiaAddon::whereKey($validated['addon_ids'] ?? [])->get();

        // Guest belum punya akun: nama/email disimpan di order; akun dibuat setelah pembayaran lunas.
        $guestName = auth()->check() ? null : $validated['name'];
        $guestEmail = auth()->check() ? null : $validated['email'];

        $order = $this->createOrder($request->user(), $guestName, $guestEmail, $validated['category_slug'] ?? null, $package, $template, $addons);

        if ($request->user() === null) {
            // Popup Snap dibuka inline di halaman sukses; webhook Midtrans menandai order lunas.
            $payment = $this->midtrans->createTransaction($order, $this->nextMidtransOrderId($order));
            session(['guest_order' => [
                'order_id' => $order->id,
                'email' => $guestEmail,
                'order_number' => $order->order_number,
                'snap_token' => $this->midtrans->configured() ? $payment->snap_token : null,
                // Fallback bila popup Snap tidak bisa jalan (client key belum diisi).
                'snap_redirect_url' => $payment->snap_redirect_url,
                'simulate_url' => ! $this->midtrans->configured() ? $payment->snap_redirect_url : null,
            ]]);

            if ($request->expectsJson()) {
                return response()->json([
                    'order_number' => $order->order_number,
                    'email' => $guestEmail,
                    'status' => $order->status,
                    'snap_token' => $this->midtrans->configured() ? $payment->snap_token : null,
                    'snap_redirect_url' => $payment->snap_redirect_url,
                    'simulate_url' => ! $this->midtrans->configured() ? $payment->snap_redirect_url : null,
                    'payment_ready' => $payment->snap_token !== null || $payment->snap_redirect_url !== null,
                    'payment_status_url' => URL::temporarySignedRoute('orders.payment-status', now()->addDay(), ['order' => $order]),
                    'login_url' => route('login'),
                    'package_name' => $order->package_snapshot['name'],
                    'addons' => $order->addon_snapshot,
                    'total_price' => $order->total_price,
                    'expires_at' => $payment->expires_at?->toISOString(),
                ], 201);
            }
        }

        return auth()->check()
            ? redirect()->route('orders.show', $order)
            : redirect()->route('orders.success');
    }

    public function guestPaymentStatus(Request $request, WebiaOrder $order): JsonResponse
    {
        return $this->paymentStatus($request, $order);
    }

    public function show(Request $request, WebiaOrder $order): View
    {
        abort_unless($order->user_id === $request->user()->id, 404);
        $order->load(['package', 'template', 'logs', 'payments']);
        $pendingPayment = $order->payments->where('status', 'created')->last();

        return view('orders.show', compact('order', 'pendingPayment'));
    }

    public function authenticatedPaymentStatus(Request $request, WebiaOrder $order): JsonResponse
    {
        abort_unless($order->user_id === $request->user()->id, 404);

        return $this->paymentStatus($request, $order);
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

    public function cancel(Request $request, WebiaOrder $order): RedirectResponse
    {
        abort_unless($order->user_id === $request->user()->id, 404);
        abort_unless(in_array($order->status, ['awaiting_payment', 'rejected'], true), 422);

        DB::transaction(function () use ($order, $request): void {
            $lockedOrder = WebiaOrder::whereKey($order->id)->lockForUpdate()->firstOrFail();
            abort_unless(in_array($lockedOrder->status, ['awaiting_payment', 'rejected'], true), 422);

            $fromStatus = $lockedOrder->status;
            $lockedOrder->update(['status' => 'cancelled']);
            WebiaOrderLog::create([
                'webia_order_id' => $lockedOrder->id,
                'actor_id' => $request->user()->id,
                'from_status' => $fromStatus,
                'to_status' => 'cancelled',
            ]);
        });

        return redirect()->route('orders.index')->with('status', 'Pesanan '.$order->order_number.' dibatalkan.');
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

        $message = match ($this->midtrans->mapTransactionStatus(
            (string) data_get($result, 'transaction_status'),
            data_get($result, 'fraud_status'),
        )) {
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

    private function paymentStatus(Request $request, WebiaOrder $order): JsonResponse
    {
        $payment = $order->payments()->latest()->first();
        abort_if($payment === null, 404);

        $lastSync = (int) $request->session()->get('payment_last_sync.'.$order->id, 0);
        $syncFailed = false;
        if ($order->status !== 'paid' && $payment->status === 'created' && $this->midtrans->configured() && time() - $lastSync >= 10) {
            $request->session()->put('payment_last_sync.'.$order->id, time());
            $result = $this->midtrans->status($payment->midtrans_order_id);
            if ($result !== null) {
                $this->midtrans->applyNotification($payment, $result);
                $order->refresh();
                $payment->refresh();
            } else {
                $syncFailed = true;
            }
        }

        $status = match (true) {
            $order->status === 'paid' => 'paid',
            $payment->status === 'created' && data_get($payment->payload, 'transaction_status') === 'pending' => 'pending',
            default => $payment->status,
        };

        return response()->json([
            'status' => $status,
            'terminal' => in_array($status, ['paid', 'failed', 'expired'], true),
            'sync_failed' => $syncFailed,
            'credential_status' => $order->credential_status,
            'email' => $order->guest_email ?? $order->user?->email,
        ]);
    }

    public function saveBusinessData(Request $request, WebiaOrder $order): RedirectResponse
    {
        abort_unless($order->user_id === $request->user()->id, 404);
        abort_unless($order->status === 'paid' && $order->delivery_status !== 'delivered', 422);

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

            $current = $lockedOrder->business_data ?? [];
            $lockedOrder->update([
                'business_data' => array_merge($current, $validated),
            ]);
        });

        // Sinkronkan ke profil AI jika site_slug sudah aktif
        if (!empty($order->site_slug)) {
            AiQuotaService::updateTenantBusinessInfo($order->site_slug, [
                'welcome_message' => "Halo! Selamat datang di " . ($validated['business_name'] ?? 'website kami') . ", ada yang bisa kami bantu? 😊",
                'whatsapp_cs' => $validated['whatsapp'] ?? '',
                'alamat' => ($validated['address'] ?? '') . (!empty($validated['city']) ? ', ' . $validated['city'] : ''),
            ]);
        }

        return redirect()->route('orders.show', ['order' => $order, 'tab' => 'profile'])->with('status', 'Data bisnis profil berhasil disimpan.');
    }

    public function saveKnowledgeBase(Request $request, WebiaOrder $order): RedirectResponse
    {
        abort_unless($order->user_id === $request->user()->id, 404);
        abort_if(! ($order->customer_ai_knowledge_editable ?? true), 403, 'Editor Knowledge Base saat ini dikelola oleh tim WEBIA.');
        abort_unless($order->status === 'paid' && $order->delivery_status !== 'delivered', 422);

        $validated = $request->validate([
            'kb_layanan' => ['nullable', 'string', 'max:20000'],
            'kb_faq' => ['nullable', 'string', 'max:20000'],
            'kb_kebijakan' => ['nullable', 'string', 'max:20000'],
            'kb_profil' => ['nullable', 'string', 'max:20000'],
        ]);

        DB::transaction(function () use ($order, $validated): void {
            $lockedOrder = WebiaOrder::whereKey($order->id)->lockForUpdate()->firstOrFail();
            abort_unless($lockedOrder->status === 'paid' && $lockedOrder->delivery_status !== 'delivered', 422);

            $current = $lockedOrder->business_data ?? [];
            $lockedOrder->update([
                'business_data' => array_merge($current, [
                    'kb_layanan' => $validated['kb_layanan'] ?? null,
                    'kb_faq' => $validated['kb_faq'] ?? null,
                    'kb_kebijakan' => $validated['kb_kebijakan'] ?? null,
                    'kb_profil' => $validated['kb_profil'] ?? null,
                ]),
            ]);
        });

        if (!empty($order->site_slug)) {
            AiQuotaService::saveTenantKnowledge($order->site_slug, [
                'layanan' => $validated['kb_layanan'] ?? '',
                'faq' => $validated['kb_faq'] ?? '',
                'kebijakan' => $validated['kb_kebijakan'] ?? '',
                'profil' => $validated['kb_profil'] ?? '',
            ]);
        }

        return redirect()->route('orders.show', ['order' => $order, 'tab' => 'ai-kb'])->with('status', 'Knowledge Base AI (layanan, FAQ, kebijakan, profil) berhasil disimpan!');
    }

    public function simulateChat(Request $request, WebiaOrder $order): JsonResponse
    {
        abort_unless($order->user_id === $request->user()->id, 404);
        $message = $request->string('message')->trim()->toString();
        if (empty($message)) {
            return response()->json(['status' => 'error', 'reply' => 'Pesan tidak boleh kosong.'], 422);
        }

        $tenantId = $order->site_slug ?: ($order->category_slug ?: 'general');
        $reply = AiQuotaService::simulateChat($tenantId, $message);
        return response()->json($reply);
    }

    /** @param Collection<int, WebiaAddon> $addons */
    private function createOrder(?User $user, ?string $guestName, ?string $guestEmail, ?string $categorySlug, WebiaPackage $package, ?WebiaTemplate $template, Collection $addons): WebiaOrder
    {
        for ($attempt = 0; $attempt < 5; $attempt++) {
            try {
                return DB::transaction(function () use ($user, $guestName, $guestEmail, $categorySlug, $package, $template, $addons): WebiaOrder {
                    $order = WebiaOrder::create([
                        'user_id' => $user?->id,
                        'guest_name' => $guestName ?? $user?->name,
                        'guest_email' => $guestEmail ?? $user?->email,
                        'order_number' => $this->orderNumber(),
                        'webia_package_id' => $package->id,
                        'package_snapshot' => [
                            'name' => $package->name,
                            'price' => $package->price,
                            'hosting_monthly_price' => $package->hosting_monthly_price,
                        ],
                        'webia_template_id' => $template?->id,
                        'template_snapshot' => $template ? [
                            'name' => $template->name,
                            'slug' => $template->slug,
                            'category_slug' => $template->category_slug,
                            'site_config_path' => $template->site_config_path,
                        ] : null,
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
                        'actor_id' => $user?->id,
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
