<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplatePreviewSeeder;
use Database\Seeders\WebiaTemplateSeederAthiya;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class NoirAutoDetailingTemplateTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(WebiaTemplateSeederAthiya::class);
        $this->seed(WebiaTemplatePreviewSeeder::class);
    }

    public function test_demo_route_renders_noir_and_secure_booking_interactions(): void
    {
        $this->get('/webia/template/noir-auto-detailing-luxury')
            ->assertOk()
            ->assertSee('<title>NOIR Atelier – Luxury Auto Detailing</title>', false)
            ->assertSee('id="konfigurator"', false)
            ->assertSee('id="keanggotaan"', false)
            ->assertSee('id="fab"', false)
            ->assertSee('window.open(wa(', false)
            ->assertSee('"noopener,noreferrer"', false)
            ->assertDontSee('.innerHTML=', false)
            ->assertDontSee('.innerHTML(', false)
            ->assertSee('visibility:hidden', false)
            ->assertSee('pointer-events:none', false)
            ->assertSee('aria-hidden="true"', false);
    }

    public function test_athiya_seeder_places_noir_in_luxury_auto_detailing_collection_filter(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateSeederAthiya::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'noir-auto-detailing-luxury')
            ->firstOrFail();

        $this->assertSame('automotive', $template->category_slug);
        $this->assertSame(['Auto Detailing & Car Care'], $template->business_types);
        $this->assertSame('Luxury', $template->design_style);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('NOIR Atelier — Luxury Auto Detailing', false)
            ->assertSee('data-category="automotive"', false)
            ->assertSee('data-business-types="[&quot;Auto Detailing &amp; Car Care&quot;]"', false)
            ->assertSee('data-design-style="Luxury"', false)
            ->assertSee('src="/webia/template/noir-auto-detailing-luxury?preview=1"', false);
    }
}
