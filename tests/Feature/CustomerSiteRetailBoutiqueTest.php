<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CustomerSiteRetailBoutiqueTest extends TestCase
{
    use RefreshDatabase;

    #[DataProvider('templatesProvider')]
    public function test_all_retail_boutique_templates_publish_customer_site(string $slug, string $demoBrand, bool $uppercaseBrand = false): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'category_slug' => 'retail',
                'category_label' => 'Retail',
                'business_types' => ['Retail'],
                'design_style' => 'Modern',
                'description' => 'Retail boutique template.',
                'site_config_path' => 'retail-boutique/'.$slug,
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
            'site_slug' => $slug.'-boutique-test',
            'business_data' => [
                'business_name' => 'Butik Ceria Nusantara',
                'whatsapp' => '0812-9876-5432',
                'address' => 'Jl. Ceria No. 10, Bandung',
                'city' => 'Bandung',
                'email' => 'halo@butikceria.id',
            ],
        ]);

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));

        $response->assertOk()
            ->assertSee($uppercaseBrand ? 'BUTIK CERIA NUSANTARA' : 'Butik Ceria Nusantara')
            ->assertSee('6281298765432', false)
            ->assertSee('webia-native-ai-bridge', false)
            ->assertDontSee($demoBrand);
    }

    public static function templatesProvider(): array
    {
        return [
            ['aurora-petit-yellow-sunshine', 'AURORA &amp; PETIT'],
            ['petit-wonder-candy-cloud', 'Petit Wonder'],
            ['pebble-sprouts-baby-kids', 'Pebble & Sprouts'],
            ['vibesnatch-fashion-store', 'VIBESNATCH', true],
        ];
    }

    public function test_unknown_retail_boutique_page_returns_404(): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => 'unknown-retail-boutique'],
            [
                'name' => 'Unknown Retail Boutique',
                'category_slug' => 'retail',
                'category_label' => 'Retail',
                'business_types' => ['Retail'],
                'design_style' => 'Modern',
                'description' => 'Retail boutique template.',
                'site_config_path' => 'retail-boutique/unknown-retail-boutique',
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
            'site_slug' => 'unknown-retail-boutique',
            'business_data' => [
                'business_name' => 'Butik Ceria Nusantara',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $this->get('/s/'.$order->site_slug.'/halaman-tidak-ada')->assertNotFound();
    }
}
