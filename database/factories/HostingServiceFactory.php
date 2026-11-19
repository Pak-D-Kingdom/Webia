<?php

namespace Database\Factories;

use App\Models\HostingService;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<HostingService> */
class HostingServiceFactory extends Factory
{
    public function definition(): array
    {
        $activationDate = now()->startOfDay();

        return [
            'user_id' => User::factory(),
            'website_name' => fake()->company(),
            'domain' => fake()->unique()->domainName(),
            'monthly_price' => 150000,
            'activation_date' => $activationDate,
            'billing_cycle_day' => $activationDate->day,
            'billing_status' => 'scheduled',
            'operational_status' => 'pending_activation',
        ];
    }
}
