<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $templates = [
            'lumiere-photography-studio' => 'photography/lumiere-photography-studio',
            'noir-studio-photography' => 'photography/noir-studio-photography',
            'peachy-studio' => 'photography/peachy-studio',
            'candy-cloud-ugc-content-creator-studio' => 'photography/candy-cloud-ugc-content-creator-studio',
            'photography-motiongraphics-premiumminimal-champagneglow-putri' => 'photography/photography-motiongraphics-premiumminimal-champagneglow-putri',
            'photography-motiongraphics-traditionalcultural-coralpeach-putri' => 'photography/photography-motiongraphics-traditionalcultural-coralpeach-putri',
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
