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
            seedersputri::class,
            WebiaTemplateSeederAthiya::class,
            WebiaTemplateAlleSeeder::class,
            WebiaTemplateAqilaSeeder::class,
            WebiaPackageSeeder::class,
            WebiaAddonSeeder::class,
            AdminUserSeeder::class,
        ]);
    }
}
