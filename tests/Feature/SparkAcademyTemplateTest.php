<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateAqilaSeeder;
use Database\Seeders\WebiaTemplatePreviewSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class SparkAcademyTemplateTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(WebiaTemplateAqilaSeeder::class);
        $this->seed(WebiaTemplatePreviewSeeder::class);
    }

    public function test_demo_route_renders_the_spark_academy_template_and_assets(): void
    {
        $this->get('/webia/template/spark-academy-maximum-impact')
            ->assertOk()
            ->assertHeader('content-type', 'text/html; charset=UTF-8')
            ->assertSee('<title>SPARK Academy | School</title>', false)
            ->assertSee('Bright Futures.', false)
            ->assertSee('id="programs"', false)
            ->assertSee('SPARK Virtual Assistant', false)
            ->assertSee('css/website-bisnis/templates/education/spark-academy-maximum-impact.css', false)
            ->assertSee('js/website-bisnis/templates/education/spark-academy-maximum-impact.js', false);

        $this->get('/webia/template/spark-academy-maximum-impact?preview=1')
            ->assertOk()
            ->assertSee('class="webia-hero-preview-mode"', false);
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
        $this->assertSame('Playful & Colorful', $template->design_style);
        $this->assertGreaterThan(300, mb_strlen($template->description));

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('SPARK Academy — School &amp; Learning', false)
            ->assertSee('src="/webia/template/spark-academy-maximum-impact?preview=1"', false)
            ->assertSee('data-category="education"', false)
            ->assertSee('data-design-style="Playful &amp; Colorful"', false)
            ->assertSee('data-business-types="[&quot;School&quot;]"', false)
            ->assertSee(e($template->description), false);
    }
}
