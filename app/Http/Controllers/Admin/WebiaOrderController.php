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
    public function index(): View
    {
        $orders = WebiaOrder::with(['user', 'package'])->latest()->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function show(WebiaOrder $order): View
    {
        $order->load(['user', 'package', 'template', 'logs.actor']);

        return view('admin.orders.show', compact('order'));
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
