<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\WebiaOrder;
use App\Models\WebiaPackage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_order_stays_pending_without_account_until_payment(): void
    {
        Mail::fake();
        $package = WebiaPackage::factory()->create(['name' => 'Pixel', 'price' => 499000]);

        $response = $this->post(route('orders.store'), [
            'package_id' => $package->id,
            'name' => 'Zainul',
            'email' => 'zainul@example.com',
        ]);

        $order = WebiaOrder::first();
        $response->assertRedirect(route('orders.success'));
        $response->assertSessionHas('guest_order');
        $this->get(route('orders.success'))->assertOk()->assertSee($order->order_number);
        $this->assertGuest();
        // Akun baru hanya dibuat setelah pembayaran terkonfirmasi.
        $this->assertDatabaseCount('users', 0);
        $this->assertDatabaseHas('webia_orders', [
            'id' => $order->id,
            'user_id' => null,
            'guest_name' => 'Zainul',
            'guest_email' => 'zainul@example.com',
            'status' => 'awaiting_payment',
            'credential_status' => 'pending',
        ]);
        $this->assertSame(499000, $order->total_price);
        $this->assertDatabaseHas('webia_payments', ['webia_order_id' => $order->id, 'status' => 'created']);
        // Sebelum lunas tidak ada klaim email kredensial.
        Mail::assertNothingSent();
    }

    public function test_guest_order_with_existing_email_does_not_touch_accounts(): void
    {
        Mail::fake();
        $existing = User::factory()->create(['email' => 'zainul@example.com', 'password' => 'password123']);
        $package = WebiaPackage::factory()->create();

        $this->post(route('orders.store'), [
            'package_id' => $package->id,
            'name' => 'Zainul',
            'email' => 'zainul@example.com',
        ])->assertRedirect(route('orders.success'));

        $this->assertSame(1, User::where('email', 'zainul@example.com')->count());
        $order = WebiaOrder::first();
        $this->assertNull($order->user_id);
        $this->assertSame('zainul@example.com', $order->guest_email);
        Mail::assertNothingSent();
    }

    public function test_guest_modal_order_returns_payment_data_as_json(): void
    {
        Mail::fake();
        config([
            'webia.midtrans.server_key' => 'SB-Mid-server-test-key',
            'webia.midtrans.client_key' => 'SB-Mid-client-test-key',
        ]);
        Http::fake([
            'api.sandbox.midtrans.com/snap/v1/transactions' => Http::response([
                'token' => 'snap-modal-token',
                'redirect_url' => 'https://app.sandbox.midtrans.com/snap/pay',
            ]),
        ]);
        $package = WebiaPackage::factory()->create(['price' => 499000]);

        $response = $this->postJson(route('orders.store'), [
            'package_id' => $package->id,
            'name' => 'Zainul',
            'email' => 'zainul@example.com',
        ]);

        $order = WebiaOrder::firstOrFail();
        $response->assertCreated()->assertJson([
            'order_number' => $order->order_number,
            'email' => 'zainul@example.com',
            'status' => 'awaiting_payment',
            'snap_token' => 'snap-modal-token',
        ]);
        $response->assertSessionHas('guest_order.order_id', $order->id);
        $statusUrl = $response->json('payment_status_url');
        $this->assertIsString($statusUrl);
        $this->getJson($statusUrl)->assertOk()->assertJson(['status' => 'created']);
    }

    public function test_guest_modal_order_exposes_recovery_when_midtrans_transaction_fails(): void
    {
        Mail::fake();
        config(['webia.midtrans.server_key' => 'SB-Mid-server-test-key']);
        Http::fake([
            'api.sandbox.midtrans.com/snap/v1/transactions' => Http::response([], 500),
        ]);
        $package = WebiaPackage::factory()->create();

        $this->postJson(route('orders.store'), [
            'package_id' => $package->id,
            'name' => 'Zainul',
            'email' => 'zainul@example.com',
        ])->assertCreated()->assertJson([
            'payment_ready' => false,
            'snap_token' => null,
            'snap_redirect_url' => null,
        ]);
    }

    public function test_authenticated_json_order_keeps_detail_redirect_contract(): void
    {
        $user = User::factory()->create();
        $package = WebiaPackage::factory()->create();

        $response = $this->actingAs($user)->postJson(route('orders.store'), [
            'package_id' => $package->id,
        ]);

        $response->assertRedirect(route('orders.show', WebiaOrder::firstOrFail()));
        $response->assertSessionMissing('guest_order');
    }

    public function test_guest_order_validates_account_fields(): void
    {
        $package = WebiaPackage::factory()->create();

        $this->post(route('orders.store'), [
            'package_id' => $package->id,
        ])->assertSessionHasErrors(['name', 'email']);

        $this->assertDatabaseCount('webia_orders', 0);
    }

    public function test_guest_modal_order_does_not_send_credentials_before_payment(): void
    {
        Mail::fake();
        config([
            'webia.midtrans.server_key' => 'SB-Mid-server-test-key',
            'webia.midtrans.client_key' => 'SB-Mid-client-test-key',
        ]);
        Http::fake([
            'api.sandbox.midtrans.com/snap/v1/transactions' => Http::response([
                'token' => 'snap-modal-token',
                'redirect_url' => 'https://app.sandbox.midtrans.com/snap/pay',
            ]),
        ]);
        $package = WebiaPackage::factory()->create(['price' => 499000]);

        $this->postJson(route('orders.store'), [
            'package_id' => $package->id,
            'name' => 'Zainul',
            'email' => 'zainul@example.com',
        ]);

        $this->assertDatabaseCount('users', 0);
        Mail::assertNothingSent();
    }

    public function test_customer_can_log_in_and_log_out(): void
    {
        $user = User::factory()->create();

        $loginResponse = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $loginResponse->assertRedirect(route('dashboard'));
        $this->assertAuthenticatedAs($user);

        $logoutResponse = $this->post(route('logout'));

        $logoutResponse->assertRedirect(route('home'));
        $this->assertGuest();
    }

    public function test_login_rejects_invalid_credentials(): void
    {
        User::factory()->create(['email' => 'zainul@example.com']);

        $response = $this->from(route('login'))->post(route('login'), [
            'email' => 'zainul@example.com',
            'password' => 'wrong-password',
        ]);

        $response->assertRedirect(route('login'));
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }
}
