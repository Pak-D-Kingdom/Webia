<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $templates = [
            'agriculture-agribisnis-forest-moss' => 'agriculture&farming/corporate/agribisnis-forest-moss/agribisnis',
            'agriculture-agribisnis-earth-tone' => 'agriculture&farming/organic/agribisnis-earth-tone/agribisnis',
            'agriculture-farming-agribisnis-classic-trust' => 'agriculture&farming/professional/agribisnis-classic-trust/agribisnis',
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
