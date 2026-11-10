<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateAlleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class HomeCleaningServiceTemplatesTest extends TestCase
{
    use RefreshDatabase;

    public function test_madubersih_vintage_demo_renders_its_estimator_and_cleaning_services(): void
    {
        $this->get(route('webia.template.madubersih-home-cleaning-vintage'))
            ->assertOk()
            ->assertSee('<title>MaduBersih - Layanan Bersih & Sanitasi Rumah Tradisi Tepercaya</title>', false)
            ->assertSee('MADU')
            ->assertSee('Kalkulator MaduBersih')
            ->assertSee('calculateVintageEstimate()')
            ->assertSee('font-madubersih-display', false)
            ->assertDontSee('cdn.tailwindcss.com')
            ->assertSee('noopener noreferrer');
    }

    public function test_astroclean_cosmic_demo_renders_its_estimator_and_deep_cleaning_services(): void
    {
        $this->get(route('webia.template.astroclean-home-cleaning-cosmic'))
            ->assertOk()
            ->assertSee('<title>AstroClean - Spesialis Sanitasi & Deep Cleaning Rumah</title>', false)
            ->assertSee('ASTRO')
            ->assertSee('AstroClean AI Estimator')
            ->assertSee('calculateEstimate()')
            ->assertSee('font-astroclean-display', false)
            ->assertDontSee('cdn.tailwindcss.com')
            ->assertSee('noopener noreferrer');
    }

    public function test_home_cleaning_templates_are_seeded_idempotently_and_listed_in_the_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateAlleSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);
        $templateCount = WebiaTemplate::query()->count();

        Artisan::call('db:seed', [
            '--class' => WebiaTemplateAlleSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $this->assertDatabaseCount('webia_templates', $templateCount);
        $this->assertDatabaseHas('webia_templates', [
            'slug' => 'madubersih-home-cleaning-vintage',
            'category_slug' => 'home-services',
            'sort_order' => 51,
            'template_url' => '/webia/template/madubersih-home-cleaning-vintage',
            'is_active' => true,
        ]);
        $this->assertDatabaseHas('webia_templates', [
            'slug' => 'astroclean-home-cleaning-cosmic',
            'category_slug' => 'home-services',
            'sort_order' => 52,
            'template_url' => '/webia/template/astroclean-home-cleaning-cosmic',
            'is_active' => true,
        ]);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('MaduBersih — Vintage Warm Bee Home Cleaning', false)
            ->assertSee('src="/webia/template/madubersih-home-cleaning-vintage?preview=1"', false)
            ->assertSee('AstroClean — Cosmic Deep Cleaning', false)
            ->assertSee('src="/webia/template/astroclean-home-cleaning-cosmic?preview=1"', false);
    }
}
