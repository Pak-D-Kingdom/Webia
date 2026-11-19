<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CustomerSiteAutomotiveTest extends TestCase
{
    use RefreshDatabase;

    private function template(string $slug): WebiaTemplate
    {
        return WebiaTemplate::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'category_slug' => 'automotive',
                'category_label' => 'Automotive',
                'business_types' => ['Automotive & Garage'],
                'design_style' => 'Modern',
                'description' => 'Automotive template.',
                'site_config_path' => 'automotive/'.$slug,
                'is_active' => true,
            ]
        );
    }

    public function test_automotive_dealer_vintage_renders_home_and_collection_with_customer_data(): void
    {
        $admin = User::factory()->admin()->create();
        $template = $this->template('automotive-dealer-vintage');

        $order = WebiaOrder::factory()->create([
            'webia_template_id' => $template->id,
            'template_snapshot' => [
                'name' => $template->name,
                'slug' => $template->slug,
                'category_slug' => $template->category_slug,
                'site_config_path' => $template->site_config_path,
            ],
            'status' => 'paid',
            'delivery_status' => 'in_progress',
            'business_data' => [
                'business_name' => 'Garasi Klasik Nusantara',
                'tagline' => 'Showroom Mobil Klasik Pilihan',
                'whatsapp' => '0812-9988-7766',
                'description' => 'Koleksi mobil antik dan hobi terkurasi.',
                'address' => 'Jl. Veteran No. 45',
                'city' => 'Surabaya',
                'instagram' => '@garasiklasik',
            ],
        ]);

        $this->actingAs($admin)->post(route('admin.orders.progress', $order), [
            'action' => 'finish',
        ])->assertRedirect(route('admin.orders.show', $order));

        $order->refresh();
        $this->assertSame('delivered', $order->delivery_status);
        $this->assertNotNull($order->site_slug);

        $siteUrl = route('sites.show', ['order' => $order->site_slug]);

        // Home page
        $this->get($siteUrl)
            ->assertOk()
            ->assertSee('Garasi Klasik Nusantara')
            ->assertSee('6281299887766', false)
            ->assertSee($siteUrl.'/collection', false)
            ->assertDontSee('Heritage Motors')
            ->assertDontSee('WEBIA TEMPLATE PREVIEW')
            ->assertDontSee('6285850180285', false);

        // Collection page
        $this->get($siteUrl.'/collection')
            ->assertOk()
            ->assertSee('Garasi Klasik Nusantara')
            ->assertSee('6281299887766', false)
            ->assertSee($siteUrl)
            ->assertDontSee('Heritage Motors');

        // Invalid page returns 404
        $this->get($siteUrl.'/unknown-page')->assertNotFound();
    }

    #[DataProvider('automotiveTemplatesProvider')]
    public function test_all_automotive_templates_publish_and_render_customer_site(string $slug): void
    {
        $template = $this->template($slug);

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
            'site_slug' => $slug.'-auto-test',
            'business_data' => [
                'business_name' => 'Auto Prima Custom',
                'whatsapp' => '0877-1234-5678',
                'address' => 'Jl. Gatot Subroto No. 100',
                'city' => 'Jakarta Selatan',
            ],
        ]);

        $this->assertTrue($order->supportsCustomerSite());

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));
        $response->assertOk()
            ->assertSee('6287712345678', false)
            ->assertSee('webia-native-ai-bridge', false); // Widget AI terpasang

        $this->assertStringContainsStringIgnoringCase('Auto Prima Custom', $response->getContent());
    }

    public static function automotiveTemplatesProvider(): array
    {
        return [
            ['automotive-dealer-vintage'],
            ['voltrix-futuristic-automotive'],
            ['nightshift-dark-mode-automotive'],
            ['arvo-modern-automotive'],
            ['apex-heritage-automotive-elegant'],
            ['apex-scuderia-automotive-minimalist'],
            ['tidal-detail-artistic-automotive'],
            ['noir-atelier-luxury-automotive'],
            ['form-auto-care-minimal-automotive'],
            ['samudra-auto-detailing-artistic'],
            ['noir-auto-detailing-luxury'],
            ['aurum-premium-auto-detailing'],
            ['otto-artistic-workshop'],
            ['maison-otto-elegant-workshop'],
            ['roseline-professional-workshop'],
        ];
    }
}
