<?php

namespace Database\Seeders;

use App\Models\WebiaTemplate;
use Illuminate\Database\Seeder;

class seedersputri extends Seeder
{
    public function run(): void
    {
        $templates = [
            // Template 1 — Technology & IT · Software House · Elegant · Baby Blue
            [
                'name' => 'AzuraCraft Studio — Software House Elegant Baby Blue',
                'slug' => 'technology-softwarehouse-elegant-babyblue-putri',
                'category_slug' => 'technology-it',
                'category_label' => 'Technology & IT',
                'business_types' => ['Software House'],
                'design_style' => 'Elegant',
                'color_theme' => 'Baby Blue',
                'description' => 'Website software house elegan bernuansa Baby Blue untuk AzuraCraft Studio. Desain premium dengan showcase layanan aplikasi, portofolio, estimasi biaya, FAQ interaktif, WhatsApp, dan AI assistant.',
                'preview_style' => 'preview-company',
                'eyebrow' => 'CRAFTING ELEGANT DIGITAL EXPERIENCES',
                'headline' => 'Teknologi Elegan,<br>Solusi Tak Terbatas.',
                'tag' => 'Technology & IT · Software House · Elegant · Baby Blue',
                'preview_folder' => null,
                'template_url' => '/webia/template/technology-softwarehouse-elegant-babyblue-putri',
                'is_active' => true,
                'sort_order' => 50,
            ],

            // Template 2 — Technology & IT · Software House · Minimalist · Soft Pink (Sesuai Screenshot)
            [
                'name' => 'RoseCode Studio — Software House Minimalist Soft Pink',
                'slug' => 'technology-softwarehouse-minimalist-softpink-putri',
                'category_slug' => 'technology-it',
                'category_label' => 'Technology & IT',
                'business_types' => ['Software House'],
                'design_style' => 'Minimalist',
                'color_theme' => 'Soft Pink',
                'description' => 'Website software house bergaya minimalis bertema Soft Pink untuk RoseCode Studio. Desain bersih, arsitektur presisi, layanan aplikasi web & mobile, portofolio terukur, FAQ interaktif, floating WhatsApp, dan RoseCode AI.',
                'preview_style' => 'preview-company',
                'eyebrow' => 'MINIMALIST DIGITAL ENGINEERING',
                'headline' => 'Software Bersih,<br>Arsitektur Presisi.',
                'tag' => 'Technology & IT · Software House · Minimalist · Soft Pink',
                'preview_folder' => null,
                'template_url' => '/webia/template/technology-softwarehouse-minimalist-softpink-putri',
                'is_active' => true,
                'sort_order' => 52,
            ],

            // Template 3 — Technology & IT · Data Analytics · Luxury · Pastel Mix (Sesuai Screenshot)
            [
                'name' => 'AuraMetrics Studio — Data Analytics Luxury Pastel Mix',
                'slug' => 'technology-dataanalytics-luxury-pastelmix-putri',
                'category_slug' => 'technology-it',
                'category_label' => 'Technology & IT',
                'business_types' => ['Data Analytics'],
                'design_style' => 'Luxury',
                'color_theme' => 'Pastel Mix',
                'description' => 'Website konsultan analitik data mewah bertema Pastel Mix untuk AuraMetrics Studio. Solusi eksekutif business intelligence, predictive AI, lakehouse modern, visualisasi KPI mewah, kalkulator ROI, FAQ interaktif, WhatsApp concierge, dan AuraData AI.',
                'preview_style' => 'preview-company',
                'eyebrow' => 'BESPOKE ENTERPRISE DATA INTELLIGENCE',
                'headline' => 'Presisi Data Mewah,<br>Keputusan Bernilai Tinggi.',
                'tag' => 'Technology & IT · Data Analytics · Luxury · Pastel Mix',
                'preview_folder' => null,
                'template_url' => '/webia/template/technology-dataanalytics-luxury-pastelmix-putri',
                'is_active' => true,
                'sort_order' => 54,
            ],

            // Template Default — Technology & IT · Software House · Professional
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
