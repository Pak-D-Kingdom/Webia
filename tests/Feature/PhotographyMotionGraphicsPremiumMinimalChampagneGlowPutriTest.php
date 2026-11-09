<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplatePutriSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class PhotographyMotionGraphicsPremiumMinimalChampagneGlowPutriTest extends TestCase
{
    use RefreshDatabase;

    public function test_route_renders_the_photography_motion_graphics_premium_minimal_champagne_glow_template(): void
    {
        $this->get(route('webia.template.photography-motiongraphics-premiumminimal-champagneglow-putri'))
            ->assertOk()
            ->assertSee('AuraMotion 3D Studio')
            ->assertSee('Motion Graphics &amp; 3D Studio', false)
            ->assertSee('PREMIUM MOTION GRAPHICS &amp; 3D VISUAL STUDIO', false)
            ->assertSee('Premium Minimal &bull; Champagne Glow Edition', false)
            ->assertSee('Seni Gerak Presisi')
            ->assertSee('AuraMotion AI Assistant')
            ->assertSee('INTERACTIVE PRODUCTION ESTIMATOR', false)
            ->assertSee('https://wa.me/6281234567890?text=', false);
    }

    public function test_seeder_places_photography_motion_graphics_template_in_collection_and_is_idempotent(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplatePutriSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        Artisan::call('db:seed', [
            '--class' => WebiaTemplatePutriSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'photography-motiongraphics-premiumminimal-champagneglow-putri')
            ->firstOrFail();

        $this->assertSame('photography-creative-studio', $template->category_slug);
        $this->assertSame('Photography & Creative Studio', $template->category_label);
        $this->assertSame(['Motion Graphics & 3D Studio'], $template->business_types);
        $this->assertSame('Premium Minimal', $template->design_style);
        $this->assertSame('Champagne Glow', $template->color_theme);
        $this->assertSame(66, $template->sort_order);
        $this->assertTrue($template->is_active);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('AuraMotion 3D Studio', false)
            ->assertSee('data-category="photography-creative-studio"', false)
            ->assertSee('src="/webia/template/photography-motiongraphics-premiumminimal-champagneglow-putri?preview=1"', false);
    }
}
