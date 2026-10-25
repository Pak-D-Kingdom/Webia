<?php

namespace Database\Seeders;

use App\Models\WebiaTemplate;
use Illuminate\Database\Seeder;

class WebiaTemplateSeederAthiya extends Seeder
{
    public function run(): void
    {
        $templates = [
            // Template 1: Aurum & Co. (Luxury Modern Elegant)
            [
                'name' => 'Aurum & Co. — Haute Gastronomy',
                'slug' => 'aurumco-catering',
                'category_slug' => 'fnb',
                'category_label' => 'F&B',
                'business_types' => ['Catering', 'Wedding & Event Catering', 'Private Chef'],
                'design_style' => 'Luxury',
                'color_theme' => 'Obsidian & Gold',
                'description' => 'Website catering mewah avant-garde untuk gala, jamuan privat, wedding haute cuisine, dan kalkulator dossier WhatsApp.',
                'preview_style' => 'preview-cafe',
                'eyebrow' => 'AVANT-GARDE CULINARY ATELIER',
                'headline' => 'Gastronomy as<br>Living Sculpture.',
                'tag' => 'F&B · Luxury Catering · Obsidian & Gold',
                'preview_folder' => null,
                'template_url' => '/webia/template/aurumco-catering',
                'is_active' => true,
                'sort_order' => 20,
            ],

            // Template 2: Valla & Co. (Nordic Botanical Clean)
            [
                'name' => 'Valla & Co. — Nordic Botanical Catering',
                'slug' => 'vallaco-catering',
                'category_slug' => 'fnb',
                'category_label' => 'F&B',
                'business_types' => ['Catering', 'Wedding & Event Catering', 'Private Chef'],
                'design_style' => 'Minimalist',
                'color_theme' => 'Moss Green & Linen',
                'description' => 'Website catering botanical bergaya Skandinavia untuk intimate wedding, retreat, dan gathering dengan live budget estimator dan direct WhatsApp.',
                'preview_style' => 'preview-cafe',
                'eyebrow' => 'SLOW LIVING · FORAGED INGREDIENTS · BESPOKE FEASTS',
                'headline' => 'Quiet luxury,<br>organic stillness.',
                'tag' => 'F&B · Nordic Botanical Catering · Minimalist',
                'preview_folder' => null,
                'template_url' => '/webia/template/vallaco-catering',
                'is_active' => true,
                'sort_order' => 21,
            ],

            // Template 3: Kusuma Ningrat (Deep Emerald & Royal Gold)
            [
                'name' => 'Kusuma Ningrat — Royal Heritage Catering',
                'slug' => 'kusuma-ningrat-royal-heritage',
                'category_slug' => 'fnb',
                'category_label' => 'F&B',
                'business_types' => ['Catering', 'Wedding & Event Catering', 'Royal Banquet'],
                'design_style' => 'Royal Heritage',
                'color_theme' => 'Deep Emerald & Antique Gold',
                'description' => 'Website katering jamuan agung pusaka keraton dengan ornamen megah, pustaka resep pusaka, kalkulator perjamuan keraton, dan Abdi Dalem AI WhatsApp concierge.',
                'preview_style' => 'preview-glow',
                'eyebrow' => 'PERJAMUAN AGUNG PUSAKA NUSANTARA',
                'headline' => 'Citarasa Adiluhung,<br>Keagungan Perjamuan Keraton.',
                'tag' => 'F&B · Royal Heritage Catering · Deep Emerald & Gold',
                'preview_folder' => null,
                'template_url' => '/webia/template/kusuma-ningrat-royal-heritage',
                'is_active' => true,
                'sort_order' => 22,
            ],
            [
                'name' => 'NUVIA Skin Tech Clinic — Graphite & Lilac',
                'slug' => 'nuvia-skin-tech-clinic',
                'category_slug' => 'beauty',
                'category_label' => 'Beauty',
                'business_types' => ['Beauty Clinic'],
                'design_style' => 'Professional',
                'color_theme' => 'Graphite & Lilac',
                'description' => 'Website klinik kulit dan estetika dengan pemetaan wajah interaktif, informasi teknologi perawatan, profil dokter, reservasi WhatsApp, asisten chat, dan pilihan tema dark atau bright.',
                'preview_style' => 'preview-glow',
                'eyebrow' => 'SKIN TECH · DERMATOLOGY · PERSONAL CARE',
                'headline' => 'Kulit sehat,<br>dibaca dengan presisi.',
                'tag' => 'Beauty · Beauty Clinic · Graphite & Lilac',
                'preview_folder' => null,
                'template_url' => '/webia/template/nuvia-skin-tech-clinic',
                'is_active' => true,
                'sort_order' => 23,
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
