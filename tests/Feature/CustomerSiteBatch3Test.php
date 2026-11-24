<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CustomerSiteBatch3Test extends TestCase
{
    use RefreshDatabase;

    #[DataProvider('batch3TemplatesProvider')]
    public function test_batch3_templates_publish_customer_site(string $slug, string $categorySlug, string $siteConfigPath, string $demoBrand): void
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

    public static function batch3TemplatesProvider(): array
    {
        return [
            [
                'arsip-kain-heritage-editorial',
                'traditional-textiles-heritage-fashion',
                'traditional-textiles/arsip-kain-heritage-editorial',
                'Arsip Kain',
            ],
            [
                'aethelgard-digital-museum',
                'education-culture',
                'education-culture/aethelgard-digital-museum',
                'Aethelgard',
            ],
            [
                'aquaverse-interactive-heritage',
                'education-culture',
                'education-culture/aquaverse-interactive-heritage',
                'Aquaverse',
            ],
            [
                'rubra-memoria-artistic-heritage',
                'education-culture',
                'education-culture/rubra-memoria-artistic-heritage',
                'Rubra Memoria',
            ],
        ];
    }
}
