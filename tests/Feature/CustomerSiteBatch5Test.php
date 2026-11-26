<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CustomerSiteBatch5Test extends TestCase
{
    use RefreshDatabase;

    #[DataProvider('batch5TemplatesProvider')]
    public function test_batch5_templates_publish_customer_site(string $slug, string $siteConfigPath, string $demoBrand): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'category_slug' => 'company',
                'category_label' => 'Company',
                'business_types' => ['Logistics & Supply Chain'],
                'design_style' => 'Corporate',
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

    public static function batch5TemplatesProvider(): array
    {
        return [
            [
                'zamrud-karya-contractor-luxury',
                'company-contractor/zamrud-karya-contractor-luxury',
                'Zamrud Karya',
            ],
            [
                'nusavektor-logistics-corporate',
                'transportation-logistics/nusavektor-logistics-corporate',
                'NusaVektor',
            ],
            [
                'paketdream-logistics-creative',
                'transportation-logistics/paketdream-logistics-creative',
                'PaketDream',
            ],
        ];
    }
}
