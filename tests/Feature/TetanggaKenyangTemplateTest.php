<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateSeederAthiya;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class TetanggaKenyangTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_the_catalog_cart_and_safe_contact_interactions(): void
    {
        $this->get(route('webia.template.fnb.tetangga-kenyang-friendly'))
            ->assertOk()
            ->assertSee('<title>Tetangga Kenyang – Makanan Rumahan yang Ramah</title>', false)
            ->assertSee('Halo, <span>tetangga!</span>', false)
            ->assertSee('Dimsum Ayam Udang', false)
            ->assertSee('Bakso Aci Pedas', false)
            ->assertSee('Sambal Bawang Mama', false)
            ->assertSee('Brownies Kukus Lumer', false)
            ->assertSee('noopener,noreferrer', false)
            ->assertSee('function openWhatsApp(message)', false)
            ->assertSee('message.textContent=t;', false)
            ->assertDontSee('$("#grid").innerHTML', false)
            ->assertDontSee('$("#lines").innerHTML', false);
    }

    public function test_athiya_seeder_places_tetangga_kenyang_in_the_food_product_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateSeederAthiya::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'tetangga-kenyang-friendly')
            ->firstOrFail();

        $this->assertSame('fnb', $template->category_slug);
        $this->assertSame(['Food Product'], $template->business_types);
        $this->assertSame('Playful & Colorful', $template->design_style);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Tetangga Kenyang — Makanan Rumahan yang Ramah', false)
            ->assertSee('data-category="fnb"', false)
            ->assertSee('data-business-types="'.e(json_encode($template->business_types)).'"', false)
            ->assertSee('data-design-style="Playful &amp; Colorful"', false)
            ->assertSee('src="/webia/template/tetangga-kenyang-friendly?preview=1"', false)
            ->assertSee(e(route('orders.create', ['template' => $template->id, 'category' => 'fnb'])), false)
            ->assertSee('Food Product', false);
    }
}
