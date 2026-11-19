<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('webia_templates')
            ->where('slug', 'bca-terracotta')
            ->update([
                'site_config_path' => 'professional-service/artistic/branding-creative-agency-terracotta/branding-creative-agency',
            ]);
    }

    public function down(): void
    {
        DB::table('webia_templates')
            ->where('slug', 'bca-terracotta')
            ->update(['site_config_path' => null]);
    }
};
