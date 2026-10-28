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
        ];

        foreach ($templates as $template) {
            WebiaTemplate::updateOrCreate(
                ['slug' => $template['slug']],
                $template
            );
        }
    }
}
