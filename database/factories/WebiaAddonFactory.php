<?php

namespace Database\Factories;

use App\Models\WebiaAddon;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<WebiaAddon> */
class WebiaAddonFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ucfirst(fake()->unique()->words(2, true)),
            'description' => fake()->sentence(),
            'price' => fake()->numberBetween(100000, 1000000),
            'is_active' => true,
        ];
    }
}
