<?php

namespace Tests\Feature;

use Database\Seeders\DatabaseSeeder;
use Database\Seeders\WebiaTemplatePreviewSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class DatabaseSeederTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(DatabaseSeeder::class);
        $this->seed(WebiaTemplatePreviewSeeder::class);
    }

    public function test_database_seeder_creates_the_webia_catalog(): void
    {
        Artisan::call('db:seed', ['--no-interaction' => true]);

        $this->assertDatabaseHas('webia_packages', ['slug' => 'pixel']);
        $this->assertDatabaseHas('webia_addons', ['name' => 'SEO Optimization']);
        $this->assertDatabaseHas('webia_templates', ['slug' => 'company-terracotta']);
        $this->assertDatabaseHas('webia_templates', [
            'slug' => 'kusuma-ningrat-royal-heritage',
            'preview_view' => 'website-bisnis.templates.fnb.kusuma-ningrat-royal-heritage',
        ]);
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
            ->assertSee('Pawtopia — Animal Care Masa Depan')
            ->assertSee('Sweet Crumb Bakery')
            ->assertSee('Kusuma Ningrat — Royal Heritage Catering')
            ->assertSee('NUVIA Skin Tech Clinic — Graphite & Lilac')
            ->assertSee('GLOW LAB — Creative Beauty Clinic')
            ->assertSee('Atelier Kulit — Creative Beauty Clinic')
            ->assertSee('Tanah Warna — Makeup Artist Rustic')
            ->assertSee('Rosalind & Co. — Salon de Maquillage Vintage')
            ->assertSee('VOLTRIX Garage — Futuristic Automotive')
            ->assertSee('NIGHTSHIFT Auto — Dark Mode Automotive')
            ->assertSee('ARVO Motor Studio — Modern Automotive')
            ->assertSee('Rasa Rupa — Makanan Nusantara sebagai Karya Seni')
            ->assertSee('Tetangga Kenyang — Makanan Rumahan yang Ramah')
            ->assertSee('Hulu — Pantry Asal-Usul Nusantara');
    }

    public function test_sweet_crumb_demo_renders_bakery_sections_and_contact_buttons(): void
    {
        $this->get('/webia/template/fnb-bakery-playful-colorful')
            ->assertOk()
            ->assertSee('Katalog Roti & Pastry', false)
            ->assertSee('Paket Promo & Event', false)
            ->assertSee('Pertanyaan Umum (FAQ)')
            ->assertSee('Apakah tersedia layanan pengiriman?')
            ->assertSee('wa.me/6281234567890')
            ->assertSee('webia-ai-launcher');
    }

    #[DataProvider('salonTemplates')]
    public function test_salon_templates_are_seeded_renderable_and_listed(
        string $slug,
        string $templateUrl,
        string $previewView,
        string $name,
    ): void {
        $this->assertDatabaseHas('webia_templates', [
            'slug' => $slug,
            'template_url' => $templateUrl,
            'preview_view' => $previewView,
            'category_slug' => 'beauty',
        ]);

        $this->get($templateUrl)
            ->assertOk()
            ->assertViewIs($previewView);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee($name)
            ->assertSee($templateUrl, false);
    }

    public static function salonTemplates(): array
    {
        return [
            'modern sage' => [
                'salon-modern-sage',
                '/webia/template/salon-modern-sage',
                'website-bisnis.templates.salon-modern-sage',
                'Sage Bloom Salon',
            ],
            'classic warm neutral' => [
                'salon-classic-warm-neutral',
                '/webia/template/salon-classic-warm-neutral',
                'website-bisnis.templates.salon-classic-warm-neutral',
                'Maison Élise Salon',
            ],
            'elegant soft pink' => [
                'salon-elegant-soft-pink',
                '/webia/template/salon-elegant-soft-pink',
                'website-bisnis.templates.salon-elegant-soft-pink',
                'Rosé Atelier',
            ],
        ];
    }
}
