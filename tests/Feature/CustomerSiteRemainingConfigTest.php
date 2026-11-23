<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CustomerSiteRemainingConfigTest extends TestCase
{
    use RefreshDatabase;

    #[DataProvider('templatesProvider')]
    public function test_all_remaining_config_templates_publish_customer_site(string $slug, string $siteConfigPath, string $demoBrand): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'category_slug' => str_contains($slug, 'photography') ? 'photography-creative-studio' : 'home-services',
                'category_label' => str_contains($slug, 'photography') ? 'Photography & Creative Studio' : 'Home Services',
                'business_types' => [str_contains($slug, 'photography') ? 'UGC Content Creator Studio' : 'Home Renovation & Repair'],
                'design_style' => 'Modern',
                'description' => 'Remaining config template.',
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
            'site_slug' => $slug.'-remaining-test',
            'business_data' => [
                'business_name' => 'Rumah Impian Nusantara',
                'whatsapp' => '0812-9876-5432',
                'email' => 'halo@rumahimpian.id',
                'address' => 'Jl. Impian No. 1, Jakarta',
            ],
        ]);

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));

        $response->assertOk()
            ->assertSee('Rumah Impian Nusantara')
            ->assertSee('6281298765432', false)
            ->assertSee('webia-native-ai-bridge', false)
            ->assertDontSee($demoBrand);
    }

    public static function templatesProvider(): array
    {
        return [
            ['home-services-renovation-repair-sage-green', 'home-services/organic/home-renovation-repair-sage-green/home-renovation-repair', 'Renovaku'],
            ['home-services-renovation-repair-chocolate-luxe', 'home-services/vintage/home-renovation-repair-chocolate-luxe/home-renovation-repair', 'Renovate'],
            ['photography-ugc-content-creator-studio-dark-mode', 'photography-creative-studio/futuristic/ugc-content-creator-studio-dark-mode/ugc-content-creator-studio', 'SOROT Studio'],
        ];
    }

    public function test_unknown_remaining_page_returns_404(): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => 'unknown-remaining-config'],
            [
                'name' => 'Unknown Remaining Config',
                'category_slug' => 'home-services',
                'category_label' => 'Home Services',
                'business_types' => ['Home Renovation & Repair'],
                'design_style' => 'Modern',
                'description' => 'Remaining config template.',
                'site_config_path' => 'home-services/organic/unknown-remaining/home-renovation-repair',
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
            'site_slug' => 'unknown-remaining-config',
            'business_data' => [
                'business_name' => 'Rumah Impian Nusantara',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $this->get('/s/'.$order->site_slug.'/halaman-tidak-ada')->assertNotFound();
    }
}
