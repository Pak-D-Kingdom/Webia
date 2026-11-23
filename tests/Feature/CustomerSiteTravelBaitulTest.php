<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerSiteTravelBaitulTest extends TestCase
{
    use RefreshDatabase;

    public function test_baitul_safar_publishes_customer_site(): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => 'baitul-safar-umrah-haji'],
            [
                'name' => 'Baitul Safar',
                'category_slug' => 'travel-tourism',
                'category_label' => 'Travel Tourism',
                'business_types' => ['Umrah Haji'],
                'design_style' => 'Classic',
                'description' => 'Umrah haji template.',
                'site_config_path' => 'travel-baitul/baitul-safar-umrah-haji',
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
            'site_slug' => 'baitul-safar-test',
            'business_data' => [
                'business_name' => 'Safar Nusantara',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));

        $response->assertOk()
            ->assertSee('Safar Nusantara')
            ->assertSee('6281298765432', false)
            ->assertSee('webia-native-ai-bridge', false)
            ->assertDontSee('Baitul Safar');
    }

    public function test_unknown_baitul_page_returns_404(): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => 'unknown-travel-baitul'],
            [
                'name' => 'Unknown Travel Baitul',
                'category_slug' => 'travel-tourism',
                'category_label' => 'Travel Tourism',
                'business_types' => ['Umrah Haji'],
                'design_style' => 'Classic',
                'description' => 'Travel template.',
                'site_config_path' => 'travel-baitul/unknown-travel-baitul',
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
            'site_slug' => 'unknown-travel-baitul',
            'business_data' => [
                'business_name' => 'Safar Nusantara',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $this->get('/s/'.$order->site_slug.'/halaman-tidak-ada')->assertNotFound();
    }
}
