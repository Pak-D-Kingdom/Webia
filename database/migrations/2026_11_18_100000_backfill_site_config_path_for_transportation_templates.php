<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $templates = [
            'cocoexpress-delivery-service' => 'transportation-logistics/cocoexpress-delivery-service',
            'reloko-moving-company' => 'transportation-logistics/reloko-moving-company',
            'logistics-company-classic-trust' => 'transportation-logistics/logistics-company-classic-trust',
            'transportation-logistics-company-midnight-navy' => 'transportation-logistics/transportation-logistics-company-midnight-navy',
            'logistics-company-orange-energy' => 'transportation-logistics/logistics-company-orange-energy',
            'delivery-service-emerald-express' => 'transportation-logistics/delivery-service-emerald-express',
            'moving-company-navy-hearth' => 'transportation-logistics/moving-company-navy-hearth',
            'moving-company-rose-atelier' => 'transportation-logistics/moving-company-rose-atelier',
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
