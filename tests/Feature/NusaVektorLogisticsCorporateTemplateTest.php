<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateSeederAthiya;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class NusaVektorLogisticsCorporateTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_nusavektor_and_safe_mobile_interactions(): void
    {
        $this->get(route('webia.template.company.nusavektor-logistics-corporate'))
            ->assertOk()
            ->assertSee('<title>NusaVektor Logistics – Rantai Pasok Tepat Waktu</title>', false)
            ->assertSee('id="nusavektor-menu-button"', false)
            ->assertSee('id="nusavektor-menu"', false)
            ->assertSee('aria-hidden="true"', false)
            ->assertSee('visibility:hidden', false)
            ->assertSee('pointer-events:none', false)
            ->assertDontSee('.innerHTML=', false)
            ->assertDontSee('.innerHTML(', false)
            ->assertDontSee('insertAdjacentHTML', false)
            ->assertDontSee('document.write', false)
            ->assertDontSee('backdrop-filter:', false)
            ->assertDontSee(' onclick=', false)
            ->assertSee('target="_blank"', false)
            ->assertSee('rel="noopener"', false);
    }

    public function test_athiya_seeder_places_nusavektor_in_company_logistics_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateSeederAthiya::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'nusavektor-logistics-corporate')
            ->firstOrFail();

        $this->assertSame('company', $template->category_slug);
        $this->assertSame(['Logistics & Supply Chain'], $template->business_types);
        $this->assertSame('Corporate', $template->design_style);
        $this->assertSame('Midnight Navy', $template->color_theme);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('NusaVektor Logistics — Corporate Midnight Navy', false)
            ->assertSee('data-category="company"', false)
            ->assertSee('data-business-types="[&quot;Logistics &amp; Supply Chain&quot;]"', false)
            ->assertSee('data-design-style="Corporate"', false)
            ->assertSee('src="/webia/template/nusavektor-logistics-corporate?preview=1"', false);
    }
}
