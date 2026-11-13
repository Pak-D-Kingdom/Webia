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
            'elearning-ocean-blue' => 'e-learning/modern/e-learning-ocean-blue/e-learning',
            'elearning-pastel-mix' => 'e-learning/playful-colorful/e-learning-pastel-mix/e-learning',
            'elearning-dark-mode' => 'e-learning/futuristic/e-learning-dark-mode/e-learning',
        ];
    }
};
