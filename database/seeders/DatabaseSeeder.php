<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            WebiaTemplateSeeder::class,
            WebiaTemplateNabiilaSeeder::class,
<<<<<<< HEAD
            seedersputri::class,
=======
            WebiaTemplateSeederAthiya::class,
            WebiaTemplateAlleSeeder::class,
>>>>>>> 5bc3169d5dad1659b5347220ca4d63b7f3daf96f
            WebiaPackageSeeder::class,
            WebiaAddonSeeder::class,
            AdminUserSeeder::class,
        ]);
    }
}
