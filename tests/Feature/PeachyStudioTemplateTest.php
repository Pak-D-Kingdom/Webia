<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateAqilaSeeder;
use Database\Seeders\WebiaTemplatePreviewSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class PeachyStudioTemplateTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(WebiaTemplateAqilaSeeder::class);
        $this->seed(WebiaTemplatePreviewSeeder::class);
    }

    public function test_demo_route_renders_peachy_studio_content_and_sections(): void
    {
        $this->get('/webia/template/peachy-studio')
            ->assertOk()
            ->assertSee('<title>Peachy Studio | Product Photography</title>', false)
            ->assertSee('Make Your Product <span>Look Irresistible.</span>', false)
            ->assertSee('id="services"', false)
            ->assertSee('id="portfolio"', false)
            ->assertSee('id="pricing"', false)
            ->assertSee('id="faq"', false)
            ->assertSee('AI Assistant', false);
    }

    public function test_aqila_seeder_adds_peachy_studio_to_the_photography_filter(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateAqilaSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'peachy-studio')
            ->firstOrFail();

        $this->assertSame('photography-creative-studio', $template->category_slug);
        $this->assertSame(['Product Photography & Videography'], $template->business_types);
        $this->assertSame('Playful & Colorful', $template->design_style);
        $this->assertStringContainsString('portfolio lintas kategori', $template->description);
        $this->assertStringContainsString('paket harga Starter, Growth, dan Premium', $template->description);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Peachy Studio — Product Photography', false)
            ->assertSee('data-category="photography-creative-studio"', false)
            ->assertSee('data-business-types="[&quot;Product Photography &amp; Videography&quot;]"', false)
            ->assertSee('data-design-style="Playful &amp; Colorful"', false)
            ->assertSee('src="/webia/template/peachy-studio?preview=1"', false)
            ->assertSee(e($template->description), false);
    }
}
