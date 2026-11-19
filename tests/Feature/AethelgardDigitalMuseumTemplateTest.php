<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateAlleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class AethelgardDigitalMuseumTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_digital_museum_route_renders_its_curated_archive_and_safe_ai_chat(): void
    {
        $this->get(route('webia.template.aethelgard-digital-museum'))
            ->assertOk()
            ->assertSee('<title>Aethelgard Archive — Digital Museum & Heritage Platform</title>', false)
            ->assertSee('Edisi Kuratorial No. XIV')
            ->assertSee('Artefak Terdigitalisasi')
            ->assertSee('Tur Virtual 3D')
            ->assertSee('document.createTextNode(` ${userText}`)', false)
            ->assertDontSee('chatBox.innerHTML +=')
            ->assertDontSee('cdn.tailwindcss.com')
            ->assertSee('font-aethelgard-serif', false);
    }

    public function test_digital_museum_template_is_seeded_idempotently_and_visible_in_the_collection(): void
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
            'slug' => 'aethelgard-digital-museum',
            'category_slug' => 'education-culture',
            'sort_order' => 53,
            'template_url' => '/webia/template/aethelgard-digital-museum',
            'preview_view' => 'website-bisnis.templates.education-culture.aethelgard-digital-museum',
            'is_active' => true,
        ]);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Aethelgard — Digital Museum &amp; Heritage Archive', false)
            ->assertSee('data-category="education-culture"', false)
            ->assertSee('src="/webia/template/aethelgard-digital-museum?preview=1"', false);
    }
}
