<?php

namespace Tests\Feature;

use Database\Seeders\WebiaTemplatePreviewSeeder;
use Database\Seeders\WebiaTemplateSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class TemplateCollectionDesignPreviewTest extends TestCase
{
    use RefreshDatabase;

    public function test_collection_shows_real_previews_for_aurelia_nantara_and_matcha_clean(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);
        $this->seed(WebiaTemplatePreviewSeeder::class);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('src="/webia/template/aurelia-home-renovation?preview=1"', false)
            ->assertSee('src="/webia/template/nantara-architecture-traditional-cultural?preview=1"', false)
            ->assertSee('src="/webia/template/matcha-clean-organic-deep-cleaning?preview=1"', false);
    }
}
