<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CustomerSiteHomeServicesTest extends TestCase
{
    use RefreshDatabase;

    private function template(string $slug): WebiaTemplate
    {
        return WebiaTemplate::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'category_slug' => 'home-services',
                'category_label' => 'Home Services',
                'business_types' => ['Home Services'],
                'design_style' => 'Modern',
                'description' => 'Home Services template.',
                'site_config_path' => 'home-services/'.$slug,
                'is_active' => true,
            ]
        );
    }

    #[DataProvider('homeServicesTemplatesProvider')]
    public function test_all_home_services_templates_publish_and_render_customer_site(string $slug, string $demoBrand): void
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
            'site_slug' => $slug.'-home-test',
            'business_data' => [
                'business_name' => 'Bersih Nusantara',
                'whatsapp' => '0812-9876-5432',
                'address' => 'Jl. Bersih No. 1, Jakarta',
                'city' => 'Jakarta',
                'email' => 'halo@bersihnusantara.id',
            ],
        ]);

        $this->assertTrue($order->supportsCustomerSite());

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));
        $response->assertOk()
            ->assertSee('Bersih Nusantara')
            ->assertSee('6281298765432', false)
            ->assertSee('webia-native-ai-bridge', false)
            ->assertDontSee($demoBrand);
    }

    public static function homeServicesTemplatesProvider(): array
    {
        return [
            ['madubersih-home-cleaning-vintage', 'MaduBersih'],
            ['astroclean-home-cleaning-cosmic', 'AstroClean'],
            ['matcha-clean-organic-deep-cleaning', 'MATCHA CLEAN'],
            ['aurelia-home-renovation', 'AURELIA'],
        ];
    }

    public function test_unknown_home_services_page_returns_404(): void
    {
        $template = $this->template('astroclean-home-cleaning-cosmic');

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
            'site_slug' => 'astroclean-home-test',
            'business_data' => [
                'business_name' => 'Bersih Nusantara',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $this->get('/s/astroclean-home-test/halaman-tidak-ada')->assertNotFound();
    }
}
