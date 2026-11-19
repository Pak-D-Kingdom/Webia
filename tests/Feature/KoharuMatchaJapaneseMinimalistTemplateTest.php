<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateSeederAthiya;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class KoharuMatchaJapaneseMinimalistTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_koharu_and_safe_interactions(): void
    {
        $this->get(route('webia.template.koharu-matcha-japanese-minimalist'))
            ->assertOk()
            ->assertSee('<title>Koharu Matcha – Satu Cangkir Ketenangan</title>', false)
            ->assertSee('Peta rasa interaktif')
            ->assertSee('Ritual seduh')
            ->assertSee('KIRIM PESANAN')
            ->assertSee('replaceMarkup')
            ->assertDontSee('innerHTML', false)
            ->assertDontSee('insertAdjacentHTML', false)
            ->assertDontSee('document.write', false)
            ->assertDontSee(' onclick=', false)
            ->assertSee('target="_blank"', false)
            ->assertSee('rel="noopener"', false);
    }

    public function test_athiya_seeder_lists_koharu_in_the_specialty_beverage_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateSeederAthiya::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'koharu-matcha-japanese-minimalist')
            ->firstOrFail();

        $this->assertSame('specialty-beverage', $template->category_slug);
        $this->assertSame('Specialty Beverage & Drink Concepts', $template->category_label);
        $this->assertSame(['Specialty Matcha / Others Brand'], $template->business_types);
        $this->assertSame('Japanese Minimalist', $template->design_style);
        $this->assertSame('Blush Pink & Warm Brown', $template->color_theme);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Koharu Matcha — Japanese Minimalist', false)
            ->assertSee('data-category="specialty-beverage"', false)
            ->assertSee('data-business-types="'.e(json_encode($template->business_types)).'"', false)
            ->assertSee('data-design-style="Japanese Minimalist"', false)
            ->assertSee('src="/webia/template/koharu-matcha-japanese-minimalist?preview=1"', false);
    }
}
