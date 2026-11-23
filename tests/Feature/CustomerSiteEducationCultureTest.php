<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerSiteEducationCultureTest extends TestCase
{
    use RefreshDatabase;

    public function test_verdant_archive_template_publishes_customer_site(): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => 'verdant-archive-museum-collection'],
            [
                'name' => 'Verdant Archive',
                'category_slug' => 'education-culture',
                'category_label' => 'Education & Culture',
                'business_types' => ['Museum Collection'],
                'design_style' => 'Archival Minimalist',
                'description' => 'Museum archive template.',
                'site_config_path' => 'education-culture/verdant-archive-museum-collection',
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
            'site_slug' => 'verdant-museum-test',
            'business_data' => [
                'business_name' => 'Arsip Budaya Nusantara',
                'whatsapp' => '0812-9876-5432',
                'address' => 'Jl. Arsip No. 7, Yogyakarta',
                'email' => 'halo@arsipbudaya.id',
            ],
        ]);

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));

        $response->assertOk()
            ->assertSee('Arsip Budaya Nusantara')
            ->assertSee('6281298765432', false)
            ->assertSee('halo@arsipbudaya.id')
            ->assertSee('Jl. Arsip No. 7, Yogyakarta')
            ->assertSee('webia-native-ai-bridge', false)
            ->assertDontSee('Verdant Archive')
            ->assertDontSee('VERDANT ARCHIVE');
    }

    public function test_unknown_education_culture_page_returns_404(): void
    {
        $order = $this->deliveredOrder('unknown-education-culture', 'education-culture/unknown-education-culture');

        $this->get('/s/'.$order->site_slug.'/halaman-tidak-ada')->assertNotFound();
    }

    private function deliveredOrder(string $siteSlug, string $siteConfigPath): WebiaOrder
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => $siteSlug],
            [
                'name' => 'Education Culture Template',
                'category_slug' => 'education-culture',
                'category_label' => 'Education & Culture',
                'business_types' => ['Museum Collection'],
                'design_style' => 'Archival Minimalist',
                'description' => 'Education culture template.',
                'site_config_path' => $siteConfigPath,
                'is_active' => true,
            ]
        );

        return WebiaOrder::factory()->create([
            'webia_template_id' => $template->id,
            'template_snapshot' => [
                'name' => $template->name,
                'slug' => $template->slug,
                'category_slug' => $template->category_slug,
                'site_config_path' => $template->site_config_path,
            ],
            'status' => 'paid',
            'delivery_status' => 'delivered',
            'site_slug' => $siteSlug,
            'business_data' => [
                'business_name' => 'Arsip Budaya Nusantara',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);
    }
}
