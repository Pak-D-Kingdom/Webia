<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CustomerSiteFnbTest extends TestCase
{
    use RefreshDatabase;

    private function template(string $slug): WebiaTemplate
    {
        $views = [
            'aurumco-catering' => 'website-bisnis.templates.fnb.aurumco-catering',
            'vallaco-catering' => 'website-bisnis.templates.fnb.vallaco-catering',
            'laut-biru-seafood' => 'website-bisnis.templates.fnb.restaurant.laut-biru-seafood',
            'fresh-harvest-healthy-meal-prep' => 'website-bisnis.templates.fnb.healthy-meal-prep.fresh-harvest',
            'bakery-bold-luxury' => 'website-bisnis.templates.fnb.bakery.bakery-bold-luxury',
            'midnightbaker-futuristic' => 'website-bisnis.templates.fnb.bakery.midnightbaker-futuristic',
            'fnb-bakery-playful-colorful-pastel-mix' => 'website-bisnis.templates.fnb.bakery.bakery-playful-colorful',
            'restoran-azura' => 'website-bisnis.templates.fnb.restaurant.restoran-azura',
            'noir-restaurant' => 'website-bisnis.templates.fnb.restaurant.noir-restaurant',
            'rasa-rupa-artistik' => 'website-bisnis.templates.fnb.rasa-rupa-artistik',
            'tetangga-kenyang-friendly' => 'website-bisnis.templates.fnb.tetangga-kenyang-friendly',
            'hulu-pantry-asal-usul' => 'website-bisnis.templates.fnb.hulu-pantry-asal-usul',
            'kusuma-ningrat-royal-heritage' => 'website-bisnis.templates.fnb.kusuma-ningrat-royal-heritage',
        ];

        return WebiaTemplate::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'category_slug' => 'fnb',
                'category_label' => 'F&B',
                'business_types' => ['Restaurant & Catering'],
                'design_style' => 'Modern',
                'description' => 'FnB template.',
                'preview_view' => $views[$slug] ?? null,
                'site_config_path' => 'fnb/'.$slug,
                'is_active' => true,
            ]
        );
    }

    #[DataProvider('fnbTemplatesProvider')]
    public function test_all_fnb_templates_publish_and_render_customer_site(string $slug): void
    {
        $template = $this->template($slug);

        $order = WebiaOrder::factory()->create([
            'webia_template_id' => $template->id,
            'template_snapshot' => [
                'name' => $template->name,
                'slug' => $template->slug,
                'category_slug' => $template->category_slug,
                'site_config_path' => $template->site_config_path,
            ],
            'status' => 'paid',
            'delivery_status' => 'delivered',
            'site_slug' => $slug.'-fnb-test',
            'business_data' => [
                'business_name' => 'Dapur Rasa Selera',
                'whatsapp' => '0812-9876-5432',
                'address' => 'Jl. Kuliner No. 15',
                'city' => 'Bandung',
            ],
        ]);

        $this->assertTrue($order->supportsCustomerSite());

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));
        $response->assertOk()
            ->assertSee('Dapur Rasa Selera')
            ->assertSee('6281298765432', false)
            ->assertSee('webia-client-ai-widget', false);
    }

    public static function fnbTemplatesProvider(): array
    {
        return [
            ['aurumco-catering'],
            ['vallaco-catering'],
            ['laut-biru-seafood'],
            ['fresh-harvest-healthy-meal-prep'],
            ['bakery-bold-luxury'],
            ['midnightbaker-futuristic'],
            ['fnb-bakery-playful-colorful-pastel-mix'],
            ['restoran-azura'],
            ['noir-restaurant'],
            ['rasa-rupa-artistik'],
            ['tetangga-kenyang-friendly'],
            ['hulu-pantry-asal-usul'],
            ['kusuma-ningrat-royal-heritage'],
        ];
    }
}
