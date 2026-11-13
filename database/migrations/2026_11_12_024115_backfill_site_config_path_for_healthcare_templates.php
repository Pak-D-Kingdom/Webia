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
            'healthcare-clean-white' => 'healthcare/professional/klinik-kecantikan-clean-white/klinik-kecantikan',
            'healthcare-champagne-glow' => 'healthcare/luxury/klinik-kecantikan-champagne-glow/klinik-kecantikan',
            'healthcare-rose-gold' => 'healthcare/elegan/klinik-kecantikan-rose-gold/klinik-kecantikan',
        ];
    }
};
