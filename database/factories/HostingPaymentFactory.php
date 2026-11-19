<?php

namespace Database\Factories;

use App\Models\HostingInvoice;
use App\Models\HostingPayment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<HostingPayment> */
class HostingPaymentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'hosting_invoice_id' => HostingInvoice::factory(),
            'midtrans_order_id' => 'HST-'.Str::upper(Str::random(12)),
            'snap_token' => 'fake-'.Str::random(10),
            'snap_redirect_url' => 'https://sandbox.midtrans.com/pay/'.Str::random(8),
            'status' => 'created',
            'expires_at' => now()->addDay(),
        ];
    }
}
