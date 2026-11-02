<?php

namespace App\Services;

use App\Jobs\SendOrderCredentials;
use App\Models\User;
use App\Models\WebiaOrder;
use Illuminate\Support\Str;

class AccountProvisioner
{
    /**
     * Akun + password acak baru dibuat belakangan, saat pembayaran sudah lunas.
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

        // Kunci email mencegah dua order guest berjalan bersamaan membuat akun ganda untuk email yang sama.
        $user = User::where('email', $email)->lockForUpdate()->first();
        if ($user === null) {
            $plainPassword = Str::password(16);
            $user = User::create([
                'name' => $order->guest_name ?? 'Pelanggan WEBIA',
                'email' => $email,
                // Password lama tidak pernah diubah; email existing memakai akun tanpa kredensial baru.
                'password' => $plainPassword,
            ]);
            // Password acak disimpan terenkripsi di order, hanya sampai email kredensial terkirim.
            $order->credential_password = $plainPassword;
        }

        $order->user_id = $user->id;
        $order->guest_email = $order->guest_email ?? $email;
        $order->credential_status = 'queued';
        $order->save();

        if ($dispatchJob) {
            SendOrderCredentials::dispatch($order->id)->afterCommit();
        }

        return $order;
    }
}
