<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateAqilaSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class PawsteadTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_the_pawstead_animal_care_template(): void
    {
        $this->get(route('webia.template.pet-animal-service.pawstead'))
            ->assertOk()
            ->assertSee('<title>Pawstead — Rumah Kedua untuk Si Bulu</title>', false)
            ->assertSee('Rumah kedua yang <mark>seru</mark>', false)
            ->assertSee('Bikin <u>Kartu Member</u> si bulu', false)
            ->assertSee('Asisten Pawstead');
    }

    public function test_aqila_seeder_adds_pawstead_to_the_pet_and_animal_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateAqilaSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'pawstead-animal-care')
            ->firstOrFail();

        $this->assertSame(45, $template->sort_order);
        $this->assertSame('pet-animal-service', $template->category_slug);
        $this->assertSame(['Animal Care'], $template->business_types);
        $this->assertSame('Playful & Colorful', $template->design_style);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Pawstead — Rumah Kedua untuk Si Bulu', false)
            ->assertSee('src="/webia/template/pawstead?preview=1"', false)
            ->assertSee('data-business-types="[&quot;Animal Care&quot;]"', false)
            ->assertSee('data-category="pet-animal-service"', false);
    }
}
