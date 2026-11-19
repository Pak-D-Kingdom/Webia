<?php

namespace Database\Factories;

use App\Models\HostingService;
use App\Models\HostingTask;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<HostingTask> */
class HostingTaskFactory extends Factory
{
    public function definition(): array
    {
        return [
            'hosting_service_id' => HostingService::factory(),
            'type' => 'suspend_hosting',
            'status' => 'pending',
        ];
    }
}
