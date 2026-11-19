<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateSeederAthiya;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ZamrudKaryaContractorLuxuryTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_zamrud_karya_and_safe_mobile_interactions(): void
    {
        $this->get(route('webia.template.company.zamrud-karya-contractor-luxury'))
            ->assertOk()
            ->assertSee('<title>Zamrud Karya – Kontraktor Hunian Eksklusif</title>', false)
            ->assertSee('id="zamrud-menu-button"', false)
            ->assertSee('id="zamrud-menu"', false)
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

    public function test_athiya_seeder_places_zamrud_karya_in_company_contractor_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateSeederAthiya::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'zamrud-karya-contractor-luxury')
            ->firstOrFail();

        $this->assertSame('company', $template->category_slug);
        $this->assertSame(['Contractor'], $template->business_types);
        $this->assertSame('Luxury', $template->design_style);
        $this->assertSame('Emerald Green', $template->color_theme);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Zamrud Karya — Contractor Luxury', false)
            ->assertSee('data-category="company"', false)
            ->assertSee('data-business-types="[&quot;Contractor&quot;]"', false)
            ->assertSee('data-design-style="Luxury"', false)
            ->assertSee('src="/webia/template/zamrud-karya-contractor-luxury?preview=1"', false);
    }
}
