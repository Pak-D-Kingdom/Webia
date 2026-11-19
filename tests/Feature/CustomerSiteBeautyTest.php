<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CustomerSiteBeautyTest extends TestCase
{
    use RefreshDatabase;

    private function template(string $slug): WebiaTemplate
    {
        $views = [
            'nailart-professional-softpink' => 'website-bisnis.templates.beauty.nailart.nailart-professional-softpink',
            'nailart-minimalist-sagegreen' => 'website-bisnis.templates.beauty.nailart.nailart-minimalist-sagegreen',
            'nailart-luxury-yellowsunshine' => 'website-bisnis.templates.beauty.nailart.nailart-luxury-yellowsunshine',
            'nuvia-skin-tech-clinic' => 'website-bisnis.templates.beauty.nuvia-skin-tech-clinic',
            'glow-lab-creative-beauty-clinic' => 'website-bisnis.templates.beauty.glow-lab-creative-beauty-clinic',
            'atelier-kulit-creative-beauty-clinic' => 'website-bisnis.templates.beauty.atelier-kulit-creative-beauty-clinic',
            'tanah-warna-rustic-makeup-artist' => 'website-bisnis.templates.beauty.tanah-warna-rustic-makeup-artist',
            'rosalind-vintage-makeup-artist' => 'website-bisnis.templates.beauty.rosalind-vintage-makeup-artist',
            'visage-editorial-makeup-artist' => 'website-bisnis.templates.beauty.visage-editorial-makeup-artist',
        ];

        return WebiaTemplate::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'category_slug' => 'beauty',
                'category_label' => 'Beauty',
                'business_types' => ['Beauty & Personal Care'],
                'design_style' => 'Modern',
                'description' => 'Beauty template.',
                'preview_view' => $views[$slug] ?? null,
                'site_config_path' => 'beauty/'.$slug,
                'is_active' => true,
            ]
        );
    }

    #[DataProvider('beautyTemplatesProvider')]
    public function test_all_beauty_templates_publish_and_render_customer_site(string $slug): void
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
            'site_slug' => $slug.'-beauty-test',
            'business_data' => [
                'business_name' => 'Cantika Beauty Studio',
                'whatsapp' => '0877-6655-4433',
                'address' => 'Jl. Kemang Raya No. 8',
                'city' => 'Jakarta Selatan',
            ],
        ]);

        $this->assertTrue($order->supportsCustomerSite());

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));
        $response->assertOk()
            ->assertSee('Cantika Beauty Studio')
            ->assertSee('6287766554433', false)
            ->assertSee('webia-client-ai-widget', false);
    }

    public static function beautyTemplatesProvider(): array
    {
        return [
            ['nailart-professional-softpink'],
            ['nailart-minimalist-sagegreen'],
            ['nailart-luxury-yellowsunshine'],
            ['nuvia-skin-tech-clinic'],
            ['glow-lab-creative-beauty-clinic'],
            ['atelier-kulit-creative-beauty-clinic'],
            ['tanah-warna-rustic-makeup-artist'],
            ['rosalind-vintage-makeup-artist'],
            ['visage-editorial-makeup-artist'],
        ];
    }
}
