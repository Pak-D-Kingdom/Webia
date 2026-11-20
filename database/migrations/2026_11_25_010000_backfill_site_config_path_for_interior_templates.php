<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $templates = [
            'interior-design-studio-artistic-terracotta' => 'interior-architecture/interior-design-studio-artistic-terracotta',
            'aethel-moss-architectural-studio' => 'interior-architecture/aethel-moss-architectural-studio',
            'nantara-architecture-traditional-cultural' => 'interior-architecture/nantara-architecture-traditional-cultural',
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
