<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateAlleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ApexAutomotiveTemplatesTest extends TestCase
{
    use RefreshDatabase;

    public function test_heritage_demo_route_renders_the_elegant_showroom(): void
    {
        $this->get(route('webia.template.automotive.apex-heritage-automotive-elegant'))
            ->assertOk()
            ->assertSee('<title>APEX Heritage &mdash; Elegant Automotive Collection</title>', false)
            ->assertSee('Curated Mastery')
            ->assertSee('The Current Collection')
            ->assertSee('Bespoke Financing Calculator')
            ->assertSee('id="viewingForm"', false)
            ->assertSee('handleAiChat(event)')
            ->assertSee('font-heritage-display', false)
            ->assertDontSee('cdn.tailwindcss.com')
            ->assertDontSee('tailwind-config');
    }

    public function test_scuderia_demo_route_renders_the_minimalist_sports_car_showroom(): void
    {
        $this->get(route('webia.template.automotive.apex-scuderia-automotive-minimalist'))
            ->assertOk()
            ->assertSee('<title>APEX Scuderia &mdash; Minimalist Automotive Collection</title>', false)
            ->assertSee('Sculpted Velocity')
            ->assertSee('The Vault Inventory')
            ->assertSee('Structured Acquisition Studio')
            ->assertSee('VIP Viewing Request')
            ->assertSee('font-scuderia-display-hero', false)
            ->assertDontSee('cdn.tailwindcss.com')
            ->assertDontSee('tailwind-config');
    }

    public function test_both_templates_are_seeded_idempotently_and_listed_in_the_automotive_collection(): void
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
            'slug' => 'apex-heritage-automotive-elegant',
            'sort_order' => 38,
            'template_url' => '/webia/template/apex-heritage-automotive-elegant',
            'is_active' => true,
        ]);
        $this->assertDatabaseHas('webia_templates', [
            'slug' => 'apex-scuderia-automotive-minimalist',
            'sort_order' => 39,
            'template_url' => '/webia/template/apex-scuderia-automotive-minimalist',
            'is_active' => true,
        ]);
        $this->assertSame(2, WebiaTemplate::query()
            ->whereIn('slug', [
                'apex-heritage-automotive-elegant',
                'apex-scuderia-automotive-minimalist',
            ])
            ->count());

        $heritage = WebiaTemplate::query()
            ->where('slug', 'apex-heritage-automotive-elegant')
            ->firstOrFail();
        $scuderia = WebiaTemplate::query()
            ->where('slug', 'apex-scuderia-automotive-minimalist')
            ->firstOrFail();

        $this->assertSame('automotive', $heritage->category_slug);
        $this->assertSame('automotive', $scuderia->category_slug);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('APEX Heritage — Elegant Automotive Collection', false)
            ->assertSee('data-category="automotive"', false)
            ->assertSee('src="/webia/template/apex-heritage-automotive-elegant?preview=1"', false)
            ->assertSee(e(route('orders.create', [
                'template' => $heritage->id,
                'category' => 'automotive',
            ])), false)
            ->assertSee('APEX Scuderia — Minimalist Automotive Collection', false)
            ->assertSee('src="/webia/template/apex-scuderia-automotive-minimalist?preview=1"', false)
            ->assertSee(e(route('orders.create', [
                'template' => $scuderia->id,
                'category' => 'automotive',
            ])), false);
    }

    public function test_both_catalog_previews_show_their_hero_sections(): void
    {
        $this->get(route('webia.template.automotive.apex-heritage-automotive-elegant').'?preview=1')
            ->assertOk()
            ->assertSee('apex-heritage-preview');

        $this->get(route('webia.template.automotive.apex-scuderia-automotive-minimalist').'?preview=1')
            ->assertOk()
            ->assertSee('apex-scuderia-preview');
    }
}
