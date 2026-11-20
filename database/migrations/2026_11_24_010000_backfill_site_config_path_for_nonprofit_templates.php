<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $templates = [
            'relakita-volunteer-warm-sunrise' => 'nonprofit-community/relakita-volunteer-warm-sunrise',
            'kolektif-aksi-kita-volunteer-midnight-navy' => 'nonprofit-community/kolektif-aksi-kita-volunteer-midnight-navy',
            'revolt-impact-social-organization' => 'nonprofit-community/revolt-impact-social-organization',
            'lentera-nusantara-volunteer-group' => 'nonprofit-community/lentera-nusantara-volunteer-group',
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
