<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateSeederAthiya;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class KusumaNingratTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_the_kusuma_ningrat_template(): void
    {
        $this->get(route('webia.template.kusuma-ningrat-royal-heritage'))
            ->assertOk()
            ->assertSee('<title>KUSUMA NINGRAT | Royal Heritage Keraton Catering & Haute Gastronomie</title>', false)
            ->assertSee('Pustaka Hidangan Ageng', false)
            ->assertSee('function recalculateRoyalBanquet()', false)
            ->assertSee('function handleChatSubmit(e)', false)
            ->assertSee('item.textContent = text;', false)
            ->assertSee("'noopener,noreferrer'", false);
    }

    public function test_template_is_available_in_the_collection_after_athiya_seeding(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateSeederAthiya::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'kusuma-ningrat-royal-heritage')
            ->firstOrFail();

        $this->assertDatabaseHas('webia_templates', [
            'slug' => 'kusuma-ningrat-royal-heritage',
            'template_url' => '/webia/template/kusuma-ningrat-royal-heritage',
            'is_active' => true,
        ]);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Kusuma Ningrat — Royal Heritage Catering', false)
            ->assertSee('src="/webia/template/kusuma-ningrat-royal-heritage?preview=1"', false)
            ->assertSee(e(route('orders.create', ['template' => $template->id, 'category' => 'fnb'])), false)
            ->assertSee('Catering', false);
    }
}
