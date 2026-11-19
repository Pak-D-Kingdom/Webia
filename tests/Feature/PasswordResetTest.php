<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_request_password_reset_link(): void
    {
        Notification::fake();
        $user = User::factory()->create();

        $this->post(route('password.email'), ['email' => $user->email])
            ->assertSessionHas('status');

        Notification::assertSentTo($user, ResetPassword::class);
    }

    public function test_guest_can_reset_password_with_valid_token(): void
    {
        Notification::fake();
        $user = User::factory()->create(['password' => 'password-lama']);

        $this->post(route('password.email'), ['email' => $user->email]);

        Notification::assertSentTo($user, ResetPassword::class, function (ResetPassword $notification) use ($user): bool {
            $this->post(route('password.store'), [
                'token' => $notification->token,
                'email' => $user->email,
                'password' => 'password-baru',
                'password_confirmation' => 'password-baru',
            ])->assertRedirect(route('login'));

            return true;
        });

        $this->assertTrue(Hash::check('password-baru', $user->fresh()->password));
    }

    public function test_password_reset_rejects_invalid_token(): void
    {
        $user = User::factory()->create(['password' => 'password-lama']);

        $this->from(route('password.reset', ['token' => 'invalid-token', 'email' => $user->email]))
            ->post(route('password.store'), [
                'token' => 'invalid-token',
                'email' => $user->email,
                'password' => 'password-baru',
                'password_confirmation' => 'password-baru',
            ])->assertSessionHasErrors('email');

        $this->assertTrue(Hash::check('password-lama', $user->fresh()->password));
    }
}
