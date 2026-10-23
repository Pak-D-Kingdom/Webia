<?php

namespace Database\Seeders;

use App\Models\WebiaTemplate;
use Illuminate\Database\Seeder;

class WebiaTemplateAlleSeeder extends Seeder
{
    public function run(): void
    {
        WebiaTemplate::updateOrCreate(
            ['slug' => 'bakery-bold-luxury'],
            [
                'name' => 'Maison Breads & Pastry — Bold Luxury Bakery',
                'category_slug' => 'fnb',
                'category_label' => 'Food & Beverage',
                'business_types' => ['Bakery'],
                'design_style' => 'Bold Luxury',
                'color_theme' => 'Espresso & Ochre',
                'description' => 'Website bakery artisan bergaya bold luxury dengan katalog roti dan pastry, pre-order WhatsApp, informasi outlet, chatbot demo, dan FAQ.',
                'preview_style' => 'preview-bakery-bold-luxury',
                'eyebrow' => 'CRAFTED WITH PASSION',
                'headline' => 'Artisanal Breads.<br>Unmatched Excellence.',
                'tag' => 'Food & Beverage · Bakery · Bold Luxury',
                'preview_folder' => null,
                'template_url' => '/webia/template/bakery-bold-luxury',
                'is_active' => true,
                'sort_order' => 33,
            ]
        );

        WebiaTemplate::updateOrCreate(
            ['slug' => 'midnightbaker-futuristic'],
            [
                'name' => 'MIDNIGHTBAKER — Futuristic Artisan Bakery',
                'category_slug' => 'fnb',
                'category_label' => 'Food & Beverage',
                'business_types' => ['Bakery & Pastry'],
                'design_style' => 'Futuristic Luxury',
                'color_theme' => 'Midnight Navy & Champagne Gold',
                'description' => 'Website bakery artisan futuristik dengan katalog roti dan pastry, cerita proses pembuatan, informasi lokasi, FAQ, dan concierge demo.',
                'preview_style' => 'preview-midnightbaker-futuristic',
                'eyebrow' => 'ARTISAN BAKERY & PASTRY',
                'headline' => 'Tradition Meets The Future.',
                'tag' => 'Food & Beverage · Bakery & Pastry · Futuristic Luxury',
                'preview_folder' => null,
                'template_url' => '/webia/template/midnightbaker-futuristic',
                'is_active' => true,
                'sort_order' => 34,
            ]
        );
    }
}
