<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $templates = [
            'nonprofit-foundation-classic-trust' => 'nonprofit&community/professional/foundation-classic-trust/foundation',
            'nonprofit-foundation-nature-green' => 'nonprofit&community/creative/foundation-nature-green/foundation',
            'nonprofit-foundation-warm-neutral' => 'nonprofit&community/minimalis/foundation-warm-neutral/foundation',
            'nonprofit-social-organization-citrus-pop' => 'nonprofit&community/bold/social-organization-citrus-pop/social-organization',
            'nonprofit-social-organization-tropical-rush' => 'nonprofit&community/creative/social-organization-tropical-rush/social-organization',
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
