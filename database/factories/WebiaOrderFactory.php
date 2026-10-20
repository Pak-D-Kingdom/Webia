<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\WebiaOrder;
use App\Models\WebiaPackage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<WebiaOrder> */
class WebiaOrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'order_number' => 'WEB-'.now()->format('ymd').'-'.Str::upper(Str::random(4)),
            'webia_package_id' => WebiaPackage::factory(),
            'category_slug' => 'beauty',
            'addon_ids' => [],
            'status' => 'awaiting_payment',
            'total_price' => 499000,
        ];
    }
}
