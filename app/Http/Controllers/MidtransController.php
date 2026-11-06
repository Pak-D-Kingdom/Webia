<?php

namespace App\Http\Controllers;

use App\Models\WebiaPayment;
use App\Services\Midtrans;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class MidtransController extends Controller
{
    public function __construct(private Midtrans $midtrans) {}

    public function notify(Request $request): Response
    {
        $payload = $request->json()->all();
        $midtransOrderId = (string) data_get($payload, 'order_id', '');
        abort_if($midtransOrderId === '', 400);

        $payment = WebiaPayment::where('midtrans_order_id', $midtransOrderId)->first();
        abort_unless($payment, 404);

        if (! $this->midtrans->signatureValid(
            $midtransOrderId,
            data_get($payload, 'status_code'),
            data_get($payload, 'gross_amount'),
            data_get($payload, 'signature_key'),
        )) {
            Log::warning('Midtrans notify ditolak: signature tidak valid', ['ip' => $request->ip(), 'order_id' => $midtransOrderId]);
            abort(403);
        }

        // Order masih nil di lingkungan tanpa merchant id; payload boleh tak mengirimnya juga.
        $merchantId = config('webia.midtrans.merchant_id');
        abort_unless($merchantId === null || data_get($payload, 'merchant_id') === null
            || $merchantId === (string) data_get($payload, 'merchant_id'), 400);

        // Nominal notifikasi harus sama dengan total order, kalau beda jangan pernah tandai paid.
        $grossAmount = (float) data_get($payload, 'gross_amount', 0);
        abort_unless(abs($grossAmount - (float) $payment->order->total_price) < 0.01, 400);

        $this->midtrans->applyNotification($payment, $payload);

        return response('OK');
    }

    public function callback(Request $request): RedirectResponse
    {
        $payment = WebiaPayment::where('midtrans_order_id', (string) $request->string('order_id'))->first();

        if ($payment === null) {
            return redirect()->route('orders.index');
        }

        // Best-effort: kalau notification URL tertahan (mis. localhost), status API boleh mengangkat pembayaran.
        $result = $this->midtrans->status($payment->midtrans_order_id);

        if ($result !== null) {
            $this->midtrans->applyNotification($payment, $result);
        }

        $paid = $payment->fresh()->status === 'paid';

        return redirect()
            ->route('orders.show', $payment->webia_order_id)
            ->with('status', $paid ? 'Pembayaran berhasil dikonfirmasi.' : 'Pembayaran masih diproses. Cek status pembayaran beberapa saat lagi.');
    }

    public function simulateShow(Request $request, WebiaPayment $payment): View
    {
        // Dev tanpa kredensial Midtrans: guest dari checkout publik boleh membuka halaman simulasi.
        $this->ensureSimulatable();
        abort_if($request->user() !== null && $payment->order->user_id !== $request->user()->id, 404);

        return view('payments.simulate', ['payment' => $payment]);
    }

    public function simulatePay(Request $request, WebiaPayment $payment): RedirectResponse
    {
        $this->ensureSimulatable();
        abort_if($request->user() !== null && $payment->order->user_id !== $request->user()->id, 404);

        $this->midtrans->applyNotification($payment, [
            'order_id' => $payment->midtrans_order_id,
            'status_code' => '200',
            'gross_amount' => (string) $payment->order->total_price,
            'transaction_status' => 'settlement',
            'simulated' => true,
        ]);

        return $request->user() !== null
            ? redirect()->route('orders.show', $payment->webia_order_id)->with('status', 'Pembayaran simulasi berhasil dikonfirmasi.')
            : redirect()->route('orders.success');
    }

    private function ensureSimulatable(): void
    {
        // Halaman simulasi hanya untuk lingkungan tanpa kredensial Midtrans (dev/E2E), tidak ada di production.
        abort_unless(! $this->midtrans->configured() && config('app.env') !== 'production', 404);
    }
}
