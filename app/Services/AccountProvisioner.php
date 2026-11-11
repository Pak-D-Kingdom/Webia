<?php

namespace App\Services;

use App\Jobs\SendOrderCredentials;
use App\Models\User;
use App\Models\WebiaOrder;
use Illuminate\Support\Str;

class AccountProvisioner
{
    /**
     * Akun dibuat setelah pembayaran lunas. Password internal acak tidak pernah dikirim ke pelanggan.
     * Instansiasi harus idempotent: aman dipanggil ulang oleh webhook, simulasi, atau approval admin.
     *
     * @param  bool  $dispatchJob  bila false, pengirim email ditangani pemanggil (mis. job itu sendiri)
     */
    public function provision(WebiaOrder $order, bool $dispatchJob = true): WebiaOrder
    {
        // Idempotent: webhook retry/polling memanggil ulang tanpa menggandakan akun maupun job.
        if (! in_array($order->credential_status, ['pending', 'failed'], true)) {
            return $order;
        }

        $order = WebiaOrder::whereKey($order->getKey())->lockForUpdate()->firstOrFail();
        if (! in_array($order->credential_status, ['pending', 'failed'], true)) {
            return $order;
        }

        $email = $order->guest_email ?? $order->user?->email;
        if ($email === null) {
            return $order;
        }

        $user = User::where('email', $email)->lockForUpdate()->first();
        $requiresPasswordSetup = $user === null || $order->credential_requires_password_setup;
        if ($user === null) {
            $user = User::create([
                'name' => $order->guest_name ?? 'Pelanggan WEBIA',
                'email' => $email,
                'password' => Str::password(40),
            ]);
            $user->markEmailAsVerified();
        }

        $order->user_id = $user->id;
        $order->guest_email = $order->guest_email ?? $email;
        $order->credential_requires_password_setup = $requiresPasswordSetup;
        $order->credential_status = 'queued';
        $order->save();

        if ($dispatchJob) {
            SendOrderCredentials::dispatch($order->id)->afterCommit();
        }

        return $order;
    }
}
