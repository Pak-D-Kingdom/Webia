<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $templates = [
            'nailart-professional-softpink' => 'beauty/nailart-professional-softpink',
            'nailart-minimalist-sagegreen' => 'beauty/nailart-minimalist-sagegreen',
            'nailart-luxury-yellowsunshine' => 'beauty/nailart-luxury-yellowsunshine',
            'nuvia-skin-tech-clinic' => 'beauty/nuvia-skin-tech-clinic',
            'glow-lab-creative-beauty-clinic' => 'beauty/glow-lab-creative-beauty-clinic',
            'atelier-kulit-creative-beauty-clinic' => 'beauty/atelier-kulit-creative-beauty-clinic',
            'tanah-warna-rustic-makeup-artist' => 'beauty/tanah-warna-rustic-makeup-artist',
            'rosalind-vintage-makeup-artist' => 'beauty/rosalind-vintage-makeup-artist',
            'visage-editorial-makeup-artist' => 'beauty/visage-editorial-makeup-artist',
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
