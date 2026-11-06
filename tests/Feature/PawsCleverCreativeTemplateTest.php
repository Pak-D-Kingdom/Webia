<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateAlleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class PawsCleverCreativeTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_the_paws_academy_template(): void
    {
        $this->get(route('webia.template.pet-animal-service.paws-clever-creative'))
            ->assertOk()
            ->assertSee('<title>Paws & Clever - Akademi & Pelatihan Hewan Peliharaan</title>', false)
            ->assertSee('Positive Reinforcement 100% Bebas Paksaan')
            ->assertSee('Program Pelatihan Unggulan')
            ->assertSee('Formulir Pesan Sesi Trial')
            ->assertSee('PawsAI Assistant')
            ->assertSee('https://wa.me/6281299008812?text=', false)
            ->assertSee('font-paws-display', false)
            ->assertDontSee('cdn.tailwindcss.com');
    }

    public function test_template_is_available_in_the_collection_after_seeding(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateAlleSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'paws-clever-creative')
            ->firstOrFail();

        $this->assertSame(35, $template->sort_order);
        $this->assertSame('pet-animal-service', $template->category_slug);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Paws &amp; Clever — Creative Pet Training Academy', false)
            ->assertSee('src="/webia/template/paws-clever-creative?preview=1"', false)
            ->assertSee('data-category="pet-animal-service"', false)
            ->assertSee(e(route('orders.create', [
                'template' => $template->id,
                'category' => 'pet-animal-service',
            ])), false);
    }

    public function test_catalog_preview_uses_the_template_hero_mode(): void
    {
        $this->get(route('webia.template.pet-animal-service.paws-clever-creative').'?preview=1')
            ->assertOk()
            ->assertSee('paws-template-preview');
    }
}
