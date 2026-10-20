<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebiaOrder;
use App\Models\WebiaOrderLog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class WebiaOrderController extends Controller
{
    protected const STATUSES = ['awaiting_payment', 'payment_uploaded', 'paid', 'rejected'];

    protected const DELIVERY_STATUSES = ['not_started', 'in_progress', 'delivered'];

    public function index(Request $request): View
    {
        $status = $this->matchingValue($request->string('status'), self::STATUSES);
        $delivery = $this->matchingValue($request->string('delivery'), self::DELIVERY_STATUSES);

        $orders = WebiaOrder::query()
            ->with(['user', 'package'])
            ->when($status !== '', fn ($query) => $query->where('status', $status))
            ->when($delivery !== '', fn ($query) => $query->where('delivery_status', $delivery))
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('admin.orders.index', [
            'orders' => $orders,
            'activeStatus' => $status,
            'statuses' => self::STATUSES,
            'activeDelivery' => $delivery,
            'deliveries' => self::DELIVERY_STATUSES,
        ]);
    }

    /** @param array<int, string> $allowed */
    private function matchingValue(string $value, array $allowed): string
    {
        return in_array($value, $allowed, true) ? $value : '';
    }

    public function show(WebiaOrder $order): View
    {
        $order->load(['user', 'package', 'template', 'logs.actor']);

        return view('admin.orders.show', compact('order'));
    }

    public function progress(Request $request, WebiaOrder $order): RedirectResponse
    {
        $validated = $request->validate([
            'action' => ['required', Rule::in(['start', 'finish'])],
        ]);

        DB::transaction(function () use ($request, $order, $validated): void {
            $lockedOrder = WebiaOrder::whereKey($order->id)->lockForUpdate()->firstOrFail();

            $transitions = [
                'start' => ['from' => 'not_started', 'to' => 'in_progress'],
                'finish' => ['from' => 'in_progress', 'to' => 'delivered'],
            ];

            /** @var array{from: string, to: string} $transition */
            $transition = $transitions[$validated['action']];
            abort_unless($lockedOrder->status === 'paid' && $lockedOrder->delivery_status === $transition['from'], 422);

            $lockedOrder->update(['delivery_status' => $transition['to']]);
            WebiaOrderLog::create([
                'webia_order_id' => $lockedOrder->id,
                'actor_id' => $request->user()->id,
                'from_status' => 'delivery_'.$transition['from'],
                'to_status' => 'delivery_'.$transition['to'],
            ]);
        });

        return redirect()->route('admin.orders.show', $order)->with('status', 'Progres pengerjaan berhasil diperbarui.');
    }

    public function receipt(WebiaOrder $order): StreamedResponse
    {
        abort_unless($order->payment_receipt_path && Storage::disk('local')->exists($order->payment_receipt_path), 404);

        return Storage::disk('local')->download($order->payment_receipt_path);
    }

    public function verify(Request $request, WebiaOrder $order): RedirectResponse
    {
        $validated = $request->validate([
            'action' => ['required', Rule::in(['approve', 'reject'])],
            'note' => ['nullable', 'string', 'max:500', Rule::requiredIf($request->input('action') === 'reject')],
        ]);

        DB::transaction(function () use ($request, $order, $validated): void {
            $lockedOrder = WebiaOrder::whereKey($order->id)->lockForUpdate()->firstOrFail();
            if ($lockedOrder->status !== 'payment_uploaded') {
                throw ValidationException::withMessages(['status' => 'Order belum memiliki bukti pembayaran yang dapat diverifikasi.']);
            }

            $newStatus = $validated['action'] === 'approve' ? 'paid' : 'rejected';
            $lockedOrder->update([
                'status' => $newStatus,
                'paid_at' => $newStatus === 'paid' ? now() : null,
            ]);
            WebiaOrderLog::create([
                'webia_order_id' => $lockedOrder->id,
                'actor_id' => $request->user()->id,
                'from_status' => 'payment_uploaded',
                'to_status' => $newStatus,
                'note' => $validated['note'] ?? null,
            ]);
        });

        return redirect()->route('admin.orders.show', $order)->with('status', 'Status pembayaran berhasil diperbarui.');
    }
}
