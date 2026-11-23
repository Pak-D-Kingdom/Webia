<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $templates = [
            'home-services-renovation-repair-sage-green' => 'home-services/organic/home-renovation-repair-sage-green/home-renovation-repair',
            'home-services-renovation-repair-chocolate-luxe' => 'home-services/vintage/home-renovation-repair-chocolate-luxe/home-renovation-repair',
            'photography-ugc-content-creator-studio-dark-mode' => 'photography-creative-studio/futuristic/ugc-content-creator-studio-dark-mode/ugc-content-creator-studio',
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
