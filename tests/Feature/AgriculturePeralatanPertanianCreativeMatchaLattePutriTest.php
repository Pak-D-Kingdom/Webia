<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplatePutriSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class AgriculturePeralatanPertanianCreativeMatchaLattePutriTest extends TestCase
{
    use RefreshDatabase;

    public function test_route_renders_the_agriculture_peralatan_pertanian_creative_matcha_latte_template(): void
    {
        $this->get(route('webia.template.agriculture-peralatanpertanian-creative-matchalatte-putri'))
            ->assertOk()
            ->assertSee('MatchaAgro Machinery')
            ->assertSee('Perlengkapan')
            ->assertSee('Peralatan Pertanian')
            ->assertSee('Harmoni Alam')
            ->assertSee('CREATIVE AGRI-MACHINERY')
            ->assertSee('MatchaCraft T-45 Mini 4WD')
            ->assertSee('Simulasi Efisiensi Jam Kerja')
            ->assertSee('MatchaAgro Smart Assistant')
            ->assertSee('https://wa.me/6281234567890?text=', false);
    }

    public function test_seeder_places_agriculture_peralatan_pertanian_creative_template_in_collection_and_is_idempotent(): void
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
            ->where('slug', 'agriculture-peralatanpertanian-creative-matchalatte-putri')
            ->firstOrFail();

        $this->assertSame('agriculture-farming', $template->category_slug);
        $this->assertSame('Agriculture & Farming', $template->category_label);
        $this->assertSame(['Perlengkapan & Peralatan Pertanian'], $template->business_types);
        $this->assertSame('Creative', $template->design_style);
        $this->assertSame('Matcha Latte', $template->color_theme);
        $this->assertSame(62, $template->sort_order);
        $this->assertTrue($template->is_active);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('MatchaAgro Machinery', false)
            ->assertSee('data-category="agriculture-farming"', false)
            ->assertSee('data-design-style="Creative"', false)
            ->assertSee('src="/webia/template/agriculture-peralatanpertanian-creative-matchalatte-putri?preview=1"', false);
    }
}
