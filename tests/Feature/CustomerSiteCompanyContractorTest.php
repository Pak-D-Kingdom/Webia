<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CustomerSiteCompanyContractorTest extends TestCase
{
    use RefreshDatabase;

    #[DataProvider('templatesProvider')]
    public function test_all_contractor_templates_publish_customer_site(string $slug, string $demoBrand): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'category_slug' => 'company',
                'category_label' => 'Company',
                'business_types' => ['Contractor'],
                'design_style' => 'Professional',
                'description' => 'Contractor template.',
                'site_config_path' => 'company-contractor/'.$slug,
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
            'site_slug' => $slug.'-contractor-test',
            'business_data' => [
                'business_name' => 'Karya Bangun Sejahtera',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));

        $response->assertOk()
            ->assertSee('Karya Bangun Sejahtera')
            ->assertSee('6281298765432', false)
            ->assertSee('webia-native-ai-bridge', false)
            ->assertDontSee($demoBrand);
    }

    public static function templatesProvider(): array
    {
        return [
            ['bangun-karsa-contractor-professional', 'Bangun Karsa'],
            ['langit-karya-contractor-minimalist', 'Langit Karya'],
        ];
    }

    public function test_unknown_contractor_page_returns_404(): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => 'unknown-company-contractor'],
            [
                'name' => 'Unknown Company Contractor',
                'category_slug' => 'company',
                'category_label' => 'Company',
                'business_types' => ['Contractor'],
                'design_style' => 'Professional',
                'description' => 'Contractor template.',
                'site_config_path' => 'company-contractor/unknown-company-contractor',
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
            'site_slug' => 'unknown-company-contractor',
            'business_data' => [
                'business_name' => 'Karya Bangun Sejahtera',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $this->get('/s/'.$order->site_slug.'/halaman-tidak-ada')->assertNotFound();
    }
}
