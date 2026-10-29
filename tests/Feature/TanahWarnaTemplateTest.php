<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateSeederAthiya;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class TanahWarnaTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_tanah_warna_and_secure_booking_interactions(): void
    {
        $this->get(route('webia.template.beauty.tanah-warna-rustic-makeup-artist'))
            ->assertOk()
            ->assertSee('<title>Tanah Warna – Makeup Artist Rustic oleh Rima Ayu</title>', false)
            ->assertSee('Wajah adalah', false)
            ->assertSee('id="layanan"', false)
            ->assertSee('id="book"', false)
            ->assertSee('id="fab"', false)
            ->assertSee('window.open(wa(', false)
            ->assertSee('"noopener,noreferrer"', false)
            ->assertDontSee('.innerHTML=', false)
            ->assertSee('d.textContent=t;', false);
    }

    public function test_athiya_seeder_places_tanah_warna_in_makeup_artist_collection_filter(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateSeederAthiya::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'tanah-warna-rustic-makeup-artist')
            ->firstOrFail();

        $this->assertSame('beauty', $template->category_slug);
        $this->assertSame(['Makeup Artist'], $template->business_types);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Tanah Warna — Makeup Artist Rustic', false)
            ->assertSee('data-category="beauty"', false)
            ->assertSee('data-business-types="[&quot;Makeup Artist&quot;]"', false)
            ->assertSee('src="/webia/template/tanah-warna-rustic-makeup-artist?preview=1"', false);
    }
}
