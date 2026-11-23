<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $templates = [
            'aurora-petit-yellow-sunshine' => 'retail-boutique/aurora-petit-yellow-sunshine',
            'petit-wonder-candy-cloud' => 'retail-boutique/petit-wonder-candy-cloud',
            'pebble-sprouts-baby-kids' => 'retail-boutique/pebble-sprouts-baby-kids',
            'vibesnatch-fashion-store' => 'retail-boutique/vibesnatch-fashion-store',
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
