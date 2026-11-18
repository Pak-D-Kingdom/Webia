<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CustomerSiteTechnologyTest extends TestCase
{
    use RefreshDatabase;

    private function template(string $slug): WebiaTemplate
    {
        return WebiaTemplate::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'category_slug' => 'technology-it',
                'category_label' => 'Technology & IT',
                'business_types' => ['Software House & IT Services'],
                'design_style' => 'Modern',
                'description' => 'Technology IT template.',
                'site_config_path' => 'technology/'.$slug,
                'is_active' => true,
            ]
        );
    }

    #[DataProvider('technologyTemplatesProvider')]
    public function test_all_technology_templates_publish_and_render_customer_site(string $slug): void
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
            'site_slug' => $slug.'-tech-test',
            'business_data' => [
                'business_name' => 'Sinergi Solusi Digital',
                'whatsapp' => '0899-5544-3322',
                'address' => 'Gedung Cyber 2 Lantai 12',
                'city' => 'Jakarta Selatan',
            ],
        ]);

        $this->assertTrue($order->supportsCustomerSite());

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));
        $response->assertOk()
            ->assertSee('Sinergi Solusi Digital')
            ->assertSee('6289955443322', false)
            ->assertSee('webia-client-ai-widget', false);
    }

    public static function technologyTemplatesProvider(): array
    {
        return [
            ['technology-softwarehouse-professional'],
            ['technology-softwarehouse-elegant-babyblue-putri'],
            ['technology-softwarehouse-minimalist-softpink-putri'],
            ['technology-dataanalytics-luxury-pastelmix-putri'],
            ['technology-dataanalytics-corporate-oceanteal-putri'],
            ['technology-dataanalytics-creative-arcticfrost-putri'],
            ['sakuratech-hardware-computer-networking'],
            ['sakurabit-hardware-computer-networking'],
            ['cyberwave-hardware-computer-networking'],
            ['aetherion-digital-hardware-universe'],
        ];
    }
}
