<?php

namespace App\Http\Controllers;

use App\Models\WebiaAddon;
use App\Models\WebiaOrder;
use App\Models\WebiaOrderLog;
use App\Models\WebiaPackage;
use App\Models\WebiaTemplate;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Throwable;

class WebiaOrderController extends Controller
{
    public function index(Request $request): View
    {
        $orders = WebiaOrder::whereBelongsTo($request->user())->with('package')->latest()->get();

        return view('orders.index', compact('orders'));
    }

    public function create(Request $request): View
    {
        $packages = WebiaPackage::where('is_active', true)->orderBy('sort_order')->get();
        $addons = WebiaAddon::where('is_active', true)->orderBy('name')->get();
        $selectedPackage = $packages->firstWhere('slug', $request->string('package')->toString());

        return view('orders.create', compact('packages', 'addons', 'selectedPackage'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'package_id' => ['required', Rule::exists('webia_packages', 'id')->where('is_active', true)],
            'category_slug' => ['nullable', 'string', 'max:80'],
            'template_id' => ['nullable', Rule::exists('webia_templates', 'id')->where('is_active', true)],
            'addon_ids' => ['nullable', 'array'],
            'addon_ids.*' => ['integer', Rule::exists('webia_addons', 'id')->where('is_active', true)],
        ]);

        $package = WebiaPackage::findOrFail($validated['package_id']);
        $template = isset($validated['template_id']) ? WebiaTemplate::findOrFail($validated['template_id']) : null;
        $addons = WebiaAddon::whereKey($validated['addon_ids'] ?? [])->get();

        $order = $this->createOrder($request, $package, $template, $addons);

        return redirect()->route('orders.show', $order);
    }

    public function show(Request $request, WebiaOrder $order): View
    {
        abort_unless($order->user_id === $request->user()->id, 404);
        $order->load(['package', 'template', 'logs']);

        return view('orders.show', compact('order'));
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

        return redirect()->route('orders.show', $order)->with('status', 'Bukti pembayaran berhasil dikirim.');
    }

    public function saveBusinessData(Request $request, WebiaOrder $order): RedirectResponse
    {
        abort_unless($order->user_id === $request->user()->id, 404);

        $validated = $request->validate([
            'business_name' => ['required', 'string', 'max:120'],
            'tagline' => ['nullable', 'string', 'max:150'],
            'whatsapp' => ['nullable', 'string', 'regex:/^[0-9+\-\s]{6,20}$/'],
            'description' => ['nullable', 'string', 'max:1000'],
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
    private function createOrder(Request $request, WebiaPackage $package, ?WebiaTemplate $template, Collection $addons): WebiaOrder
    {
        for ($attempt = 0; $attempt < 5; $attempt++) {
            try {
                return DB::transaction(function () use ($request, $package, $template, $addons): WebiaOrder {
                    $order = WebiaOrder::create([
                        'user_id' => $request->user()->id,
                        'order_number' => $this->orderNumber(),
                        'webia_package_id' => $package->id,
                        'package_snapshot' => ['name' => $package->name, 'price' => $package->price],
                        'webia_template_id' => $template?->id,
                        'template_snapshot' => $template ? ['name' => $template->name, 'category_slug' => $template->category_slug] : null,
                        'category_slug' => $template?->category_slug ?? $request->input('category_slug'),
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
                        'actor_id' => $request->user()->id,
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

        throw new QueryException('', '', [], new \RuntimeException('Nomor order gagal dibuat.'));
    }

    private function orderNumber(): string
    {
        return 'WEB-'.now()->format('ymd').'-'.Str::upper(Str::random(4));
    }
}
