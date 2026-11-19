<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $templates = [
            'education-onlinecourse-modern' => 'education/education-onlinecourse-modern',
            'rumah-latte-preschool-daycare' => 'education/rumah-latte-preschool-daycare',
            'tunas-cendekia-preschool-daycare' => 'education/tunas-cendekia-preschool-daycare',
            'jeli-kecil-preschool-daycare' => 'education/jeli-kecil-preschool-daycare',
            'spark-academy-maximum-impact' => 'education/spark-academy-maximum-impact',
            'ruby-academy-classic-school' => 'education/ruby-academy-classic-school',
            'arctic-academy-school' => 'education/arctic-academy-school',
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
