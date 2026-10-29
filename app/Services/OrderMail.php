<?php

namespace App\Services;

use App\Mail\AccountCredentialsMail;
use App\Mail\OrderStatusMail;
use App\Models\User;
use App\Models\WebiaOrder;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class OrderMail
{
    public function notifyCustomer(WebiaOrder $order, string $type): void
    {
        $this->send($order->user?->email, new OrderStatusMail($order, $type));
    }

    public function sendCredentials(WebiaOrder $order, ?string $plainPassword): void
    {
        // $plainPassword null berarti akun sudah ada: kirim pemberitahuan tanpa kredensial baru.
        $this->send($order->user?->email, new AccountCredentialsMail($order, $plainPassword));
    }

    public function notifyAdmins(WebiaOrder $order): void
    {
        $admins = User::where('role', 'admin')->pluck('email')->filter()->unique();

        foreach ($admins as $email) {
            $this->send($email, new OrderStatusMail($order, 'admin_verify'));
        }
    }

    private function send(?string $recipient, Mailable $mail): void
    {
        // Kegagalan email tak boleh menggagalkan aksi yang memicunya (webhook / keputusan admin).
        try {
            if ($recipient !== null) {
                Mail::to($recipient)->send($mail);
            }
        } catch (Throwable $exception) {
            Log::warning('Email WEBIA gagal dikirim', ['to' => $recipient, 'error' => $exception->getMessage()]);
        }
    }
}
