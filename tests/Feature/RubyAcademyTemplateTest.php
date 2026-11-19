<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateAqilaSeeder;
use Database\Seeders\WebiaTemplatePreviewSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class RubyAcademyTemplateTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(WebiaTemplateAqilaSeeder::class);
        $this->seed(WebiaTemplatePreviewSeeder::class);
    }

    public function test_demo_route_renders_the_ruby_academy_template_and_assets(): void
    {
        $this->get('/webia/template/ruby-academy-classic-school')
            ->assertOk()
            ->assertHeader('content-type', 'text/html; charset=UTF-8')
            ->assertSee('<title>Ruby Academy | School of Excellence</title>', false)
            ->assertSee('Where Knowledge', false)
            ->assertSee('id="program"', false)
            ->assertSee('css/website-bisnis/templates/education/ruby-academy-classic-school.css', false)
            ->assertSee('js/website-bisnis/templates/education/ruby-academy-classic-school.js', false);

        $this->get('/webia/template/ruby-academy-classic-school?preview=1')
            ->assertOk()
            ->assertSee('class="webia-hero-preview-mode"', false);
    }

    public function test_aqila_seeder_adds_ruby_academy_to_the_education_filter_and_demo_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateAqilaSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'ruby-academy-classic-school')
            ->firstOrFail();

        $this->assertSame('education', $template->category_slug);
        $this->assertSame(['School'], $template->business_types);
        $this->assertSame('Classic', $template->design_style);
        $this->assertSame(
            'Website Ruby Academy bergaya klasik untuk menampilkan profil, program, keunggulan, galeri, acara, testimoni, FAQ, serta informasi pendaftaran dan kontak sekolah.',
            $template->description
        );

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Ruby Academy — School of Excellence', false)
            ->assertSee('src="/webia/template/ruby-academy-classic-school?preview=1"', false)
            ->assertSee('data-category="education"', false)
            ->assertSee('data-design-style="Classic"', false)
            ->assertSee('data-business-types="[&quot;School&quot;]"', false)
            ->assertSee(e($template->description), false);
    }
}
