<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplatePreviewSeeder;
use Database\Seeders\WebiaTemplateSeederAthiya;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class AurumPremiumAutoDetailingTemplateTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(WebiaTemplateSeederAthiya::class);
        $this->seed(WebiaTemplatePreviewSeeder::class);
    }

    public function test_demo_route_renders_aurum_and_safe_mobile_booking_interactions(): void
    {
        $this->get('/webia/template/aurum-premium-auto-detailing')
            ->assertOk()
            ->assertSee('<title>AURUM – Premium Auto Atelier</title>', false)
            ->assertSee('id="burger"', false)
            ->assertSee('id="mm"', false)
            ->assertSee('aria-expanded="false"', false)
            ->assertSee('visibility:hidden', false)
            ->assertSee('pointer-events:none', false)
            ->assertSee('window.open(wa(', false)
            ->assertSee('"noopener,noreferrer"', false)
            ->assertDontSee('.innerHTML=', false)
            ->assertDontSee('.innerHTML(', false);
    }

    public function test_athiya_seeder_places_aurum_in_premium_minimal_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateSeederAthiya::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'aurum-premium-auto-detailing')
            ->firstOrFail();

        $this->assertSame('automotive', $template->category_slug);
        $this->assertSame(['Auto Detailing & Car Care'], $template->business_types);
        $this->assertSame('Premium Minimal', $template->design_style);
        $this->assertSame('Black & Gold', $template->color_theme);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('AURUM — Premium Auto Detailing', false)
            ->assertSee('data-category="automotive"', false)
            ->assertSee('data-business-types="[&quot;Auto Detailing &amp; Car Care&quot;]"', false)
            ->assertSee('data-design-style="Premium Minimal"', false)
            ->assertSee('src="/webia/template/aurum-premium-auto-detailing?preview=1"', false);
    }
}
