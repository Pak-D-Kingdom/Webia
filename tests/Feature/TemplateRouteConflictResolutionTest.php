<?php

namespace Tests\Feature;

use Database\Seeders\WebiaTemplatePreviewSeeder;
use Database\Seeders\WebiaTemplateSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TemplateRouteConflictResolutionTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(WebiaTemplateSeeder::class);
        $this->seed(WebiaTemplatePreviewSeeder::class);
    }

    public function test_matcha_clean_route_renders_the_template(): void
    {
        $this->get('/webia/template/matcha-clean-organic-deep-cleaning')
            ->assertOk()
            ->assertViewIs('website-bisnis.templates.home-services.home-cleaning-deep-cleaning.matcha-clean.matcha-clean');
    }

    public function test_nantara_route_renders_the_replacement_template(): void
    {
        $this->get('/webia/template/nantara-architecture-traditional-cultural')
            ->assertOk()
            ->assertViewIs('website-bisnis.templates.interior-architecture.architecture-building-design.nantara-architecture.nantara-architecture');
    }

    public function test_aurelia_route_renders_the_template(): void
    {
        $this->get('/webia/template/aurelia-home-renovation')
            ->assertOk()
            ->assertViewIs('website-bisnis.templates.home-services.home-renovation-repair.aurelia.aurelia');
    }

    public function test_removed_griya_etnik_route_returns_404(): void
    {
        $this->get('/webia/template/griya-etnik-nantara')->assertNotFound();
    }
}
