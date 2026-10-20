<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_customer_can_register(): void
    {
        $response = $this->post(route('register'), [
            'name' => 'Zainul',
            'email' => 'zainul@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect(route('dashboard'));
        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', [
            'email' => 'zainul@example.com',
            'role' => 'customer',
        ]);
    }

    public function test_registration_validates_required_fields(): void
    {
        $response = $this->from(route('register'))->post(route('register'), []);

        $response->assertRedirect(route('register'));
        $response->assertSessionHasErrors(['name', 'email', 'password']);
        $this->assertGuest();
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
