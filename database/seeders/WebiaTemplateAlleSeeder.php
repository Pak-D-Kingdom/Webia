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
                'description' => 'Artisanal bread & pastry catalog with category filters, pre-order & reservation inquiries, bespoke cake & luxury hampers consultation, artisan craft showcase, flagship boutique location with map directions & operating-hours notice, product availability, delivery & allergen FAQs, WhatsApp contact prompt, and AI Concierge demo FAQ interface.',
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

        WebiaTemplate::updateOrCreate(
            ['slug' => 'paws-clever-creative'],
            [
                'name' => 'Paws & Clever — Creative Pet Training Academy',
                'category_slug' => 'pet-animal-service',
                'category_label' => 'Pet & Animal Services',
                'business_types' => ['Pet Training Academy'],
                'design_style' => 'Creative & Organic',
                'color_theme' => 'Teal, Amber & Sand',
                'description' => 'Positive-reinforcement pet training programs, puppy socialization and obedience classes, behavioral modification and agility activities, trainer credentials and success metrics, agility park gallery, 60-minute trial evaluation booking form, BSD City academy location and home-visit service areas, operating hours and WhatsApp contact, vaccination and safety policy FAQs, and PawsAI assistant demo.',
                'preview_style' => 'preview-paws-clever-creative',
                'eyebrow' => 'POSITIVE REINFORCEMENT PET TRAINING',
                'headline' => 'Membentuk Sahabat Bulu yang Pintar & Bahagia!',
                'tag' => 'Pet & Animal Services · Pet Training Academy · Creative & Organic',
                'preview_folder' => null,
                'template_url' => '/webia/template/paws-clever-creative',
                'is_active' => true,
                'sort_order' => 35,
            ]
        );

        WebiaTemplate::updateOrCreate(
            ['slug' => 'paws-joy-jellypop'],
            [
                'name' => 'Paws & Joy — Playful Jellypop Pet Academy',
                'category_slug' => 'pet-animal-service',
                'category_label' => 'Pet & Animal Services',
                'business_types' => ['Pet Training Academy'],
                'design_style' => 'Playful & Colorful',
                'color_theme' => 'Grape, Lilac, Cotton Pink & Powder Blue',
                'description' => 'Playful pet academy landing page with positive-reinforcement training methods, puppy socialization and obedience programs, behavioral therapy, agility classes, sensory facilities, academy gallery, graduate testimonials, trial-session reservations, Kelapa Gading and BSD City locations, operating hours, FAQs, WhatsApp contact, and AI PawsBot demo.',
                'preview_style' => 'preview-paws-joy-jellypop',
                'eyebrow' => 'PLAYFUL PET BEHAVIORISTS',
                'headline' => 'Belajar Sambil Bermain, Anabul Pintar, Santun & Riang!',
                'tag' => 'Pet & Animal Services · Pet Training Academy · Playful & Colorful',
                'preview_folder' => null,
                'template_url' => '/webia/template/paws-joy-jellypop',
                'is_active' => true,
                'sort_order' => 36,
            ]
        );

        WebiaTemplate::updateOrCreate(
            ['slug' => 'paws-canine-terra-earth-tone'],
            [
                'name' => 'Canine Terra — Earth-Tone Holistic Dog Academy',
                'category_slug' => 'pet-animal-service',
                'category_label' => 'Pet & Animal Services',
                'business_types' => ['Holistic Dog Training Academy'],
                'design_style' => 'Earth-Tone & Editorial',
                'color_theme' => 'Forest Green, Terracotta & Warm Linen',
                'description' => 'Holistic dog-training sanctuary featuring positive reinforcement and nature therapy, puppy socialization, basic obedience, behavior correction, natural agility trails, outdoor and indoor facilities, trainer credentials, pawrent testimonials, 60-minute trial reservations, Sentul and BSD City locations, home visits, FAQs, and WhatsApp contact.',
                'preview_style' => 'preview-paws-canine-terra-earth-tone',
                'eyebrow' => 'POSITIVE REINFORCEMENT & NATURE THERAPY',
                'headline' => 'Menghidupkan Harmoni Naluri Alam dan Cinta Kasih Anabul.',
                'tag' => 'Pet & Animal Services · Holistic Dog Training · Earth-Tone',
                'preview_folder' => null,
                'template_url' => '/webia/template/paws-canine-terra-earth-tone',
                'is_active' => true,
                'sort_order' => 37,
            ]
        );
    }
}
