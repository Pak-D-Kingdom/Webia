<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateAqilaSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class JeliKecilTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_preschool_daycare_content_and_interactions(): void
    {
        $this->get(route('webia.template.education.jeli-kecil'))
            ->assertOk()
            ->assertSee('<title>Jeli Kecil – Preschool & Daycare</title>', false)
            ->assertSee('Program untuk setiap usia', false)
            ->assertSee('Daftar atau jadwalkan kunjungan', false)
            ->assertSee('Kirim lewat WhatsApp', false)
            ->assertSee('Asisten AI Jeli Kecil', false);
    }

    public function test_seeder_adds_the_demo_to_the_education_template_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateAqilaSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'jeli-kecil-preschool-daycare')
            ->firstOrFail();

        $this->assertSame('education', $template->category_slug);
        $this->assertSame(['Preschool & Daycare'], $template->business_types);
        $this->assertSame('Playful & Colorful', $template->design_style);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Jeli Kecil — Preschool &amp; Daycare', false)
            ->assertSee('data-category="education"', false)
            ->assertSee('src="/webia/template/education/preschool-daycare-jeli-kecil?preview=1"', false)
            ->assertSee(e($template->description), false);
    }
}
