<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateSeederAthiya;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ArsipKainHeritageEditorialTemplateTest extends TestCase
{
    use RefreshDatabase;

    public function test_demo_route_renders_arsip_kain_and_safe_interactions(): void
    {
        $this->get(route('webia.template.arsip-kain-heritage-editorial'))
            ->assertOk()
            ->assertSee('<title>Arsip Kain – Layanan Konservasi Tekstil Warisan</title>', false)
            ->assertSee('Periksa kondisi kain')
            ->assertSee('Dari meja')
            ->assertSee('Penerimaan koleksi')
            ->assertSee('replaceMarkup')
            ->assertDontSee('innerHTML', false)
            ->assertDontSee('insertAdjacentHTML', false)
            ->assertDontSee('document.write', false)
            ->assertDontSee(' onclick=', false)
            ->assertSee('target="_blank"', false)
            ->assertSee('rel="noopener"', false);
    }

    public function test_athiya_seeder_lists_arsip_kain_in_the_heritage_textile_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateSeederAthiya::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $template = WebiaTemplate::query()
            ->where('slug', 'arsip-kain-heritage-editorial')
            ->firstOrFail();

        $this->assertSame('traditional-textiles-heritage-fashion', $template->category_slug);
        $this->assertSame(['Heritage Textile Conservation Service'], $template->business_types);
        $this->assertSame('Heritage Editor', $template->design_style);
        $this->assertSame('Cherry Blossom', $template->color_theme);

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Arsip Kain — Heritage Textile Conservation', false)
            ->assertSee('data-category="traditional-textiles-heritage-fashion"', false)
            ->assertSee('data-design-style="Heritage Editor"', false)
            ->assertSee('src="/webia/template/arsip-kain-heritage-editorial?preview=1"', false);
    }
}
