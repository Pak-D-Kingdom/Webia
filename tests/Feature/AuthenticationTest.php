<?php

namespace Tests\Feature;

use App\Mail\AccountCredentialsMail;
use App\Models\User;
use App\Models\WebiaOrder;
use App\Models\WebiaPackage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_order_creates_account_and_sends_credentials(): void
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
        $this->assertDatabaseHas('users', ['email' => 'zainul@example.com', 'role' => 'customer']);
        $this->assertSame('awaiting_payment', $order->status);
        $this->assertSame(499000, $order->total_price);
        Mail::assertSent(AccountCredentialsMail::class, fn (AccountCredentialsMail $mail): bool => $mail->plainPassword !== null
            && $mail->hasTo('zainul@example.com')
            && $mail->order->is($order));
    }

    public function test_guest_order_with_existing_email_reuses_account(): void
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
        $this->assertSame($existing->id, $order->user_id);
        Mail::assertSent(AccountCredentialsMail::class, fn (AccountCredentialsMail $mail): bool => $mail->plainPassword === null
            && $mail->hasTo('zainul@example.com'));
    }

    public function test_guest_order_validates_account_fields(): void
    {
        $package = WebiaPackage::factory()->create();

        $this->post(route('orders.store'), [
            'package_id' => $package->id,
        ])->assertSessionHasErrors(['name', 'email']);

        $this->assertDatabaseCount('webia_orders', 0);
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
