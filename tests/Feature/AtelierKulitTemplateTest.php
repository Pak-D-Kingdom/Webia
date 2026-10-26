<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateSeederAthiya;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class AtelierKulitTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_the_atelier_kulit_template_and_interactions(): void
    {
        $this->get(route('webia.template.beauty.atelier-kulit-creative-beauty-clinic'))
            ->assertOk()
            ->assertSee('<title>ATELIER KULIT – Klinik Estetika sebagai Karya</title>', false)
            ->assertSee('Enam <em>karya</em>', false)
            ->assertSee('Komposer kulit', false)
            ->assertSee('id="r1"', false)
            ->assertSee('id="sb"', false)
            ->assertSee('id="fab"', false)
            ->assertSee('rel="noopener noreferrer"', false)
            ->assertSee('d.textContent=t;', false);
    }

    public function test_athiya_seeder_places_atelier_kulit_in_the_beauty_clinic_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateSeederAthiya::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'atelier-kulit-creative-beauty-clinic')
            ->firstOrFail();

        $this->assertSame('beauty', $template->category_slug);
        $this->assertSame(['Beauty Clinic'], $template->business_types);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Atelier Kulit — Creative Beauty Clinic', false)
            ->assertSee('data-category="beauty"', false)
            ->assertSee('data-business-types="[&quot;Beauty Clinic&quot;]"', false)
            ->assertSee('data-design-style="Artistic"', false)
            ->assertSee('src="/webia/template/atelier-kulit-creative-beauty-clinic?preview=1"', false)
            ->assertSee(e(route('orders.create', ['template' => $template->id, 'category' => 'beauty'])), false);
    }
}
