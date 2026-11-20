<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CustomerSiteSportsFitnessTest extends TestCase
{
    use RefreshDatabase;

    private function template(string $slug): WebiaTemplate
    {
        return WebiaTemplate::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'category_slug' => 'sports-fitness',
                'category_label' => 'Sports & Fitness',
                'business_types' => ['Sports & Fitness'],
                'design_style' => 'Modern',
                'description' => 'Sports & Fitness template.',
                'site_config_path' => 'sports-fitness/'.$slug,
                'is_active' => true,
            ]
        );
    }

    #[DataProvider('sportsFitnessTemplatesProvider')]
    public function test_all_sports_fitness_templates_publish_and_render_customer_site(string $slug, string $demoBrand): void
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
            'site_slug' => $slug.'-sports-test',
            'business_data' => [
                'business_name' => 'FitHub Nusantara',
                'whatsapp' => '0812-9876-5432',
                'address' => 'Jl. Sudirman No. 10, Jakarta',
                'city' => 'Jakarta',
                'email' => 'halo@fithubnusantara.id',
            ],
        ]);

        $this->assertTrue($order->supportsCustomerSite());

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));
        $response->assertOk()
            ->assertSee('FitHub Nusantara')
            ->assertSee('6281298765432', false)
            ->assertSee('webia-native-ai-bridge', false)
            ->assertDontSee($demoBrand);
    }

    public static function sportsFitnessTemplatesProvider(): array
    {
        return [
            ['sports-gym-bold', 'Apex Pulse'],
            ['ironpulse-gym-fitness-center', 'IRONPULSE'],
            ['personal-trainer-playful-colorful-jelly-pop', 'Jelly Pop'],
            ['northline-performance-corporate-personal-trainer', 'Northline'],
            ['vanta-form-cyber-neon-personal-trainer', 'VANTA//FORM'],
            ['pilates-studio-strawberry-fizz', 'Strawberry Fizz'],
        ];
    }

    public function test_jelly_pop_detail_page_renders_and_remaps_navigation(): void
    {
        $slug = 'personal-trainer-playful-colorful-jelly-pop';
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
            'site_slug' => 'fithub-jelly-site',
            'business_data' => [
                'business_name' => 'FitHub Nusantara',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $response = $this->get('/s/fithub-jelly-site/detail?package=fresh-start');
        $response->assertOk()
            ->assertSee('FitHub Nusantara', false)
            ->assertDontSee('/webia/template/personal-trainer-jelly-pop', false);

        $invalidPage = $this->get('/s/fithub-jelly-site/halaman-tidak-ada');
        $invalidPage->assertNotFound();
    }

    public function test_strawberry_fizz_classes_page_renders_and_remaps_navigation(): void
    {
        $slug = 'pilates-studio-strawberry-fizz';
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
            'site_slug' => 'fithub-strawberry-site',
            'business_data' => [
                'business_name' => 'FitHub Nusantara',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $response = $this->get('/s/fithub-strawberry-site/classes');
        $response->assertOk()
            ->assertSee('FitHub Nusantara', false)
            ->assertDontSee('/webia/template/pilates-studio-strawberry-fizz', false);

        $invalidPage = $this->get('/s/fithub-strawberry-site/halaman-tidak-ada');
        $invalidPage->assertNotFound();
    }

    public function test_unknown_sports_fitness_page_returns_404(): void
    {
        $template = $this->template('vanta-form-cyber-neon-personal-trainer');

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
            'site_slug' => 'vanta-sports-test',
            'business_data' => [
                'business_name' => 'FitHub Nusantara',
                'whatsapp' => '0812-9876-5432',
            ],
        ]);

        $this->get('/s/vanta-sports-test/halaman-tidak-ada')->assertNotFound();
    }
}
