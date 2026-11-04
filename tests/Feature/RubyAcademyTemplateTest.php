<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateAqilaSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class RubyAcademyTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_the_ruby_academy_html_template(): void
    {
        $this->get(route('webia.template.education.ruby-academy-classic-school'))
            ->assertOk()
            ->assertHeader('content-type', 'text/html; charset=UTF-8');

        $templatePath = public_path('website-bisnis/templates/education/ruby-academy-classic-school.html');

        $this->assertFileExists($templatePath);

        $templateHtml = file_get_contents($templatePath);

        $this->assertIsString($templateHtml);
        $this->assertStringContainsString('<title>Ruby Academy | School of Excellence</title>', $templateHtml);
        $this->assertStringContainsString('Where Knowledge', $templateHtml);
        $this->assertStringContainsString('id="program"', $templateHtml);
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
        $this->assertGreaterThan(300, mb_strlen($template->description));

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
