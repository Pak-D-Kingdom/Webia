<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\seedersputri;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class TechnologyDataAnalyticsLuxuryPastelMixPutriTest extends TestCase
{
    use RefreshDatabase;

    public function test_route_renders_the_technology_data_analytics_luxury_pastel_mix_template(): void
    {
        $this->get(route('webia.template.technology-dataanalytics-luxury-pastelmix-putri'))
            ->assertOk()
            ->assertSee('<title>AuraMetrics Studio — Data Analytics Luxury Pastel Mix</title>', false)
            ->assertSee('Presisi Data Mewah')
            ->assertSee('BESPOKE ENTERPRISE DATA INTELLIGENCE')
            ->assertSee('Executive BI & Luxury Dashboard', false)
            ->assertSee('Predictive AI & Forecasting Modeling', false)
            ->assertSee('Kalkulator Estimasi Kebutuhan & ROI Proyek Data', false)
            ->assertSee('AuraData Executive AI')
            ->assertSee('https://wa.me/6281234567890?text=', false);
    }

    public function test_seeder_places_data_analytics_template_in_collection_and_is_idempotent(): void
    {
        Artisan::call('db:seed', [
            '--class' => seedersputri::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        Artisan::call('db:seed', [
            '--class' => seedersputri::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'technology-dataanalytics-luxury-pastelmix-putri')
            ->firstOrFail();

        $this->assertSame('technology-it', $template->category_slug);
        $this->assertSame('Technology & IT', $template->category_label);
        $this->assertSame(['Data Analytics'], $template->business_types);
        $this->assertSame('Luxury', $template->design_style);
        $this->assertSame('Pastel Mix', $template->color_theme);
        $this->assertSame(54, $template->sort_order);
        $this->assertTrue($template->is_active);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('AuraMetrics Studio — Data Analytics Luxury Pastel Mix', false)
            ->assertSee('data-category="technology-it"', false)
            ->assertSee('data-business-types="[&quot;Data Analytics&quot;]"', false)
            ->assertSee('data-design-style="Luxury"', false)
            ->assertSee('src="/webia/template/technology-dataanalytics-luxury-pastelmix-putri?preview=1"', false);
    }
}
