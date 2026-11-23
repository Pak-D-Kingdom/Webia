<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerSiteWeddingStandaloneTest extends TestCase
{
    use RefreshDatabase;

    public function test_wedding_organizer_elegant_publishes_customer_site(): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => 'wedding-organizer-elegant'],
            [
                'name' => 'Wedding Organizer Elegant',
                'category_slug' => 'wedding-event',
                'category_label' => 'Wedding Event',
                'business_types' => ['Wedding Organizer'],
                'design_style' => 'Elegant',
                'description' => 'Wedding organizer template.',
                'site_config_path' => 'wedding-standalone/wedding-organizer-elegant',
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
            'site_slug' => 'wedding-elegant-test',
            'business_data' => [
                'business_name' => 'Aura Cinta Wedding',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));

        $response->assertOk()
            ->assertSee('Aura Cinta Wedding')
            ->assertSee('6281298765432', false)
            ->assertSee('webia-native-ai-bridge', false)
            ->assertDontSee('Aura Amour');
    }

    public function test_unknown_wedding_standalone_page_returns_404(): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => 'unknown-wedding-standalone'],
            [
                'name' => 'Unknown Wedding',
                'category_slug' => 'wedding-event',
                'category_label' => 'Wedding Event',
                'business_types' => ['Wedding Organizer'],
                'design_style' => 'Elegant',
                'description' => 'Wedding template.',
                'site_config_path' => 'wedding-standalone/unknown-wedding-standalone',
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
            'site_slug' => 'unknown-wedding-standalone',
            'business_data' => [
                'business_name' => 'Aura Cinta Wedding',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $this->get('/s/'.$order->site_slug.'/halaman-tidak-ada')->assertNotFound();
    }
}
