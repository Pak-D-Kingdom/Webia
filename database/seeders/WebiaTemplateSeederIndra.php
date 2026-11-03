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
            [
                'name' => 'Swiftly — Delivery Service Modern Emerald Express',
                'slug' => 'delivery-service-emerald-express',
                'category_slug' => 'transportation-logistics',
                'category_label' => 'Transportation & Logistics',
                'business_types' => ['Delivery Service', 'Logistics Company'],
                'design_style' => 'Modern & Fresh',
                'color_theme' => 'Emerald Green, White & Light Gray',
                'description' => 'Template delivery modern dengan tracking shipment, same-day delivery, express delivery, international shipping, quote form, statistik, dan testimonial.',
                'preview_style' => 'preview-glow',
                'eyebrow' => 'MODERN DELIVERY SERVICE',
                'headline' => 'Move what matters.<br>Move it swiftly.',
                'tag' => 'Transportation & Logistics · Delivery Service · Modern',
                'preview_folder' => null,
                'template_url' => '/webia/template/transportation-logistics/delivery/logistics-company-emerald-express',
                'is_active' => true,
                'sort_order' => 51,
            ],
            [
                'name' => 'Hearth & Haul — Classic Moving Company Navy Hearth',
                'slug' => 'moving-company-navy-hearth',
                'category_slug' => 'transportation-logistics',
                'category_label' => 'Transportation & Logistics',
                'business_types' => ['Moving Company', 'Packing Services'],
                'design_style' => 'Classic & Professional',
                'color_theme' => 'Midnight Navy, White, Gray & Beige',
                'description' => 'Template jasa pindahan classic dengan layanan residential moving, office relocation, long-distance moving, packing, estimator, proses, testimonial, dan FAQ.',
                'preview_style' => 'preview-glow',
                'eyebrow' => 'CLASSIC MOVING COMPANY',
                'headline' => 'For every chapter<br>that comes next.',
                'tag' => 'Transportation & Logistics · Moving Company · Classic',
                'preview_folder' => null,
                'template_url' => '/webia/template/transportation-logistics/moving/logistics-company-navy-hearth',
                'is_active' => true,
                'sort_order' => 52,
            ],
            [
                'name' => 'Atelier Move — Elegant Luxury Moving Rose Atelier',
                'slug' => 'moving-company-rose-atelier',
                'category_slug' => 'transportation-logistics',
                'category_label' => 'Transportation & Logistics',
                'business_types' => ['Luxury Moving Company', 'Furniture Handling'],
                'design_style' => 'Elegant & Luxury',
                'color_theme' => 'Rose Gold, Warm Beige, White & Charcoal',
                'description' => 'Template moving premium minimalist dengan luxury home moving, premium packing, office relocation, furniture handling, konsultasi concierge, proses terorganisasi, dan scheduling CTA.',
                'preview_style' => 'preview-glow',
                'eyebrow' => 'PRIVATE MOVING CONCIERGE',
                'headline' => 'Arrive with<br>intention.',
                'tag' => 'Transportation & Logistics · Moving Company · Luxury',
                'preview_folder' => null,
                'template_url' => '/webia/template/transportation-logistics/luxury/logistics-company-rose-atelier',
                'is_active' => true,
                'sort_order' => 53,
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
