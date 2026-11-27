<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $templates = [
            'arsip-kain-heritage-editorial' => 'traditional-textiles/arsip-kain-heritage-editorial',
            'aethelgard-digital-museum' => 'education-culture/aethelgard-digital-museum',
            'aquaverse-interactive-heritage' => 'education-culture/aquaverse-interactive-heritage',
            'rubra-memoria-artistic-heritage' => 'education-culture/rubra-memoria-artistic-heritage',
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
