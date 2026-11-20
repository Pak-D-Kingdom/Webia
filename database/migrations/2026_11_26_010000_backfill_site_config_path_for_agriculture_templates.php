<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $templates = [
            'agriternak-organic-ethical-precision' => 'agriculture/agriternak-organic-ethical-precision',
            'agriternak-futuristic-iot' => 'agriculture/agriternak-futuristic-iot',
            'agriternak-bold-livestock' => 'agriculture/agriternak-bold-livestock',
            'agriculture-peralatanpertanian-corporate-sagegreen-putri' => 'agriculture/agriculture-peralatanpertanian-corporate-sagegreen-putri',
            'agriculture-peralatanpertanian-creative-matchalatte-putri' => 'agriculture/agriculture-peralatanpertanian-creative-matchalatte-putri',
            'agriculture-peralatanpertanian-playfulcolorful-arcticfrost-putri' => 'agriculture/agriculture-peralatanpertanian-playfulcolorful-arcticfrost-putri',
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
