<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CustomerSiteNewMergedTemplatesTest extends TestCase
{
    use RefreshDatabase;

    #[DataProvider('templatesProvider')]
    public function test_all_newly_merged_templates_publish_customer_site(string $slug, string $categorySlug, string $siteConfigPath, string $demoBrand): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'category_slug' => $categorySlug,
                'category_label' => ucwords(str_replace('-', ' ', $categorySlug)),
                'business_types' => ['Sample Business'],
                'design_style' => 'Modern',
                'description' => 'Test description.',
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
            'site_slug' => $slug.'-test',
            'business_data' => [
                'business_name' => 'Pustaka Wastra Nusantara',
                'whatsapp' => '0812-9876-5432',
                'email' => 'halo@pustakawastra.id',
                'address' => 'Jl. Kebangsaan No. 45, Jakarta',
            ],
        ]);

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));

        $response->assertOk()
            ->assertSee('Pustaka Wastra Nusantara')
            ->assertSee('6281298765432', false)
            ->assertSee('webia-native-ai-bridge', false)
            ->assertSee('bindLegacyDataChatContract', false)
            ->assertDontSee($demoBrand);
    }

    public static function templatesProvider(): array
    {
        return [
            [
                'kencana-wastra-traditional-costume-rental',
                'traditional-textiles-heritage-fashion',
                'traditional-costume-rental/kencana-wastra',
                'Kencana Wastra',
            ],
            [
                'libraries-digital-archives-digital-library-arctic-frost',
                'libraries-digital-archives',
                'libraries-digital-archives/academic-minimalist/digital-library-platform-arctic-frost/digital-library-platform',
                'Digital Library',
            ],
            [
                'libraries-digital-archives-digital-library-ocean-blue',
                'libraries-digital-archives',
                'libraries-digital-archives/modern/digital-library-platform-ocean-blue/digital-library',
                'Digital Library',
            ],
            [
                'libraries-digital-archives-historical-document-archive-burgundy-classic',
                'libraries-digital-archives',
                'libraries-digital-archives/vintage-editorial/historical-document-archive-burgundy-classic/historical-document-archive',
                'Historical Document Archive',
            ],
        ];
    }

    public function test_digital_library_subpage_publishes_correctly(): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => 'libraries-digital-archives-digital-library-arctic-frost'],
            [
                'name' => 'Digital Library Arctic Frost',
                'category_slug' => 'libraries-digital-archives',
                'category_label' => 'Libraries & Digital Archives',
                'business_types' => ['Digital Library Platform'],
                'design_style' => 'Academic Minimalist',
                'description' => 'Test description.',
                'site_config_path' => 'libraries-digital-archives/academic-minimalist/digital-library-platform-arctic-frost/digital-library-platform',
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
            'site_slug' => 'arctic-library-sub-test',
            'business_data' => [
                'business_name' => 'Pustaka Cendekia',
                'whatsapp' => '0812-9876-5432',
                'email' => 'halo@pustakacendekia.id',
            ],
        ]);

        $this->get('/s/'.$order->site_slug.'/katalog')
            ->assertOk()
            ->assertSee('Pustaka Cendekia')
            ->assertSee('webia-native-ai-bridge', false)
            ->assertSee('bindLegacyDataChatContract', false);

        $this->get('/s/'.$order->site_slug.'/halaman-tidak-ada')->assertNotFound();
    }

    public function test_historical_document_archive_subpage_and_detail_publish_correctly(): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => 'libraries-digital-archives-historical-document-archive-burgundy-classic'],
            [
                'name' => 'Historical Document Archive',
                'category_slug' => 'libraries-digital-archives',
                'category_label' => 'Libraries & Digital Archives',
                'business_types' => ['Historical Document Archive'],
                'design_style' => 'Vintage Editorial',
                'description' => 'Test description.',
                'site_config_path' => 'libraries-digital-archives/vintage-editorial/historical-document-archive-burgundy-classic/historical-document-archive',
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
            'site_slug' => 'history-archive-sub-test',
            'business_data' => [
                'business_name' => 'Arsip Kuno Nusantara',
                'whatsapp' => '0812-9876-5432',
                'email' => 'halo@arsipkuno.id',
            ],
        ]);

        $this->get('/s/'.$order->site_slug.'/collections')
            ->assertOk()
            ->assertSee('Arsip Kuno Nusantara')
            ->assertSee('webia-native-ai-bridge', false)
            ->assertSee('bindLegacyDataChatContract', false);

        $this->get('/s/'.$order->site_slug.'/collections/cartography-through-the-ages')
            ->assertOk()
            ->assertSee('Arsip Kuno Nusantara')
            ->assertSee('webia-native-ai-bridge', false)
            ->assertSee('bindLegacyDataChatContract', false);

        $this->get('/s/'.$order->site_slug.'/collections/koleksi-tidak-ada')->assertNotFound();
    }
}
