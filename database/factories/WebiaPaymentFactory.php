<?php

namespace Database\Factories;

use App\Models\WebiaOrder;
use App\Models\WebiaPayment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<WebiaPayment> */
class WebiaPaymentFactory extends Factory
{
    public function definition(): array
    {
        /** @var WebiaOrder $order */
        $order = WebiaOrder::factory()->create();

        return [
            'webia_order_id' => $order->id,
            'midtrans_order_id' => 'WEB-'.$order->id.'-01',
            'snap_token' => 'fake-'.Str::random(10),
            'snap_redirect_url' => 'https://sandbox.midtrans.com/pay/'.Str::random(8),
            'status' => 'created',
        ];
    }
}
