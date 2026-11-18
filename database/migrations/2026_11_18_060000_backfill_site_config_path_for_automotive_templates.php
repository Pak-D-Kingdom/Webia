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
                ->whereNull('site_config_path')
                ->update(['site_config_path' => $siteConfigPath]);
        }
    }

    public function down(): void
    {
        // Backfilled values cannot be distinguished safely from pre-existing configuration.
    }

    /** @return array<string, string> */
    private function siteConfigPaths(): array
    {
        return [
            'automotive-dealer-vintage' => 'automotive/automotive-dealer-vintage',
            'apex-heritage-automotive-elegant' => 'automotive/apex-heritage-automotive-elegant',
            'apex-scuderia-automotive-minimalist' => 'automotive/apex-scuderia-automotive-minimalist',
            'tidal-detail-artistic-automotive' => 'automotive/tidal-detail-artistic-automotive',
            'noir-atelier-luxury-automotive' => 'automotive/noir-atelier-luxury-automotive',
            'form-auto-care-minimal-automotive' => 'automotive/form-auto-care-minimal-automotive',
            'voltrix-futuristic-automotive' => 'automotive/voltrix-futuristic-automotive',
            'nightshift-dark-mode-automotive' => 'automotive/nightshift-dark-mode-automotive',
            'arvo-modern-automotive' => 'automotive/arvo-modern-automotive',
            'samudra-auto-detailing-artistic' => 'automotive/samudra-auto-detailing-artistic',
            'noir-auto-detailing-luxury' => 'automotive/noir-auto-detailing-luxury',
            'aurum-premium-auto-detailing' => 'automotive/aurum-premium-auto-detailing',
            'otto-artistic-workshop' => 'automotive/otto-artistic-workshop',
            'maison-otto-elegant-workshop' => 'automotive/maison-otto-elegant-workshop',
            'roseline-professional-workshop' => 'automotive/roseline-professional-workshop',
        ];
    }
};
