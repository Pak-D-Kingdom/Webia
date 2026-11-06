<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateSeederAthiya;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class RosalindTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_rosalind_and_secure_reservation_interactions(): void
    {
        $this->get(route('webia.template.beauty.rosalind-vintage-makeup-artist'))
            ->assertOk()
            ->assertSee('<title>Rosalind & Co. – Salon de Maquillage Vintage</title>', false)
            ->assertSee('id="mir"', false)
            ->assertSee('id="items"', false)
            ->assertSee('id="book"', false)
            ->assertSee('id="fab"', false)
            ->assertSee('window.open(wa(', false)
            ->assertSee('"noopener,noreferrer"', false)
            ->assertDontSee('.innerHTML=', false)
            ->assertSee('d.textContent=t;', false);
    }

    public function test_athiya_seeder_places_rosalind_in_makeup_artist_collection_filter(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateSeederAthiya::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'rosalind-vintage-makeup-artist')
            ->firstOrFail();

        $this->assertSame('beauty', $template->category_slug);
        $this->assertSame(['Makeup Artist'], $template->business_types);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Rosalind &amp; Co. — Salon de Maquillage Vintage', false)
            ->assertSee('data-category="beauty"', false)
            ->assertSee('data-business-types="[&quot;Makeup Artist&quot;]"', false)
            ->assertSee('src="/webia/template/rosalind-vintage-makeup-artist?preview=1"', false);
    }
}
