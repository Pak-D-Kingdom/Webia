<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateAqilaSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class NoirStudioPhotographyTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_noir_studio_photography_content(): void
    {
        $this->get(route('webia.template.photography.noir-studio'))
            ->assertOk()
            ->assertSee('<title>Noir Studio | Product Photography & Videography</title>', false)
            ->assertSee('Turn Your Product<br>into a <em>Visual Story.</em>', false)
            ->assertSee('id="ai"', false)
            ->assertSee('id="portfolio"', false);
    }

    public function test_aqila_seeder_adds_noir_studio_to_the_photography_filter(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateAqilaSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'noir-studio-photography')
            ->firstOrFail();

        $this->assertSame('photography-creative-studio', $template->category_slug);
        $this->assertSame(['Product Photography & Videography'], $template->business_types);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Noir Studio — Photography &amp; Videography', false)
            ->assertSee('data-category="photography-creative-studio"', false)
            ->assertSee('src="/webia/template/noir-studio-photography?preview=1"', false);
    }
}
