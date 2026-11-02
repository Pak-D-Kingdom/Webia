<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateAlleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class PropertyShowcaseTemplatesTest extends TestCase
{
    use RefreshDatabase;

    public function test_denim_horizon_demo_renders_the_minimalist_property_showcase(): void
    {
        $this->get(route('webia.template.property.denim-horizon-property-minimalist'))
            ->assertOk()
            ->assertSee('<title>Denim Horizon &mdash; Minimalist Property Collection</title>', false)
            ->assertSee('Pure Form,')
            ->assertSee('Effortless Living:')
            ->assertSee('Interactive Mortgage Simulator (KPR)')
            ->assertSee('Horizon AI Concierge')
            ->assertSee('font-property-minimalist-display', false)
            ->assertDontSee('cdn.tailwindcss.com');
    }

    public function test_pusaka_asri_demo_renders_the_traditional_residence_showcase(): void
    {
        $this->get(route('webia.template.property.pusaka-asri-property-traditional'))
            ->assertOk()
            ->assertSee('<title>Pusaka Asri Residence | Nusantara Heritage Living</title>', false)
            ->assertSee('Harmoni Arsitektur Pusaka Nusantara')
            ->assertSee('Kalkulator KPR Pusaka')
            ->assertSee('id="booking-form"', false)
            ->assertSee('Asri AI Advisor')
            ->assertSee('font-property-traditional-display-hero', false)
            ->assertDontSee('cdn.tailwindcss.com');
    }

    public function test_both_templates_are_seeded_idempotently_and_listed_in_the_property_collection(): void
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

        $this->assertDatabaseHas('webia_templates', [
            'slug' => 'denim-horizon-property-minimalist',
            'sort_order' => 40,
            'template_url' => '/webia/template/denim-horizon-property-minimalist',
            'is_active' => true,
        ]);
        $this->assertDatabaseHas('webia_templates', [
            'slug' => 'pusaka-asri-property-traditional',
            'sort_order' => 41,
            'template_url' => '/webia/template/pusaka-asri-property-traditional',
            'is_active' => true,
        ]);
        $this->assertSame(2, WebiaTemplate::query()
            ->whereIn('slug', [
                'denim-horizon-property-minimalist',
                'pusaka-asri-property-traditional',
            ])
            ->count());

        $denimHorizon = WebiaTemplate::query()
            ->where('slug', 'denim-horizon-property-minimalist')
            ->firstOrFail();
        $pusakaAsri = WebiaTemplate::query()
            ->where('slug', 'pusaka-asri-property-traditional')
            ->firstOrFail();

        $this->assertSame('property', $denimHorizon->category_slug);
        $this->assertSame('property', $pusakaAsri->category_slug);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Denim Horizon — Modern Japanese Sanctuary', false)
            ->assertSee('data-category="property"', false)
            ->assertSee('src="/webia/template/denim-horizon-property-minimalist?preview=1"', false)
            ->assertSee('Pusaka Asri Residence — Nusantara Heritage Living', false)
            ->assertSee('src="/webia/template/pusaka-asri-property-traditional?preview=1"', false);
    }

    public function test_both_catalog_previews_show_only_their_hero_sections(): void
    {
        $this->get(route('webia.template.property.denim-horizon-property-minimalist').'?preview=1')
            ->assertOk()
            ->assertSee('property-minimalist-preview');

        $this->get(route('webia.template.property.pusaka-asri-property-traditional').'?preview=1')
            ->assertOk()
            ->assertSee('property-traditional-preview');
    }
}
