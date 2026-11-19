<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplatePreviewSeeder;
use Database\Seeders\WebiaTemplateSeederAthiya;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class SamudraDetailingTemplateTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(WebiaTemplateSeederAthiya::class);
        $this->seed(WebiaTemplatePreviewSeeder::class);
    }

    public function test_demo_route_renders_samudra_and_secure_booking_interactions(): void
    {
        $this->get('/webia/template/samudra-auto-detailing-artistic')
            ->assertOk()
            ->assertSee('<title>Samudra Detailing – Auto Detailing &amp; Ceramic Coating</title>', false)
            ->assertSee('id="lay"', false)
            ->assertSee('id="pk"', false)
            ->assertSee('id="gl"', false)
            ->assertSee('id="fab"', false)
            ->assertSee('window.open(wa(', false)
            ->assertSee('"noopener,noreferrer"', false)
            ->assertDontSee('.innerHTML=', false)
            ->assertSee('visibility:hidden', false)
            ->assertSee('pointer-events:none', false)
            ->assertSee('aria-hidden="true"', false)
            ->assertSee('d.textContent=t;', false);
    }

    public function test_athiya_seeder_places_samudra_in_auto_detailing_collection_filter(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateSeederAthiya::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'samudra-auto-detailing-artistic')
            ->firstOrFail();

        $this->assertSame('automotive', $template->category_slug);
        $this->assertSame(['Auto Detailing & Car Care'], $template->business_types);
        $this->assertSame('Artistic', $template->design_style);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Samudra Detailing — Artistic Auto Care', false)
            ->assertSee('data-category="automotive"', false)
            ->assertSee('data-business-types="[&quot;Auto Detailing &amp; Car Care&quot;]"', false)
            ->assertSee('data-design-style="Artistic"', false)
            ->assertSee('src="/webia/template/samudra-auto-detailing-artistic?preview=1"', false);
    }
}
