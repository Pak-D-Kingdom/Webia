<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CustomerSiteTravelConfigTest extends TestCase
{
    use RefreshDatabase;

    #[DataProvider('templatesProvider')]
    public function test_all_travel_config_templates_publish_customer_site(string $slug, string $demoBrand): void
    {
        $siteConfigPath = match ($slug) {
            'travel-agent-ocean-teal' => 'travel&tourism/modern/travel-agent-ocean-teal/travel-agent',
            'travel-agent-forest-moss' => 'travel&tourism/organic/travel-agent-forest-moss/travel-agent',
            'travel-agent-navy-champagne-gold' => 'travel&tourism/luxury/travel-agent-navy-champagne-gold/travel-agent',
        };

        $template = WebiaTemplate::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'category_slug' => 'travel-tourism',
                'category_label' => 'Travel & Tourism',
                'business_types' => ['Travel Agent'],
                'design_style' => 'Modern',
                'description' => 'Travel config template.',
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
            'site_slug' => $slug.'-travel-config-test',
            'business_data' => [
                'business_name' => 'Travel Nusantara',
                'whatsapp' => '0812-9876-5432',
                'email' => 'halo@travelnusantara.id',
                'address' => 'Jl. Travel No. 1, Jakarta',
            ],
        ]);

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));

        $response->assertOk()
            ->assertSee('Travel Nusantara')
            ->assertSee('6281298765432', false)
            ->assertSee('webia-native-ai-bridge', false)
            ->assertDontSee($demoBrand);
    }

    public static function templatesProvider(): array
    {
        return [
            ['travel-agent-ocean-teal', 'OceanJourney'],
            ['travel-agent-forest-moss', 'GreenTrip'],
            ['travel-agent-navy-champagne-gold', 'GrandJourney'],
        ];
    }

    public function test_unknown_travel_config_page_returns_404(): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => 'unknown-travel-config'],
            [
                'name' => 'Unknown Travel Config',
                'category_slug' => 'travel-tourism',
                'category_label' => 'Travel & Tourism',
                'business_types' => ['Travel Agent'],
                'design_style' => 'Modern',
                'description' => 'Travel config template.',
                'site_config_path' => 'travel&tourism/modern/unknown-travel/travel-agent',
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
            'site_slug' => 'unknown-travel-config',
            'business_data' => [
                'business_name' => 'Travel Nusantara',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $this->get('/s/'.$order->site_slug.'/halaman-tidak-ada')->assertNotFound();
    }
}
