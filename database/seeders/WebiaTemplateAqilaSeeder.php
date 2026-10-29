<?php

namespace Database\Seeders;

use App\Models\WebiaTemplate;
use Illuminate\Database\Seeder;

class WebiaTemplateAqilaSeeder extends Seeder
{
    public function run(): void
    {
        $templates = [
            [
                'name' => 'Restoran Azura — Hidangan Klasik',
                'slug' => 'restoran-azura',
                'category_slug' => 'fnb',
                'category_label' => 'F&B',
                'business_types' => ['Restaurant', 'Casual Dining'],
                'design_style' => 'Classic',
                'color_theme' => 'Sky Blue & Navy',
                'description' => 'Website restoran klasik dengan menu favorit, informasi layanan, reservasi WhatsApp, dan asisten virtual.',
                'preview_style' => 'preview-cafe',
                'eyebrow' => 'HIDANGAN KLASIK · SUASANA HANGAT',
                'headline' => 'Hidangan klasik,<br>meja yang hangat.',
                'tag' => 'F&B · Restaurant · Classic',
                'preview_folder' => null,
                'template_url' => '/webia/template/restoran-azura',
                'is_active' => true,
                'sort_order' => 29,
            ],
            [
                'name' => 'NOIR — Restaurant & Dining',
                'slug' => 'noir-restaurant',
                'category_slug' => 'fnb',
                'category_label' => 'F&B',
                'business_types' => ['Restaurant', 'Fine Dining'],
                'design_style' => 'Modern',
                'color_theme' => 'Black & Cream',
                'description' => 'Website restoran modern dengan menu signature, cerita restoran, FAQ, dan reservasi WhatsApp.',
                'preview_style' => 'preview-cafe',
                'eyebrow' => 'SEASONAL INGREDIENTS · THOUGHTFULLY PREPARED',
                'headline' => 'Less, but<br>exceptional.',
                'tag' => 'F&B · Fine Dining · Modern',
                'preview_folder' => null,
                'template_url' => '/webia/template/noir-restaurant',
                'is_active' => true,
                'sort_order' => 30,
            ],
            [
                'name' => 'Rumah Latte — Preschool & Daycare',
                'slug' => 'rumah-latte-preschool-daycare',
                'category_slug' => 'education',
                'category_label' => 'Education',
                'business_types' => ['Preschool', 'Daycare'],
                'design_style' => 'Playful',
                'color_theme' => 'Latte, Peach & Sunshine',
                'description' => 'Preschool dan daycare dengan program sesuai usia, fasilitas aman, biaya transparan, pendaftaran kunjungan, WhatsApp, dan asisten AI.',
                'preview_style' => 'preview-cafe',
                'eyebrow' => 'PRESCHOOL & DAYCARE · USIA 6 BULAN–6 TAHUN',
                'headline' => 'Belajar itu<br>seru dan bermakna.',
                'tag' => 'Education · Preschool & Daycare · Playful',
                'preview_folder' => null,
                'template_url' => '/webia/template/rumah-latte-preschool-daycare',
                'is_active' => true,
                'sort_order' => 31,
            ],
            [
                'name' => 'Tunas Cendekia — Preschool & Daycare',
                'slug' => 'tunas-cendekia-preschool-daycare',
                'category_slug' => 'education',
                'category_label' => 'Education',
                'business_types' => ['Preschool', 'Daycare'],
                'design_style' => 'Professional',
                'color_theme' => 'Navy, Teal & Sunshine',
                'description' => 'Preschool dan daycare dengan program sesuai tahap usia, jadwal harian, fasilitas aman, pendaftaran kunjungan, dan asisten informasi.',
                'preview_style' => 'preview-cafe',
                'eyebrow' => 'PRESCHOOL & DAYCARE · USIA 3 BULAN–6 TAHUN',
                'headline' => 'Tumbuh ceria,<br>belajar bermakna.',
                'tag' => 'Education · Preschool & Daycare · Professional',
                'preview_folder' => null,
                'template_url' => '/webia/template/tunas-cendekia-preschool-daycare',
                'is_active' => true,
                'sort_order' => 32,
            ],
            [
                'name' => 'Jeli Kecil — Preschool & Daycare',
                'slug' => 'jeli-kecil-preschool-daycare',
                'category_slug' => 'education',
                'category_label' => 'Education',
                'business_types' => ['Preschool & Daycare'],
                'design_style' => 'Playful & Colorful',
                'color_theme' => 'Grape Purple, Pastel Pink & Sky Blue',
                'description' => 'Preschool & daycare ceria untuk anak usia 6 bulan–6 tahun, lengkap dengan pilihan program sesuai tahap tumbuh kembang, rutinitas harian, fasilitas aman, galeri kegiatan, informasi biaya, formulir kunjungan, dan asisten interaktif untuk membantu orang tua mengenal program.',
                'preview_style' => 'preview-glow',
                'eyebrow' => 'PRESCHOOL & DAYCARE · USIA 6 BULAN–6 TAHUN',
                'headline' => 'Tumbuh ceria,<br>belajar dengan bahagia.',
                'tag' => 'Preschool & Daycare · Playful & Colorful',
                'preview_folder' => null,
                'template_url' => '/webia/template/education/preschool-daycare-jeli-kecil',
                'is_active' => true,
                'sort_order' => 33,
            ],
            [
                'name' => 'Ruang Tenang — Psikologi & Konseling',
                'slug' => 'ruang-tenang-psikologi-konseling',
                'category_slug' => 'healthcare',
                'category_label' => 'Healthcare',
                'business_types' => ['Psychology & Counseling'],
                'design_style' => 'Calm & Minimalist',
                'color_theme' => 'Sage Green, Warm Cream & Earth',
                'description' => 'Website psikologi dan konseling dengan informasi layanan individu, pasangan, keluarga, asesmen psikologis, pendekatan terapi, profil psikolog, paket sesi, testimoni, FAQ, serta bantuan penjadwalan melalui WhatsApp dan asisten virtual.',
                'preview_style' => 'preview-glow',
                'eyebrow' => 'PSIKOLOGI & KONSELING · RUANG AMAN UNTUK BERTUMBUH',
                'headline' => 'Ruang yang aman<br>untuk didengar dan pulih.',
                'tag' => 'Healthcare · Psychology & Counseling · Calm',
                'preview_folder' => null,
                'template_url' => '/webia/template/healthcare/psychology/ruang-tenang',
                'is_active' => true,
                'sort_order' => 34,
            ],
        ];

        foreach ($templates as $template) {
            WebiaTemplate::updateOrCreate(
                ['slug' => $template['slug']],
                $template
            );
        }
    }
}
