<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $templates = [
            'kencana-wastra-traditional-costume-rental' => 'traditional-costume-rental/kencana-wastra',
            'libraries-digital-archives-digital-library-ocean-blue' => 'libraries-digital-archives/modern/digital-library-platform-ocean-blue/digital-library',
            'libraries-digital-archives-digital-library-arctic-frost' => 'libraries-digital-archives/academic-minimalist/digital-library-platform-arctic-frost/digital-library-platform',
            'libraries-digital-archives-historical-document-archive-burgundy-classic' => 'libraries-digital-archives/vintage-editorial/historical-document-archive-burgundy-classic/historical-document-archive',
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
