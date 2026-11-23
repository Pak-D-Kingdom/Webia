<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CustomerSiteWeddingMultiTest extends TestCase
{
    use RefreshDatabase;

    #[DataProvider('templatesProvider')]
    public function test_all_wedding_multi_templates_publish_customer_site(string $slug, string $demoBrand): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'category_slug' => 'wedding-event',
                'category_label' => 'Wedding Event',
                'business_types' => ['Wedding'],
                'design_style' => 'Modern',
                'description' => 'Wedding multi template.',
                'site_config_path' => 'wedding-multi/'.$slug,
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
            'site_slug' => $slug.'-weddingmulti-test',
            'business_data' => [
                'business_name' => 'Momen Bahagia Wedding',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));
        $response->assertOk()
            ->assertSee('Momen Bahagia Wedding')
            ->assertSee('6281298765432', false)
            ->assertSee('webia-native-ai-bridge', false)
            ->assertDontSee($demoBrand);

        $katalog = $this->get('/s/'.$order->site_slug.'/katalog');
        $katalog->assertOk()->assertSee('Momen Bahagia Wedding');

        $detail = $this->get('/s/'.$order->site_slug.'/detail');
        $detail->assertOk()->assertSee('Momen Bahagia Wedding');
    }

    public static function templatesProvider(): array
    {
        return [
            ['catering-wedding-cake-minimalist-ruby-luxe', 'Ruby Luxe'],
            ['event-organizer-modern-burgundy-wine', 'Burgundy Moments'],
        ];
    }

    public function test_unknown_wedding_multi_page_returns_404(): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => 'unknown-wedding-multi'],
            [
                'name' => 'Unknown Wedding Multi',
                'category_slug' => 'wedding-event',
                'category_label' => 'Wedding Event',
                'business_types' => ['Wedding'],
                'design_style' => 'Modern',
                'description' => 'Wedding multi template.',
                'site_config_path' => 'wedding-multi/unknown-wedding-multi',
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
            'site_slug' => 'unknown-wedding-multi',
            'business_data' => [
                'business_name' => 'Momen Bahagia Wedding',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $this->get('/s/'.$order->site_slug.'/halaman-tidak-ada')->assertNotFound();
    }
}
