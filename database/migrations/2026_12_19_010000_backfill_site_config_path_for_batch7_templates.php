<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $templates = [
            'wedding-event-organizer-sunset-gradient' => 'wedding-event/bold/event-organizer-sunset-gradient/event-organizer',
            'wedding-event-organizer-purple-dream' => 'wedding-event/creative/event-organizer-purple-dream/event-organizer',
            'travel-umrah-haji-navy-champagne-gold' => 'travel&tourism/elegan/umrah-haji-navy-champagne-gold/umrah-haji',
            'travel-umrah-haji-emerald-green' => 'travel&tourism/classic/umrah-haji-emerald-green/umrah-haji',
            'interior-architecture-building-design-chocolate-luxe' => 'interior&architecture/rustic/architecture-building-design-chocolate-luxe/architecture-building-design',
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
        // Backfilled values cannot be distinguished safely.
    }
};
