<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateSeederAthiya;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class GlowLabTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_the_glow_lab_template_and_interactions(): void
    {
        $this->get(route('webia.template.beauty.glow-lab-creative-beauty-clinic'))
            ->assertOk()
            ->assertSee('<title>GLOW LAB – Klinik Kecantikan</title>', false)
            ->assertSee('Racik <em>ritual</em> glow-mu sendiri', false)
            ->assertSee('id="rg"', false)
            ->assertSee('id="fab"', false)
            ->assertSee('id="rb"', false)
            ->assertSee('rel="noopener noreferrer"', false)
            ->assertSee('d.textContent=t;', false);
    }

    public function test_athiya_seeder_places_glow_lab_in_the_beauty_clinic_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateSeederAthiya::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'glow-lab-creative-beauty-clinic')
            ->firstOrFail();

        $this->assertSame('beauty', $template->category_slug);
        $this->assertSame(['Beauty Clinic'], $template->business_types);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('GLOW LAB — Creative Beauty Clinic', false)
            ->assertSee('data-category="beauty"', false)
            ->assertSee('data-business-types="[&quot;Beauty Clinic&quot;]"', false)
            ->assertSee('src="/webia/template/glow-lab-creative-beauty-clinic?preview=1"', false)
            ->assertSee(e(route('orders.create', ['template' => $template->id, 'category' => 'beauty'])), false);
    }
}
