<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class AdminSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_user_seeder_creates_admin_account(): void
    {
        Artisan::call('db:seed', ['--class' => 'AdminUserSeeder', '--force' => true]);

        $admin = User::where('email', 'admin@webia.test')->first();
        $this->assertNotNull($admin);
        $this->assertSame('Admin WEBIA', $admin->name);
        $this->assertSame('admin', $admin->role);
    }

    public function test_admin_user_seeder_is_idempotent(): void
    {
        Artisan::call('db:seed', ['--class' => 'AdminUserSeeder', '--force' => true]);
        Artisan::call('db:seed', ['--class' => 'AdminUserSeeder', '--force' => true]);

        $this->assertSame(1, User::where('email', 'admin@webia.test')->count());
    }

    public function test_admin_user_seeder_respects_env_credential_overrides(): void
    {
        config(['auth.admins.admin' => ['email' => 'custom@webia.test', 'name' => 'Custom Admin', 'password' => 'custom-secret']]);

        Artisan::call('db:seed', ['--class' => 'AdminUserSeeder', '--force' => true]);

        $admin = User::where('email', 'custom@webia.test')->first();
        $this->assertNotNull($admin);
        $this->assertSame('Custom Admin', $admin->name);
        $this->assertSame('admin', $admin->role);
    }

    public function test_admin_user_seeder_skips_default_password_in_production(): void
    {
        config(['app.env' => 'production']);

        Artisan::call('db:seed', ['--class' => 'AdminUserSeeder', '--force' => true]);

        $this->assertNull(User::where('email', 'admin@webia.test')->first());
    }

    public function test_admin_user_seeder_allows_strong_password_credentials_in_production(): void
    {
        config(['app.env' => 'production']);
        config(['auth.admins.admin' => ['email' => 'custom@webia.test', 'name' => 'Custom Admin', 'password' => 'custom-secret']]);

        Artisan::call('db:seed', ['--class' => 'AdminUserSeeder', '--force' => true]);

        $this->assertNotNull(User::where('email', 'custom@webia.test')->first());
    }
}
