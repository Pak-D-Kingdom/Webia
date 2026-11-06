<?php

namespace Tests\Feature;

use Database\Seeders\WebiaTemplateSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class AurumCoCateringTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_the_catering_template(): void
    {
        $this->get(route('webia.template.aurumco-catering'))
            ->assertOk()
            ->assertSee('<title>AURUM & CO. | Haute Gastronomie & Bespoke Atelier</title>', false)
            ->assertSee('Gastronomy as', false)
            ->assertSee('function recalculateProposal()', false)
            ->assertSee('function handleReservationSubmit(e)', false);
    }

    public function test_template_is_available_in_the_collection_after_seeding(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Aurum &amp; Co. — Haute Gastronomy', false)
            ->assertSee('src="/webia/template/aurumco-catering?preview=1"', false)
            ->assertSee('Catering', false);
    }
}
