<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateAlleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class RubraMemoriaArtisticHeritageTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_artistic_heritage_route_renders_its_installations_and_safe_ai_chat(): void
    {
        $this->get(route('webia.template.rubra-memoria-artistic-heritage'))
            ->assertOk()
            ->assertSee('<title>RUBRA MEMORIA — Artistic Experimental Heritage Exhibition</title>', false)
            ->assertSee('Artistic & Tactile Heritage Lab')
            ->assertSee('Instalasi Warisan')
            ->assertSee('Virtual Gallery Pass')
            ->assertSee('document.createTextNode(` ${text}`)', false)
            ->assertDontSee('box.innerHTML +=')
            ->assertDontSee('cdn.tailwindcss.com')
            ->assertSee('font-rubra-avant', false);
    }

    public function test_artistic_heritage_template_is_seeded_idempotently_and_visible_in_the_collection(): void
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
            'slug' => 'rubra-memoria-artistic-heritage',
            'category_slug' => 'education-culture',
            'sort_order' => 55,
            'template_url' => '/webia/template/rubra-memoria-artistic-heritage',
            'preview_view' => 'website-bisnis.templates.education-culture.rubra-memoria-artistic-heritage',
            'is_active' => true,
        ]);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Rubra Memoria — Artistic Experimental Heritage Exhibition', false)
            ->assertSee('data-category="education-culture"', false)
            ->assertSee('src="/webia/template/rubra-memoria-artistic-heritage?preview=1"', false);
    }
}
