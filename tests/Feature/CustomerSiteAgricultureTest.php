<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CustomerSiteAgricultureTest extends TestCase
{
    use RefreshDatabase;

    private function template(string $slug): WebiaTemplate
    {
        return WebiaTemplate::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'category_slug' => 'agriculture',
                'category_label' => 'Agriculture & Farming',
                'business_types' => ['Agriculture & Farming'],
                'design_style' => 'Modern',
                'description' => 'Agriculture template.',
                'site_config_path' => 'agriculture/'.$slug,
                'is_active' => true,
            ]
        );
    }

    #[DataProvider('agricultureTemplatesProvider')]
    public function test_all_agriculture_templates_publish_and_render_customer_site(string $slug, string $demoBrand): void
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
            'site_slug' => $slug.'-agri-test',
            'business_data' => [
                'business_name' => 'Tani Nusantara',
                'whatsapp' => '0812-9876-5432',
                'address' => 'Jl. Tani No. 1, Bogor',
                'city' => 'Bogor',
                'email' => 'halo@taninusantara.id',
            ],
        ]);

        $this->assertTrue($order->supportsCustomerSite());

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));
        $response->assertOk()
            ->assertSee('Tani Nusantara')
            ->assertSee('6281298765432', false)
            ->assertSee('webia-native-ai-bridge', false)
            ->assertDontSee($demoBrand);
    }

    public static function agricultureTemplatesProvider(): array
    {
        return [
            ['agriternak-organic-ethical-precision', 'AgriTernak'],
            ['agriternak-futuristic-iot', 'AgriTernak'],
            ['agriternak-bold-livestock', 'AgriTernak'],
            ['agriculture-peralatanpertanian-corporate-sagegreen-putri', 'AgroPratama'],
            ['agriculture-peralatanpertanian-creative-matchalatte-putri', 'MatchaAgro'],
            ['agriculture-peralatanpertanian-playfulcolorful-arcticfrost-putri', 'FrostyAgro'],
        ];
    }

    public function test_unknown_agriculture_page_returns_404(): void
    {
        $template = $this->template('agriternak-bold-livestock');

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
            'site_slug' => 'agriternak-agri-test',
            'business_data' => [
                'business_name' => 'Tani Nusantara',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $this->get('/s/agriternak-agri-test/halaman-tidak-ada')->assertNotFound();
    }
}
