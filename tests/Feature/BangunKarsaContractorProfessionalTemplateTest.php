<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateSeederAthiya;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class BangunKarsaContractorProfessionalTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_bangun_karsa_and_safe_mobile_interactions(): void
    {
        $this->get(route('webia.template.company.bangun-karsa-contractor-professional'))
            ->assertOk()
            ->assertSee('<title>Bangun Karsa – Kontraktor Profesional</title>', false)
            ->assertSee('id="mb"', false)
            ->assertSee('id="bangun-menu"', false)
            ->assertSee('aria-hidden="true"', false)
            ->assertSee('pointer-events:none', false)
            ->assertSee('visibility:hidden', false)
            ->assertDontSee('.innerHTML=', false)
            ->assertDontSee('.innerHTML(', false)
            ->assertDontSee('insertAdjacentHTML', false)
            ->assertDontSee('document.write', false)
            ->assertDontSee('backdrop-filter:', false)
            ->assertSee('target="_blank"', false)
            ->assertSee('rel="noopener"', false);
    }

    public function test_athiya_seeder_places_bangun_karsa_in_company_contractor_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateSeederAthiya::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'bangun-karsa-contractor-professional')
            ->firstOrFail();

        $this->assertSame('company', $template->category_slug);
        $this->assertSame(['Contractor'], $template->business_types);
        $this->assertSame('Professional', $template->design_style);
        $this->assertSame('Navy, Teal, Coral & Sky', $template->color_theme);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Bangun Karsa — Contractor Professional', false)
            ->assertSee('data-category="company"', false)
            ->assertSee('data-business-types="[&quot;Contractor&quot;]"', false)
            ->assertSee('data-design-style="Professional"', false)
            ->assertSee('src="/webia/template/bangun-karsa-contractor-professional?preview=1"', false);
    }
}
