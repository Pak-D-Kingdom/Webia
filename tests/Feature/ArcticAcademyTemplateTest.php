<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateAqilaSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ArcticAcademyTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_the_arctic_academy_template_and_assets(): void
    {
        $this->get(route('webia.template.education.arctic-academy-school'))
            ->assertOk()
            ->assertHeader('content-type', 'text/html; charset=UTF-8')
            ->assertSee('<title>Arctic Academy | School</title>', false)
            ->assertSee('Where bright minds', false)
            ->assertSee('id="program"', false)
            ->assertSee('css/website-bisnis/templates/education/arctic-academy-school.css', false)
            ->assertSee('js/website-bisnis/templates/education/arctic-academy-school.js', false);

        $this->get(route('webia.template.education.arctic-academy-school', ['preview' => 1]))
            ->assertOk()
            ->assertSee('class="webia-hero-preview-mode"', false);
    }

    public function test_aqila_seeder_adds_arctic_academy_to_the_education_filter_and_demo_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateAqilaSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'arctic-academy-school')
            ->firstOrFail();

        $this->assertSame('education', $template->category_slug);
        $this->assertSame(['School'], $template->business_types);
        $this->assertSame('Classic', $template->design_style);
        $this->assertSame(
            'Website Arctic Academy bergaya klasik untuk menampilkan profil, program sekolah, keunggulan, galeri, testimoni, FAQ, serta informasi pendaftaran dan kontak.',
            $template->description
        );

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Arctic Academy — School &amp; Learning', false)
            ->assertSee('src="/webia/template/arctic-academy-school?preview=1"', false)
            ->assertSee('data-category="education"', false)
            ->assertSee('data-design-style="Classic"', false)
            ->assertSee('data-business-types="[&quot;School&quot;]"', false)
            ->assertSee(e($template->description), false);
    }
}
