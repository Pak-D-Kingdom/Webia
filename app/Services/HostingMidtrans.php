<?php

namespace App\Services;

use App\Models\HostingInvoice;
use App\Models\HostingPayment;
use App\Models\HostingTask;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use RuntimeException;
use Throwable;

class HostingMidtrans
{
    public function createTransaction(HostingInvoice $invoice, string $midtransOrderId): HostingPayment
    {
        $previousPaymentIds = $invoice->payments()->where('status', 'created')->pluck('id');
        $payment = HostingPayment::create([
            'hosting_invoice_id' => $invoice->id,
            'midtrans_order_id' => $midtransOrderId,
            'status' => 'created',
            'expires_at' => now()->addDay(),
        ]);

        if (! $this->configured()) {
            $payment->update(['snap_token' => 'fake-'.Str::random(10), 'snap_redirect_url' => route('payments.midtrans.hosting.simulate', $payment)]);
            $invoice->payments()->whereKey($previousPaymentIds)->update(['status' => 'superseded']);

            return $payment;
        }

        try {
            $response = Http::baseUrl($this->baseUrl())
                ->connectTimeout(5)
                ->timeout(15)
                ->withBasicAuth((string) config('webia.midtrans.server_key'), '')
                ->post('/snap/v1/transactions', [
                    'transaction_details' => ['order_id' => $midtransOrderId, 'gross_amount' => $invoice->amount],
                    'expiry' => ['duration' => 1440, 'unit' => 'minutes'],
                    'callbacks' => [
                        'finish' => route('payments.midtrans.callback'),
                        'unfinish' => route('payments.midtrans.callback'),
                        'error' => route('payments.midtrans.callback'),
                    ],
                ]);
        } catch (Throwable $exception) {
            report($exception);

            return $payment;
        }

        if (! $response->successful() || ! $response->json('token') || ! $response->json('redirect_url')) {
            report(new RuntimeException('Midtrans menolak transaksi hosting (HTTP '.$response->status().').'));

            return $payment;
        }

        $payment->update(['snap_token' => $response->json('token'), 'snap_redirect_url' => $response->json('redirect_url')]);
        $invoice->payments()->whereKey($previousPaymentIds)->update(['status' => 'superseded']);

        return $payment;
    }

    public function applyNotification(HostingPayment $payment, array $payload): void
    {
        DB::transaction(function () use ($payment, $payload): void {
            $locked = HostingPayment::whereKey($payment->id)->lockForUpdate()->firstOrFail();
            $invoice = HostingInvoice::whereKey($locked->hosting_invoice_id)->lockForUpdate()->firstOrFail();
            $newStatus = app(Midtrans::class)->mapTransactionStatus(
                (string) data_get($payload, 'transaction_status'),
                data_get($payload, 'fraud_status'),
            );

            if ($newStatus === null) {
                $locked->update(['payload' => $payload]);

                return;
            }

            if ($newStatus === 'paid' && $invoice->status === 'paid') {
                $locked->update(['status' => $locked->status === 'paid' ? 'paid' : 'duplicate', 'payload' => $payload, 'paid_at' => $locked->paid_at ?? now()]);

                return;
            }

            $locked->update(['status' => $newStatus, 'payload' => $payload, 'paid_at' => $newStatus === 'paid' ? now() : $locked->paid_at]);

            if ($newStatus !== 'paid' || $invoice->status === 'cancelled') {
                return;
            }

            $invoice->update(['status' => 'paid', 'paid_at' => now()]);
            $service = $invoice->service()->lockForUpdate()->firstOrFail();
            $hasOverdue = $service->invoices()->whereIn('status', ['overdue', 'unpaid'])->where('due_at', '<', now())->exists();

            if (! $hasOverdue && $service->billing_status === 'suspended') {
                $service->update(['billing_status' => 'active', 'operational_status' => 'pending_activation']);
                HostingTask::firstOrCreate([
                    'hosting_service_id' => $service->id,
                    'type' => 'activate_hosting',
                    'status' => 'pending',
                ]);
            }
        });
    }

    public function status(string $midtransOrderId): ?array
    {
        if (! $this->configured()) {
            return null;
        }

        try {
            $response = Http::baseUrl($this->baseUrl())
                ->connectTimeout(5)
                ->timeout(15)
                ->withBasicAuth((string) config('webia.midtrans.server_key'), '')
                ->get('/v2/'.$midtransOrderId.'/status');

            return $response->successful() ? $response->json() : null;
        } catch (Throwable) {
            return null;
        }
    }

    public function configured(): bool
    {
        return filled(config('webia.midtrans.server_key'));
    }

    private function baseUrl(): string
    {
        return config('webia.midtrans.is_production') ? 'https://api.midtrans.com' : 'https://api.sandbox.midtrans.com';
    }
}
