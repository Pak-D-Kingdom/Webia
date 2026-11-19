<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $templates = [
            'aurumco-catering' => 'fnb/aurumco-catering',
            'vallaco-catering' => 'fnb/vallaco-catering',
            'laut-biru-seafood' => 'fnb/laut-biru-seafood',
            'fresh-harvest-healthy-meal-prep' => 'fnb/fresh-harvest-healthy-meal-prep',
            'bakery-bold-luxury' => 'fnb/bakery-bold-luxury',
            'midnightbaker-futuristic' => 'fnb/midnightbaker-futuristic',
            'fnb-bakery-playful-colorful-pastel-mix' => 'fnb/fnb-bakery-playful-colorful-pastel-mix',
            'restoran-azura' => 'fnb/restoran-azura',
            'noir-restaurant' => 'fnb/noir-restaurant',
            'rasa-rupa-artistik' => 'fnb/rasa-rupa-artistik',
            'tetangga-kenyang-friendly' => 'fnb/tetangga-kenyang-friendly',
            'hulu-pantry-asal-usul' => 'fnb/hulu-pantry-asal-usul',
            'kusuma-ningrat-royal-heritage' => 'fnb/kusuma-ningrat-royal-heritage',
        ];

        foreach ($templates as $slug => $siteConfigPath) {
            DB::table('webia_templates')
                ->where('slug', $slug)
                ->whereNull('site_config_path')
                ->update(['site_config_path' => $siteConfigPath]);
        }
    }

    public function down(): void
    {
        // Backfilled values cannot be distinguished safely from pre-existing configuration.
    }
};
