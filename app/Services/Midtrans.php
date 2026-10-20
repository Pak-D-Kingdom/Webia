<?php

namespace App\Services;

use App\Models\WebiaOrder;
use App\Models\WebiaOrderLog;
use App\Models\WebiaPayment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use RuntimeException;
use Throwable;

class Midtrans
{
    public function createTransaction(WebiaOrder $order, string $midtransOrderId): WebiaPayment
    {
        $payment = WebiaPayment::create([
            'webia_order_id' => $order->id,
            'midtrans_order_id' => $midtransOrderId,
            'status' => 'created',
            'expires_at' => now()->addHours(24),
        ]);

        if (! $this->configured()) {
            // shortcut: tanpa server key Midtrans (dev/E2E), sesi bayar disimulasikan lokal hingga key asli dipasang
            $payment->update(['snap_token' => 'fake-'.Str::random(10), 'snap_redirect_url' => route('payments.midtrans.simulate', $payment)]);

            return $payment;
        }

        $response = Http::baseUrl($this->baseUrl())
            ->withBasicAuth($this->serverKey(), '')
            ->post('/snap/v1/transactions', [
                'transaction_details' => [
                    'order_id' => $midtransOrderId,
                    'gross_amount' => (int) $order->total_price,
                ],
                'expiry' => [
                    'duration' => 1440,
                    'unit' => 'minutes',
                ],
                'callbacks' => [
                    'finish' => route('payments.midtrans.callback'),
                    'unfinish' => route('payments.midtrans.callback'),
                    'error' => route('payments.midtrans.callback'),
                ],
            ]);

        if (! $response->successful()) {
            throw new RuntimeException('Midtrans menolak transaksi (HTTP '.$response->status().').');
        }

        $payment->update([
            'snap_token' => (string) $response->json('token'),
            'snap_redirect_url' => (string) $response->json('redirect_url'),
        ]);

        return $payment;
    }

    /** Respon status API Midtrans, atau null bila tidak tersedia. */
    public function status(string $midtransOrderId): ?array
    {
        if (! $this->configured()) {
            return null;
        }

        try {
            $response = Http::baseUrl($this->baseUrl())
                ->withBasicAuth($this->serverKey(), '')
                ->get('/v2/'.$midtransOrderId.'/status');

            return $response->successful() ? $response->json() : null;
        } catch (Throwable) {
            return null;
        }
    }

    /** Verifikasi signature notifikasi: sha512(order_id + status_code + gross_amount + server_key). */
    public function signatureValid(string $midtransOrderId, ?string $statusCode, ?string $grossAmount, ?string $signature): bool
    {
        $serverKey = $this->serverKey();

        if ($serverKey === null || $signature === null || $signature === '') {
            return false;
        }

        return hash_equals(hash('sha512', $midtransOrderId.$statusCode.$grossAmount.$serverKey), $signature);
    }

    public function applyNotification(WebiaPayment $payment, array $payload): void
    {
        DB::transaction(function () use ($payment, $payload): void {
            $locked = WebiaPayment::whereKey($payment->id)->lockForUpdate()->firstOrFail();
            $newStatus = $this->mapTransactionStatus((string) data_get($payload, 'transaction_status'));

            if ($newStatus === 'paid' && $locked->status !== 'paid' && $this->orderAlreadyPaid($locked)) {
                // Customer terlanjur bayar dua kali (dua sesi / Midtrans + transfer manual) — dana ganda harus di-refund admin.
                $locked->update(['status' => 'duplicate', 'payload' => $payload, 'paid_at' => now()]);
                WebiaOrderLog::create([
                    'webia_order_id' => $locked->webia_order_id,
                    'actor_id' => null,
                    'to_status' => 'paid',
                    'note' => 'Pembayaran ganda ('.$locked->midtrans_order_id.') terdeteksi — perlu refund manual admin.',
                ]);

                return;
            }

            $locked->update([
                'status' => $newStatus ?? $locked->status,
                'payload' => $payload,
                'paid_at' => $newStatus === 'paid' ? now() : $locked->paid_at,
            ]);

            if ($newStatus === 'paid') {
                $this->markOrderPaid($locked);
            }
        });
    }

    private function orderAlreadyPaid(WebiaPayment $payment): bool
    {
        $order = WebiaOrder::find($payment->webia_order_id);

        if ($order === null) {
            return false;
        }

        return $order->status === 'paid'
            || $order->payments()->where('status', 'paid')->whereKeyNot($payment->id)->exists();
    }

    /** Status notifikasi yang dikenal; null berarti dibiarkan (mis. pending). */
    public function mapTransactionStatus(string $transactionStatus): ?string
    {
        return match ($transactionStatus) {
            'settlement', 'capture' => 'paid',
            'deny', 'cancel' => 'failed',
            'expire' => 'expired',
            default => null,
        };
    }

    private function markOrderPaid(WebiaPayment $payment): void
    {
        $order = WebiaOrder::whereKey($payment->webia_order_id)->lockForUpdate()->firstOrFail();

        if (! in_array($order->status, ['awaiting_payment', 'rejected'], true)) {
            return;
        }

        $oldStatus = $order->status;
        $order->update(['status' => 'paid', 'paid_at' => now()]);
        WebiaOrderLog::create([
            'webia_order_id' => $order->id,
            'actor_id' => null,
            'from_status' => $oldStatus,
            'to_status' => 'paid',
            'note' => 'Dibayar via Midtrans ('.$payment->midtrans_order_id.').',
        ]);
    }

    public function configured(): bool
    {
        return $this->serverKey() !== null;
    }

    private function serverKey(): ?string
    {
        $key = config('webia.midtrans.server_key');

        return $key ? $key : null;
    }

    private function baseUrl(): string
    {
        return config('webia.midtrans.is_production') ? 'https://api.midtrans.com' : 'https://api.sandbox.midtrans.com';
    }
}
