<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateAqilaSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class MitraJiwaTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_mitra_jiwa_psychology_content(): void
    {
        $this->get(route('webia.template.healthcare.psychology.mitra-jiwa'))
            ->assertOk()
            ->assertSee('<title>Mitra Jiwa — Psikologi & Konseling Profesional</title>', false)
            ->assertSee('Kesehatan mental yang <em>terjaga</em>', false)
            ->assertSee('Employee Assistance Program', false)
            ->assertSee('Asisten AI Mitra Jiwa', false);
    }

    public function test_aqila_seeder_adds_mitra_jiwa_to_the_healthcare_filter(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateAqilaSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'mitra-jiwa-psikologi-konseling')
            ->firstOrFail();

        $this->assertSame('healthcare', $template->category_slug);
        $this->assertSame(['Psikologi & konseling'], $template->business_types);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Mitra Jiwa — Psikologi &amp; Konseling Profesional', false)
            ->assertSee('data-category="healthcare"', false)
            ->assertSee('src="/webia/template/healthcare/psychology/mitra-jiwa?preview=1"', false);
    }
}
