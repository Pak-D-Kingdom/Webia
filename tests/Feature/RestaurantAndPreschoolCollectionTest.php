<?php

namespace Tests\Feature;

use Database\Seeders\WebiaTemplateAqilaSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class RestaurantAndPreschoolCollectionTest extends TestCase
{
    use RefreshDatabase;

    public function test_seeded_restaurant_and_preschool_templates_are_displayed_in_the_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateAqilaSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Restoran Azura — Hidangan Klasik')
            ->assertSee('NOIR — Restaurant &amp; Dining', false)
            ->assertSee('Rumah Latte — Preschool &amp; Daycare', false)
            ->assertSee('Tunas Cendekia — Preschool &amp; Daycare', false)
            ->assertSee('data-template-url="/webia/template/restoran-azura"', false)
            ->assertSee('src="/webia/template/restoran-azura?preview=1"', false)
            ->assertSee('data-template-url="/webia/template/noir-restaurant"', false)
            ->assertSee('src="/webia/template/noir-restaurant?preview=1"', false)
            ->assertSee('data-template-url="/webia/template/tunas-cendekia-preschool-daycare"', false)
            ->assertSee('src="/webia/template/tunas-cendekia-preschool-daycare?preview=1"', false)
            ->assertSee('data-template-url="/webia/template/rumah-latte-preschool-daycare"', false)
            ->assertSee('src="/webia/template/rumah-latte-preschool-daycare?preview=1"', false);
    }

    public function test_restoran_azura_demo_renders_with_its_styles_and_scripts(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateAqilaSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $this->get(route('webia.template.fnb.restaurant.restoran-azura'))
            ->assertOk()
            ->assertSee('Restoran Azura — Hidangan Klasik')
            ->assertSee('id="menu-favorit"', false)
            ->assertSee('id="faq"', false)
            ->assertSee('css/website-bisnis/templates/fnb/restaurant/restoran-azura.css', false)
            ->assertSee('js/website-bisnis/templates/fnb/restaurant/restoran-azura.js', false);

        $this->assertFileExists(public_path('css/website-bisnis/templates/fnb/restaurant/restoran-azura.css'));
        $this->assertFileExists(public_path('js/website-bisnis/templates/fnb/restaurant/restoran-azura.js'));
    }

    public function test_noir_demo_renders_with_its_styles_and_scripts(): void
    {
        $this->get('/webia/template/noir-restaurant')
            ->assertOk()
            ->assertSee('NOIR — Restaurant & Dining', false)
            ->assertSee('id="reservation"', false)
            ->assertSee('id="faq"', false)
            ->assertSee('css/website-bisnis/templates/fnb/restaurant/noir-restaurant.css', false)
            ->assertSee('js/website-bisnis/templates/fnb/restaurant/noir-restaurant.js', false);

        $this->assertFileExists(public_path('css/website-bisnis/templates/fnb/restaurant/noir-restaurant.css'));
        $this->assertFileExists(public_path('js/website-bisnis/templates/fnb/restaurant/noir-restaurant.js'));
    }

    public function test_tunas_cendekia_demo_renders_with_its_styles_and_scripts(): void
    {
        $this->get('/webia/template/tunas-cendekia-preschool-daycare')
            ->assertOk()
            ->assertSee('Tunas Cendekia')
            ->assertSee('id="program"', false)
            ->assertSee('id="keunggulan"', false)
            ->assertSee('id="faq"', false)
            ->assertSee('css/website-bisnis/templates/education/preschool/tunas-cendekia-preschool-daycare.css', false)
            ->assertSee('js/website-bisnis/templates/education/preschool/tunas-cendekia-preschool-daycare.js', false);

        $this->assertFileExists(public_path('css/website-bisnis/templates/education/preschool/tunas-cendekia-preschool-daycare.css'));
        $this->assertFileExists(public_path('js/website-bisnis/templates/education/preschool/tunas-cendekia-preschool-daycare.js'));
    }

    public function test_rumah_latte_demo_renders_with_its_styles_and_scripts(): void
    {
        $this->get('/webia/template/rumah-latte-preschool-daycare')
            ->assertOk()
            ->assertSee('Rumah Latte')
            ->assertSee('id="program"', false)
            ->assertSee('id="daftar"', false)
            ->assertSee('id="faq"', false)
            ->assertSee('css/website-bisnis/templates/education/preschool/rumah-latte-preschool-daycare.css', false)
            ->assertSee('js/website-bisnis/templates/education/preschool/rumah-latte-preschool-daycare.js', false);

        $this->assertFileExists(public_path('css/website-bisnis/templates/education/preschool/rumah-latte-preschool-daycare.css'));
        $this->assertFileExists(public_path('js/website-bisnis/templates/education/preschool/rumah-latte-preschool-daycare.js'));
    }
}
