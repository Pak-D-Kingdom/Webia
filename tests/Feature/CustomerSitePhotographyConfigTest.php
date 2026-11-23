<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerSitePhotographyConfigTest extends TestCase
{
    use RefreshDatabase;

    public function test_ugc_pink_voltage_publishes_customer_site(): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => 'photography-ugc-content-creator-studio-pink-voltage'],
            [
                'name' => 'UGC Content Creator Studio Pink Voltage',
                'category_slug' => 'photography-creative-studio',
                'category_label' => 'Photography & Creative Studio',
                'business_types' => ['UGC Content Creator Studio'],
                'design_style' => 'Bold',
                'description' => 'UGC template.',
                'site_config_path' => 'photography-creative-studio/bold/ugc-content-creator-studio-pink-voltage/ugc-content-creator-studio',
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
            'site_slug' => 'volt-studio-test',
            'business_data' => [
                'business_name' => 'Konten Kreatif Nusantara',
                'whatsapp' => '0812-9876-5432',
                'email' => 'halo@kontenkreatif.id',
            ],
        ]);

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));

        $response->assertOk()
            ->assertSee('Konten Kreatif Nusantara')
            ->assertSee('6281298765432', false)
            ->assertSee('webia-native-ai-bridge', false)
            ->assertDontSee('VOLT Studio');
    }

    public function test_unknown_ugc_page_returns_404(): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => 'unknown-ugc-config'],
            [
                'name' => 'Unknown UGC',
                'category_slug' => 'photography-creative-studio',
                'category_label' => 'Photography & Creative Studio',
                'business_types' => ['UGC Content Creator Studio'],
                'design_style' => 'Bold',
                'description' => 'UGC template.',
                'site_config_path' => 'photography-creative-studio/bold/unknown-ugc/ugc-content-creator-studio',
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
            'site_slug' => 'unknown-ugc-config',
            'business_data' => [
                'business_name' => 'Konten Kreatif Nusantara',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $this->get('/s/'.$order->site_slug.'/halaman-tidak-ada')->assertNotFound();
    }
}
