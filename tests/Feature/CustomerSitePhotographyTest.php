<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
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
            ->assertSee('bindPhotographyAiAdapters', false)
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

    public function test_published_photography_site_sends_chat_to_its_own_tenant(): void
    {
        $template = $this->template('lumiere-photography-studio');
        $order = WebiaOrder::factory()->create([
            'webia_template_id' => $template->id,
            'template_snapshot' => [
                'slug' => $template->slug,
                'site_config_path' => $template->site_config_path,
            ],
            'status' => 'paid',
            'delivery_status' => 'delivered',
            'site_slug' => 'lensa-nusantara',
            'business_data' => [
                'business_name' => 'Lensa Nusantara Studio',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        Http::fake(function (Request $request) {
            if (str_ends_with($request->url(), '/quota')) {
                return Http::response(['is_quota_exhausted' => false]);
            }

            if (str_ends_with($request->url(), '/chat')) {
                return Http::response([
                    'message' => ['content' => 'Kami tersedia untuk konsultasi sesi foto produk.'],
                    'meta' => ['provider' => 'test'],
                ]);
            }

            return Http::response([], 404);
        });

        $this->postJson(route('sites.chat', ['order' => $order->site_slug]), [
            'message' => 'Apakah ada sesi foto produk?',
        ])->assertOk()
            ->assertJsonPath('status', 'success')
            ->assertJsonPath('reply', 'Kami tersedia untuk konsultasi sesi foto produk.');

        Http::assertSent(function (Request $request) use ($order) {
            return str_ends_with($request->url(), '/api/v1/chat')
                && $request['layer'] === 'l4'
                && $request['tenant_id'] === $order->site_slug;
        });
    }
}
