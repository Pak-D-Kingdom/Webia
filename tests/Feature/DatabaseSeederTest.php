<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class DatabaseSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_database_seeder_creates_the_webia_catalog(): void
    {
        Artisan::call('db:seed', ['--no-interaction' => true]);

        $this->assertDatabaseHas('webia_packages', ['slug' => 'pixel']);
        $this->assertDatabaseHas('webia_addons', ['name' => 'SEO Optimization']);
        $this->assertDatabaseHas('webia_templates', ['slug' => 'little-corner']);
    }
}
