<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $templates = [
            'catering-wedding-cake-minimalist-ruby-luxe' => 'wedding-multi/catering-wedding-cake-ruby-luxe',
            'event-organizer-modern-burgundy-wine' => 'wedding-multi/event-organizer-modern-burgundy-wine',
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
