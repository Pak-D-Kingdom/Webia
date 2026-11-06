<?php

namespace Database\Seeders;

use App\Models\WebiaAddon;
use Illuminate\Database\Seeder;

class WebiaAddonSeeder extends Seeder
{
    public function run(): void
    {
        foreach ([
            ['name' => 'SEO Optimization', 'description' => 'Optimasi teknis dan konten sesuai ruang lingkup layanan.'],
            ['name' => 'Admin Dashboard', 'description' => 'Kelola konten website melalui panel admin jika dibutuhkan.'],
            ['name' => 'Custom Module', 'description' => 'Tambahkan fungsi khusus sesuai kebutuhan bisnis.'],
            ['name' => 'Integrasi Tambahan', 'description' => 'Integrasi layanan eksternal sesuai kesepakatan proyek.'],
        ] as $addon) {
            WebiaAddon::firstOrCreate(['name' => $addon['name']], $addon + ['is_active' => true]);
        }
    }
}
