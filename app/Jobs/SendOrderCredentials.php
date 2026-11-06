<?php

namespace App\Jobs;

use App\Mail\AccountCredentialsMail;
use App\Models\WebiaOrder;
use App\Services\AccountProvisioner;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use Throwable;

class SendOrderCredentials implements ShouldQueue
{
    use Dispatchable, Queueable;

    public int $tries = 5;

    /** @var array<int, int> */
    public array $backoff = [60, 300, 900, 3600];

    public function __construct(public int $orderId) {}

    public function handle(AccountProvisioner $provisioner): void
    {
        $order = WebiaOrder::find($this->orderId);
        if ($order === null || $order->credential_status === 'sent') {
            return;
        }

        // Selaras dengan jalur admin: provisioning dijamin dulu walau sinkron gagal.
        $order = $provisioner->provision($order, false)->refresh();

        $recipient = $order->user?->email ?? $order->guest_email;
        if ($recipient === null) {
            $order->update(['credential_status' => 'failed']);

            return;
        }

        Mail::to($recipient)->send(new AccountCredentialsMail($order, $order->credential_password));

        // Setelah terkirim, plaintext password tidak boleh tersisa di database.
        $order->update(['credential_status' => 'sent', 'credential_password' => null]);
    }

    public function failed(Throwable $exception): void
    {
        WebiaOrder::whereKey($this->orderId)
            ->where('credential_status', '!=', 'sent')
            ->update(['credential_status' => 'failed']);
    }
}
