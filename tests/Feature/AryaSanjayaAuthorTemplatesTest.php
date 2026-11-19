<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateAlleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class AryaSanjayaAuthorTemplatesTest extends TestCase
{
    use RefreshDatabase;

    public function test_ruby_editorial_demo_renders_the_author_portfolio(): void
    {
        $this->get(route('webia.template.personal-brand.arya-sanjaya-ruby-editorial'))
            ->assertOk()
            ->assertSee('<title>Arya Sanjaya — Sastra &amp; Pemikiran | Penulis &amp; Novelis</title>', false)
            ->assertSee('Keheningan yang Menuliskan Rahasia Jiwa.')
            ->assertSee('Koleksi Karya Terpilih')
            ->assertSee('handleAiChat(event)')
            ->assertSee('font-arya-ruby-editorial', false)
            ->assertDontSee('cdn.tailwindcss.com')
            ->assertDontSee('tailwind.config');
    }

    public function test_plum_velvet_demo_renders_the_author_portfolio(): void
    {
        $this->get(route('webia.template.personal-brand.arya-sanjaya-plum-velvet'))
            ->assertOk()
            ->assertSee('<title>Arya Sanjaya | Penulis &amp; Pemikiran Literasi</title>', false)
            ->assertSee('Selamat datang di ruang karya')
            ->assertSee('Koleksi Karya Terpilih')
            ->assertSee('handleAiChat(event)')
            ->assertSee('font-arya-plum-cinzel', false)
            ->assertDontSee('cdn.tailwindcss.com')
            ->assertDontSee('tailwind.config');
    }

    public function test_both_templates_are_seeded_idempotently_and_listed_in_the_personal_brand_collection(): void
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
            'slug' => 'arya-sanjaya-ruby-editorial',
            'category_slug' => 'personal-brand',
            'sort_order' => 47,
            'template_url' => '/webia/template/arya-sanjaya-ruby-editorial',
            'is_active' => true,
        ]);
        $this->assertDatabaseHas('webia_templates', [
            'slug' => 'arya-sanjaya-plum-velvet',
            'category_slug' => 'personal-brand',
            'sort_order' => 48,
            'template_url' => '/webia/template/arya-sanjaya-plum-velvet',
            'is_active' => true,
        ]);
        $this->assertSame(2, WebiaTemplate::query()
            ->whereIn('slug', [
                'arya-sanjaya-ruby-editorial',
                'arya-sanjaya-plum-velvet',
            ])
            ->count());

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Arya Sanjaya — Ruby Editorial Author Portfolio', false)
            ->assertSee('data-category="personal-brand"', false)
            ->assertSee('src="/webia/template/arya-sanjaya-ruby-editorial?preview=1"', false)
            ->assertSee('Arya Sanjaya — Plum Velvet Literary Portfolio', false)
            ->assertSee('src="/webia/template/arya-sanjaya-plum-velvet?preview=1"', false);
    }
}
