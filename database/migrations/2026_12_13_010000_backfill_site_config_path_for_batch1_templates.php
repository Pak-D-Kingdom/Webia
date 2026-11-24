<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $templates = [
            'strike-branding-creative' => 'professional-service/strike-branding-creative',
            'blushbowl-diet-meal' => 'food-subscription/blushbowl-diet-meal',
            'sodatable-family-meal-plan' => 'food-subscription/sodatable-family-meal-plan',
            'koharu-matcha-japanese-minimalist' => 'specialty-beverage/koharu-matcha-japanese-minimalist',
            'solenne-sugar-luxury-wedding-catering' => 'wedding-event/solenne-sunshine',
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
