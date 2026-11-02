<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplatePutriSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class TechnologyDataAnalyticsCorporateOceanTealPutriTest extends TestCase
{
    use RefreshDatabase;

    public function test_route_renders_the_technology_data_analytics_corporate_ocean_teal_template(): void
    {
        $this->get(route('webia.template.technology-dataanalytics-corporate-oceanteal-putri'))
            ->assertOk()
            ->assertSee('<title>Quantix Data Corp — Data Analytics Corporate Ocean Teal</title>', false)
            ->assertSee('Kekuatan Data Terstruktur')
            ->assertSee('ENTERPRISE DATA INTELLIGENCE & GOVERNANCE', false)
            ->assertSee('Enterprise Data Warehouse & Modern Lakehouse', false)
            ->assertSee('Executive BI & C-Level Automated Reporting', false)
            ->assertSee('Kalkulator Proyeksi Efisiensi Data Korporasi', false)
            ->assertSee('Quantix Corporate AI')
            ->assertSee('https://wa.me/6281234567890?text=', false);
    }

    public function test_seeder_places_corporate_data_analytics_template_in_collection_and_is_idempotent(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplatePutriSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        Artisan::call('db:seed', [
            '--class' => WebiaTemplatePutriSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'technology-dataanalytics-corporate-oceanteal-putri')
            ->firstOrFail();

        $this->assertSame('technology-it', $template->category_slug);
        $this->assertSame('Technology & IT', $template->category_label);
        $this->assertSame(['Data Analytics'], $template->business_types);
        $this->assertSame('Corporate', $template->design_style);
        $this->assertSame('Ocean Teal', $template->color_theme);
        $this->assertSame(56, $template->sort_order);
        $this->assertTrue($template->is_active);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Quantix Data Corp — Data Analytics Corporate Ocean Teal', false)
            ->assertSee('data-category="technology-it"', false)
            ->assertSee('data-business-types="[&quot;Data Analytics&quot;]"', false)
            ->assertSee('data-design-style="Corporate"', false)
            ->assertSee('src="/webia/template/technology-dataanalytics-corporate-oceanteal-putri?preview=1"', false);
    }
}
