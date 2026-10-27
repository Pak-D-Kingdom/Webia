<?php

namespace Database\Seeders;

use App\Models\WebiaTemplate;
use Illuminate\Database\Seeder;

class WebiaTemplateSeederIndra extends Seeder
{
    public function run(): void
    {
        $templates = [
            [
                'name' => 'Tidal Detail Co. — Artistic Automotive',
                'slug' => 'tidal-detail-artistic-automotive',
                'category_slug' => 'automotive',
                'category_label' => 'Automotive',
                'business_types' => ['Auto Detailing', 'Perawatan Kendaraan'],
                'design_style' => 'Artistic',
                'color_theme' => 'Ocean Blue & White',
                'description' => 'Website auto detailing artistik dengan nuansa ocean blue untuk layanan perawatan kendaraan premium.',
                'preview_style' => 'preview-auto preview-auto-artistic',
                'eyebrow' => 'AUTO DETAILING · EST. 2014',
                'headline' => 'Detailing that<br>moves with you.',
                'tag' => 'Automotive · Auto Detailing · Artistic',
                'preview_folder' => null,
                'template_url' => '/webia/template/tidal-detail-artistic-automotive',
                'is_active' => true,
                'sort_order' => 29,
            ],
            [
                'name' => 'Noir Atelier — Luxury Automotive',
                'slug' => 'noir-atelier-luxury-automotive',
                'category_slug' => 'automotive',
                'category_label' => 'Automotive',
                'business_types' => ['Auto Detailing', 'Ceramic Coating & PPF'],
                'design_style' => 'Luxury',
                'color_theme' => 'Charcoal & Warm White',
                'description' => 'Website automotive premium dengan nuansa dark mode untuk layanan detailing dan perlindungan kendaraan eksklusif.',
                'preview_style' => 'preview-auto preview-auto-luxury',
                'eyebrow' => 'PRIVATE AUTOMOTIVE CARE',
                'headline' => 'The quiet art of<br>a perfect finish.',
                'tag' => 'Automotive · Private Care · Luxury',
                'preview_folder' => null,
                'template_url' => '/webia/template/noir-atelier-luxury-automotive',
                'is_active' => true,
                'sort_order' => 30,
            ],
            [
                'name' => 'FORM / Auto Care — Minimal Automotive',
                'slug' => 'form-auto-care-minimal-automotive',
                'category_slug' => 'automotive',
                'category_label' => 'Automotive',
                'business_types' => ['Auto Detailing', 'Paint Correction & Coating'],
                'design_style' => 'Minimal',
                'color_theme' => 'Black, Gold & Ivory',
                'description' => 'Website auto care minimal yang rapi, transparan, dan berfokus pada hasil perawatan kendaraan.',
                'preview_style' => 'preview-auto preview-auto-minimal',
                'eyebrow' => 'DETAILING · PROTECTION · TRUST',
                'headline' => 'Good cars<br>deserve good care.',
                'tag' => 'Automotive · Auto Care · Minimal',
                'preview_folder' => null,
                'template_url' => '/webia/template/form-auto-care-minimal-automotive',
                'is_active' => true,
                'sort_order' => 31,
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
