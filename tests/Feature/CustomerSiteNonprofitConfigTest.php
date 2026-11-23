<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CustomerSiteNonprofitConfigTest extends TestCase
{
    use RefreshDatabase;

    #[DataProvider('templatesProvider')]
    public function test_all_nonprofit_config_templates_publish_customer_site(string $slug, string $demoBrand): void
    {
        $siteConfigPath = match ($slug) {
            'nonprofit-foundation-classic-trust' => 'nonprofit&community/professional/foundation-classic-trust/foundation',
            'nonprofit-foundation-nature-green' => 'nonprofit&community/creative/foundation-nature-green/foundation',
            'nonprofit-foundation-warm-neutral' => 'nonprofit&community/minimalis/foundation-warm-neutral/foundation',
            'nonprofit-social-organization-citrus-pop' => 'nonprofit&community/bold/social-organization-citrus-pop/social-organization',
            'nonprofit-social-organization-tropical-rush' => 'nonprofit&community/creative/social-organization-tropical-rush/social-organization',
        };

        $template = WebiaTemplate::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'category_slug' => 'nonprofit-community',
                'category_label' => 'Non-Profit & Community',
                'business_types' => ['Non-Profit'],
                'design_style' => 'Modern',
                'description' => 'Non-profit config template.',
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
            'site_slug' => $slug.'-nonprofit-config-test',
            'business_data' => [
                'business_name' => 'Yayasan Harapan Bersama',
                'whatsapp' => '0812-9876-5432',
                'email' => 'halo@harapanbersama.id',
                'address' => 'Jl. Harapan No. 1, Jakarta',
            ],
        ]);

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));

        $response->assertOk()
            ->assertSee('Yayasan Harapan Bersama')
            ->assertSee('6281298765432', false)
            ->assertSee('webia-native-ai-bridge', false)
            ->assertDontSee($demoBrand);
    }

    public static function templatesProvider(): array
    {
        return [
            ['nonprofit-foundation-classic-trust', 'Harapan Untuk Negeri'],
            ['nonprofit-foundation-nature-green', 'GreenHope'],
            ['nonprofit-foundation-warm-neutral', 'HopeTogether'],
            ['nonprofit-social-organization-citrus-pop', 'SegarKita'],
            ['nonprofit-social-organization-tropical-rush', 'Gerak Nusa'],
        ];
    }

    public function test_unknown_nonprofit_config_page_returns_404(): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => 'unknown-nonprofit-config'],
            [
                'name' => 'Unknown Nonprofit Config',
                'category_slug' => 'nonprofit-community',
                'category_label' => 'Non-Profit & Community',
                'business_types' => ['Non-Profit'],
                'design_style' => 'Modern',
                'description' => 'Non-profit config template.',
                'site_config_path' => 'nonprofit&community/creative/unknown/foundation',
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
            'site_slug' => 'unknown-nonprofit-config',
            'business_data' => [
                'business_name' => 'Yayasan Harapan Bersama',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $this->get('/s/'.$order->site_slug.'/halaman-tidak-ada')->assertNotFound();
    }
}
