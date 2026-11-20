<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $templates = [
            'madubersih-home-cleaning-vintage' => 'home-services/madubersih-home-cleaning-vintage',
            'astroclean-home-cleaning-cosmic' => 'home-services/astroclean-home-cleaning-cosmic',
            'matcha-clean-organic-deep-cleaning' => 'home-services/matcha-clean-organic-deep-cleaning',
            'aurelia-home-renovation' => 'home-services/aurelia-home-renovation',
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
