<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateAqilaSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class RuangTenangTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_psychology_services_and_booking_information(): void
    {
        $this->get(route('webia.template.healthcare.psychology.ruang-tenang'))
            ->assertOk()
            ->assertSee('<title>Ruang Tenang — Psikologi & Konseling</title>', false)
            ->assertSee('Konseling Individu', false)
            ->assertSee('Kenali psikolog kami', false)
            ->assertSee('Apakah isi sesi dijamin rahasia?', false)
            ->assertSee('Asisten AI RuangTenang', false);
    }

    public function test_aqila_seeder_adds_the_demo_to_the_healthcare_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateAqilaSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'ruang-tenang-psikologi-konseling')
            ->firstOrFail();

        $this->assertSame('healthcare', $template->category_slug);
        $this->assertSame(['Psychology & Counseling'], $template->business_types);
        $this->assertSame('Calm & Minimalist', $template->design_style);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Ruang Tenang — Psikologi &amp; Konseling', false)
            ->assertSee('data-category="healthcare"', false)
            ->assertSee('src="/webia/template/healthcare/psychology/ruang-tenang?preview=1"', false)
            ->assertSee(e($template->description), false);
    }
}
