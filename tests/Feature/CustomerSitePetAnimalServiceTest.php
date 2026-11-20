<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CustomerSitePetAnimalServiceTest extends TestCase
{
    use RefreshDatabase;

    private function template(string $slug): WebiaTemplate
    {
        return WebiaTemplate::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'category_slug' => 'pet-animal-service',
                'category_label' => 'Pet & Animal Services',
                'business_types' => ['Pet & Animal Service'],
                'design_style' => 'Modern',
                'description' => 'Pet & Animal Service template.',
                'site_config_path' => 'pet-animal-service/'.$slug,
                'is_active' => true,
            ]
        );
    }

    #[DataProvider('petAnimalServiceTemplatesProvider')]
    public function test_all_pet_animal_service_templates_publish_and_render_customer_site(string $slug, string $demoBrand): void
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
            'site_slug' => $slug.'-pet-test',
            'business_data' => [
                'business_name' => 'PawCare Nusantara',
                'whatsapp' => '0812-9876-5432',
                'address' => 'Jl. Hewan Peliharaan No. 5, Jakarta',
                'city' => 'Jakarta',
                'email' => 'halo@pawcare.id',
            ],
        ]);

        $this->assertTrue($order->supportsCustomerSite());

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));
        $response->assertOk()
            ->assertSee('PawCare Nusantara')
            ->assertSee('6281298765432', false)
            ->assertSee('webia-native-ai-bridge', false)
            ->assertDontSee($demoBrand);
    }

    public static function petAnimalServiceTemplatesProvider(): array
    {
        return [
            ['paws-clever-creative', 'Paws & Clever'],
            ['paws-joy-jellypop', 'Paws & Joy'],
            ['paws-canine-terra-earth-tone', 'Canine Terra'],
            ['pawtopia-animal-care', 'Pawtopia'],
            ['pawlora-animal-care', 'Pawlora'],
            ['pawstead-animal-care', 'Pawstead'],
            ['petshop-minimalist-glacierblue', 'PawMart'],
            ['petshop-luxury-rosegold', 'Furry & Co.'],
            ['petshop-corporate-plumvelvet', 'PetBase'],
        ];
    }

    public function test_petshop_katalog_page_renders_and_remaps_navigation(): void
    {
        $slug = 'petshop-minimalist-glacierblue';
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
            'site_slug' => 'pawmart-katalog-site',
            'business_data' => [
                'business_name' => 'PawCare Nusantara',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $response = $this->get('/s/pawmart-katalog-site/katalog');
        $response->assertOk()
            ->assertSee('PawCare Nusantara', false)
            ->assertDontSee('/webia/template/petshop-minimalist-glacierblue', false);

        $invalidPage = $this->get('/s/pawmart-katalog-site/halaman-tidak-ada');
        $invalidPage->assertNotFound();
    }

    public function test_unknown_pet_page_returns_404(): void
    {
        $template = $this->template('pawtopia-animal-care');

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
            'site_slug' => 'pawtopia-pet-test',
            'business_data' => [
                'business_name' => 'PawCare Nusantara',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $this->get('/s/pawtopia-pet-test/halaman-tidak-ada')->assertNotFound();
    }
}
