<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateAqilaSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class HearthstonePropertyTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_the_hearthstone_property_template(): void
    {
        $this->get(route('webia.template.property.hearthstone-property'))
            ->assertOk()
            ->assertSee('<title>Hearthstone Property — Rumah Hangat untuk Hidup Anda</title>', false)
            ->assertSee('Temukan rumah yang terasa <em>hangat</em>', false)
            ->assertSee('Simulasi')
            ->assertSee('Asisten Hearthstone');
    }

    public function test_aqila_seeder_adds_hearthstone_to_the_property_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateAqilaSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'hearthstone-property')
            ->firstOrFail();

        $this->assertSame(46, $template->sort_order);
        $this->assertSame('property', $template->category_slug);
        $this->assertSame(['Real Estate Agency'], $template->business_types);
        $this->assertSame('Elegant', $template->design_style);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Hearthstone Property — Rumah Hangat untuk Hidup Anda', false)
            ->assertSee('src="/webia/template/property/hearthstone-property?preview=1"', false)
            ->assertSee('data-business-types="[&quot;Real Estate Agency&quot;]"', false)
            ->assertSee('data-category="property"', false);
    }
}
