<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CustomerSiteAgricultureConfigTest extends TestCase
{
    use RefreshDatabase;

    #[DataProvider('templatesProvider')]
    public function test_all_agriculture_config_templates_publish_customer_site(string $slug, string $demoBrand): void
    {
        $siteConfigPath = match ($slug) {
            'agriculture-agribisnis-forest-moss' => 'agriculture&farming/corporate/agribisnis-forest-moss/agribisnis',
            'agriculture-agribisnis-earth-tone' => 'agriculture&farming/organic/agribisnis-earth-tone/agribisnis',
            'agriculture-farming-agribisnis-classic-trust' => 'agriculture&farming/professional/agribisnis-classic-trust/agribisnis',
        };

        $template = WebiaTemplate::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'category_slug' => 'agriculture-farming',
                'category_label' => 'Agriculture & Farming',
                'business_types' => ['Agribusiness'],
                'design_style' => 'Modern',
                'description' => 'Agribusiness config template.',
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
            'site_slug' => $slug.'-agri-config-test',
            'business_data' => [
                'business_name' => 'Agro Nusantara Sejahtera',
                'whatsapp' => '0812-9876-5432',
                'email' => 'halo@agronusantara.id',
                'address' => 'Jl. Agro No. 1, Surabaya',
            ],
        ]);

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));

        $response->assertOk()
            ->assertSee('Agro Nusantara Sejahtera')
            ->assertSee('6281298765432', false)
            ->assertSee('webia-native-ai-bridge', false)
            ->assertDontSee($demoBrand);
    }

    public static function templatesProvider(): array
    {
        return [
            ['agriculture-agribisnis-forest-moss', 'Green Harvest'],
            ['agriculture-agribisnis-earth-tone', 'AgroHarvest'],
            ['agriculture-farming-agribisnis-classic-trust', 'AgroTrade'],
        ];
    }

    public function test_unknown_agriculture_config_page_returns_404(): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => 'unknown-agriculture-config'],
            [
                'name' => 'Unknown Agriculture Config',
                'category_slug' => 'agriculture-farming',
                'category_label' => 'Agriculture & Farming',
                'business_types' => ['Agribusiness'],
                'design_style' => 'Modern',
                'description' => 'Agribusiness config template.',
                'site_config_path' => 'agriculture&farming/corporate/unknown-agribisnis/agribisnis',
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
            'site_slug' => 'unknown-agriculture-config',
            'business_data' => [
                'business_name' => 'Agro Nusantara Sejahtera',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $this->get('/s/'.$order->site_slug.'/halaman-tidak-ada')->assertNotFound();
    }
}
