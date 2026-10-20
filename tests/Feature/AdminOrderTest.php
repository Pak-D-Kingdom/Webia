<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\WebiaAddon;
use App\Models\WebiaOrder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminOrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_download_private_payment_receipt(): void
    {
        Storage::fake('local');
        Storage::disk('local')->put('payment-receipts/receipt.jpg', 'receipt');
        $admin = User::factory()->admin()->create();
        $order = WebiaOrder::factory()->create([
            'status' => 'payment_uploaded',
            'payment_receipt_path' => 'payment-receipts/receipt.jpg',
        ]);

        $this->actingAs($admin)
            ->get(route('admin.orders.receipt', $order))
            ->assertOk()
            ->assertDownload('receipt.jpg');
    }

    public function test_customer_cannot_download_private_payment_receipt(): void
    {
        Storage::fake('local');
        Storage::disk('local')->put('payment-receipts/receipt.jpg', 'receipt');
        $customer = User::factory()->create();
        $order = WebiaOrder::factory()->create([
            'payment_receipt_path' => 'payment-receipts/receipt.jpg',
        ]);

        $this->actingAs($customer)
            ->get(route('admin.orders.receipt', $order))
            ->assertForbidden();
    }

    public function test_admin_order_detail_shows_snapshot_and_payment_note(): void
    {
        $admin = User::factory()->admin()->create();
        $addon = WebiaAddon::factory()->create(['name' => 'SEO Optimization', 'price' => 250000]);
        $order = WebiaOrder::factory()->create([
            'package_snapshot' => ['name' => 'Pixel', 'price' => 499000],
            'addon_snapshot' => [['id' => $addon->id, 'name' => $addon->name, 'price' => $addon->price]],
            'payment_note' => 'Transfer atas nama Zainul.',
        ]);

        $this->actingAs($admin)
            ->get(route('admin.orders.show', $order))
            ->assertOk()
            ->assertSee('Pixel')
            ->assertSee('SEO Optimization')
            ->assertSee('Transfer atas nama Zainul.');
    }

    public function test_admin_can_verify_payment(): void
    {
        $admin = User::factory()->admin()->create();
        $order = WebiaOrder::factory()->create(['status' => 'payment_uploaded']);

        $response = $this->actingAs($admin)->post(route('admin.orders.verify', $order), [
            'action' => 'approve',
            'note' => 'Pembayaran sesuai.',
        ]);

        $response->assertRedirect(route('admin.orders.show', $order));
        $this->assertSame('paid', $order->fresh()->status);
        $this->assertDatabaseHas('webia_order_logs', [
            'webia_order_id' => $order->id,
            'from_status' => 'payment_uploaded',
            'to_status' => 'paid',
            'actor_id' => $admin->id,
        ]);
    }

    public function test_admin_can_reject_payment_with_note(): void
    {
        $admin = User::factory()->admin()->create();
        $order = WebiaOrder::factory()->create(['status' => 'payment_uploaded']);

        $this->actingAs($admin)->post(route('admin.orders.verify', $order), [
            'action' => 'reject',
            'note' => 'Nominal transfer tidak sesuai.',
        ])->assertRedirect(route('admin.orders.show', $order));

        $this->assertSame('rejected', $order->fresh()->status);
    }

    public function test_verification_rejects_invalid_transition(): void
    {
        $admin = User::factory()->admin()->create();
        $order = WebiaOrder::factory()->create(['status' => 'awaiting_payment']);

        $this->actingAs($admin)->post(route('admin.orders.verify', $order), [
            'action' => 'approve',
        ])->assertSessionHasErrors('status');

        $this->assertSame('awaiting_payment', $order->fresh()->status);
    }

    public function test_admin_order_list_filters_by_status(): void
    {
        $admin = User::factory()->admin()->create();
        $paid = WebiaOrder::factory()->create(['status' => 'paid']);
        WebiaOrder::factory()->create(['status' => 'awaiting_payment']);

        $this->actingAs($admin)
            ->get(route('admin.orders.index', ['status' => 'paid']))
            ->assertOk()
            ->assertSee($paid->order_number)
            ->assertSee('>Paid</a>', false)
            ->assertSee('aria-current="page"', false)
            ->assertViewHas('activeStatus', 'paid');
    }

    public function test_admin_order_list_pagination_orders_limit_per_page(): void
    {
        $admin = User::factory()->admin()->create();
        WebiaOrder::factory()->count(30)->create();

        $this->actingAs($admin)->get(route('admin.orders.index', ['page' => 1]))
            ->assertOk()
            ->assertViewHas('orders', fn ($orders) => $orders->count() === 20 && $orders->hasMorePages());
    }

    public function test_admin_order_list_paginator_preserves_status_filter_in_links(): void
    {
        $admin = User::factory()->admin()->create();
        WebiaOrder::factory()->count(25)->create(['status' => 'paid']);
        WebiaOrder::factory()->count(25)->create();

        $this->actingAs($admin)->get(route('admin.orders.index', ['status' => 'paid']))
            ->assertOk()
            ->assertSee('page=2', false)
            ->assertViewHas('orders', fn ($orders) => $orders->count() === 20);
    }
}
