<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplatePreviewSeeder;
use Database\Seeders\WebiaTemplateSeederAthiya;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class MaisonOttoElegantWorkshopTemplateTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(WebiaTemplateSeederAthiya::class);
        $this->seed(WebiaTemplatePreviewSeeder::class);
    }

    public function test_demo_route_renders_maison_otto_and_safe_mobile_interactions(): void
    {
        $this->get('/webia/template/maison-otto-elegant-workshop')
            ->assertOk()
            ->assertSee('<title>Maison Otto – Perawatan Kendaraan yang Dikerjakan dengan Ketelitian</title>', false)
            ->assertSee('id="maison-menu-button"', false)
            ->assertSee('id="maison-menu"', false)
            ->assertSee('visibility:hidden', false)
            ->assertSee('pointer-events:none', false)
            ->assertSee('aria-hidden="true"', false)
            ->assertDontSee('backdrop-filter:', false)
            ->assertDontSee('.innerHTML=', false)
            ->assertDontSee('.innerHTML(', false)
            ->assertDontSee('insertAdjacentHTML', false);
    }

    public function test_athiya_seeder_places_maison_otto_in_elegant_workshop_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateSeederAthiya::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'maison-otto-elegant-workshop')
            ->firstOrFail();

        $this->assertSame('automotive', $template->category_slug);
        $this->assertSame(['Bengkel & Servis Kendaraan'], $template->business_types);
        $this->assertSame('Elegant', $template->design_style);
        $this->assertSame('Terracotta', $template->color_theme);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Maison Otto — Elegant Workshop', false)
            ->assertSee('data-category="automotive"', false)
            ->assertSee('data-business-types="[&quot;Bengkel &amp; Servis Kendaraan&quot;]"', false)
            ->assertSee('data-design-style="Elegant"', false)
            ->assertSee('src="/webia/template/maison-otto-elegant-workshop?preview=1"', false);
    }
}
