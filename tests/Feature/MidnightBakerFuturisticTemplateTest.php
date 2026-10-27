<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateAlleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class MidnightBakerFuturisticTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_template_route_renders_the_page_and_local_assets(): void
    {
        $this->get(route('webia.template.fnb.bakery.midnightbaker'))
            ->assertOk()
            ->assertSee('<title>MIDNIGHTBAKER — Artisan Breads & Pastries</title>', false)
            ->assertSee('Tradition Meets')
            ->assertSee('Our Signature Menu')
            ->assertSee('Sourdough Loaf')
            ->assertSee(asset('css/website-bisnis/midnightbaker-futuristic.css'), false)
            ->assertSee(asset('images/templates/midnightbaker/image-01.jpg'), false)
            ->assertDontSee('data:image/');

        $this->assertFileExists(public_path('css/website-bisnis/midnightbaker-futuristic.css'));
        $this->assertFileExists(public_path('images/templates/midnightbaker/hero-background.jpg'));
        $this->assertFileExists(public_path('images/templates/midnightbaker/image-09.jpg'));
    }

    public function test_seeder_adds_template_to_catalog_and_is_idempotent(): void
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

        $this->assertDatabaseCount('webia_templates', 2);
        $this->assertDatabaseHas('webia_templates', [
            'slug' => 'midnightbaker-futuristic',
            'sort_order' => 34,
            'template_url' => '/webia/template/midnightbaker-futuristic',
            'is_active' => true,
            'description' => 'Artisanal bread & pastry catalog with category filters, pre-order & reservation inquiries, bespoke cake & luxury hampers consultation, artisan craft showcase, flagship boutique location with map directions & operating-hours notice, product availability, delivery & allergen FAQs, WhatsApp contact prompt, and AI Concierge demo FAQ interface.',
        ]);
        $this->assertDatabaseHas('webia_templates', [
            'slug' => 'bakery-bold-luxury',
            'sort_order' => 33,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'midnightbaker-futuristic')
            ->firstOrFail();

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('MIDNIGHTBAKER — Futuristic Artisan Bakery', false)
            ->assertSee('src="/webia/template/midnightbaker-futuristic?preview=1"', false)
            ->assertSee(e(route('orders.create', [
                'template' => $template->id,
                'category' => 'fnb',
            ])), false);
    }

    public function test_collection_preview_only_shows_the_template_header_and_hero(): void
    {
        $this->get(route('webia.template.fnb.bakery.midnightbaker').'?preview=1')
            ->assertOk()
            ->assertSee('midnight-preview');
    }
}
