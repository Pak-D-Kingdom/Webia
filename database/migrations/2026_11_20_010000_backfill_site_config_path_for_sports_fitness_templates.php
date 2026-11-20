<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $templates = [
            'sports-gym-bold' => 'sports-fitness/sports-gym-bold',
            'personal-trainer-playful-colorful-jelly-pop' => 'sports-fitness/personal-trainer-playful-colorful-jelly-pop',
            'pilates-studio-strawberry-fizz' => 'sports-fitness/pilates-studio-strawberry-fizz',
            'ironpulse-gym-fitness-center' => 'sports-fitness/ironpulse-gym-fitness-center',
            'northline-performance-corporate-personal-trainer' => 'sports-fitness/northline-performance-corporate-personal-trainer',
            'vanta-form-cyber-neon-personal-trainer' => 'sports-fitness/vanta-form-cyber-neon-personal-trainer',
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
