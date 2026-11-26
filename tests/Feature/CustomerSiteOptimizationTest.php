<?php

namespace Tests\Feature;

use App\Models\WebiaOrder;
use App\Models\WebiaTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerSiteOptimizationTest extends TestCase
{
    use RefreshDatabase;

    public function test_customer_site_caches_rendered_html_and_invalidates_on_order_update(): void
    {
        $template = WebiaTemplate::updateOrCreate(
            ['slug' => 'wildtrail-adventure-outdoor'],
            [
                'name' => 'Wildtrail Adventure Outdoor',
                'category_slug' => 'travel-tourism',
                'category_label' => 'Travel Tourism',
                'business_types' => ['Travel'],
                'design_style' => 'Modern',
                'description' => 'Test',
                'site_config_path' => 'travel-standalone/wildtrail-adventure-outdoor',
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
            'site_slug' => 'opt-cache-test-site',
            'business_data' => [
                'business_name' => 'Nusantara Explorer Alpha',
                'whatsapp' => '081233344455',
            ],
        ]);

        // First request -> MISS
        $first = $this->get(route('sites.show', ['order' => $order->site_slug]));
        $first->assertOk()
            ->assertHeader('X-Webia-Cache', 'MISS')
            ->assertSee('Nusantara Explorer Alpha')
            ->assertSee('webia-client-bridge.js', false)
            ->assertDontSee('__WEBIA_CSRF_TOKEN__', false);

        // Second request -> HIT
        $second = $this->get(route('sites.show', ['order' => $order->site_slug]));
        $second->assertOk()
            ->assertHeader('X-Webia-Cache', 'HIT')
            ->assertSee('Nusantara Explorer Alpha')
            ->assertDontSee('__WEBIA_CSRF_TOKEN__', false);

        // Update order business_data -> auto-invalidates cache -> MISS with updated name
        $order->update([
            'business_data' => [
                'business_name' => 'Nusantara Explorer Beta',
                'whatsapp' => '081233344455',
            ],
        ]);

        $third = $this->get(route('sites.show', ['order' => $order->site_slug]));
        $third->assertOk()
            ->assertHeader('X-Webia-Cache', 'MISS')
            ->assertSee('Nusantara Explorer Beta')
            ->assertDontSee('Nusantara Explorer Alpha');

        $this->assertFileExists(public_path('js/webia-client-bridge.js'));

        $template->update(['headline' => 'Template yang diperbarui']);

        $afterTemplateUpdate = $this->get(route('sites.show', ['order' => $order->site_slug]));
        $afterTemplateUpdate->assertOk()
            ->assertHeader('X-Webia-Cache', 'MISS');

        $this->postJson(route('sites.bridge-event', ['order' => $order->site_slug]), [
            'event' => 'adapter_bound',
            'adapter' => 'data-chat',
            'latency_ms' => 12,
        ])->assertOk()
            ->assertJsonPath('status', 'recorded');
    }
}
