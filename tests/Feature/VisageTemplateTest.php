<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateSeederAthiya;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class VisageTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_visage_and_secure_booking_interactions(): void
    {
        $this->get(route('webia.template.beauty.visage-editorial-makeup-artist'))
            ->assertOk()
            ->assertSee('<title>Visage – Makeup Editorial oleh Rima Ayu</title>', false)
            ->assertSee('data-theme="dark"', false)
            ->assertSee('id="mas"', false)
            ->assertSee('id="fab"', false)
            ->assertSee('window.open(wa(', false)
            ->assertSee('"noopener,noreferrer"', false)
            ->assertDontSee('.innerHTML=', false)
            ->assertSee('title.textContent=x[0]', false);
    }

    public function test_athiya_seeder_places_visage_in_makeup_artist_collection_filter(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateSeederAthiya::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'visage-editorial-makeup-artist')
            ->firstOrFail();

        $this->assertSame('beauty', $template->category_slug);
        $this->assertSame(['Makeup Artist'], $template->business_types);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Visage — Makeup Artist Editorial', false)
            ->assertSee('data-category="beauty"', false)
            ->assertSee('data-business-types="[&quot;Makeup Artist&quot;]"', false)
            ->assertSee('src="/webia/template/visage-editorial-makeup-artist?preview=1"', false);
    }
}
