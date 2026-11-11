<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplatePreviewSeeder;
use Database\Seeders\WebiaTemplateSeederAthiya;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class LangitKaryaContractorMinimalistTemplateTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(WebiaTemplateSeederAthiya::class);
        $this->seed(WebiaTemplatePreviewSeeder::class);
    }

    public function test_demo_route_renders_langit_karya_and_safe_mobile_interactions(): void
    {
        $this->get('/webia/template/langit-karya-contractor-minimalist')
            ->assertOk()
            ->assertSee('<title>Langit Karya – Kontraktor</title>', false)
            ->assertSee('id="langit-menu-button"', false)
            ->assertSee('id="langit-menu"', false)
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

    public function test_athiya_seeder_places_langit_karya_in_company_contractor_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateSeederAthiya::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'langit-karya-contractor-minimalist')
            ->firstOrFail();

        $this->assertSame('company', $template->category_slug);
        $this->assertSame(['Contractor'], $template->business_types);
        $this->assertSame('Minimalist', $template->design_style);
        $this->assertSame('Baby Blue', $template->color_theme);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Langit Karya — Contractor Minimalist', false)
            ->assertSee('data-category="company"', false)
            ->assertSee('data-business-types="[&quot;Contractor&quot;]"', false)
            ->assertSee('data-design-style="Minimalist"', false)
            ->assertSee('src="/webia/template/langit-karya-contractor-minimalist?preview=1"', false);
    }
}
