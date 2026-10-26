<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateSeederAthiya;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class NuviaSkinTechClinicTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_starts_in_dark_mode_and_exposes_the_theme_switch(): void
    {
        $this->get(route('webia.template.beauty.nuvia-skin-tech-clinic'))
            ->assertOk()
            ->assertSee('<title>NUVIA Skin Tech Clinic</title>', false)
            ->assertSee('<html lang="id" data-theme="dark">', false)
            ->assertSee('id="theme-toggle"', false)
            ->assertSee('Aktifkan bright mode', false)
            ->assertSee('Bright mode', false)
            ->assertSee('Aktifkan ${isBright?"dark":"bright"} mode', false)
            ->assertSee('rel="noopener noreferrer"', false);
    }

    public function test_athiya_seeder_places_nuvia_in_the_beauty_clinic_collection_filter(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateSeederAthiya::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'nuvia-skin-tech-clinic')
            ->firstOrFail();

        $this->assertSame('beauty', $template->category_slug);
        $this->assertSame(['Beauty Clinic'], $template->business_types);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('NUVIA Skin Tech Clinic — Graphite &amp; Lilac', false)
            ->assertSee('data-category="beauty"', false)
            ->assertSee('data-business-types="[&quot;Beauty Clinic&quot;]"', false)
            ->assertSee('src="/webia/template/nuvia-skin-tech-clinic?preview=1"', false);
    }
}
