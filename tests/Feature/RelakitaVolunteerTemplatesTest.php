<?php

namespace Tests\Feature;

use App\Models\WebiaTemplate;
use Database\Seeders\WebiaTemplateAlleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class RelakitaVolunteerTemplatesTest extends TestCase
{
    use RefreshDatabase;

    public function test_warm_sunrise_demo_renders_the_relakita_volunteer_landing_page(): void
    {
        $this->get(route('webia.template.nonprofit-community.relakita-volunteer-warm-sunrise'))
            ->assertOk()
            ->assertSee('<title>Relakita - Sahabat Relawan Indonesia</title>', false)
            ->assertSee('Langkah Kecil Kita,')
            ->assertSee('Klaster Program Pilihan')
            ->assertSee('handleFormSubmit(event)')
            ->assertSee('font-relakita-headline-lg', false)
            ->assertDontSee('cdn.tailwindcss.com')
            ->assertDontSee('tailwind-config');
    }

    public function test_midnight_navy_demo_renders_without_the_broken_switcher_or_malformed_prompt_button(): void
    {
        $this->get(route('webia.template.nonprofit-community.kolektif-aksi-kita-volunteer-midnight-navy'))
            ->assertOk()
            ->assertSee('<title>Kolektif Aksi Kita | Nonprofit &amp; Community Volunteer</title>', false)
            ->assertSee('Satu Jam Tenagamu,')
            ->assertSee('Program Relawan Terbuka')
            ->assertSee('handleAiSubmit(event)')
            ->assertSee('relakita2-glass-navy', false)
            ->assertSee("sendQuickPrompt('Bagaimana syarat bergabung?')", false)
            ->assertDontSee('button bg-slate-800')
            ->assertDontSee('switchLandingView')
            ->assertDontSee('cdn.tailwindcss.com')
            ->assertDontSee('tailwind.config');
    }

    public function test_both_templates_are_seeded_idempotently_and_listed_in_the_nonprofit_collection(): void
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
            'slug' => 'relakita-volunteer-warm-sunrise',
            'category_slug' => 'nonprofit-community',
            'sort_order' => 49,
            'template_url' => '/webia/template/relakita-volunteer-warm-sunrise',
            'is_active' => true,
        ]);
        $this->assertDatabaseHas('webia_templates', [
            'slug' => 'kolektif-aksi-kita-volunteer-midnight-navy',
            'category_slug' => 'nonprofit-community',
            'sort_order' => 50,
            'template_url' => '/webia/template/kolektif-aksi-kita-volunteer-midnight-navy',
            'is_active' => true,
        ]);
        $this->assertSame(2, WebiaTemplate::query()
            ->whereIn('slug', [
                'relakita-volunteer-warm-sunrise',
                'kolektif-aksi-kita-volunteer-midnight-navy',
            ])
            ->count());

        $this->get(route('collections'))
            ->assertOk()
            ->assertSee('Relakita — Warm Sunrise Volunteer Community', false)
            ->assertSee('data-category="nonprofit-community"', false)
            ->assertSee('src="/webia/template/relakita-volunteer-warm-sunrise?preview=1"', false)
            ->assertSee('Kolektif Aksi Kita — Midnight Navy Volunteer Network', false)
            ->assertSee('src="/webia/template/kolektif-aksi-kita-volunteer-midnight-navy?preview=1"', false);
    }
}
