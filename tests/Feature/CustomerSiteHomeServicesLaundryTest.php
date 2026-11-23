<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CustomerSiteHomeServicesLaundryTest extends TestCase
{
    use RefreshDatabase;

    #[DataProvider('templatesProvider')]
    public function test_all_laundry_templates_publish_customer_site(string $slug): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'category_slug' => 'home-services',
                'category_label' => 'Home Services',
                'business_types' => ['Laundry Service'],
                'design_style' => 'Modern',
                'description' => 'Laundry template.',
                'site_config_path' => match ($slug) {
                    'home-services-laundry-baby-blue' => 'home-services/modern/laundry-baby-blue/laundry',
                    'home-services-laundry-mint-fresh' => 'home-services/minimalis/laundry-mint-fresh/laundry',
                    'home-services-laundry-classic-trust' => 'home-services/professional/laundry-classic-trust/laundry',
                },
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
            'site_slug' => $slug.'-laundry-test',
            'business_data' => [
                'business_name' => 'Laundry Bersih Nusantara',
                'whatsapp' => '0812-9876-5432',
                'address' => 'Jl. Laundry No. 1, Surabaya',
                'email' => 'halo@laundrybersih.id',
            ],
        ]);

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));

        $response->assertOk()
            ->assertSee('Laundry Bersih Nusantara')
            ->assertSee('6281298765432', false)
            ->assertSee('webia-native-ai-bridge', false);
    }

    public static function templatesProvider(): array
    {
        return [
            ['home-services-laundry-baby-blue'],
            ['home-services-laundry-mint-fresh'],
            ['home-services-laundry-classic-trust'],
        ];
    }

    public function test_unknown_laundry_page_returns_404(): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => 'unknown-home-services-laundry'],
            [
                'name' => 'Unknown Laundry',
                'category_slug' => 'home-services',
                'category_label' => 'Home Services',
                'business_types' => ['Laundry Service'],
                'design_style' => 'Modern',
                'description' => 'Laundry template.',
                'site_config_path' => 'home-services/modern/unknown-laundry/laundry',
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
            'site_slug' => 'unknown-home-services-laundry',
            'business_data' => [
                'business_name' => 'Laundry Bersih Nusantara',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $this->get('/s/'.$order->site_slug.'/halaman-tidak-ada')->assertNotFound();
    }
}
