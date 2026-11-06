<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateSeederAthiya;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class HuluPantryTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_hulu_products_and_safe_interactions(): void
    {
        $this->get(route('webia.template.fnb.hulu-pantry-asal-usul'))
            ->assertOk()
            ->assertSee('<title>Hulu – Pantry Asal-Usul Nusantara</title>', false)
            ->assertSee('Bahan pantry langka dari satu daerah', false)
            ->assertSee('Madu Hutan', false)
            ->assertSee('Vanili Flores', false)
            ->assertSee('Garam Madura', false)
            ->assertSee('Gula Aren', false)
            ->assertSee('noopener,noreferrer', false)
            ->assertSee('function openWhatsApp(message)', false)
            ->assertSee('message.textContent=text;', false)
            ->assertDontSee('innerHTML', false);
    }

    public function test_athiya_seeder_places_hulu_in_the_food_product_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateSeederAthiya::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'hulu-pantry-asal-usul')
            ->firstOrFail();

        $this->assertSame('fnb', $template->category_slug);
        $this->assertSame(['Food Product'], $template->business_types);
        $this->assertSame('Minimalist', $template->design_style);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Hulu — Pantry Asal-Usul Nusantara', false)
            ->assertSee('data-category="fnb"', false)
            ->assertSee('data-business-types="'.e(json_encode($template->business_types)).'"', false)
            ->assertSee('data-design-style="Minimalist"', false)
            ->assertSee('src="/webia/template/hulu-pantry-asal-usul?preview=1"', false)
            ->assertSee(e(route('orders.create', ['template' => $template->id, 'category' => 'fnb'])), false)
            ->assertSee('Food Product', false);
    }
}
