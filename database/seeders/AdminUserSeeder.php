<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = config('auth.admins.admin');
        $isProduction = config('app.env') === 'production';

        // With no ADMIN_PASSWORD the default must never ship to production.
        if ($isProduction && $admin['password'] === 'password') {
            return;
        }

        $account = User::firstOrNew(['email' => $admin['email']]);
        $account->name = $admin['name'];
        $account->password = $admin['password'];
        $account->role = 'admin';
        $account->save();
    }
}
