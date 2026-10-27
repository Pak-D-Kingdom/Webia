<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateSeederAthiya;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class NightshiftTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_the_nightshift_catalog_and_interactions(): void
    {
        $this->get(route('webia.template.automotive.nightshift-dark-mode-automotive'))
            ->assertOk()
            ->assertSee('<title>NIGHTSHIFT Auto – Modifikasi dan Aksesori Kendaraan</title>', false)
            ->assertSee('Part yang<br>siap dipasang', false)
            ->assertSee('Velg Racing 17 inci Hitam Doff', false)
            ->assertSee('id="cart"', false)
            ->assertSee('id="cmd"', false)
            ->assertSee('rel="noopener noreferrer"', false)
            ->assertSee('d.textContent=t;', false);
    }

    public function test_athiya_seeder_places_nightshift_in_the_automotive_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateSeederAthiya::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'nightshift-dark-mode-automotive')
            ->firstOrFail();

        $this->assertSame('automotive', $template->category_slug);
        $this->assertSame(
            ['Modifikasi & Aksesori Kendaraan', 'Bengkel & Servis Kendaraan'],
            $template->business_types
        );
        $this->assertSame('Futuristic', $template->design_style);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('NIGHTSHIFT Auto — Dark Mode Automotive', false)
            ->assertSee('data-category="automotive"', false)
            ->assertSee('data-business-types="'.e(json_encode($template->business_types)).'"', false)
            ->assertSee('data-design-style="Futuristic"', false)
            ->assertSee('src="/webia/template/nightshift-dark-mode-automotive?preview=1"', false)
            ->assertSee(e(route('orders.create', ['template' => $template->id, 'category' => 'automotive'])), false);
    }
}
