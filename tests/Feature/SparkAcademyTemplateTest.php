<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateAqilaSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class SparkAcademyTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_the_spark_academy_html_template(): void
    {
        $this->get(route('webia.template.education.spark-academy'))
            ->assertOk()
            ->assertHeader('content-type', 'text/html; charset=UTF-8');

        $templatePath = public_path('website-bisnis/templates/education/spark-academy-maximum-impact.html');

        $this->assertFileExists($templatePath);

        $templateHtml = file_get_contents($templatePath);

        $this->assertIsString($templateHtml);
        $this->assertStringContainsString('<title>SPARK Academy | School</title>', $templateHtml);
        $this->assertStringContainsString('Bright Futures.', $templateHtml);
        $this->assertStringContainsString('id="programs"', $templateHtml);
        $this->assertStringContainsString('SPARK Virtual Assistant', $templateHtml);
    }

    public function test_aqila_seeder_adds_spark_academy_with_a_detailed_collection_description(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateAqilaSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'spark-academy-maximum-impact')
            ->firstOrFail();

        $this->assertSame('education', $template->category_slug);
        $this->assertSame(['School'], $template->business_types);
        $this->assertGreaterThan(300, mb_strlen($template->description));

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('SPARK Academy — School &amp; Learning', false)
            ->assertSee('src="/webia/template/spark-academy-maximum-impact?preview=1"', false)
            ->assertSee(e($template->description), false);
    }
}
