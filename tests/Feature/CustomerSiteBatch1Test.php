<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CustomerSiteBatch1Test extends TestCase
{
    use RefreshDatabase;

    #[DataProvider('batch1TemplatesProvider')]
    public function test_batch1_templates_publish_customer_site(string $slug, string $categorySlug, string $siteConfigPath, string $demoBrand): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'category_slug' => $categorySlug,
                'category_label' => ucwords(str_replace('-', ' ', $categorySlug)),
                'business_types' => ['Sample Business'],
                'design_style' => 'Modern',
                'description' => 'Test description.',
                'site_config_path' => $siteConfigPath,
                'is_active' => true,
            ]
        );

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
            'site_slug' => $slug.'-live-test',
            'business_data' => [
                'business_name' => 'Karya Kuliner Nusantara',
                'whatsapp' => '0812-9988-7766',
                'email' => 'halo@karyakuliner.id',
                'address' => 'Jl. Kuliner No. 10, Jakarta Selatan',
            ],
        ]);

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));

        $response->assertOk()
            ->assertSee('Karya Kuliner Nusantara')
            ->assertSee('6281299887766', false)
            ->assertSee('webia-native-ai-bridge', false)
            ->assertDontSee($demoBrand);
    }

    public static function batch1TemplatesProvider(): array
    {
        return [
            [
                'strike-branding-creative',
                'professional-service',
                'professional-service/strike-branding-creative',
                'STUDIO BOLD®',
            ],
            [
                'blushbowl-diet-meal',
                'food-subscription',
                'food-subscription/blushbowl-diet-meal',
                'BlushBowl Nutrition',
            ],
            [
                'sodatable-family-meal-plan',
                'food-subscription',
                'food-subscription/sodatable-family-meal-plan',
                'SodaTable Family Kitchen',
            ],
            [
                'koharu-matcha-japanese-minimalist',
                'specialty-beverage',
                'specialty-beverage/koharu-matcha-japanese-minimalist',
                'Koharu Matcha',
            ],
            [
                'solenne-sugar-luxury-wedding-catering',
                'wedding-event',
                'wedding-event/solenne-sunshine',
                'Solenne & Sugar',
            ],
        ];
    }
}
