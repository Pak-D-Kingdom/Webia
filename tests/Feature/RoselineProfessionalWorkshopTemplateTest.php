<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplatePreviewSeeder;
use Database\Seeders\WebiaTemplateSeederAthiya;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class RoselineProfessionalWorkshopTemplateTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(WebiaTemplateSeederAthiya::class);
        $this->seed(WebiaTemplatePreviewSeeder::class);
    }

    public function test_demo_route_renders_roseline_and_safe_mobile_interactions(): void
    {
        $this->get('/webia/template/roseline-professional-workshop')
            ->assertOk()
            ->assertSee('<title>Roseline Service Center – Servis Kendaraan Transparan</title>', false)
            ->assertSee('id="roseline-menu-button"', false)
            ->assertSee('id="roseline-menu"', false)
            ->assertSee('visibility:hidden', false)
            ->assertSee('pointer-events:none', false)
            ->assertSee('aria-hidden="true"', false)
            ->assertDontSee('.innerHTML=', false)
            ->assertDontSee('.innerHTML(', false)
            ->assertDontSee('insertAdjacentHTML', false)
            ->assertDontSee('backdrop-filter:', false)
            ->assertSee('target="_blank"', false)
            ->assertSee('rel="noopener"', false);
    }

    public function test_athiya_seeder_places_roseline_in_professional_workshop_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateSeederAthiya::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'roseline-professional-workshop')
            ->firstOrFail();

        $this->assertSame('automotive', $template->category_slug);
        $this->assertSame(['Bengkel & Servis Kendaraan'], $template->business_types);
        $this->assertSame('Professional', $template->design_style);
        $this->assertSame('Rose Gold', $template->color_theme);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Roseline Service Center — Professional Workshop', false)
            ->assertSee('data-category="automotive"', false)
            ->assertSee('data-business-types="[&quot;Bengkel &amp; Servis Kendaraan&quot;]"', false)
            ->assertSee('data-design-style="Professional"', false)
            ->assertSee('src="/webia/template/roseline-professional-workshop?preview=1"', false);
    }
}
