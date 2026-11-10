<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateAqilaSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class AureliaMindTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_aurelia_mind_psychology_content(): void
    {
        $this->get(route('webia.template.healthcare.psychology.aurelia-mind'))
            ->assertOk()
            ->assertSee('<title>Aurelia Mind — Psikologi & Konseling Eksklusif</title>', false)
            ->assertSee('Ruang privat untuk pulih, tumbuh, dan')
            ->assertSee('Check-in Diri')
            ->assertSee('Concierge Aurelia');
    }

    public function test_aqila_seeder_adds_aurelia_mind_to_the_healthcare_filter(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateAqilaSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'aurelia-mind-psikologi-konseling')
            ->firstOrFail();

        $this->assertSame('healthcare', $template->category_slug);
        $this->assertSame(['Psikologi & konseling'], $template->business_types);
        $this->assertSame('Elegant', $template->design_style);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Aurelia Mind — Psikologi &amp; Konseling Eksklusif', false)
            ->assertSee('data-category="healthcare"', false)
            ->assertSee('data-business-types="[&quot;Psikologi &amp; konseling&quot;]"', false)
            ->assertSee('src="/webia/template/healthcare/psychology/aurelia-mind?preview=1"', false);
    }

    public function test_catalog_preview_displays_the_aurelia_mind_hero(): void
    {
        $this->get(route('webia.template.healthcare.psychology.aurelia-mind').'?preview=1')
            ->assertOk()
            ->assertSee('aurelia-mind-template-preview');
    }
}
