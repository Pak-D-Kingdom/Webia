<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateSeederAthiya;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class RasaRupaTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_the_rasa_rupa_catalog_and_safe_interactions(): void
    {
        $this->get(route('webia.template.fnb.rasa-rupa-artistik'))
            ->assertOk()
            ->assertSee('<title>Rasa Rupa – Makanan Nusantara sebagai Karya Seni</title>', false)
            ->assertSee('Empat lukisan di atas meja.', false)
            ->assertSee('Sambal Matah Api', false)
            ->assertSee('Kopi Tubruk Kintamani', false)
            ->assertSee('Tempe Emas Crispy', false)
            ->assertSee('Bumbu Rendang Pusaka', false)
            ->assertSee('noopener,noreferrer', false)
            ->assertSee('function openChat()', false)
            ->assertSee('d.textContent=t;', false)
            ->assertDontSee('document.getElementById("grid").innerHTML', false);
    }

    public function test_athiya_seeder_places_rasa_rupa_in_the_food_product_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateSeederAthiya::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'rasa-rupa-artistik')
            ->firstOrFail();

        $this->assertSame('fnb', $template->category_slug);
        $this->assertSame(['Food Product'], $template->business_types);
        $this->assertSame('Artistic', $template->design_style);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Rasa Rupa — Makanan Nusantara sebagai Karya Seni', false)
            ->assertSee('data-category="fnb"', false)
            ->assertSee('data-business-types="'.e(json_encode($template->business_types)).'"', false)
            ->assertSee('data-design-style="Artistic"', false)
            ->assertSee('src="/webia/template/rasa-rupa-artistik?preview=1"', false)
            ->assertSee(e(route('orders.create', ['template' => $template->id, 'category' => 'fnb'])), false)
            ->assertSee('Food Product', false);
    }
}
