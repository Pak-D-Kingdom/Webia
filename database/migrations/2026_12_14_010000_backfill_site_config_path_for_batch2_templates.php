<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $templates = [
            'tirtaceria-swim-academy' => 'sports-fitness/swimming-school/tirtaceria',
            'splashkids-swim-school' => 'sports-fitness/swimming-school/splashkids',
            'aurelia-mind-psikologi-konseling' => 'healthcare-standalone/aurelia-mind-psikologi-konseling',
            'wildtrail-adventure-outdoor' => 'travel-standalone/wildtrail-adventure-outdoor',
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
