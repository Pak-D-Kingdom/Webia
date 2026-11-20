<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $templates = [
            'paws-clever-creative' => 'pet-animal-service/paws-clever-creative',
            'paws-joy-jellypop' => 'pet-animal-service/paws-joy-jellypop',
            'paws-canine-terra-earth-tone' => 'pet-animal-service/paws-canine-terra-earth-tone',
            'pawtopia-animal-care' => 'pet-animal-service/pawtopia-animal-care',
            'pawlora-animal-care' => 'pet-animal-service/pawlora-animal-care',
            'pawstead-animal-care' => 'pet-animal-service/pawstead-animal-care',
            'petshop-minimalist-glacierblue' => 'pet-animal-service/petshop-minimalist-glacierblue',
            'petshop-luxury-rosegold' => 'pet-animal-service/petshop-luxury-rosegold',
            'petshop-corporate-plumvelvet' => 'pet-animal-service/petshop-corporate-plumvelvet',
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
