<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateAlleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class BakeryBoldLuxuryTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_template_route_renders_the_bakery_landing_page(): void
    {
        $this->get(route('webia.template.fnb.bakery.bold-luxury'))
            ->assertOk()
            ->assertSee('Maison Breads &amp; Pastry - Bold Luxury Bakery', false)
            ->assertSee('Artisanal Breads.')
            ->assertSee('Katalog Artisan')
            ->assertDontSee('Copy Code');
    }

    public function test_alle_seeder_adds_the_template_to_the_collection_idempotently(): void
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

        $this->assertDatabaseCount('webia_templates', 5);
        $this->assertDatabaseHas('webia_templates', [
            'slug' => 'bakery-bold-luxury',
            'sort_order' => 33,
            'template_url' => '/webia/template/bakery-bold-luxury',
            'is_active' => true,
        ]);
        $this->assertDatabaseHas('webia_templates', [
            'slug' => 'midnightbaker-futuristic',
            'sort_order' => 34,
        ]);

        $template = WebiaTemplate::query()->where('slug', 'bakery-bold-luxury')->firstOrFail();

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Maison Breads &amp; Pastry', false)
            ->assertSee('src="/webia/template/bakery-bold-luxury?preview=1"', false)
            ->assertSee(e(route('orders.create', ['template' => $template->id, 'category' => 'fnb'])), false);
    }
}
