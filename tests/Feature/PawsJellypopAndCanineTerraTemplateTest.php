<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateAlleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class PawsJellypopAndCanineTerraTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_paws_joy_jellypop_demo_route_renders_the_template(): void
    {
        $this->get(route('webia.template.pet-animal-service.paws-joy-jellypop'))
            ->assertOk()
            ->assertSee('<title>Paws &amp; Joy - Playful &amp; Colorful Pet Academy</title>', false)
            ->assertSee('Jelly Pop Spring Fest')
            ->assertSee('Puppy Socialization')
            ->assertSee('id="joy-trial-form"', false)
            ->assertSee('https://wa.me/6281299008812', false)
            ->assertSee('font-joy-display', false)
            ->assertDontSee('cdn.tailwindcss.com');
    }

    public function test_canine_terra_demo_route_renders_the_template(): void
    {
        $this->get(route('webia.template.pet-animal-service.paws-canine-terra-earth-tone'))
            ->assertOk()
            ->assertSee('<title>Canine Terra — Sanctuary Pelatihan Anjing Holistik Berbasis Alam</title>', false)
            ->assertSee('Positive Reinforcement &amp; Nature Therapy', false)
            ->assertSee('Puppy Social Camp')
            ->assertSee('id="canine-trial-form"', false)
            ->assertSee('https://wa.me/6281277889900', false)
            ->assertSee('font-canine-display', false)
            ->assertDontSee('cdn.tailwindcss.com');
    }

    public function test_both_templates_are_listed_in_the_collection_after_idempotent_seeding(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateAlleSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateAlleSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $this->assertDatabaseHas('webia_templates', [
            'slug' => 'paws-joy-jellypop',
            'sort_order' => 36,
            'template_url' => '/webia/template/paws-joy-jellypop',
            'is_active' => true,
        ]);
        $this->assertDatabaseHas('webia_templates', [
            'slug' => 'paws-canine-terra-earth-tone',
            'sort_order' => 37,
            'template_url' => '/webia/template/paws-canine-terra-earth-tone',
            'is_active' => true,
        ]);
        $this->assertSame(2, WebiaTemplate::query()
            ->whereIn('slug', ['paws-joy-jellypop', 'paws-canine-terra-earth-tone'])
            ->count());

        $joy = WebiaTemplate::query()->where('slug', 'paws-joy-jellypop')->firstOrFail();
        $canine = WebiaTemplate::query()->where('slug', 'paws-canine-terra-earth-tone')->firstOrFail();

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Paws &amp; Joy — Playful Jellypop Pet Academy', false)
            ->assertSee('src="/webia/template/paws-joy-jellypop?preview=1"', false)
            ->assertSee(e(route('orders.create', [
                'template' => $joy->id,
                'category' => 'pet-animal-service',
            ])), false)
            ->assertSee('Canine Terra — Earth-Tone Holistic Dog Academy')
            ->assertSee('src="/webia/template/paws-canine-terra-earth-tone?preview=1"', false)
            ->assertSee(e(route('orders.create', [
                'template' => $canine->id,
                'category' => 'pet-animal-service',
            ])), false);
    }

    public function test_both_catalog_previews_use_their_hero_mode(): void
    {
        $this->get(route('webia.template.pet-animal-service.paws-joy-jellypop').'?preview=1')
            ->assertOk()
            ->assertSee('joy-template-preview');

        $this->get(route('webia.template.pet-animal-service.paws-canine-terra-earth-tone').'?preview=1')
            ->assertOk()
            ->assertSee('canine-template-preview');
    }
}
