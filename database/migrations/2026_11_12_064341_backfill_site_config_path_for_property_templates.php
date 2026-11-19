<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        foreach ($this->siteConfigPaths() as $slug => $siteConfigPath) {
            DB::table('webia_templates')
                ->where('slug', $slug)
                ->update(['site_config_path' => $siteConfigPath]);
        }
    }

    public function down(): void
    {
        DB::table('webia_templates')
            ->whereIn('slug', array_keys($this->siteConfigPaths()))
            ->update(['site_config_path' => null]);
    }

    /** @return array<string, string> */
    private function siteConfigPaths(): array
    {
        return [
            'property-emerald-green' => 'property/luxury/real-estate-agency-emerald-green/real-estate-agency',
            'property-nature-green' => 'property/premium-minimal/real-estate-agency-nature-green/real-estate-agency',
            'property-coral-peach' => 'property/professional/real-estate-agency-coral-peach/real-estate-agency',
        ];
    }
};
