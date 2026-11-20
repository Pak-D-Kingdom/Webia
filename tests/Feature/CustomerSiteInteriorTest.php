<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CustomerSiteInteriorTest extends TestCase
{
    use RefreshDatabase;

    private function template(string $slug): WebiaTemplate
    {
        return WebiaTemplate::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'category_slug' => 'interior-architecture',
                'category_label' => 'Interior & Architecture',
                'business_types' => ['Interior & Architecture'],
                'design_style' => 'Modern',
                'description' => 'Interior template.',
                'site_config_path' => 'interior-architecture/'.$slug,
                'is_active' => true,
            ]
        );
    }

    #[DataProvider('interiorTemplatesProvider')]
    public function test_all_interior_templates_publish_and_render_customer_site(string $slug, string $demoBrand): void
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
            'site_slug' => $slug.'-interior-test',
            'business_data' => [
                'business_name' => 'Desain Nusantara Studio',
                'whatsapp' => '0812-9876-5432',
                'address' => 'Jl. Desain No. 1, Jakarta',
                'city' => 'Jakarta',
                'email' => 'halo@desainnusantara.id',
            ],
        ]);

        $this->assertTrue($order->supportsCustomerSite());

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));
        $response->assertOk()
            ->assertSee('Desain Nusantara Studio')
            ->assertSee('6281298765432', false)
            ->assertSee('webia-native-ai-bridge', false)
            ->assertDontSee($demoBrand);
    }

    public static function interiorTemplatesProvider(): array
    {
        return [
            ['interior-design-studio-artistic-terracotta', 'Artistic Terracotta'],
            ['aethel-moss-architectural-studio', 'AETHEL MOSS'],
            ['nantara-architecture-traditional-cultural', 'Nantara Architecture'],
        ];
    }

    public function test_unknown_interior_page_returns_404(): void
    {
        $template = $this->template('aethel-moss-architectural-studio');

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
            'site_slug' => 'aethel-interior-test',
            'business_data' => [
                'business_name' => 'Desain Nusantara Studio',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $this->get('/s/aethel-interior-test/halaman-tidak-ada')->assertNotFound();
    }
}
