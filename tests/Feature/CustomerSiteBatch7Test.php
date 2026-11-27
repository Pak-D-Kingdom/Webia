<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CustomerSiteBatch7Test extends TestCase
{
    use RefreshDatabase;

    #[DataProvider('batch7TemplatesProvider')]
    public function test_batch7_templates_publish_customer_site(string $slug, string $categorySlug, string $siteConfigPath, string $demoBrand, string $previewPath): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'category_slug' => $categorySlug,
                'category_label' => ucwords(str_replace('-', ' ', $categorySlug)),
                'business_types' => ['Test'],
                'design_style' => 'Artistic',
                'description' => 'Test description.',
                'site_config_path' => $siteConfigPath,
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
            'site_slug' => $slug.'-live-test',
            'business_data' => [
                'business_name' => 'Bintang Nusantara Group',
                'whatsapp' => '0812-9988-7766',
                'email' => 'halo@bintangnusantara.id',
                'address' => 'Jl. Bintang Utama No. 12, Surabaya',
            ],
        ]);

        $response = $this->get(route('sites.show', ['order' => $order->site_slug]));

        $response->assertOk()
            ->assertSee('Bintang Nusantara Group')
            ->assertSee('6281299887766', false)
            ->assertSee('webia-native-ai-bridge', false)
            ->assertSee('js/webia-client-bridge.js', false)
            ->assertSee(route('sites.chat', ['order' => $order->site_slug]), false)
            ->assertSee(url('/s/'.$order->site_slug), false)
            ->assertDontSee(url('/'.$previewPath), false)
            ->assertDontSee($demoBrand);
    }

    #[DataProvider('batch7SubpagesProvider')]
    public function test_batch7_subpages_render(string $slug, string $categorySlug, string $siteConfigPath, string $demoBrand, string $page): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => $slug],
            [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'category_slug' => $categorySlug,
                'category_label' => ucwords(str_replace('-', ' ', $categorySlug)),
                'business_types' => ['Test'],
                'design_style' => 'Artistic',
                'description' => 'Test description.',
                'site_config_path' => $siteConfigPath,
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
            'site_slug' => $slug.'-subpage-test',
            'business_data' => [
                'business_name' => 'Bintang Nusantara Group',
                'whatsapp' => '0812-9988-7766',
                'email' => 'halo@bintangnusantara.id',
                'address' => 'Jl. Bintang Utama No. 12, Surabaya',
            ],
        ]);

        $url = $page === ''
            ? route('sites.show', ['order' => $order->site_slug])
            : route('sites.show', ['order' => $order->site_slug, 'page' => $page]);

        $response = $this->get($url);

        $response->assertOk()
            ->assertSee('Bintang Nusantara Group')
            ->assertSee('6281299887766', false)
            ->assertDontSee($demoBrand);
    }

    public static function batch7SubpagesProvider(): array
    {
        $base = [
            'wedding-event-organizer-sunset-gradient' => [
                'wedding-event', 'wedding-event/bold/event-organizer-sunset-gradient/event-organizer', 'Eventora',
                ['', 'layanan', 'portofolio', 'paket', 'proyek', 'klien', 'proses', 'penawaran', 'ai-chatbot'],
            ],
            'wedding-event-organizer-purple-dream' => [
                'wedding-event', 'wedding-event/creative/event-organizer-purple-dream/event-organizer', 'Eventora',
                ['', 'layanan', 'paket-event', 'portofolio', 'proyek-kami', 'proses', 'klien', 'penawaran', 'faq-ai'],
            ],
            'travel-umrah-haji-navy-champagne-gold' => [
                'travel-tourism', 'travel&tourism/elegan/umrah-haji-navy-champagne-gold/umrah-haji', 'Al Hijrah Travel',
                ['', 'paket', 'jadwal', 'harga', 'hotel', 'itinerary', 'tim', 'persyaratan', 'testimoni', 'chat'],
            ],
            'travel-umrah-haji-emerald-green' => [
                'travel-tourism', 'travel&tourism/classic/umrah-haji-emerald-green/umrah-haji', 'Nur Rahmat Travel',
                ['', 'packages', 'schedules', 'prices', 'hotel-flight', 'itinerary', 'team', 'requirements', 'testimonials', 'chatbot'],
            ],
            'interior-architecture-building-design-chocolate-luxe' => [
                'interior-architecture', 'interior&architecture/rustic/architecture-building-design-chocolate-luxe/architecture-building-design', 'ArchiDesign',
                ['', 'portofolio', 'proyek', 'layanan', 'denah-3d', 'proses', 'sertifikasi', 'konsultasi', 'penawaran'],
            ],
        ];

        $rows = [];
        foreach ($base as $slug => [$cat, $cfg, $demo, $pages]) {
            foreach ($pages as $page) {
                $rows[] = [$slug, $cat, $cfg, $demo, $page];
            }
        }

        return $rows;
    }

    public static function batch7TemplatesProvider(): array
    {
        return [
            ['wedding-event-organizer-sunset-gradient', 'wedding-event', 'wedding-event/bold/event-organizer-sunset-gradient/event-organizer', 'Eventora', 'webia/template/wedding-event/bold/event-organizer-sunset-gradient'],
            ['wedding-event-organizer-purple-dream', 'wedding-event', 'wedding-event/creative/event-organizer-purple-dream/event-organizer', 'Eventora', 'webia/template/wedding-event/creative/event-organizer-purple-dream'],
            ['travel-umrah-haji-navy-champagne-gold', 'travel-tourism', 'travel&tourism/elegan/umrah-haji-navy-champagne-gold/umrah-haji', 'Al Hijrah Travel', 'webia/template/travel-tourism/elegan/umrah-haji-navy-champagne-gold'],
            ['travel-umrah-haji-emerald-green', 'travel-tourism', 'travel&tourism/classic/umrah-haji-emerald-green/umrah-haji', 'Nur Rahmat Travel', 'webia/template/travel-tourism/classic/umrah-haji-emerald-green'],
            ['interior-architecture-building-design-chocolate-luxe', 'interior-architecture', 'interior&architecture/rustic/architecture-building-design-chocolate-luxe/architecture-building-design', 'ArchiDesign', 'webia/template/interior-architecture/rustic/architecture-building-design-chocolate-luxe'],
        ];
    }
}
