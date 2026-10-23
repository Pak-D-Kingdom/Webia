<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\WebiaOrder;
use App\Models\WebiaPackage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_customer_dashboard_shows_latest_active_order_and_only_own_history(): void
    {
        $customer = User::factory()->create(['name' => 'Ayu']);
        $package = WebiaPackage::factory()->create(['name' => 'Pixel']);
        $activeOrder = WebiaOrder::factory()->for($customer)->for($package, 'package')->create([
            'order_number' => 'WEB-ACTIVE',
            'status' => 'paid',
            'delivery_status' => 'not_started',
        ]);
        WebiaOrder::factory()->for($customer)->create([
            'order_number' => 'WEB-DONE',
            'status' => 'paid',
            'delivery_status' => 'delivered',
        ]);
        WebiaOrder::factory()->create(['order_number' => 'WEB-OTHER']);

        $this->actingAs($customer)
            ->get(route('dashboard'))
            ->assertOk()
            ->assertSee('WEB-ACTIVE')
            ->assertSee('WEB-DONE')
            ->assertSee('Lengkapi data bisnis')
            ->assertDontSee('WEB-OTHER')
            ->assertViewHas('activeOrder', fn (?WebiaOrder $order): bool => $order?->is($activeOrder));
    }

    public function test_admin_dashboard_shows_real_operational_counts_and_attention_queue(): void
    {
        $admin = User::factory()->admin()->create();
        $verification = WebiaOrder::factory()->create([
            'order_number' => 'WEB-VERIFY',
            'status' => 'payment_uploaded',
        ]);
        WebiaOrder::factory()->create([
            'status' => 'paid',
            'delivery_status' => 'in_progress',
        ]);
        WebiaOrder::factory()->create([
            'status' => 'paid',
            'delivery_status' => 'delivered',
        ]);

        $this->actingAs($admin)
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('WEB-VERIFY')
            ->assertViewHas('attention', fn ($orders): bool => $orders->contains($verification))
            ->assertViewHas('counts', [
                'verification' => 1,
                'in_progress' => 1,
                'active' => 2,
                'delivered' => 1,
            ]);
    }

    public function test_admin_dashboard_sums_verified_revenue_within_last_30_days(): void
    {
        $admin = User::factory()->admin()->create();
        WebiaOrder::factory()->create([
            'status' => 'paid',
            'total_price' => 150000,
            'paid_at' => now()->subDays(2),
        ]);
        WebiaOrder::factory()->create([
            'status' => 'paid',
            'total_price' => 250000,
            'paid_at' => now()->subDays(40),
        ]);

        $this->actingAs($admin)
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('Pendapatan 30 hari')
            ->assertSee('Rp 150.000');
    }

    public function test_order_progress_index_tracks_payment_and_delivery_status(): void
    {
        $order = WebiaOrder::factory()->make([
            'status' => 'payment_uploaded',
            'delivery_status' => 'not_started',
        ]);

        $this->assertSame(1, $order->progress_index);

        $order->status = 'paid';
        $order->delivery_status = 'in_progress';
        $this->assertSame(3, $order->progress_index);

        $order->delivery_status = 'delivered';
        $this->assertSame(4, $order->progress_index);
    }
}
