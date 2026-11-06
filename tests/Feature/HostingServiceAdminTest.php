<?php

namespace Tests\Feature;

use App\Models\HostingService;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HostingServiceAdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_a_scheduled_hosting_service_for_an_existing_customer(): void
    {
        $this->travelTo('2026-11-06 08:00:00');
        $admin = User::factory()->admin()->create();
        $customer = User::factory()->create(['role' => 'customer']);

        $response = $this->actingAs($admin)->post(route('admin.hosting-services.store'), [
            'user_id' => $customer->id,
            'website_name' => 'Toko Maju',
            'domain' => 'tokomaju.id',
            'monthly_price' => 150000,
            'activation_date' => '2026-11-10',
        ]);

        $service = HostingService::sole();
        $response->assertRedirect(route('admin.hosting-services.show', $service));
        $this->assertSame(10, $service->billing_cycle_day);
        $this->assertSame('scheduled', $service->billing_status);
    }

    public function test_admin_cannot_use_a_past_activation_date(): void
    {
        $this->travelTo('2026-11-06 08:00:00');
        $admin = User::factory()->admin()->create();
        $customer = User::factory()->create();

        $this->actingAs($admin)->post(route('admin.hosting-services.store'), [
            'user_id' => $customer->id,
            'website_name' => 'Toko Maju',
            'domain' => 'tokomaju.id',
            'monthly_price' => 150000,
            'activation_date' => '2026-11-05',
        ])->assertSessionHasErrors('activation_date');

        $this->assertDatabaseCount('hosting_services', 0);
    }

    public function test_customer_cannot_access_hosting_service_admin_pages(): void
    {
        $customer = User::factory()->create();

        $this->actingAs($customer)->get(route('admin.hosting-services.index'))->assertForbidden();
    }
}
