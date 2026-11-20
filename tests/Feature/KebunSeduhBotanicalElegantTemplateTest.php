<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateSeederAthiya;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class KebunSeduhBotanicalElegantTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_kebun_seduh_and_safe_mobile_interactions(): void
    {
        $this->get(route('webia.template.kebun-seduh-botanical-elegant'))
            ->assertOk()
            ->assertSee('<title>Kebun Seduh – Langganan Teh Spesialti</title>', false)
            ->assertSee('id="kebun-menu-button"', false)
            ->assertSee('id="kebun-menu"', false)
            ->assertSee('aria-hidden="true"', false)
            ->assertSee('visibility:hidden', false)
            ->assertSee('pointer-events:none', false)
            ->assertSee('replaceMarkup')
            ->assertDontSee('innerHTML', false)
            ->assertDontSee('insertAdjacentHTML', false)
            ->assertDontSee('document.write', false)
            ->assertDontSee('backdrop-filter:', false)
            ->assertDontSee(' onclick=', false)
            ->assertSee('target="_blank"', false)
            ->assertSee('rel="noopener"', false);
    }

    public function test_athiya_seeder_lists_kebun_seduh_in_specialty_tea_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateSeederAthiya::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'kebun-seduh-botanical-elegant')
            ->firstOrFail();

        $this->assertSame('specialty-beverage', $template->category_slug);
        $this->assertSame('Specialty Beverage & Drink Concepts', $template->category_label);
        $this->assertSame(['Specialty Tea Subscription'], $template->business_types);
        $this->assertSame('Botanical Elegant', $template->design_style);
        $this->assertSame('Sage Green', $template->color_theme);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Kebun Seduh — Botanical Elegant', false)
            ->assertSee('data-category="specialty-beverage"', false)
            ->assertSee('data-business-types="'.e(json_encode($template->business_types)).'"', false)
            ->assertSee('data-design-style="Botanical Elegant"', false)
            ->assertSee('src="/webia/template/kebun-seduh-botanical-elegant?preview=1"', false);
    }
}
