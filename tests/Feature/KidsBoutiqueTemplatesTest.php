<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateAlleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class KidsBoutiqueTemplatesTest extends TestCase
{
    use RefreshDatabase;

    public function test_candy_cloud_demo_renders_without_the_tailwind_cdn(): void
    {
        $this->get(route('webia.template.retail.petit-wonder-candy-cloud'))
            ->assertOk()
            ->assertSee('<title>Petit Wonder — Candy Cloud Edition | Official Kids Boutique</title>', false)
            ->assertSee('Produk Ceria')
            ->assertSee('toggleAIBubble')
            ->assertSee('font-candy-display', false)
            ->assertDontSee('cdn.tailwindcss.com');
    }

    public function test_yellow_sunshine_demo_renders_without_the_tailwind_cdn(): void
    {
        $this->get(route('webia.template.retail.aurora-petit-yellow-sunshine'))
            ->assertOk()
            ->assertSee('<title>AURORA &amp; PETIT (Maison de Bébé) — Luxury Children\'s Boutique</title>', false)
            ->assertSee('Kelembutan Sejati untuk')
            ->assertSee('toggleAIConcierge')
            ->assertSee('font-sunshine-editorial-serif', false)
            ->assertDontSee('cdn.tailwindcss.com');
    }

    public function test_both_templates_are_seeded_idempotently_and_listed_in_the_retail_collection(): void
    {
        Artisan::call('db:seed', [
            '--class' => WebiaTemplateAlleSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);
        $templateCount = WebiaTemplate::query()->count();

        Artisan::call('db:seed', [
            '--class' => WebiaTemplateAlleSeeder::class,
            '--force' => true,
            '--no-interaction' => true,
        ]);

        $this->assertDatabaseCount('webia_templates', $templateCount);
        $this->assertDatabaseHas('webia_templates', [
            'slug' => 'petit-wonder-candy-cloud',
            'category_slug' => 'retail',
            'sort_order' => 45,
            'template_url' => '/webia/template/petit-wonder-candy-cloud',
            'is_active' => true,
        ]);
        $this->assertDatabaseHas('webia_templates', [
            'slug' => 'aurora-petit-yellow-sunshine',
            'category_slug' => 'retail',
            'sort_order' => 46,
            'template_url' => '/webia/template/aurora-petit-yellow-sunshine',
            'is_active' => true,
        ]);
        $this->assertSame(2, WebiaTemplate::query()
            ->whereIn('slug', [
                'petit-wonder-candy-cloud',
                'aurora-petit-yellow-sunshine',
            ])
            ->count());

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Petit Wonder — Candy Cloud Kids Boutique', false)
            ->assertSee('data-category="retail"', false)
            ->assertSee('src="/webia/template/petit-wonder-candy-cloud?preview=1"', false)
            ->assertSee('Aurora &amp; Petit — Yellow Sunshine Baby Boutique', false)
            ->assertSee('src="/webia/template/aurora-petit-yellow-sunshine?preview=1"', false);
    }
}
