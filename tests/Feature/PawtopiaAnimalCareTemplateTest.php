<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateAqilaSeeder;
use Database\Seeders\WebiaTemplatePreviewSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class PawtopiaAnimalCareTemplateTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(WebiaTemplateAqilaSeeder::class);
        $this->seed(WebiaTemplatePreviewSeeder::class);
    }

    public function test_demo_route_renders_the_pawtopia_animal_care_template(): void
    {
        $this->get('/webia/template/pawtopia-animal-care')
            ->assertOk()
            ->assertSee('<title>Pawtopia — Animal Care Masa Depan</title>', false)
            ->assertSee('Perawatan hewan kesayangan,')
            ->assertSee('Semua kebutuhan hewan, satu tempat')
            ->assertSee('Pantau semuanya dari satu layar')
            ->assertSee('PAW-AI ONLINE', false)
            ->assertSee('pawtopia-animal-care.css', false)
            ->assertSee('pawtopia-animal-care.js', false);
    }

    public function test_template_is_available_in_the_collection_after_seeding(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateAqilaSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'pawtopia-animal-care')
            ->firstOrFail();

        $this->assertSame(42, $template->sort_order);
        $this->assertSame('pet-animal-service', $template->category_slug);
        $this->assertSame(['Animal Care'], $template->business_types);
        $this->assertSame('Futuristic', $template->design_style);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Pawtopia — Animal Care Masa Depan')
            ->assertSee('src="/webia/template/pawtopia-animal-care?preview=1"', false)
            ->assertSee('data-category="pet-animal-service"', false)
            ->assertSee('Animal Care')
            ->assertSee(e(route('orders.create', [
                'template' => $template->id,
                'category' => 'pet-animal-service',
            ])), false);
    }

    public function test_catalog_preview_uses_the_pawtopia_hero_mode(): void
    {
        $this->get('/webia/template/pawtopia-animal-care'.'?preview=1')
            ->assertOk()
            ->assertSee('pawtopia-template-preview');
    }
}
