<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateAlleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class AgriternakTemplatesTest extends TestCase
{
    use RefreshDatabase;

    public function test_organic_demo_renders_the_ethical_livestock_farm(): void
    {
        $this->get(route('webia.template.agriculture.agriternak-organic-ethical-precision'))
            ->assertOk()
            ->assertSee('<title>AgriTernak - Peternakan Organik Beretika &amp; Presisi</title>', false)
            ->assertSee('Peternakan Organik Beretika')
            ->assertSee('font-organic-display-hero', false)
            ->assertDontSee('cdn.tailwindcss.com');
    }

    public function test_futuristic_demo_renders_the_ai_iot_livestock_platform(): void
    {
        $this->get(route('webia.template.agriculture.agriternak-futuristic-iot'))
            ->assertOk()
            ->assertSee('<title>AgriTernak - Arctic Frost Precision Pasture &amp; AI IoT Livestock Platform</title>', false)
            ->assertSee('Platform AI & IoT Peternakan')
            ->assertSee('updateSimData')
            ->assertSee('font-futuristic-display', false)
            ->assertDontSee('cdn.tailwindcss.com');
    }

    public function test_bold_demo_renders_the_smart_pasture_showcase(): void
    {
        $this->get(route('webia.template.agriculture.agriternak-bold-livestock'))
            ->assertOk()
            ->assertSee('<title>AgriTernak - Precision Livestock &amp; Smart Pasture Ecosystem</title>', false)
            ->assertSee('Revolusi')
            ->assertSee('Peternakan')
            ->assertSee('toggleAiModal')
            ->assertSee('font-bold-display-hero', false)
            ->assertDontSee('cdn.tailwindcss.com');
    }

    public function test_all_templates_are_seeded_idempotently_and_listed_in_the_agriculture_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateAlleSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateAlleSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $expectedTemplates = [
            'agriternak-organic-ethical-precision' => 42,
            'agriternak-futuristic-iot' => 43,
            'agriternak-bold-livestock' => 44,
        ];

        foreach ($expectedTemplates as $slug => $sortOrder) {
            $this->assertDatabaseHas('webia_templates', [
                'slug' => $slug,
                'category_slug' => 'agriculture',
                'sort_order' => $sortOrder,
                'template_url' => "/webia/template/{$slug}",
                'is_active' => true,
            ]);
        }

        $this->assertSame(3, WebiaTemplate::query()
            ->whereIn('slug', array_keys($expectedTemplates))
            ->count());

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Agriculture & Livestock')
            ->assertSee('AgriTernak — Organic Ethical Precision Farming', false)
            ->assertSee('data-category="agriculture"', false)
            ->assertSee('src="/webia/template/agriternak-organic-ethical-precision?preview=1"', false)
            ->assertSee('AgriTernak — Arctic Frost AI &amp; IoT Livestock Platform', false)
            ->assertSee('src="/webia/template/agriternak-futuristic-iot?preview=1"', false)
            ->assertSee('AgriTernak — Bold Precision Livestock &amp; Smart Pasture', false)
            ->assertSee('src="/webia/template/agriternak-bold-livestock?preview=1"', false);
    }

    public function test_all_catalog_previews_show_their_hero_sections(): void
    {
        foreach ([
            'agriternak-organic-ethical-precision' => 'agriternak-organic-preview',
            'agriternak-futuristic-iot' => 'agriternak-futuristic-preview',
            'agriternak-bold-livestock' => 'agriternak-bold-preview',
        ] as $slug => $previewClass) {
            $this->get(route("webia.template.agriculture.{$slug}").'?preview=1')
                ->assertOk()
                ->assertSee($previewClass);
        }
    }
}
