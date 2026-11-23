<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CustomerSitePersonalBrandTest extends TestCase
{
    use RefreshDatabase;

    #[DataProvider('templatesProvider')]
    public function test_all_personal_brand_templates_publish_customer_site(string $slug, string $demoBrand): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'category_slug' => 'personal-brand',
                'category_label' => 'Personal Brand',
                'business_types' => ['Author & Writer'],
                'design_style' => 'Editorial',
                'description' => 'Personal brand template.',
                'site_config_path' => 'personal-brand/'.$slug,
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
            'site_slug' => $slug.'-brand-test',
            'business_data' => [
                'business_name' => 'Ruang Kata Nusantara',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));

        $response->assertOk()
            ->assertSee('Ruang Kata Nusantara')
            ->assertSee('6281298765432', false)
            ->assertSee('webia-native-ai-bridge', false)
            ->assertDontSee($demoBrand);
    }

    public static function templatesProvider(): array
    {
        return [
            ['aria-thorne-author-writer', 'Aria Thorne'],
            ['arya-sanjaya-plum-velvet', 'Arya Sanjaya'],
            ['arya-sanjaya-ruby-editorial', 'Arya Sanjaya'],
        ];
    }

    public function test_unknown_personal_brand_page_returns_404(): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => 'unknown-personal-brand'],
            [
                'name' => 'Unknown Personal Brand',
                'category_slug' => 'personal-brand',
                'category_label' => 'Personal Brand',
                'business_types' => ['Author & Writer'],
                'design_style' => 'Editorial',
                'description' => 'Personal brand template.',
                'site_config_path' => 'personal-brand/unknown-personal-brand',
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
            'site_slug' => 'unknown-personal-brand',
            'business_data' => [
                'business_name' => 'Ruang Kata Nusantara',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $this->get('/s/'.$order->site_slug.'/halaman-tidak-ada')->assertNotFound();
    }
}
