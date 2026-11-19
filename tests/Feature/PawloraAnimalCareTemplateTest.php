<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateAqilaSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class PawloraAnimalCareTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_the_pawlora_animal_care_template(): void
    {
        $this->get(route('webia.template.pet-animal-service.pawlora-animal-care'))
            ->assertOk()
            ->assertSee('<title>Pawlora — Perawatan Hewan yang Hangat & Alami</title>', false)
            ->assertSee('Bikin si bulu selalu')
            ->assertSee('Estimasi harga')
            ->assertSee('Asisten Pawlora');
    }

    public function test_template_is_available_in_the_collection_after_seeding(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateAqilaSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'pawlora-animal-care')
            ->firstOrFail();

        $this->assertSame(43, $template->sort_order);
        $this->assertSame('pet-animal-service', $template->category_slug);
        $this->assertSame(['Animal Care'], $template->business_types);
        $this->assertSame('Playful & Colorful', $template->design_style);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Pawlora — Perawatan Hewan yang Hangat &amp; Alami', false)
            ->assertSee('src="/webia/template/pawlora-animal-care?preview=1"', false)
            ->assertSee('data-business-types="[&quot;Animal Care&quot;]"', false)
            ->assertSee('data-category="pet-animal-service"', false);
    }

    public function test_catalog_preview_displays_only_the_template_hero(): void
    {
        $this->get(route('webia.template.pet-animal-service.pawlora-animal-care').'?preview=1')
            ->assertOk()
            ->assertSee('pawlora-template-preview');
    }
}
