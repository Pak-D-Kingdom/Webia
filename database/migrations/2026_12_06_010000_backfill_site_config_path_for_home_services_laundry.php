<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $templates = [
            'home-services-laundry-baby-blue' => 'home-services/modern/laundry-baby-blue/laundry',
            'home-services-laundry-mint-fresh' => 'home-services/minimalis/laundry-mint-fresh/laundry',
            'home-services-laundry-classic-trust' => 'home-services/professional/laundry-classic-trust/laundry',
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
