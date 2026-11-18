<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateAlleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class AquaverseInteractiveHeritageTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_interactive_heritage_route_renders_its_exhibition_and_safe_ai_chat(): void
    {
        $this->get(route('webia.template.aquaverse-interactive-heritage'))
            ->assertOk()
            ->assertSee('<title>AQUAVERSE HERITAGE — Interactive Heritage Exhibition</title>', false)
            ->assertSee('PAMERAN IMERSIF 360° LIVE')
            ->assertSee('Katalog Zona & Instalasi')
            ->assertSee('Pilih Pass Eksplorasi Anda')
            ->assertSee('document.createTextNode(` ${text}`)', false)
            ->assertDontSee('box.innerHTML +=')
            ->assertDontSee('cdn.tailwindcss.com')
            ->assertSee('font-aquaverse-display', false);
    }

    public function test_interactive_heritage_template_is_seeded_idempotently_and_visible_in_the_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateAlleSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);
        $templateCount = WebiaTemplate::query()->count();

        Artisan::call('db:seed', [
            '--class' => WebiaTemplateAlleSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $this->assertDatabaseCount('webia_templates', $templateCount);
        $this->assertDatabaseHas('webia_templates', [
            'slug' => 'aquaverse-interactive-heritage',
            'category_slug' => 'education-culture',
            'sort_order' => 54,
            'template_url' => '/webia/template/aquaverse-interactive-heritage',
            'preview_view' => 'website-bisnis.templates.education-culture.aquaverse-interactive-heritage',
            'is_active' => true,
        ]);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Aquaverse — Interactive Heritage Exhibition', false)
            ->assertSee('data-category="education-culture"', false)
            ->assertSee('src="/webia/template/aquaverse-interactive-heritage?preview=1"', false);
    }
}
