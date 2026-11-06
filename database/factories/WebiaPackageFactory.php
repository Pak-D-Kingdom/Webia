<?php

namespace Database\Factories;

use App\Models\WebiaPackage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<WebiaPackage> */
class WebiaPackageFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->word();

        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name),
            'description' => fake()->sentence(),
            'price' => fake()->numberBetween(100000, 3000000),
            'cms_enabled' => false,
            'chatbot_monthly_quota' => 500,
            'features' => ['Landing page', 'Kontak bisnis'],
            'is_active' => true,
            'sort_order' => 0,
        ];
    }
}
