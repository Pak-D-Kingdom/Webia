<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CustomerSiteInteriorConfigTest extends TestCase
{
    use RefreshDatabase;

    #[DataProvider('templatesProvider')]
    public function test_all_interior_config_templates_publish_customer_site(string $slug, string $demoBrand): void
    {
        $siteConfigPath = match ($slug) {
            'interior-furniture-rustic-terracotta' => 'interior&architecture/rustic/furniture-terracotta/furniture',
            'interior-furniture-mocha-cream' => 'interior&architecture/premium-minimal/furniture-mocha-cream/furniture',
            'interior-furniture-chocolate-luxe' => 'interior&architecture/luxury/furniture-chocolate-luxe/furniture',
        };

        $template = WebiaTemplate::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'category_slug' => 'interior-architecture',
                'category_label' => 'Interior & Architecture',
                'business_types' => ['Furniture'],
                'design_style' => 'Modern',
                'description' => 'Interior config template.',
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
            'site_slug' => $slug.'-interior-config-test',
            'business_data' => [
                'business_name' => 'Mebel Nusantara',
                'whatsapp' => '0812-9876-5432',
                'email' => 'halo@mebelnusantara.id',
                'address' => 'Jl. Mebel No. 5, Bandung',
            ],
        ]);

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));

        $response->assertOk()
            ->assertSee('Mebel Nusantara')
            ->assertSee('6281298765432', false)
            ->assertSee('webia-native-ai-bridge', false)
            ->assertDontSee($demoBrand);
    }

    public static function templatesProvider(): array
    {
        return [
            ['interior-furniture-rustic-terracotta', 'RusticFurni'],
            ['interior-furniture-mocha-cream', 'WoodenLane'],
            ['interior-furniture-chocolate-luxe', 'LuxeFurni'],
        ];
    }

    public function test_unknown_interior_config_page_returns_404(): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => 'unknown-interior-config'],
            [
                'name' => 'Unknown Interior Config',
                'category_slug' => 'interior-architecture',
                'category_label' => 'Interior & Architecture',
                'business_types' => ['Furniture'],
                'design_style' => 'Modern',
                'description' => 'Interior config template.',
                'site_config_path' => 'interior&architecture/rustic/unknown/furniture',
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
            'site_slug' => 'unknown-interior-config',
            'business_data' => [
                'business_name' => 'Mebel Nusantara',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $this->get('/s/'.$order->site_slug.'/halaman-tidak-ada')->assertNotFound();
    }
}
