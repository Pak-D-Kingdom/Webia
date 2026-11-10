<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\WebiaOrder;
use App\Models\WebiaPackage;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerSiteTest extends TestCase
{
    use RefreshDatabase;

    public function test_finishing_supported_order_publishes_customer_site(): void
    {
        $admin = User::factory()->admin()->create();
        $order = $this->cafeOrder([
            'delivery_status' => 'in_progress',
            'business_data' => [
                'business_name' => 'Kopi Kawan',
                'tagline' => 'Ngopi dekat rumah',
                'whatsapp' => '0812-3456-7890',
                'description' => 'Kedai kopi untuk kerja dan bertemu teman.',
                'address' => 'Jl. Braga No. 10',
                'city' => 'Bandung',
                'address_url' => 'https://maps.google.com/?q=kopi-kawan-bandung',
                'instagram' => '@kopikawan',
            ],
        ]);

        $this->actingAs($admin)->post(route('admin.orders.progress', $order), [
            'action' => 'finish',
        ])->assertRedirect(route('admin.orders.show', $order));

        $order->refresh();
        $this->assertSame('delivered', $order->delivery_status);
        $this->assertSame('kopi-kawan-'.$order->id, $order->site_slug);

        $this->get(route('sites.show', ['order' => $order->site_slug]))
            ->assertOk()
            ->assertSee('Kopi Kawan')
            ->assertSee('Ngopi dekat rumah')
            ->assertSee('Jl. Braga No. 10')
            ->assertSee('Bandung')
            ->assertSee('6281234567890', false)
            ->assertSee(route('sites.show', ['order' => $order->site_slug, 'page' => 'menu']), false)
            ->assertDontSee('Origins Cafe');
    }

    public function test_publishing_elegant_template_renders_customer_site(): void
    {
        $admin = User::factory()->admin()->create();
        $order = $this->cafeOrder([
            'business_data' => [
                'business_name' => 'Lumiere Sore',
                'tagline' => 'Kopi elegan',
                'whatsapp' => '0812-3456-7890',
                'description' => 'Kedai kopi elegan di Bandung.',
                'address' => 'Jl. Cendana No. 7',
                'city' => 'Bandung',
                'address_url' => 'https://maps.google.com/?q=lumiere-sore',
                'instagram' => '@lumieresore',
            ],
        ], 'fnb-cafe-elegan');

        $this->actingAs($admin)->post(route('admin.orders.progress', $order), [
            'action' => 'finish',
        ])->assertRedirect(route('admin.orders.show', $order));

        $order->refresh();
        $this->assertSame('lumiere-sore-'.$order->id, $order->site_slug);

        $siteUrl = route('sites.show', ['order' => $order->site_slug]);
        $this->get($siteUrl)
            ->assertOk()
            ->assertSee('Lumiere Sore')
            ->assertSee('Kedai kopi elegan di Bandung.')
            ->assertSee('Jl. Cendana No. 7')
            ->assertSee('6281234567890', false)
            ->assertSee($siteUrl.'/menu', false)
            ->assertSee($siteUrl.'/reservasi', false)
            ->assertDontSee('The Lumière');

        $this->get($siteUrl.'/menu')->assertOk()->assertSee('Lumiere Sore');
        $this->get($siteUrl.'/reservasi')->assertOk()->assertSee('Reservasi');
    }

    public function test_customer_site_is_not_public_before_delivery(): void
    {
        $order = $this->cafeOrder(['site_slug' => 'kopi-kawan']);

        $this->get(route('sites.show', ['order' => $order->site_slug]))->assertNotFound();
    }

    public function test_publishing_vintage_template_renders_customer_site(): void
    {
        $admin = User::factory()->admin()->create();
        $order = $this->cafeOrder([
            'business_data' => [
                'business_name' => 'Vintage Kopi Sore',
                'tagline' => 'Kopi sengaja',
                'whatsapp' => '0812-3456-7890',
                'description' => 'Kedai kopi musik sore di Bandung.',
                'address' => 'Jl. Sore Indah No. 12',
                'city' => 'Bandung',
                'address_url' => 'https://maps.google.com/?q=kopi-sore',
                'instagram' => '@kopisore',
            ],
        ], 'fnb-cafe-vintage');

        $this->actingAs($admin)->post(route('admin.orders.progress', $order), [
            'action' => 'finish',
        ])->assertRedirect(route('admin.orders.show', $order));

        $order->refresh();
        $this->assertSame('vintage-kopi-sore-'.$order->id, $order->site_slug);

        $siteUrl = route('sites.show', ['order' => $order->site_slug]);
        $this->get($siteUrl)
            ->assertOk()
            ->assertSee('Kopi Sore', false)
            ->assertSee('Kedai kopi musik sore di Bandung.')
            ->assertSee('Jl. Sore Indah No. 12')
            ->assertSee('6281234567890', false)
            ->assertSee($siteUrl.'/menu', false)
            ->assertSee($siteUrl.'/reservasi', false)
            ->assertSee('instagram.com/kopisore', false)
            ->assertDontSee('Kopi Lembang');

        $this->get($siteUrl.'/menu')->assertOk()->assertSee('Vintage Kopi Sore');
        $this->get($siteUrl.'/reservasi')->assertOk()->assertSee('Reservasi');
    }

    public function test_finishing_other_template_does_not_publish_site(): void
    {
        $admin = User::factory()->admin()->create();
        $template = $this->template('other-template');
        $order = WebiaOrder::factory()->create([
            'webia_template_id' => $template,
            'template_snapshot' => ['name' => $template->name, 'slug' => $template->slug, 'category_slug' => 'fnb'],
            'status' => 'paid',
            'delivery_status' => 'in_progress',
            'business_data' => ['business_name' => 'Kopi Lain'],
        ]);

        $this->actingAs($admin)->post(route('admin.orders.progress', $order), [
            'action' => 'finish',
        ])->assertRedirect(route('admin.orders.show', $order));

        $this->assertNull($order->fresh()->site_slug);
    }

    public function test_finishing_any_template_with_site_config_publishes_site(): void
    {
        $admin = User::factory()->admin()->create();
        $template = $this->template('fnb-cafe-vintage', [
            'site_config_path' => 'f&b/minimalis/cafe-earthtone/cafe',
        ]);
        $order = WebiaOrder::factory()->create([
            'webia_template_id' => $template,
            'template_snapshot' => [
                'name' => $template->name,
                'slug' => $template->slug,
                'category_slug' => $template->category_slug,
                'site_config_path' => $template->site_config_path,
            ],
            'status' => 'paid',
            'delivery_status' => 'in_progress',
            'business_data' => [
                'business_name' => 'Vintage Kopi Sore',
                'whatsapp' => '0812-3456-7890',
                'address' => 'Jl. Sore No. 31',
                'city' => 'Bandung',
            ],
        ]);

        $this->actingAs($admin)->post(route('admin.orders.progress', $order), [
            'action' => 'finish',
        ])->assertRedirect(route('admin.orders.show', $order));

        $order->refresh();
        $this->assertSame('vintage-kopi-sore-'.$order->id, $order->site_slug);

        $this->get(route('sites.show', ['order' => $order->site_slug]))
            ->assertOk()
            ->assertSee('Vintage Kopi Sore')
            ->assertSee('Jl. Sore No. 31')
            ->assertSee('6281234567890', false);
    }

    public function test_order_snapshot_carries_site_config_from_template(): void
    {
        $template = $this->template('fnb-cafe-vintage', [
            'site_config_path' => 'f&b/minimalis/cafe-earthtone/cafe',
        ]);
        $package = WebiaPackage::factory()->create();

        $response = $this->post(route('orders.store'), [
            'package_id' => $package->id,
            'template_id' => $template->id,
            'name' => 'Pembeli Cafe',
            'email' => 'pembeli-cafe@example.com',
        ]);

        $order = WebiaOrder::where('webia_template_id', $template->id)->firstOrFail();
        $response->assertRedirect(route('orders.success'));
        $this->assertSame('f&b/minimalis/cafe-earthtone/cafe', $order->template_snapshot['site_config_path']);
    }

    public function test_customer_order_page_links_to_published_site(): void
    {
        $order = $this->cafeOrder([
            'delivery_status' => 'delivered',
            'site_slug' => 'kopi-kawan',
        ]);

        $this->actingAs($order->user)
            ->get(route('orders.show', $order))
            ->assertOk()
            ->assertSee('Website kamu siap')
            ->assertSee(route('sites.show', ['order' => 'kopi-kawan']), false);
    }

    /** @param array<string, mixed> $attributes */
    private function cafeOrder(array $attributes = [], string $templateSlug = 'fnb-cafe-minimalis'): WebiaOrder
    {
        $template = $this->template($templateSlug, [
            'site_config_path' => match ($templateSlug) {
                'fnb-cafe-minimalis' => 'f&b/minimalis/cafe-earthtone/cafe',
                'fnb-cafe-vintage' => 'f&b/vintage/cafe-earthtone/cafe',
                'fnb-cafe-elegan' => 'f&b/elegan/cafe-earthtone/cafe',
                default => null,
            },
        ]);

        return WebiaOrder::factory()->create(array_merge([
            'webia_template_id' => $template,
            'template_snapshot' => ['name' => $template->name, 'slug' => $template->slug, 'category_slug' => 'fnb', 'site_config_path' => $template->site_config_path],
            'status' => 'paid',
            'delivery_status' => 'in_progress',
            'business_data' => ['business_name' => 'Kopi Kawan'],
        ], $attributes));
    }

    /** @param array<string, mixed> $attributes */
    private function template(string $slug, array $attributes = []): WebiaTemplate
    {
        return WebiaTemplate::create(array_merge([
            'name' => 'Cafe Earthtone',
            'slug' => $slug,
            'category_slug' => 'fnb',
            'category_label' => 'F&B',
            'business_types' => ['Cafe & Eatery'],
            'design_style' => 'Minimalist',
            'description' => 'Template cafe.',
            'site_config_path' => $slug === 'fnb-cafe-minimalis' ? 'f&b/minimalis/cafe-earthtone/cafe' : null,
            'is_active' => true,
        ], $attributes));
    }
}
