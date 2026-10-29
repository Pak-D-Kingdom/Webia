<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateAqilaSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class LumierePhotographyStudioTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_lumiere_studio_content(): void
    {
        $this->get(route('webia.template.photography.lumiere-studio'))
            ->assertOk()
            ->assertSee('<title>Lumière Studio | Product Photography & Videography</title>', false)
            ->assertSee('Bring Your Product<br>to Life.', false)
            ->assertSee('id="aiBtn"', false)
            ->assertSee('id="portfolio"', false);
    }

    public function test_aqila_seeder_adds_lumiere_to_the_photography_filter(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateAqilaSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'lumiere-photography-studio')
            ->firstOrFail();

        $this->assertSame('photography-creative-studio', $template->category_slug);
        $this->assertSame(['Product Photography & Videography'], $template->business_types);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Lumière Studio — Photography &amp; Videography', false)
            ->assertSee('data-category="photography-creative-studio"', false)
            ->assertSee('src="/webia/template/lumiere-photography-studio?preview=1"', false);
    }
}
