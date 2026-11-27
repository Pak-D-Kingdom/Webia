<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CustomerSiteBatch6Test extends TestCase
{
    use RefreshDatabase;

    #[DataProvider('batch6TemplatesProvider')]
    public function test_batch6_templates_publish_customer_site(string $slug, string $categorySlug, string $siteConfigPath, string $demoBrand): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'category_slug' => $categorySlug,
                'category_label' => ucwords(str_replace('-', ' ', $categorySlug)),
                'business_types' => ['Professional Service'],
                'design_style' => 'Artistic',
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
                'business_name' => 'Bintang Nusantara Group',
                'whatsapp' => '0812-9988-7766',
                'email' => 'halo@bintangnusantara.id',
                'address' => 'Jl. Bintang Utama No. 12, Surabaya',
            ],
        ]);

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));

        $response->assertOk()
            ->assertSee('Bintang Nusantara Group')
            ->assertSee('6281299887766', false)
            ->assertSee('webia-native-ai-bridge', false)
            ->assertDontSee($demoBrand);
    }

    public static function batch6TemplatesProvider(): array
    {
        return [
            [
                'professional-service-branding-creative-agency-terracotta',
                'professional-service',
                'professional-service/artistic/branding-creative-agency-terracotta/branding-creative-agency',
                'Senja Atelier',
            ],
            [
                'vanguard-lawyer',
                'professional-service',
                'professional-service/vanguard-lawyer',
                'Vanguard Heritage Counsel',
            ],
            [
                'verba-translation-interpreter',
                'professional-service',
                'professional-service/verba-translation-interpreter',
                'VERBA',
            ],
            [
                'hearthstone-property',
                'property',
                'property-standalone/hearthstone-property',
                'Hearthstone',
            ],
        ];
    }
}
