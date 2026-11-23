<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $templates = [
            'interior-furniture-rustic-terracotta' => 'interior&architecture/rustic/furniture-terracotta/furniture',
            'interior-furniture-mocha-cream' => 'interior&architecture/premium-minimal/furniture-mocha-cream/furniture',
            'interior-furniture-chocolate-luxe' => 'interior&architecture/luxury/furniture-chocolate-luxe/furniture',
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
