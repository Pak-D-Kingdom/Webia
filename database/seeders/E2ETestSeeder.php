<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class E2ETestSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            WebiaPackageSeeder::class,
            WebiaAddonSeeder::class,
            WebiaTemplateSeeder::class,
            WebiaTemplateSeederAthiya::class,
            WebiaTemplateAqilaSeeder::class,
            WebiaTemplatePreviewSeeder::class,
        ]);

        $admin = User::firstOrNew(['email' => 'admin@webia.test']);
        $admin->name = 'Admin WEBIA';
        $admin->password = 'password';
        $admin->role = 'admin';
        $admin->save();

        $customer = User::firstOrNew(['email' => 'order-customer@webia.test']);
        $customer->name = 'Order Customer';
        $customer->password = 'password123';
        $customer->role = 'customer';
        $customer->save();
    }
}
