<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ProfileUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_profile(): void
    {
        $this->get(route('profile.edit'))->assertRedirect(route('login'));
    }

    public function test_user_can_update_name_without_changing_email(): void
    {
        $user = User::factory()->create(['name' => 'Nama Lama']);

        $this->actingAs($user)->patch(route('profile.update'), [
            'name' => 'Nama Baru',
            'email' => $user->email,
        ])->assertRedirect(route('profile.edit'));

        $this->assertSame('Nama Baru', $user->fresh()->name);
    }

    public function test_changing_email_requires_current_password(): void
    {
        $user = User::factory()->create(['email' => 'lama@example.com']);

        $this->actingAs($user)->from(route('profile.edit'))->patch(route('profile.update'), [
            'name' => $user->name,
            'email' => 'baru@example.com',
        ])->assertRedirect(route('profile.edit'))->assertSessionHasErrors('current_password', null, 'profileUpdate');

        $this->assertSame('lama@example.com', $user->fresh()->email);
    }

    public function test_user_can_change_email_with_current_password(): void
    {
        $user = User::factory()->create(['email' => 'lama@example.com', 'password' => 'password']);

        $this->actingAs($user)->patch(route('profile.update'), [
            'name' => $user->name,
            'email' => 'baru@example.com',
            'current_password' => 'password',
        ])->assertRedirect(route('profile.edit'));

        $this->assertSame('baru@example.com', $user->fresh()->email);
    }

    public function test_user_can_update_password(): void
    {
        $user = User::factory()->create(['password' => 'password-lama']);

        $this->actingAs($user)->patch(route('profile.password'), [
            'current_password' => 'password-lama',
            'password' => 'password-baru',
            'password_confirmation' => 'password-baru',
        ])->assertRedirect(route('profile.edit'));

        $this->assertTrue(Hash::check('password-baru', $user->fresh()->password));
    }

    public function test_password_update_rejects_wrong_current_password(): void
    {
        $user = User::factory()->create(['password' => 'password-lama']);

        $this->actingAs($user)->from(route('profile.edit'))->patch(route('profile.password'), [
            'current_password' => 'salah',
            'password' => 'password-baru',
            'password_confirmation' => 'password-baru',
        ])->assertRedirect(route('profile.edit'))->assertSessionHasErrors('current_password', null, 'passwordUpdate');

        $this->assertTrue(Hash::check('password-lama', $user->fresh()->password));
    }
}
