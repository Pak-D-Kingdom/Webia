<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateAlleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class VerdantArchiveMuseumCollectionTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_museum_archive_route_renders_searchable_records_and_safe_ai_chat(): void
    {
        $this->get(route('webia.template.verdant-archive-museum-collection'))
            ->assertOk()
            ->assertSee('<title>VERDANT ARCHIVE — Museum Collection &amp; Artifact Database</title>', false)
            ->assertSee('Katalog Artefak Terkurasi')
            ->assertSee('Institutional Bulk Dataset')
            ->assertSee('data-archive-record', false)
            ->assertSee('document.createTextNode(` ${text}`)', false)
            ->assertDontSee('box.innerHTML +=')
            ->assertDontSee('cdn.tailwindcss.com')
            ->assertSee('font-verdant-serif', false)
            ->assertSee('bg-verdant-sage-900', false);
    }

    public function test_museum_archive_template_is_seeded_idempotently_and_visible_in_the_collection(): void
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
            'slug' => 'verdant-archive-museum-collection',
            'category_slug' => 'education-culture',
            'sort_order' => 56,
            'template_url' => '/webia/template/verdant-archive-museum-collection',
            'preview_view' => 'website-bisnis.templates.education-culture.verdant-archive-museum-collection',
            'is_active' => true,
        ]);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Verdant Archive — Museum Collection &amp; Artifact Database', false)
            ->assertSee('data-category="education-culture"', false)
            ->assertSee('src="/webia/template/verdant-archive-museum-collection?preview=1"', false);
    }
}
