<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CustomerSiteTransportationTest extends TestCase
{
    use RefreshDatabase;

    private function template(string $slug): WebiaTemplate
    {
        return WebiaTemplate::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'category_slug' => 'transportation-logistics',
                'category_label' => 'Transportation & Logistics',
                'business_types' => ['Logistics & Moving'],
                'design_style' => 'Modern',
                'description' => 'Transportation & Logistics template.',
                'site_config_path' => 'transportation-logistics/'.$slug,
                'is_active' => true,
            ]
        );
    }

    #[DataProvider('transportationTemplatesProvider')]
    public function test_all_transportation_templates_publish_and_render_customer_site(string $slug): void
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
            'site_slug' => $slug.'-test-site',
            'business_data' => [
                'business_name' => 'Nusantara Express & Cargo',
                'whatsapp' => '0812-9876-5432',
                'address' => 'Jl. Gatot Subroto No. 88, Jakarta Selatan',
                'city' => 'Jakarta Selatan',
            ],
        ]);

        $this->assertTrue($order->supportsCustomerSite());

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));
        $response->assertOk()
            ->assertSee('Nusantara Express', false)
            ->assertSee('6281298765432', false)
            ->assertSee('webia-native-ai-bridge', false);
    }

    public static function transportationTemplatesProvider(): array
    {
        return [
            ['cocoexpress-delivery-service'],
            ['reloko-moving-company'],
            ['logistics-company-classic-trust'],
            ['transportation-logistics-company-midnight-navy'],
            ['logistics-company-orange-energy'],
            ['delivery-service-emerald-express'],
            ['moving-company-navy-hearth'],
            ['moving-company-rose-atelier'],
        ];
    }

    public function test_multipage_transportation_subpage_renders_and_remaps_navigation(): void
    {
        $slug = 'logistics-company-classic-trust';
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
            'site_slug' => 'nusa-logistik-site',
            'business_data' => [
                'business_name' => 'Nusantara Express & Cargo',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $response = $this->get('/s/nusa-logistik-site/layanan');
        $response->assertOk()
            ->assertSee('Nusantara Express', false)
            ->assertSee('/s/nusa-logistik-site/opsi-pengiriman', false)
            ->assertDontSee('/webia/template/logistics-company-classic-trust', false);

        $invalidPage = $this->get('/s/nusa-logistik-site/non-existent-page');
        $invalidPage->assertNotFound();
    }

    public function test_midnight_navy_subpage_renders_and_remaps_navigation(): void
    {
        $slug = 'transportation-logistics-company-midnight-navy';
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
            'site_slug' => 'midnight-navy-site',
            'business_data' => [
                'business_name' => 'Nusantara Cargo Modern',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $response = $this->get('/s/midnight-navy-site/layanan');
        $response->assertOk()
            ->assertSee('Nusantara Cargo Modern')
            ->assertDontSee('/webia/template/transportation-logistics/modern/logistics-company-midnight-navy', false);

        $invalidPage = $this->get('/s/midnight-navy-site/page-tidak-ada');
        $invalidPage->assertNotFound();
    }

    public function test_orange_energy_subpage_renders_and_remaps_navigation(): void
    {
        $slug = 'logistics-company-orange-energy';
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
            'site_slug' => 'orange-energy-site',
            'business_data' => [
                'business_name' => 'Nusantara Energy Logistics',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $response = $this->get('/s/orange-energy-site/layanan');
        $response->assertOk()
            ->assertSee('Nusantara Energy Logistics')
            ->assertDontSee('/webia/template/transportation-logistics/bold/logistics-company-orange-energy', false);

        $invalidPage = $this->get('/s/orange-energy-site/page-tidak-ada');
        $invalidPage->assertNotFound();
    }
}
