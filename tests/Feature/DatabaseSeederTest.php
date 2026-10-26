<?php

namespace Tests\Feature;

use Database\Seeders\DatabaseSeeder;
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
        $this->assertDatabaseHas('webia_templates', ['slug' => 'company-terracotta']);
        $this->assertDatabaseHas('webia_templates', ['slug' => 'kusuma-ningrat-royal-heritage']);
    }

    public function test_default_database_seeder_displays_templates_in_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => DatabaseSeeder::class,
            '--force' => true,
        ]);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Blush Nail Studio')
            ->assertSee('Sage Nail Atelier')
            ->assertSee('Maison Soleil')
            ->assertSee('Sweet Crumb Bakery')
            ->assertSee('Kusuma Ningrat — Royal Heritage Catering')
            ->assertSee('NUVIA Skin Tech Clinic — Graphite & Lilac')
            ->assertSee('GLOW LAB — Creative Beauty Clinic')
            ->assertSee('Atelier Kulit — Creative Beauty Clinic')
            ->assertSee('VOLTRIX Garage — Futuristic Automotive')
            ->assertSee('NIGHTSHIFT Auto — Dark Mode Automotive')
            ->assertSee('ARVO Motor Studio — Modern Automotive');
    }

    public function test_sweet_crumb_demo_renders_bakery_sections_and_contact_buttons(): void
    {
        $this->get(route('webia.template.fnb.bakery.playful.colorful'))
            ->assertOk()
            ->assertSee('Katalog Roti & Pastry', false)
            ->assertSee('Paket Promo & Event', false)
            ->assertSee('Pertanyaan Umum (FAQ)')
            ->assertSee('Apakah tersedia layanan pengiriman?')
            ->assertSee('wa.me/6281234567890')
            ->assertSee('webia-ai-launcher');
    }
}
