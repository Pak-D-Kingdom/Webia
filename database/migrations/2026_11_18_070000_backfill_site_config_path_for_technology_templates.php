<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $templates = [
            'technology-softwarehouse-professional' => [
                'site_config_path' => 'technology/technology-softwarehouse-professional',
                'preview_view' => 'website-bisnis.templates.technology.softwarehouse.technology-softwarehouse-modern',
            ],
            'technology-softwarehouse-elegant-babyblue-putri' => [
                'site_config_path' => 'technology/technology-softwarehouse-elegant-babyblue-putri',
                'preview_view' => 'website-bisnis.templates.technology.softwarehouse.technology-softwarehouse-elegant-babyblue-putri',
            ],
            'technology-softwarehouse-minimalist-softpink-putri' => [
                'site_config_path' => 'technology/technology-softwarehouse-minimalist-softpink-putri',
                'preview_view' => 'website-bisnis.templates.technology.softwarehouse.technology-softwarehouse-minimalist-softpink-putri',
            ],
            'technology-dataanalytics-luxury-pastelmix-putri' => [
                'site_config_path' => 'technology/technology-dataanalytics-luxury-pastelmix-putri',
                'preview_view' => 'website-bisnis.templates.technology.data-analytics.technology-dataanalytics-luxury-pastelmix-putri',
            ],
            'technology-dataanalytics-corporate-oceanteal-putri' => [
                'site_config_path' => 'technology/technology-dataanalytics-corporate-oceanteal-putri',
                'preview_view' => 'website-bisnis.templates.technology.data-analytics.technology-dataanalytics-corporate-oceanteal-putri',
            ],
            'technology-dataanalytics-creative-arcticfrost-putri' => [
                'site_config_path' => 'technology/technology-dataanalytics-creative-arcticfrost-putri',
                'preview_view' => 'website-bisnis.templates.technology.data-analytics.technology-dataanalytics-creative-arcticfrost-putri',
            ],
            'sakuratech-hardware-computer-networking' => [
                'site_config_path' => 'technology/sakuratech-hardware-computer-networking',
                'preview_view' => 'website-bisnis.templates.technology.hardware-computer-networking.sakuratech.sakuratech',
            ],
            'sakurabit-hardware-computer-networking' => [
                'site_config_path' => 'technology/sakurabit-hardware-computer-networking',
                'preview_view' => 'website-bisnis.templates.technology.hardware-computer-networking.sakurabit.sakurabit',
            ],
            'cyberwave-hardware-computer-networking' => [
                'site_config_path' => 'technology/cyberwave-hardware-computer-networking',
                'preview_view' => 'website-bisnis.templates.technology.hardware-computer-networking.cyberwave.cyberwave',
            ],
            'aetherion-digital-hardware-universe' => [
                'site_config_path' => 'technology/aetherion-digital-hardware-universe',
                'preview_view' => 'website-bisnis.templates.technology.hardware-computer-networking.aetherion.aetherion',
            ],
        ];

        foreach ($templates as $slug => $data) {
            DB::table('webia_templates')
                ->where('slug', $slug)
                ->update([
                    'site_config_path' => $data['site_config_path'],
                    'preview_view' => DB::raw("COALESCE(preview_view, '{$data['preview_view']}')"),
                ]);
        }
    }

    public function down(): void
    {
        // Backfilled values cannot be distinguished safely from pre-existing configuration.
    }
};
