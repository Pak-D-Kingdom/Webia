<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplatePutriSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class AgriculturePeralatanPertanianPlayfulColorfulArcticFrostPutriTest extends TestCase
{
    use RefreshDatabase;

    public function test_route_renders_the_agriculture_peralatan_pertanian_playful_colorful_arctic_frost_template(): void
    {
        $this->get(route('webia.template.agriculture-peralatanpertanian-playfulcolorful-arcticfrost-putri'))
            ->assertOk()
            ->assertSee('FrostyAgro Equipment')
            ->assertSee('Perlengkapan')
            ->assertSee('Peralatan Pertanian')
            ->assertSee('Bertani Ceria')
            ->assertSee('PLAYFUL')
            ->assertSee('FrostyRider Mini-Tractor 35')
            ->assertSee('FrostyBot Farm Companion')
            ->assertSee('https://wa.me/6281234567890?text=', false);
    }

    public function test_seeder_places_agriculture_peralatan_pertanian_playful_template_in_collection_and_is_idempotent(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplatePutriSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        Artisan::call('db:seed', [
            '--class' => WebiaTemplatePutriSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'agriculture-peralatanpertanian-playfulcolorful-arcticfrost-putri')
            ->firstOrFail();

        $this->assertSame('agriculture-farming', $template->category_slug);
        $this->assertSame('Agriculture & Farming', $template->category_label);
        $this->assertSame(['Perlengkapan & Peralatan Pertanian'], $template->business_types);
        $this->assertSame('Playful & Colorful', $template->design_style);
        $this->assertSame('Arctic Frost', $template->color_theme);
        $this->assertSame(64, $template->sort_order);
        $this->assertTrue($template->is_active);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('FrostyAgro Equipment', false)
            ->assertSee('data-category="agriculture-farming"', false)
            ->assertSee('src="/webia/template/agriculture-peralatanpertanian-playfulcolorful-arcticfrost-putri?preview=1"', false);
    }
}
