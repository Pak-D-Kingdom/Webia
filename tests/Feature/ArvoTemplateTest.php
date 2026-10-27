<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateSeederAthiya;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ArvoTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_the_arvo_template_and_interactions(): void
    {
        $this->get(route('webia.template.automotive.arvo-modern-automotive'))
            ->assertOk()
            ->assertSee('<title>ARVO Motor Studio – Modifikasi Kendaraan Modern</title>', false)
            ->assertSee('Modifikasi yang rapi, jujur, dan', false)
            ->assertSee('Hasil kerja yang bisa<br>kamu lihat detailnya', false)
            ->assertSee('Bingung mulai dari mana?', false)
            ->assertSee('Pilih slot yang kosong', false)
            ->assertSee('id="cf"', false)
            ->assertSee('rel="noopener noreferrer"', false)
            ->assertSee('d.textContent=t;', false);
    }

    public function test_athiya_seeder_places_arvo_in_the_automotive_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateSeederAthiya::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'arvo-modern-automotive')
            ->firstOrFail();

        $this->assertSame('automotive', $template->category_slug);
        $this->assertSame(
            ['Modifikasi & Aksesori Kendaraan', 'Bengkel & Servis Kendaraan'],
            $template->business_types
        );
        $this->assertSame('Modern', $template->design_style);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('ARVO Motor Studio — Modern Automotive', false)
            ->assertSee('data-category="automotive"', false)
            ->assertSee('data-business-types="'.e(json_encode($template->business_types)).'"', false)
            ->assertSee('data-design-style="Modern"', false)
            ->assertSee('src="/webia/template/arvo-modern-automotive?preview=1"', false)
            ->assertSee(e(route('orders.create', ['template' => $template->id, 'category' => 'automotive'])), false);
    }
}
