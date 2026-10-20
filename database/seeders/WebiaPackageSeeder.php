<?php

namespace Database\Seeders;

use App\Models\WebiaPackage;
use Illuminate\Database\Seeder;

class WebiaPackageSeeder extends Seeder
{
    public function run(): void
    {
        $packages = [
            ['name' => 'Pixel', 'slug' => 'pixel', 'description' => 'Landing page sederhana untuk usaha kecil yang ingin tampil profesional.', 'price' => 499000, 'cms_enabled' => false, 'chatbot_monthly_quota' => 500, 'features' => ['1 halaman landing page', 'WhatsApp, kontak, dan peta', 'AI Chatbot 500 pesan/bulan'], 'sort_order' => 1],
            ['name' => 'Pulse', 'slug' => 'pulse', 'description' => 'Landing page lebih lengkap untuk memperkuat kehadiran digital.', 'old_price' => 1199000, 'price' => 899000, 'cms_enabled' => false, 'chatbot_monthly_quota' => 1500, 'features' => ['Galeri, testimoni, layanan, FAQ', 'AI Chatbot 1.500 pesan/bulan', 'SEO dasar dan analitik'], 'sort_order' => 2],
            ['name' => 'Nexus', 'slug' => 'nexus', 'description' => 'Kelola konten, layanan, produk, dan artikel secara mandiri.', 'old_price' => 1999000, 'price' => 1499000, 'cms_enabled' => true, 'chatbot_monthly_quota' => 2500, 'features' => ['Website beberapa halaman', 'CMS dan tracking data pelanggan', 'AI Chatbot 2.500 pesan/bulan'], 'sort_order' => 3],
            ['name' => 'Infinity', 'slug' => 'infinity', 'description' => 'Website fleksibel dengan CMS lanjutan dan fitur custom.', 'old_price' => 3499000, 'price' => 2499000, 'cms_enabled' => true, 'chatbot_monthly_quota' => 5000, 'features' => ['Custom fitur sesuai kebutuhan', 'CMS lanjutan dan tracking pelanggan', 'AI Chatbot 5.000 pesan/bulan'], 'sort_order' => 4],
        ];

        foreach ($packages as $package) {
            WebiaPackage::updateOrCreate(['slug' => $package['slug']], $package + ['is_active' => true]);
        }
    }
}
