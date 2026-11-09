<?php

namespace App\Services;

use App\Jobs\SendOrderCredentials;
use App\Models\User;
use App\Models\WebiaOrder;

class AccountProvisioner
{
    /**
     * Akun + password default dibuat belakangan, saat pembayaran sudah lunas.
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
        $plainPassword = null;
        if ($user === null) {
            $plainPassword = config('webia.provisioning.default_password', 'password123');
            $user = User::create([
                'name' => $order->guest_name ?? 'Pelanggan WEBIA',
                'email' => $email,
                'password' => $plainPassword,
            ]);
        }

        $order->user_id = $user->id;
        $order->guest_email = $order->guest_email ?? $email;
        $order->credential_password = $plainPassword;
        $order->credential_status = 'queued';
        $order->save();

        if ($dispatchJob) {
            SendOrderCredentials::dispatch($order->id)->afterCommit();
        }

        return $order;
    }
}
