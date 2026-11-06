<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplatePutriSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class AgriculturePeralatanPertanianCorporateSageGreenPutriTest extends TestCase
{
    use RefreshDatabase;

    public function test_route_renders_the_agriculture_peralatan_pertanian_corporate_sage_green_template(): void
    {
        $this->get(route('webia.template.agriculture-peralatanpertanian-corporate-sagegreen-putri'))
            ->assertOk()
            ->assertSee('AgroPratama Machinery')
            ->assertSee('Perlengkapan')
            ->assertSee('Peralatan Pertanian')
            ->assertSee('Mekanisasi Pertanian Modern')
            ->assertSee('DISTRIBUTOR RESMI MESIN')
            ->assertSee('AgroMax T-950 Heavy Duty 4WD')
            ->assertSee('Combine Harvester')
            ->assertSee('Kalkulator Angsuran')
            ->assertSee('AgroBot Machinery Assistant')
            ->assertSee('https://wa.me/6281234567890?text=', false);
    }

    public function test_seeder_places_agriculture_peralatan_pertanian_template_in_collection_and_is_idempotent(): void
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
            ->where('slug', 'agriculture-peralatanpertanian-corporate-sagegreen-putri')
            ->firstOrFail();

        $this->assertSame('agriculture-farming', $template->category_slug);
        $this->assertSame('Agriculture & Farming', $template->category_label);
        $this->assertSame(['Perlengkapan & Peralatan Pertanian'], $template->business_types);
        $this->assertSame('Corporate', $template->design_style);
        $this->assertSame('Sage Green', $template->color_theme);
        $this->assertSame(60, $template->sort_order);
        $this->assertTrue($template->is_active);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('AgroPratama Machinery', false)
            ->assertSee('data-category="agriculture-farming"', false)
            ->assertSee('data-design-style="Corporate"', false)
            ->assertSee('src="/webia/template/agriculture-peralatanpertanian-corporate-sagegreen-putri?preview=1"', false);
    }
}
