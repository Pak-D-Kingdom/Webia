<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CustomerSiteNonprofitTest extends TestCase
{
    use RefreshDatabase;

    private function template(string $slug): WebiaTemplate
    {
        return WebiaTemplate::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'category_slug' => 'nonprofit-community',
                'category_label' => 'Nonprofit & Community',
                'business_types' => ['Nonprofit & Community'],
                'design_style' => 'Modern',
                'description' => 'Nonprofit template.',
                'site_config_path' => 'nonprofit-community/'.$slug,
                'is_active' => true,
            ]
        );
    }

    #[DataProvider('nonprofitTemplatesProvider')]
    public function test_all_nonprofit_templates_publish_and_render_customer_site(string $slug, string $demoBrand): void
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
            'site_slug' => $slug.'-nonprofit-test',
            'business_data' => [
                'business_name' => 'Peduli Nusantara',
                'whatsapp' => '0812-9876-5432',
                'address' => 'Jl. Peduli No. 1, Jakarta',
                'city' => 'Jakarta',
                'email' => 'halo@pedulinusantara.org',
            ],
        ]);

        $this->assertTrue($order->supportsCustomerSite());

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));
        $response->assertOk()
            ->assertSee('Peduli Nusantara')
            ->assertSee('6281298765432', false)
            ->assertSee('webia-native-ai-bridge', false)
            ->assertDontSee($demoBrand);
    }

    public static function nonprofitTemplatesProvider(): array
    {
        return [
            ['relakita-volunteer-warm-sunrise', 'Relakita'],
            ['kolektif-aksi-kita-volunteer-midnight-navy', 'Kolektif Aksi Kita'],
            ['revolt-impact-social-organization', 'REVOLT // IMPACT'],
            ['lentera-nusantara-volunteer-group', 'Lentera Nusantara'],
        ];
    }

    public function test_unknown_nonprofit_page_returns_404(): void
    {
        $template = $this->template('relakita-volunteer-warm-sunrise');

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
            'site_slug' => 'relakita-nonprofit-test',
            'business_data' => [
                'business_name' => 'Peduli Nusantara',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $this->get('/s/relakita-nonprofit-test/halaman-tidak-ada')->assertNotFound();
    }
}
