<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $templates = [
            'travel-agent-ocean-teal' => 'travel&tourism/modern/travel-agent-ocean-teal/travel-agent',
            'travel-agent-forest-moss' => 'travel&tourism/organic/travel-agent-forest-moss/travel-agent',
            'travel-agent-navy-champagne-gold' => 'travel&tourism/luxury/travel-agent-navy-champagne-gold/travel-agent',
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
