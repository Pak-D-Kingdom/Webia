<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\seedersputri;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class TechnologyDataAnalyticsCreativeArcticFrostPutriTest extends TestCase
{
    use RefreshDatabase;

    public function test_route_renders_the_technology_data_analytics_creative_arctic_frost_template(): void
    {
        $this->get(route('webia.template.technology-dataanalytics-creative-arcticfrost-putri'))
            ->assertOk()
            ->assertSee('FrostByte Analytics')
            ->assertSee('Data Analytics Creative Arctic Frost')
            ->assertSee('Menyingkap Tabir Data')
            ->assertSee('CREATIVE DATA INTELLIGENCE')
            ->assertSee('Modern Cloud Data Lakehouse')
            ->assertSee('Real-Time Stream Processing')
            ->assertSee('Kalkulator Nilai ROI')
            ->assertSee('FrostAI Data Assistant')
            ->assertSee('https://wa.me/6281234567890?text=', false);
    }

    public function test_seeder_places_creative_data_analytics_template_in_collection_and_is_idempotent(): void
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
            ->where('slug', 'technology-dataanalytics-creative-arcticfrost-putri')
            ->firstOrFail();

        $this->assertSame('technology-it', $template->category_slug);
        $this->assertSame('Technology & IT', $template->category_label);
        $this->assertSame(['Data Analytics'], $template->business_types);
        $this->assertSame('Creative', $template->design_style);
        $this->assertSame('Arctic Frost', $template->color_theme);
        $this->assertSame(58, $template->sort_order);
        $this->assertTrue($template->is_active);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('FrostByte Analytics — Data Analytics Creative Arctic Frost', false)
            ->assertSee('data-category="technology-it"', false)
            ->assertSee('data-business-types="[&quot;Data Analytics&quot;]"', false)
            ->assertSee('data-design-style="Creative"', false)
            ->assertSee('src="/webia/template/technology-dataanalytics-creative-arcticfrost-putri?preview=1"', false);
    }
}
