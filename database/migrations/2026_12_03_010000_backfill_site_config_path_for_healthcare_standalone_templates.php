<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $templates = [
            'healthcare-dental-azure' => 'healthcare-standalone/healthcare-dental-azure',
            'healthcare-dental-mint' => 'healthcare-standalone/healthcare-dental-mint',
            'healthcare-dental-sunset' => 'healthcare-standalone/healthcare-dental-sunset',
            'mitra-jiwa-psikologi-konseling' => 'healthcare-standalone/mitra-jiwa-psikologi-konseling',
            'ruang-tenang-psikologi-konseling' => 'healthcare-standalone/ruang-tenang-psikologi-konseling',
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
