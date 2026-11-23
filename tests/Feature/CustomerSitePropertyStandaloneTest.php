<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CustomerSitePropertyStandaloneTest extends TestCase
{
    use RefreshDatabase;

    #[DataProvider('templatesProvider')]
    public function test_all_property_templates_publish_customer_site(string $slug, string $demoBrand): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'category_slug' => 'property',
                'category_label' => 'Property',
                'business_types' => ['Property'],
                'design_style' => 'Modern',
                'description' => 'Property template.',
                'site_config_path' => 'property-standalone/'.$slug,
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
            'site_slug' => $slug.'-property-test',
            'business_data' => [
                'business_name' => 'Rumah Nusantara Property',
                'whatsapp' => '0812-9876-5432',
                'address' => 'Jl. Properti No. 5, Jakarta',
                'email' => 'halo@rumahnusantara.id',
            ],
        ]);

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));

        $response->assertOk()
            ->assertSee('Rumah Nusantara Property')
            ->assertSee('6281298765432', false)
            ->assertSee('webia-native-ai-bridge', false)
            ->assertDontSee($demoBrand);
    }

    public static function templatesProvider(): array
    {
        return [
            ['denim-horizon-property-minimalist', 'Denim Horizon'],
            ['pusaka-asri-property-traditional', 'Pusaka Asri'],
        ];
    }

    public function test_unknown_property_page_returns_404(): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => 'unknown-property-standalone'],
            [
                'name' => 'Unknown Property',
                'category_slug' => 'property',
                'category_label' => 'Property',
                'business_types' => ['Property'],
                'design_style' => 'Modern',
                'description' => 'Property template.',
                'site_config_path' => 'property-standalone/unknown-property-standalone',
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
            'site_slug' => 'unknown-property-standalone',
            'business_data' => [
                'business_name' => 'Rumah Nusantara Property',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $this->get('/s/'.$order->site_slug.'/halaman-tidak-ada')->assertNotFound();
    }
}
