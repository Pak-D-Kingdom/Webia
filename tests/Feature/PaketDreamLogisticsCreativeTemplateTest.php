<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateSeederAthiya;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class PaketDreamLogisticsCreativeTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_paketdream_and_safe_mobile_interactions(): void
    {
        $this->get(route('webia.template.company.paketdream-logistics-creative'))
            ->assertOk()
            ->assertSee('<title>PaketDream – Kirim dengan Senyum</title>', false)
            ->assertSee('id="paketdream-menu-button"', false)
            ->assertSee('id="paketdream-menu"', false)
            ->assertSee('aria-hidden="true"', false)
            ->assertSee('visibility:hidden', false)
            ->assertSee('pointer-events:none', false)
            ->assertDontSee('insertAdjacentHTML', false)
            ->assertDontSee('document.write', false)
            ->assertDontSee('backdrop-filter:', false)
            ->assertDontSee(' onclick=', false)
            ->assertSee('6281234567890', false);
    }

    public function test_athiya_seeder_places_paketdream_in_company_logistics_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateSeederAthiya::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'paketdream-logistics-creative')
            ->firstOrFail();

        $this->assertSame('company', $template->category_slug);
        $this->assertSame(['Logistics & Supply Chain'], $template->business_types);
        $this->assertSame('Creative', $template->design_style);
        $this->assertSame('Purple, Pink, Yellow & Violet', $template->color_theme);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('PaketDream — Creative Logistics', false)
            ->assertSee('data-category="company"', false)
            ->assertSee('data-design-style="Creative"', false)
            ->assertSee('src="/webia/template/paketdream-logistics-creative?preview=1"', false);
    }
}
