<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\WebiaOrder;
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

    public function test_customer_site_is_not_public_before_delivery(): void
    {
        $order = $this->cafeOrder(['site_slug' => 'kopi-kawan']);

        $this->get(route('sites.show', ['order' => $order->site_slug]))->assertNotFound();
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
    private function cafeOrder(array $attributes = []): WebiaOrder
    {
        $template = $this->template('fnb-cafe-minimalis');

        return WebiaOrder::factory()->create(array_merge([
            'webia_template_id' => $template,
            'template_snapshot' => ['name' => $template->name, 'slug' => $template->slug, 'category_slug' => 'fnb'],
            'status' => 'paid',
            'delivery_status' => 'in_progress',
            'business_data' => ['business_name' => 'Kopi Kawan'],
        ], $attributes));
    }

    private function template(string $slug): WebiaTemplate
    {
        return WebiaTemplate::create([
            'name' => 'Cafe Earthtone',
            'slug' => $slug,
            'category_slug' => 'fnb',
            'category_label' => 'F&B',
            'business_types' => ['Cafe & Eatery'],
            'design_style' => 'Minimalist',
            'description' => 'Template cafe.',
            'is_active' => true,
        ]);
    }
}
