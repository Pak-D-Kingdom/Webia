<?php

namespace Database\Seeders;

use App\Models\WebiaTemplate;
use Illuminate\Database\Seeder;

class seedersputri extends Seeder
{
    public function run(): void
    {
        $templates = [
            // Template 1 — Technology & IT · Software House · Professional · Sage Green
            [
                'name' => 'PutraTech Studio — Software House Professional Sage Green',
                'slug' => 'technology-softwarehouse-professional-sagegreen-putri',
                'category_slug' => 'technology-it',
                'category_label' => 'Technology & IT',
                'business_types' => ['Software House'],
                'design_style' => 'Professional',
                'color_theme' => 'Sage Green',
                'description' => 'Website software house profesional berlatar Sage Green untuk PutraTech Studio. Menampilkan layanan pengembangan aplikasi, portofolio proyek, estimasi biaya, FAQ interaktif, floating WhatsApp, dan AI assistant.',
                'preview_style' => 'preview-company',
                'eyebrow' => 'BUILDING DIGITAL SOLUTIONS',
                'headline' => 'Software Handal,<br>Masa Depan Bisnis Anda.',
                'tag' => 'Technology & IT · Software House · Professional · Sage Green',
                'preview_folder' => null,
                'template_url' => '/webia/template/technology-softwarehouse-professional-sagegreen-putri',
                'is_active' => true,
                'sort_order' => 50,
            ],

            // Template 2 — Technology & IT · Software House · Elegant · Baby Blue
            [
                'name' => 'Nexora Digital — Software House',
                'slug' => 'technology-softwarehouse-professional',
                'category_slug' => 'technology-it',
                'category_label' => 'Technology & IT',
                'business_types' => ['Software House'],
                'design_style' => 'Professional',
                'color_theme' => 'Sage Green',
                'description' => 'Website software house profesional bertema Sage Green dengan showcase kapabilitas rekayasa, portfolio sistem enterprise berskala tinggi, transparansi harga proyek, estimasi biaya, FAQ interaktif, WhatsApp, dan asisten virtual Nexora AI.',
                'preview_style' => 'preview-company',
                'eyebrow' => 'SOFTWARE ENGINEERING & ARCHITECTURE',
                'headline' => 'Membangun Software<br>Tangguh & Skalabel.',
                'tag' => 'Technology & IT · Software House · Professional (Sage Green)',
                'preview_folder' => null,
                'template_url' => '/webia/template/technology-softwarehouse-professional',
                'is_active' => true,
                'sort_order' => 10,
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
