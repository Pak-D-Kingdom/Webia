<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CustomerSiteEducationTest extends TestCase
{
    use RefreshDatabase;

    private function template(string $slug): WebiaTemplate
    {
        return WebiaTemplate::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'category_slug' => 'education',
                'category_label' => 'Education',
                'business_types' => ['School & Learning'],
                'design_style' => 'Modern',
                'description' => 'Education template.',
                'site_config_path' => 'education/'.$slug,
                'is_active' => true,
            ]
        );
    }

    #[DataProvider('educationTemplatesProvider')]
    public function test_all_education_templates_publish_and_render_customer_site(string $slug, string $demoBrand): void
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
            'site_slug' => $slug.'-education-test',
            'business_data' => [
                'business_name' => 'Bimbel Cendekia Nusantara',
                'whatsapp' => '0812-9876-5432',
                'address' => 'Jl. Pendidikan No. 21, Bandung',
                'city' => 'Bandung',
                'email' => 'halo@cendekianusantara.sch.id',
            ],
        ]);

        $this->assertTrue($order->supportsCustomerSite());

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));
        $response->assertOk()
            ->assertSee('Bimbel Cendekia Nusantara')
            ->assertSee('6281298765432', false)
            ->assertSee('webia-native-ai-bridge', false)
            ->assertDontSee($demoBrand);
    }

    public static function educationTemplatesProvider(): array
    {
        return [
            ['education-onlinecourse-modern', 'EduPrime'],
            ['rumah-latte-preschool-daycare', 'Rumah Latte'],
            ['tunas-cendekia-preschool-daycare', 'Tunas Cendekia'],
            ['jeli-kecil-preschool-daycare', 'Jeli Kecil'],
            ['spark-academy-maximum-impact', 'SPARK Academy'],
            ['ruby-academy-classic-school', 'Ruby Academy'],
            ['arctic-academy-school', 'Arctic Academy'],
        ];
    }

    public function test_demo_brand_names_are_replaced_on_customer_site(): void
    {
        $template = $this->template('ruby-academy-classic-school');

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
            'site_slug' => 'cendekia-nusantara-site',
            'business_data' => [
                'business_name' => 'Bimbel Cendekia Nusantara',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));
        $response->assertOk()
            ->assertSee('Bimbel Cendekia Nusantara')
            ->assertDontSee('Ruby Academy');
    }

    public function test_unknown_education_page_returns_404(): void
    {
        $template = $this->template('arctic-academy-school');

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
            'site_slug' => 'arctic-education-test',
            'business_data' => [
                'business_name' => 'Bimbel Cendekia Nusantara',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $this->get('/s/arctic-education-test/halaman-tidak-ada')->assertNotFound();
    }
}
