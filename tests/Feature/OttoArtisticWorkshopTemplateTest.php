<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateSeederAthiya;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class OttoArtisticWorkshopTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_otto_and_safe_mobile_interactions(): void
    {
        $this->get(route('webia.template.automotive.otto-artistic-workshop'))
            ->assertOk()
            ->assertSee('<title>Bengkel Otto – Servis Kendaraan yang Bikin Senyum</title>', false)
            ->assertSee('id="otto-menu-button"', false)
            ->assertSee('id="otto-menu"', false)
            ->assertSee('visibility:hidden', false)
            ->assertSee('pointer-events:none', false)
            ->assertSee('aria-hidden="true"', false)
            ->assertSee('target="_blank"', false)
            ->assertSee('rel="noopener"', false)
            ->assertDontSee('.innerHTML=', false)
            ->assertDontSee('.innerHTML(', false);
    }

    public function test_athiya_seeder_places_otto_in_artistic_workshop_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateSeederAthiya::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'otto-artistic-workshop')
            ->firstOrFail();

        $this->assertSame('automotive', $template->category_slug);
        $this->assertSame(['Bengkel & Servis Kendaraan'], $template->business_types);
        $this->assertSame('Artistic', $template->design_style);
        $this->assertSame('Pastel Mix', $template->color_theme);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Bengkel Otto — Artistic Workshop', false)
            ->assertSee('data-category="automotive"', false)
            ->assertSee('data-business-types="[&quot;Bengkel &amp; Servis Kendaraan&quot;]"', false)
            ->assertSee('data-design-style="Artistic"', false)
            ->assertSee('src="/webia/template/otto-artistic-workshop?preview=1"', false);
    }
}
