<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CustomerSiteHealthcareStandaloneTest extends TestCase
{
    use RefreshDatabase;

    #[DataProvider('templatesProvider')]
    public function test_all_healthcare_templates_publish_customer_site(string $slug, string $demoBrand, bool $hasWa = true): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'category_slug' => 'healthcare',
                'category_label' => 'Healthcare',
                'business_types' => ['Healthcare'],
                'design_style' => 'Modern',
                'description' => 'Healthcare template.',
                'site_config_path' => 'healthcare-standalone/'.$slug,
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
            'site_slug' => $slug.'-healthcare-test',
            'business_data' => [
                'business_name' => 'Klinik Sehat Nusantara',
                'whatsapp' => '0812-9876-5432',
                'address' => 'Jl. Sehat No. 3, Jakarta',
                'email' => 'halo@kliniksehat.id',
            ],
        ]);

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));

        $response->assertOk()
            ->assertSee('Klinik Sehat Nusantara')
            ->assertSee('webia-native-ai-bridge', false)
            ->assertDontSee($demoBrand);

        if ($hasWa) {
            $response->assertSee('6281298765432', false);
        }
    }

    public static function templatesProvider(): array
    {
        return [
            ['healthcare-dental-azure', 'Azure Smile', false],
            ['healthcare-dental-mint', 'Mint Dental', false],
            ['healthcare-dental-sunset', 'GlowDental', true],
            ['mitra-jiwa-psikologi-konseling', 'Mitra Jiwa', true],
            ['ruang-tenang-psikologi-konseling', 'Ruang Tenang', true],
        ];
    }

    public function test_unknown_healthcare_page_returns_404(): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => 'unknown-healthcare-standalone'],
            [
                'name' => 'Unknown Healthcare',
                'category_slug' => 'healthcare',
                'category_label' => 'Healthcare',
                'business_types' => ['Healthcare'],
                'design_style' => 'Modern',
                'description' => 'Healthcare template.',
                'site_config_path' => 'healthcare-standalone/unknown-healthcare-standalone',
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
            'site_slug' => 'unknown-healthcare-standalone',
            'business_data' => [
                'business_name' => 'Klinik Sehat Nusantara',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $this->get('/s/'.$order->site_slug.'/halaman-tidak-ada')->assertNotFound();
    }
}
