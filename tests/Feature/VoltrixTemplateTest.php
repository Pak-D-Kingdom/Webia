<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateSeederAthiya;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class VoltrixTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_the_voltrix_template_and_interactions(): void
    {
        $this->get(route('webia.template.automotive.voltrix-futuristic-automotive'))
            ->assertOk()
            ->assertSee('<title>VOLTRIX Garage – Modifikasi Kendaraan Masa Depan</title>', false)
            ->assertSee('Rancang. Lihat. <b>Pasang.</b>', false)
            ->assertSee('Rancang build', false)
            ->assertSee('Pantau kendaraanmu secara langsung')
            ->assertSee('Booking slot bengkel')
            ->assertSee('id="fab"', false)
            ->assertSee('rel="noopener noreferrer"', false)
            ->assertSee('d.textContent=t;', false);
    }

    public function test_athiya_seeder_places_voltrix_in_the_automotive_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateSeederAthiya::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'voltrix-futuristic-automotive')
            ->firstOrFail();

        $this->assertSame('automotive', $template->category_slug);
        $this->assertSame(
            ['Modifikasi & Aksesori Kendaraan', 'Bengkel & Servis Kendaraan'],
            $template->business_types
        );

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('VOLTRIX Garage — Futuristic Automotive', false)
            ->assertSee('data-category="automotive"', false)
            ->assertSee('data-business-types="'.e(json_encode($template->business_types)).'"', false)
            ->assertSee('data-design-style="Futuristic"', false)
            ->assertSee('src="/webia/template/voltrix-futuristic-automotive?preview=1"', false)
            ->assertSee(e(route('orders.create', ['template' => $template->id, 'category' => 'automotive'])), false);
    }
}
