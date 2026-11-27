<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $templates = [
            'professional-service-branding-creative-agency-terracotta' => 'professional-service/artistic/branding-creative-agency-terracotta/branding-creative-agency',
            'vanguard-lawyer' => 'professional-service/vanguard-lawyer',
            'verba-translation-interpreter' => 'professional-service/verba-translation-interpreter',
            'hearthstone-property' => 'property-standalone/hearthstone-property',
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
