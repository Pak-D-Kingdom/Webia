<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $templates = [
            'aria-thorne-author-writer' => 'personal-brand/aria-thorne-author-writer',
            'arya-sanjaya-plum-velvet' => 'personal-brand/arya-sanjaya-plum-velvet',
            'arya-sanjaya-ruby-editorial' => 'personal-brand/arya-sanjaya-ruby-editorial',
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
