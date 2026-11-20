<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CustomerSitePhotographyTest extends TestCase
{
    use RefreshDatabase;

    private function template(string $slug): WebiaTemplate
    {
        return WebiaTemplate::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'category_slug' => 'photography-creative-studio',
                'category_label' => 'Photography & Creative Studio',
                'business_types' => ['Photography & Creative'],
                'design_style' => 'Modern',
                'description' => 'Photography template.',
                'site_config_path' => 'photography/'.$slug,
                'is_active' => true,
            ]
        );
    }

    #[DataProvider('photographyTemplatesProvider')]
    public function test_all_photography_templates_publish_and_render_customer_site(string $slug, string $demoBrand): void
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
            'site_slug' => $slug.'-photo-test',
            'business_data' => [
                'business_name' => 'Lensa Nusantara Studio',
                'whatsapp' => '0812-9876-5432',
                'address' => 'Jl. Fotografi No. 7, Jakarta',
                'city' => 'Jakarta',
                'email' => 'halo@lensanusantara.id',
            ],
        ]);

        $this->assertTrue($order->supportsCustomerSite());

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));
        $response->assertOk()
            ->assertSee('Lensa Nusantara Studio')
            ->assertSee('6281298765432', false)
            ->assertSee('webia-native-ai-bridge', false)
            ->assertDontSee($demoBrand);
    }

    public static function photographyTemplatesProvider(): array
    {
        return [
            ['lumiere-photography-studio', 'Lumière Studio'],
            ['noir-studio-photography', 'Noir Studio'],
            ['peachy-studio', 'Peachy Studio'],
            ['candy-cloud-ugc-content-creator-studio', 'Candy Cloud'],
            ['photography-motiongraphics-premiumminimal-champagneglow-putri', 'AuraMotion'],
            ['photography-motiongraphics-traditionalcultural-coralpeach-putri', 'PusakaMotion'],
        ];
    }

    public function test_unknown_photography_page_returns_404(): void
    {
        $template = $this->template('peachy-studio');

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
            'site_slug' => 'peachy-photo-test',
            'business_data' => [
                'business_name' => 'Lensa Nusantara Studio',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $this->get('/s/peachy-photo-test/halaman-tidak-ada')->assertNotFound();
    }
}
