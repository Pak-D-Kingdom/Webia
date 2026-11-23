<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerSiteSpecialtyBeverageTest extends TestCase
{
    use RefreshDatabase;

    public function test_kebun_seduh_template_publishes_customer_site(): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => 'kebun-seduh-botanical-elegant'],
            [
                'name' => 'Kebun Seduh',
                'category_slug' => 'specialty-beverage',
                'category_label' => 'Specialty Beverage',
                'business_types' => ['Specialty Tea Subscription'],
                'design_style' => 'Botanical Elegant',
                'description' => 'Specialty tea subscription template.',
                'site_config_path' => 'specialty-beverage/kebun-seduh-botanical-elegant',
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
            'site_slug' => 'teh-nusantara-test',
            'business_data' => [
                'business_name' => 'Teh Nusantara',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));

        $response->assertOk()
            ->assertSee('Teh Nusantara')
            ->assertSee('6281298765432', false)
            ->assertSee('webia-native-ai-bridge', false)
            ->assertDontSee('Kebun Seduh');
    }

    public function test_unknown_specialty_beverage_page_returns_404(): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => 'unknown-specialty-beverage'],
            [
                'name' => 'Specialty Beverage Template',
                'category_slug' => 'specialty-beverage',
                'category_label' => 'Specialty Beverage',
                'business_types' => ['Specialty Tea Subscription'],
                'design_style' => 'Botanical Elegant',
                'description' => 'Specialty beverage template.',
                'site_config_path' => 'specialty-beverage/unknown-specialty-beverage',
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
            'site_slug' => 'unknown-specialty-beverage',
            'business_data' => [
                'business_name' => 'Teh Nusantara',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $this->get('/s/'.$order->site_slug.'/halaman-tidak-ada')->assertNotFound();
    }
}
