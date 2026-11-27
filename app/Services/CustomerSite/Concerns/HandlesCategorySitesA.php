<?php

namespace App\Services\CustomerSite\Concerns;

use App\Models\WebiaOrder;
use App\Services\AiQuotaService;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

trait HandlesCategorySitesA
{
    private const AUTOMOTIVE_VIEWS = [
        'automotive-dealer-vintage' => [
            'home' => 'website-bisnis.templates.automotive.dealer.automotive-dealer-vintage',
            'collection' => 'website-bisnis.templates.automotive.dealer.automotive-dealer-vintage-collection',
        ],
        'voltrix-futuristic-automotive' => ['home' => 'website-bisnis.templates.automotive.voltrix-futuristic-automotive'],
        'nightshift-dark-mode-automotive' => ['home' => 'website-bisnis.templates.automotive.nightshift-dark-mode-automotive'],
        'arvo-modern-automotive' => ['home' => 'website-bisnis.templates.automotive.arvo-modern-automotive'],
        'apex-heritage-automotive-elegant' => ['home' => 'website-bisnis.templates.automotive.apex-heritage-automotive-elegant'],
        'apex-scuderia-automotive-minimalist' => ['home' => 'website-bisnis.templates.automotive.apex-scuderia-automotive-minimalist'],
        'tidal-detail-artistic-automotive' => ['home' => 'website-bisnis.templates.automotive.artistic'],
        'noir-atelier-luxury-automotive' => ['home' => 'website-bisnis.templates.automotive.luxury'],
        'form-auto-care-minimal-automotive' => ['home' => 'website-bisnis.templates.automotive.minimal'],
        'samudra-auto-detailing-artistic' => ['home' => 'website-bisnis.templates.automotive.samudra-auto-detailing-artistic'],
        'noir-auto-detailing-luxury' => ['home' => 'website-bisnis.templates.automotive.noir-auto-detailing-luxury'],
        'aurum-premium-auto-detailing' => ['home' => 'website-bisnis.templates.automotive.aurum-premium-auto-detailing'],
        'otto-artistic-workshop' => ['home' => 'website-bisnis.templates.automotive.otto-artistic-workshop'],
        'maison-otto-elegant-workshop' => ['home' => 'website-bisnis.templates.automotive.maison-otto-elegant-workshop'],
        'roseline-professional-workshop' => ['home' => 'website-bisnis.templates.automotive.roseline-professional-workshop'],
    ];

    private function handleAutomotive(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $slug = Str::after($siteConfigPath, 'automotive/');
        abort_unless(isset(self::AUTOMOTIVE_VIEWS[$slug]), 404);
        abort_unless(isset(self::AUTOMOTIVE_VIEWS[$slug][$pageKey]), 404);

        $viewName = self::AUTOMOTIVE_VIEWS[$slug][$pageKey];
        $business = $order->business_data ?? [];
        $whatsapp = $this->whatsappNumber($business['whatsapp'] ?? '');
        $instagram = ltrim($business['instagram'] ?? '', '@');

        $renderedHtml = view($viewName, [
            'order' => $order,
            'page' => $pageKey,
            'business' => $business,
            'whatsapp' => $whatsapp,
            'instagram' => $instagram,
        ])->render();

        $renderedHtml = $this->transformAutomotiveHtml($renderedHtml, $order, $business, $whatsapp, $instagram, $slug);

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function transformAutomotiveHtml(string $html, WebiaOrder $order, array $business, string $whatsapp, string $instagram, string $slug): string
    {
        $bizName = $business['business_name'] ?? '';
        if ($bizName !== '') {
            $brandMap = [
                'Heritage Motors' => $bizName,
                'HERITAGE MOTORS' => strtoupper($bizName),
                'VOLTRIX Garage' => $bizName,
                'VOLTRIX GARAGE' => strtoupper($bizName),
                'VOLTRIX' => $bizName,
                'NIGHTSHIFT Auto' => $bizName,
                'NIGHTSHIFT AUTO' => strtoupper($bizName),
                'ARVO Motor Studio' => $bizName,
                'ARVO MOTOR STUDIO' => strtoupper($bizName),
                'APEX Heritage' => $bizName,
                'APEX HERITAGE' => strtoupper($bizName),
                'Apex Heritage' => $bizName,
                'Apex Scuderia' => $bizName,
                'APEX SCUDERIA' => strtoupper($bizName),
                'Tidal Detail Co.' => $bizName,
                'Tidal Detail' => $bizName,
                'Noir Atelier' => $bizName,
                'NOIR ATELIER' => strtoupper($bizName),
                'NOIR<i>.</i>ATELIER' => $bizName,
                'Concierge NOIR' => 'Concierge '.$bizName,
                'FORM / Auto Care' => $bizName,
                'FORM Auto Care' => $bizName,
                'Samudra Detailing' => $bizName,
                'SAMUDRA DETAILING' => strtoupper($bizName),
                'Samudra Auto Detailing' => $bizName,
                'Noir Auto Detailing' => $bizName,
                'NOIR AUTO DETAILING' => strtoupper($bizName),
                'AURUM — Premium Auto Detailing' => $bizName,
                'AURUM Detailing' => $bizName,
                'AURUM' => $bizName,
                'Bengkel Otto' => $bizName,
                'BENGKEL OTTO' => strtoupper($bizName),
                'Maison Otto' => $bizName,
                'MAISON OTTO' => strtoupper($bizName),
                'Roseline Service Center' => $bizName,
                'ROSELINE SERVICE CENTER' => strtoupper($bizName),
                'Roseline Workshop' => $bizName,
            ];
            $html = str_replace(array_keys($brandMap), array_values($brandMap), $html);
        }

        $custWa = $whatsapp ?: '6281234567890';
        $rawWa = $business['whatsapp'] ?? $custWa;
        $html = str_replace(
            ['6285850180285', '6281234567890', '+62 858-5018-0285', 'https://wa.me/?text=', 'https://wa.me/"', "https://wa.me/'"],
            [$custWa, $custWa, $rawWa, 'https://wa.me/'.$custWa.'?text=', 'https://wa.me/'.$custWa.'"', 'https://wa.me/'.$custWa."'"],
            $html
        );

        $address = $this->businessAddress($business);
        if ($address !== '') {
            $html = str_replace(
                [
                    'Showroom address · update before launch',
                    'Surabaya, East Java, Indonesia',
                    'By appointment · Jakarta Selatan',
                    'Studio kami di Surabaya',
                ],
                $address,
                $html
            );
        }
        if (! empty($business['address_url'])) {
            $html = str_replace('https://maps.google.com/?q=Jakarta', $business['address_url'], $html);
        }

        $homeUrl = route('sites.show', ['order' => $order->site_slug]);
        $collectionUrl = route('sites.show', ['order' => $order->site_slug, 'page' => 'collection']);

        $html = str_replace(
            [
                url('/webia/template/automotive-dealer-vintage/collection'),
                '/webia/template/automotive-dealer-vintage/collection',
            ],
            $collectionUrl,
            $html
        );

        $html = str_replace(
            [
                url('/webia/template/automotive-dealer-vintage'),
                '/webia/template/automotive-dealer-vintage',
            ],
            $homeUrl,
            $html
        );

        $html = preg_replace('/<div class="heritage-template-ribbon">.*?<\/div>/s', '', $html);
        $html = str_replace('apex-heritage-preview', '', $html);
        $html = preg_replace('/<p class="heritage-demo-note">.*?<\/p>/s', '', $html);

        return $html;
    }

    private const TECHNOLOGY_VIEWS = [
        'technology-softwarehouse-professional' => ['home' => 'website-bisnis.templates.technology.softwarehouse.technology-softwarehouse-modern'],
        'technology-softwarehouse-elegant-babyblue-putri' => ['home' => 'website-bisnis.templates.technology.softwarehouse.technology-softwarehouse-elegant-babyblue-putri'],
        'technology-softwarehouse-minimalist-softpink-putri' => ['home' => 'website-bisnis.templates.technology.softwarehouse.technology-softwarehouse-minimalist-softpink-putri'],
        'technology-dataanalytics-luxury-pastelmix-putri' => ['home' => 'website-bisnis.templates.technology.data-analytics.technology-dataanalytics-luxury-pastelmix-putri'],
        'technology-dataanalytics-corporate-oceanteal-putri' => ['home' => 'website-bisnis.templates.technology.data-analytics.technology-dataanalytics-corporate-oceanteal-putri'],
        'technology-dataanalytics-creative-arcticfrost-putri' => ['home' => 'website-bisnis.templates.technology.data-analytics.technology-dataanalytics-creative-arcticfrost-putri'],
        'sakuratech-hardware-computer-networking' => ['home' => 'website-bisnis.templates.technology.hardware-computer-networking.sakuratech.sakuratech'],
        'sakurabit-hardware-computer-networking' => ['home' => 'website-bisnis.templates.technology.hardware-computer-networking.sakurabit.sakurabit'],
        'cyberwave-hardware-computer-networking' => ['home' => 'website-bisnis.templates.technology.hardware-computer-networking.cyberwave.cyberwave'],
        'aetherion-digital-hardware-universe' => ['home' => 'website-bisnis.templates.technology.hardware-computer-networking.aetherion.aetherion'],
    ];

    private function handleTechnology(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $slug = Str::after($siteConfigPath, 'technology/');
        abort_unless(isset(self::TECHNOLOGY_VIEWS[$slug]), 404);
        abort_unless(isset(self::TECHNOLOGY_VIEWS[$slug][$pageKey]), 404);

        $viewName = self::TECHNOLOGY_VIEWS[$slug][$pageKey];
        $business = $order->business_data ?? [];
        $whatsapp = $this->whatsappNumber($business['whatsapp'] ?? '');
        $instagram = ltrim($business['instagram'] ?? '', '@');

        $renderedHtml = view($viewName, [
            'order' => $order,
            'page' => $pageKey,
            'business' => $business,
            'whatsapp' => $whatsapp,
            'instagram' => $instagram,
        ])->render();

        $renderedHtml = $this->transformTechnologyHtml($renderedHtml, $order, $business, $whatsapp, $instagram, $slug);

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function transformTechnologyHtml(string $html, WebiaOrder $order, array $business, string $whatsapp, string $instagram, string $slug): string
    {
        $bizName = $business['business_name'] ?? '';
        if ($bizName !== '') {
            $brandMap = [
                'Nexora Digital' => $bizName,
                'NEXORA DIGITAL' => strtoupper($bizName),
                'AzuraCraft Studio' => $bizName,
                'AZURACRAFT STUDIO' => strtoupper($bizName),
                'RoseCode Studio' => $bizName,
                'ROSECODE STUDIO' => strtoupper($bizName),
                'AuraMetrics Studio' => $bizName,
                'AURAMETRICS STUDIO' => strtoupper($bizName),
                'Quantix Data Corp' => $bizName,
                'QUANTIX DATA CORP' => strtoupper($bizName),
                'FrostByte Analytics' => $bizName,
                'FROSTBYTE ANALYTICS' => strtoupper($bizName),
                'FrostByte' => $bizName,
                'SAKURATECH' => strtoupper($bizName),
                'SakuraTech' => $bizName,
                'SAKURABIT' => strtoupper($bizName),
                'SakuraBit' => $bizName,
                'CYBERWAVE' => strtoupper($bizName),
                'CyberWave' => $bizName,
                'AETHERION' => strtoupper($bizName),
                'Aetherion' => $bizName,
            ];
            $html = str_replace(array_keys($brandMap), array_values($brandMap), $html);
        }

        $custWa = $whatsapp ?: '6281234567890';
        $rawWa = $business['whatsapp'] ?? $custWa;
        $html = str_replace(
            ['6285850180285', '6281234567890', '+62 858-5018-0285', 'https://wa.me/?text=', 'https://wa.me/"', "https://wa.me/'"],
            [$custWa, $custWa, $rawWa, 'https://wa.me/'.$custWa.'?text=', 'https://wa.me/'.$custWa.'"', 'https://wa.me/'.$custWa."'"],
            $html
        );

        $address = $this->businessAddress($business);
        if ($address !== '') {
            $html = str_replace(
                [
                    'SCBD Lot 28, Senayan, Kebayoran Baru, Jakarta Selatan',
                    'Level 28, Pacific Century Place, SCBD, Jakarta Selatan',
                    'One Pacific Place Suite 18-A, SCBD, Jakarta Selatan',
                    'Jakarta Selatan, Indonesia',
                ],
                $address,
                $html
            );
        }

        return $html;
    }

    private const BEAUTY_VIEWS = [
        'nailart-professional-softpink' => ['home' => 'website-bisnis.templates.beauty.nailart.nailart-professional-softpink'],
        'nailart-minimalist-sagegreen' => ['home' => 'website-bisnis.templates.beauty.nailart.nailart-minimalist-sagegreen'],
        'nailart-luxury-yellowsunshine' => ['home' => 'website-bisnis.templates.beauty.nailart.nailart-luxury-yellowsunshine'],
        'nuvia-skin-tech-clinic' => ['home' => 'website-bisnis.templates.beauty.nuvia-skin-tech-clinic'],
        'glow-lab-creative-beauty-clinic' => ['home' => 'website-bisnis.templates.beauty.glow-lab-creative-beauty-clinic'],
        'atelier-kulit-creative-beauty-clinic' => ['home' => 'website-bisnis.templates.beauty.atelier-kulit-creative-beauty-clinic'],
        'tanah-warna-rustic-makeup-artist' => ['home' => 'website-bisnis.templates.beauty.tanah-warna-rustic-makeup-artist'],
        'rosalind-vintage-makeup-artist' => ['home' => 'website-bisnis.templates.beauty.rosalind-vintage-makeup-artist'],
        'visage-editorial-makeup-artist' => ['home' => 'website-bisnis.templates.beauty.visage-editorial-makeup-artist'],
    ];

    private function handleBeauty(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $slug = Str::after($siteConfigPath, 'beauty/');
        abort_unless(isset(self::BEAUTY_VIEWS[$slug]), 404);
        abort_unless(isset(self::BEAUTY_VIEWS[$slug][$pageKey]), 404);

        $viewName = self::BEAUTY_VIEWS[$slug][$pageKey];
        $business = $order->business_data ?? [];
        $whatsapp = $this->whatsappNumber($business['whatsapp'] ?? '');
        $instagram = ltrim($business['instagram'] ?? '', '@');

        $renderedHtml = view($viewName, [
            'order' => $order,
            'page' => $pageKey,
            'business' => $business,
            'whatsapp' => $whatsapp,
            'instagram' => $instagram,
        ])->render();

        $renderedHtml = $this->transformBeautyHtml($renderedHtml, $business, $whatsapp);

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function transformBeautyHtml(string $html, array $business, string $whatsapp): string
    {
        $bizName = $business['business_name'] ?? '';
        if ($bizName !== '') {
            $brandMap = [
                'Blush Nail Studio' => $bizName,
                'BLUSH NAIL STUDIO' => strtoupper($bizName),
                'Sage Nail Atelier' => $bizName,
                'SAGE NAIL ATELIER' => strtoupper($bizName),
                'Maison Soleil' => $bizName,
                'MAISON SOLEIL' => strtoupper($bizName),
                'NUVIA Skin Tech Clinic' => $bizName,
                'NUVIA SKIN TECH CLINIC' => strtoupper($bizName),
                'NUVIA' => $bizName,
                'GLOW LAB' => strtoupper($bizName),
                'Glow Lab' => $bizName,
                'Atelier Kulit' => $bizName,
                'ATELIER KULIT' => strtoupper($bizName),
                'Tanah Warna' => $bizName,
                'TANAH WARNA' => strtoupper($bizName),
                'Rosalind & Co.' => $bizName,
                'ROSALIND & CO.' => strtoupper($bizName),
                'Rosalind' => $bizName,
                'VISAGE' => strtoupper($bizName),
                'Visage' => $bizName,
            ];
            $html = str_replace(array_keys($brandMap), array_values($brandMap), $html);
        }

        $custWa = $whatsapp ?: '6281234567890';
        $rawWa = $business['whatsapp'] ?? $custWa;
        $html = str_replace(
            ['6285850180285', '6281234567890', '+62 858-5018-0285'],
            [$custWa, $custWa, $rawWa],
            $html
        );

        $address = $this->businessAddress($business);
        if ($address !== '') {
            $html = str_replace(
                [
                    'Jakarta, Indonesia',
                    'Surabaya, Indonesia',
                    'Jl. Contoh No. 1, Jakarta',
                ],
                $address,
                $html
            );
        }

        return $html;
    }

    private const FNB_VIEWS = [
        'aurumco-catering' => ['home' => 'website-bisnis.templates.fnb.aurumco-catering'],
        'vallaco-catering' => ['home' => 'website-bisnis.templates.fnb.vallaco-catering'],
        'laut-biru-seafood' => ['home' => 'website-bisnis.templates.fnb.restaurant.laut-biru-seafood'],
        'fresh-harvest-healthy-meal-prep' => ['home' => 'website-bisnis.templates.fnb.healthy-meal-prep.fresh-harvest'],
        'bakery-bold-luxury' => ['home' => 'website-bisnis.templates.fnb.bakery.bakery-bold-luxury'],
        'midnightbaker-futuristic' => ['home' => 'website-bisnis.templates.fnb.bakery.midnightbaker-futuristic'],
        'fnb-bakery-playful-colorful-pastel-mix' => ['home' => 'website-bisnis.templates.fnb.bakery.bakery-playful-colorful'],
        'restoran-azura' => ['home' => 'website-bisnis.templates.fnb.restaurant.restoran-azura'],
        'noir-restaurant' => ['home' => 'website-bisnis.templates.fnb.restaurant.noir-restaurant'],
        'rasa-rupa-artistik' => ['home' => 'website-bisnis.templates.fnb.rasa-rupa-artistik'],
        'tetangga-kenyang-friendly' => ['home' => 'website-bisnis.templates.fnb.tetangga-kenyang-friendly'],
        'hulu-pantry-asal-usul' => ['home' => 'website-bisnis.templates.fnb.hulu-pantry-asal-usul'],
        'kusuma-ningrat-royal-heritage' => ['home' => 'website-bisnis.templates.fnb.kusuma-ningrat-royal-heritage'],
    ];

    private function handleFnb(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $slug = Str::after($siteConfigPath, 'fnb/');
        abort_unless(isset(self::FNB_VIEWS[$slug]), 404);
        abort_unless(isset(self::FNB_VIEWS[$slug][$pageKey]), 404);

        $viewName = self::FNB_VIEWS[$slug][$pageKey];
        $business = $order->business_data ?? [];
        $whatsapp = $this->whatsappNumber($business['whatsapp'] ?? '');
        $instagram = ltrim($business['instagram'] ?? '', '@');

        $renderedHtml = view($viewName, [
            'order' => $order,
            'page' => $pageKey,
            'business' => $business,
            'whatsapp' => $whatsapp,
            'instagram' => $instagram,
        ])->render();

        $renderedHtml = $this->transformFnbHtml($renderedHtml, $business, $whatsapp);

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function transformFnbHtml(string $html, array $business, string $whatsapp): string
    {
        $bizName = $business['business_name'] ?? '';
        if ($bizName !== '') {
            $brandMap = [
                'Aurum & Co.' => $bizName,
                'AURUM & CO.' => strtoupper($bizName),
                'Valla & Co.' => $bizName,
                'VALLA & CO.' => strtoupper($bizName),
                'Laut Biru Seafood' => $bizName,
                'Laut Biru' => $bizName,
                'LAUT BIRU' => strtoupper($bizName),
                'Fresh Harvest' => $bizName,
                'FRESH HARVEST' => strtoupper($bizName),
                'Maison Breads & Pastry' => $bizName,
                'Maison Breads' => $bizName,
                'MAISON BREADS' => strtoupper($bizName),
                'MIDNIGHTBAKER' => strtoupper($bizName),
                'MidnightBaker' => $bizName,
                'Midnight Baker' => $bizName,
                'Sweet Crumb Bakery' => $bizName,
                'Sweet Crumb' => $bizName,
                'SWEET CRUMB' => strtoupper($bizName),
                'Restoran Azura' => $bizName,
                'RESTORAN AZURA' => strtoupper($bizName),
                'NOIR' => strtoupper($bizName),
                'Noir' => $bizName,
                'Rasa Rupa' => $bizName,
                'RASA RUPA' => strtoupper($bizName),
                'Tetangga Kenyang' => $bizName,
                'TETANGGA KENYANG' => strtoupper($bizName),
                'Hulu Pantry' => $bizName,
                'Hulu' => $bizName,
                'HULU' => strtoupper($bizName),
                'Kusuma Ningrat' => $bizName,
                'KUSUMA NINGRAT' => strtoupper($bizName),
            ];
            $html = str_replace(array_keys($brandMap), array_values($brandMap), $html);
        }

        $custWa = $whatsapp ?: '6281234567890';
        $rawWa = $business['whatsapp'] ?? $custWa;
        $html = str_replace(
            ['6285850180285', '6281234567890', '+62 858-5018-0285', '+62 812-3456-7890', 'https://wa.me/?text=', 'https://wa.me/"', "https://wa.me/'"],
            [$custWa, $custWa, $rawWa, $rawWa, 'https://wa.me/'.$custWa.'?text=', 'https://wa.me/'.$custWa.'"', 'https://wa.me/'.$custWa."'"],
            $html
        );

        $html = str_replace(
            "notify('Nomor WhatsApp belum dipasang. Silakan kunjungi website resmi MidnightBaker untuk kontak terbaru.')",
            "window.open('https://wa.me/{$custWa}', '_blank')",
            $html
        );

        $address = $this->businessAddress($business);
        if ($address !== '') {
            $html = str_replace(
                [
                    'Jl. Bahari No. 21',
                    'Jakarta, Indonesia',
                    'Surabaya, Indonesia',
                ],
                $address,
                $html
            );
        }

        return $html;
    }

    private const TRANSPORTATION_STANDALONE_VIEWS = [
        'cocoexpress-delivery-service' => ['home' => 'website-bisnis.templates.transportation-logistics.delivery-service.cocoexpress.cocoexpress'],
        'reloko-moving-company' => ['home' => 'website-bisnis.templates.transportation-logistics.moving-company.reloko.reloko'],
    ];

    private const TRANSPORTATION_CONFIG_TEMPLATES = [
        'logistics-company-classic-trust' => [
            'view_base' => 'website-bisnis.template.transportation&logistics.corporate.logistics-company-classic-trust.',
            'config_key' => 'template.transportation&logistics.corporate.logistics-company-classic-trust.logistics-company',
            'preview_prefix' => '/webia/template/logistics-company-classic-trust',
            'pages' => [
                'home' => 'index',
                'layanan' => 'layanan',
                'opsi-pengiriman' => 'opsi-pengiriman',
                'jangkauan' => 'jangkauan',
                'armada-gudang' => 'armada-gudang',
                'proses-pengiriman' => 'proses-pengiriman',
                'tracking' => 'tracking',
                'klien' => 'klien',
                'penawaran' => 'penawaran',
            ],
        ],
        'transportation-logistics-company-midnight-navy' => [
            'view_base' => 'website-bisnis.template.transportation&logistics.modern.logistics-company-midnight-navy.',
            'config_key' => 'template.transportation&logistics.modern.logistics-company-midnight-navy.logistics-company',
            'preview_prefix' => '/webia/template/transportation-logistics/modern/logistics-company-midnight-navy',
            'pages' => [
                'home' => 'index',
                'layanan' => 'layanan',
                'solusi-freight' => 'solusi-freight',
                'jangkauan' => 'jangkauan',
                'armada-gudang' => 'armada-gudang',
                'proses-pengiriman' => 'proses-pengiriman',
                'tracking' => 'tracking',
                'klien-korporat' => 'klien-korporat',
                'minta-penawaran' => 'minta-penawaran',
                'ai-assistant' => 'ai-assistant',
            ],
        ],
        'logistics-company-orange-energy' => [
            'view_base' => 'website-bisnis.template.transportation&logistics.bold.logistics-company-orange-energy.',
            'config_key' => 'template.transportation&logistics.bold.logistics-company-orange-energy.logistics-company',
            'preview_prefix' => '/webia/template/transportation-logistics/bold/logistics-company-orange-energy',
            'pages' => [
                'home' => 'index',
                'layanan' => 'layanan',
                'opsi-pengiriman' => 'opsi-pengiriman',
                'jangkauan' => 'jangkauan',
                'armada-gudang' => 'armada-gudang',
                'proses-pengiriman' => 'proses-pengiriman',
                'tracking' => 'tracking',
                'klien-korporat' => 'klien-korporat',
                'penawaran' => 'penawaran',
                'ai-assistant' => 'ai-assistant',
            ],
        ],
        'delivery-service-emerald-express' => [
            'view_base' => 'website-bisnis.template.transportation&logistics.delivery.logistics-company-emerald-express.',
            'config_key' => 'template.transportation&logistics.delivery.logistics-company-emerald-express.logistics-company',
            'preview_prefix' => '/webia/template/transportation-logistics/delivery/logistics-company-emerald-express',
            'pages' => [
                'home' => 'index',
            ],
        ],
        'moving-company-navy-hearth' => [
            'view_base' => 'website-bisnis.template.transportation&logistics.moving.logistics-company-navy-hearth.',
            'config_key' => 'template.transportation&logistics.moving.logistics-company-navy-hearth.logistics-company',
            'preview_prefix' => '/webia/template/transportation-logistics/moving/logistics-company-navy-hearth',
            'pages' => [
                'home' => 'index',
            ],
        ],
        'moving-company-rose-atelier' => [
            'view_base' => 'website-bisnis.template.transportation&logistics.luxury.logistics-company-rose-atelier.',
            'config_key' => 'template.transportation&logistics.luxury.logistics-company-rose-atelier.logistics-company',
            'preview_prefix' => '/webia/template/transportation-logistics/luxury/logistics-company-rose-atelier',
            'pages' => [
                'home' => 'index',
            ],
        ],
    ];

    private function handleTransportationLogistics(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $slug = Str::after($siteConfigPath, 'transportation-logistics/');
        $business = $order->business_data ?? [];
        $whatsapp = $this->whatsappNumber($business['whatsapp'] ?? '');
        $instagram = ltrim($business['instagram'] ?? '', '@');

        if (isset(self::TRANSPORTATION_STANDALONE_VIEWS[$slug])) {
            abort_unless(isset(self::TRANSPORTATION_STANDALONE_VIEWS[$slug][$pageKey]), 404);
            $viewName = self::TRANSPORTATION_STANDALONE_VIEWS[$slug][$pageKey];

            $renderedHtml = view($viewName, [
                'order' => $order,
                'page' => $pageKey,
                'business' => $business,
                'whatsapp' => $whatsapp,
                'instagram' => $instagram,
            ])->render();

            $renderedHtml = $this->transformTransportationLogisticsHtml($renderedHtml, $business, $whatsapp, $slug, $order->site_slug);
        } elseif (isset(self::TRANSPORTATION_CONFIG_TEMPLATES[$slug])) {
            $def = self::TRANSPORTATION_CONFIG_TEMPLATES[$slug];
            abort_unless(isset($def['pages'][$pageKey]), 404);

            $viewFile = $def['pages'][$pageKey];
            $viewName = $def['view_base'].$viewFile;
            $configKey = $def['config_key'];

            $site = config($configKey) ?? [];

            $bizName = $business['business_name'] ?? '';
            if ($bizName !== '') {
                if (isset($site['brand']['name'])) {
                    $site['brand']['name'] = $bizName;
                }
                if (isset($site['brand']['upper'])) {
                    $site['brand']['upper'] = strtoupper($bizName);
                }
            }
            if ($whatsapp !== '') {
                if (isset($site['contact']['whatsapp'])) {
                    $site['contact']['whatsapp'] = $whatsapp;
                }
                if (isset($site['whatsapp']['number'])) {
                    $site['whatsapp']['number'] = $whatsapp;
                }
            }
            if (! empty($business['address'])) {
                $address = $this->businessAddress($business);
                if (isset($site['contact']['address'])) {
                    $site['contact']['address'] = $address;
                }
            }
            if (! empty($business['email']) && isset($site['contact']['email'])) {
                $site['contact']['email'] = $business['email'];
            }

            config([$configKey => $site]);

            $viewData = [
                'v' => $def['view_base'],
                'site' => $site,
                'order' => $order,
                'page' => $pageKey,
                'business' => $business,
                'whatsapp' => $whatsapp,
                'instagram' => $instagram,
            ];

            if ($slug === 'logistics-company-orange-energy') {
                $viewData['rp'] = 'webia.template.logistics-company-orange-energy.';
                $viewData['to'] = fn (?string $name = null): string => $name ? route('webia.template.logistics-company-orange-energy.'.$name) : '#';
                $viewData['img'] = fn (string $file): string => asset('images/website-bisnis/template/transportation&logistics/bold/logistics-company-orange-energy/'.$file);
            }

            $renderedHtml = view($viewName, $viewData)->render();
            $renderedHtml = $this->transformTransportationLogisticsHtml($renderedHtml, $business, $whatsapp, $slug, $order->site_slug, $def['preview_prefix'] ?? null);
        } else {
            abort(404);
        }

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function transformTransportationLogisticsHtml(string $html, array $business, string $whatsapp, string $slug, string $siteSlug, ?string $previewPrefix = null): string
    {
        if ($previewPrefix) {
            $siteBase = url('/s/'.$siteSlug);
            $previewUrl = url($previewPrefix);
            $html = str_replace([$previewUrl, $previewPrefix], [$siteBase, '/s/'.$siteSlug], $html);
        }

        $bizName = $business['business_name'] ?? '';
        if ($bizName !== '') {
            $brandMap = [
                'COCOEXPRESS' => strtoupper($bizName),
                'CocoExpress' => $bizName,
                'Coco Express' => $bizName,
                'RELOKO' => strtoupper($bizName),
                'Reloko' => $bizName,
                'Nusa Logistik' => $bizName,
                'NUSA LOGISTIK' => strtoupper($bizName),
                'GlobalCargo' => $bizName,
                'GLOBALCARGO' => strtoupper($bizName),
                'Energi Cargo' => $bizName,
                'ENERGI CARGO' => strtoupper($bizName),
                'Swiftly' => $bizName,
                'SWIFTLY' => strtoupper($bizName),
                'Hearth & Haul' => $bizName,
                'HEARTH & HAUL' => strtoupper($bizName),
                'Atelier Move' => $bizName,
                'ATELIER MOVE' => strtoupper($bizName),
            ];
            $html = str_replace(array_keys($brandMap), array_values($brandMap), $html);
        }

        $custWa = $whatsapp ?: '6281234567890';
        $rawWa = $business['whatsapp'] ?? $custWa;
        $html = str_replace(
            [
                '6281234567890',
                '628123456789',
                '62895630300345',
                '6285850180285',
                '+62 812-3456-7890',
                '+62 858-5018-0285',
                'https://wa.me/?text=',
                'https://wa.me/&',
                'https://wa.me/"',
                "https://wa.me/'",
            ],
            [
                $custWa,
                $custWa,
                $custWa,
                $custWa,
                $rawWa,
                $rawWa,
                'https://wa.me/'.$custWa.'?text=',
                'https://wa.me/'.$custWa.'&',
                'https://wa.me/'.$custWa.'"',
                'https://wa.me/'.$custWa."'",
            ],
            $html
        );

        $address = $this->businessAddress($business);
        if ($address !== '') {
            $html = str_replace(
                [
                    'Jl. Industri Raya No. 88, Kawasan Industri Pulogadung, Jakarta Timur 13920',
                    'Jl. Logistik Raya No. 88, Marunda, Jakarta Utara',
                    'Jl. Raya Pelabuhan No. 88, Tanjung Priok, Jakarta Utara 14310',
                    'Jl. Kemang Raya 18<br>Jakarta Selatan 12730',
                    'Jakarta · Indonesia',
                    'Greater Jakarta',
                    'Jakarta, Indonesia',
                ],
                $address,
                $html
            );
        }

        if (! empty($business['email'])) {
            $email = $business['email'];
            $html = str_replace(
                [
                    'info@nusalogistik.co.id',
                    'halo@globalcargo.id',
                    'halo@energicargo.co.id',
                    'hello@swiftly.example',
                    'hello@ateliermove.example',
                ],
                $email,
                $html
            );
        }

        return $html;
    }

    private const EDUCATION_VIEWS = [
        'education-onlinecourse-modern' => ['home' => 'website-bisnis.templates.education.online-course.education-onlinecourse-modern'],
        'rumah-latte-preschool-daycare' => ['home' => 'website-bisnis.templates.education.preschool.rumah-latte-preschool-daycare'],
        'tunas-cendekia-preschool-daycare' => ['home' => 'website-bisnis.templates.education.preschool.tunas-cendekia-preschool-daycare'],
        'jeli-kecil-preschool-daycare' => ['home' => 'website-bisnis.template.education.preschool-daycare-jeli-kecil.index'],
        'spark-academy-maximum-impact' => ['home' => 'website-bisnis.templates.education.spark-academy-maximum-impact'],
        'ruby-academy-classic-school' => ['home' => 'website-bisnis.templates.education.ruby-academy-classic-school'],
        'arctic-academy-school' => ['home' => 'website-bisnis.templates.education.arctic-academy-school'],
    ];

    private function handleEducation(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $slug = Str::after($siteConfigPath, 'education/');
        abort_unless(isset(self::EDUCATION_VIEWS[$slug]), 404);
        abort_unless(isset(self::EDUCATION_VIEWS[$slug][$pageKey]), 404);

        $viewName = self::EDUCATION_VIEWS[$slug][$pageKey];
        $business = $order->business_data ?? [];
        $whatsapp = $this->whatsappNumber($business['whatsapp'] ?? '');
        $instagram = ltrim($business['instagram'] ?? '', '@');

        $renderedHtml = view($viewName, [
            'order' => $order,
            'page' => $pageKey,
            'business' => $business,
            'whatsapp' => $whatsapp,
            'instagram' => $instagram,
        ])->render();

        $renderedHtml = $this->transformEducationHtml($renderedHtml, $business, $whatsapp, $slug);

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function transformEducationHtml(string $html, array $business, string $whatsapp, string $slug): string
    {
        $bizName = $business['business_name'] ?? '';
        if ($bizName !== '') {
            $brandMap = [
                'EDUPRIME<span class="text-blue-600 font-medium">ACADEMY</span>' => strtoupper($bizName),
                'SPARK<span>!</span>' => strtoupper($bizName),
                'EduPrime Academy' => $bizName,
                'EDUPRIME ACADEMY' => strtoupper($bizName),
                'EduPrime' => $bizName,
                'EDUPRIME' => strtoupper($bizName),
                'Rumah Latte' => $bizName,
                'RUMAH LATTE' => strtoupper($bizName),
                'Tunas Cendekia' => $bizName,
                'TUNAS CENDEKIA' => strtoupper($bizName),
                'Jeli Kecil' => $bizName,
                'JELI KECIL' => strtoupper($bizName),
                'SPARK Academy' => $bizName,
                'SPARK ACADEMY' => strtoupper($bizName),
                'SPARK' => strtoupper($bizName),
                'Ruby Academy' => $bizName,
                'RUBY ACADEMY' => strtoupper($bizName),
                'Ruby AI Assistant' => $bizName.' AI Assistant',
                'EduBot Assistant' => $bizName.' Assistant',
                'EduBot Academic AI' => $bizName.' Academic AI',
                '<strong>EduBot</strong>' => '<strong>'.e($bizName).'</strong>',
                'Arctic Academy' => $bizName,
                'ARCTIC ACADEMY' => strtoupper($bizName),
                'Arctic AI Assistant' => $bizName.' AI Assistant',
            ];
            $html = str_replace(array_keys($brandMap), array_values($brandMap), $html);
        }

        $custWa = $whatsapp ?: '6281234567890';
        $rawWa = $business['whatsapp'] ?? $custWa;
        $html = str_replace(
            ['6285850180285', '6281234567890', '+62 812-3456-7890', '0812-3456-7890'],
            [$custWa, $custWa, $rawWa, $rawWa],
            $html
        );

        $address = $this->businessAddress($business);
        if ($address !== '') {
            $html = str_replace(
                [
                    'Gedung EduPrime Center',
                    'Jl. Contoh No. 12, Surabaya',
                    'Jl. Contoh Raya No. 12, Surabaya',
                    'Jl. Pelangi No. 12',
                    'Jl. Raya Darmo No. 00, Surabaya',
                    'Jl. Raya Darmo, Surabaya, Jawa Timur',
                    'Surabaya, Indonesia',
                ],
                $address,
                $html
            );
        }

        if (! empty($business['email'])) {
            $email = $business['email'];
            $html = str_replace(
                [
                    'halo@rumahlatte.id',
                    'halo@tunascendekia.id',
                    'hai@jelikecil.id',
                    'hello@sparkacademy.sch.id',
                    'hello@rubyacademy.sch.id',
                    'hello@arcticacademy.sch.id',
                ],
                $email,
                $html
            );
        }

        if ($slug === 'rumah-latte-preschool-daycare') {
            $shim = '<script>document.getElementById("f").onsubmit=function(e){e.preventDefault();var d=new FormData(e.target);'
                .'var t="Halo ".concat('.json_encode($bizName ?: 'Rumah Latte').', ", saya ", d.get("n"), " (WA ", d.get("w"), "). Anak usia ", d.get("u"), ", tertarik paket ", d.get("p"), ". ", (d.get("c")||""));'
                .'document.getElementById("ok").style.display="block";'
                .'window.open("https://wa.me/'.$custWa.'?text="+encodeURIComponent(t),"_blank")};</script>';
            $html = str_replace('rumah-latte-preschool-daycare.js"></script>', 'rumah-latte-preschool-daycare.js"></script>'.$shim, $html);
        }

        return $html;
    }

    private const SPORTS_FITNESS_VIEWS = [
        'sports-gym-bold' => ['home' => 'website-bisnis.templates.sports-fitness.gym.sports-gym-bold'],
        'ironpulse-gym-fitness-center' => ['home' => 'website-bisnis.templates.sports-fitness.gym-fitness-center.ironpulse.ironpulse'],
        'personal-trainer-playful-colorful-jelly-pop' => [
            'home' => 'website-bisnis.templates.sports-fitness.personal-trainer.jelly-pop.personal-trainer-jelly-pop',
            'detail' => 'website-bisnis.templates.sports-fitness.personal-trainer.jelly-pop.personal-trainer-detail-jelly-pop',
        ],
        'northline-performance-corporate-personal-trainer' => ['home' => 'website-bisnis.templates.sports-fitness.personal-trainer.northline-blue.northline-blue'],
        'vanta-form-cyber-neon-personal-trainer' => ['home' => 'website-bisnis.templates.sports-fitness.personal-trainer.cyber-neon.cyber-neon'],
        'pilates-studio-strawberry-fizz' => [
            'home' => 'website-bisnis.templates.sports-fitness.pilates-studio.strawberry-fizz.pilates-strawberry-fizz',
            'classes' => 'website-bisnis.templates.sports-fitness.pilates-studio.strawberry-fizz.pilates-classes-strawberry-fizz',
            'class-detail' => 'website-bisnis.templates.sports-fitness.pilates-studio.strawberry-fizz.pilates-class-detail-strawberry-fizz',
        ],
        'swimming-school/tirtaceria' => ['home' => 'website-bisnis.templates.sports.swimming-school.tirtaceria.tirtaceria'],
        'swimming-school/splashkids' => ['home' => 'website-bisnis.templates.sports.swimming-school.splashkids.splashkids'],
    ];

    private function handleSportsFitness(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $slug = Str::after($siteConfigPath, 'sports-fitness/');
        abort_unless(isset(self::SPORTS_FITNESS_VIEWS[$slug]), 404);
        abort_unless(isset(self::SPORTS_FITNESS_VIEWS[$slug][$pageKey]), 404);

        $viewName = self::SPORTS_FITNESS_VIEWS[$slug][$pageKey];
        $business = $order->business_data ?? [];
        $whatsapp = $this->whatsappNumber($business['whatsapp'] ?? '');
        $instagram = ltrim($business['instagram'] ?? '', '@');

        $renderedHtml = view($viewName, [
            'order' => $order,
            'page' => $pageKey,
            'business' => $business,
            'whatsapp' => $whatsapp,
            'instagram' => $instagram,
        ])->render();

        $renderedHtml = $this->transformSportsFitnessHtml($renderedHtml, $business, $whatsapp, $slug, $order);

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function transformSportsFitnessHtml(string $html, array $business, string $whatsapp, string $slug, WebiaOrder $order): string
    {
        // Protect inline JS config variable names from brand-name replacement corruption.
        $configTokens = [
            "window.VANTA_CONFIG={whatsappNumber:'6281399007744'}" => '@@0001@@',
            "window.NORTHLINE_CONFIG={whatsappNumber:'628112040880'}" => '@@0002@@',
            "window.JELLY_POP_CONFIG={whatsappNumber:'6285850180285'}" => '@@0003@@',
            "window.WEBIA_WA_ADMIN = window.WEBIA_WA_ADMIN || '6281234567890';" => '@@0004@@',
        ];
        foreach ($configTokens as $src => $token) {
            $html = str_replace($src, $token, $html);
        }

        $bizName = $business['business_name'] ?? '';
        if ($bizName !== '') {
            $brandMap = [
                'APEX PULSE' => strtoupper($bizName),
                'Apex Pulse Fitness' => $bizName,
                'Apex Pulse' => $bizName,
                'APEX<span class="text-[#ccff00]">PULSE</span>' => strtoupper($bizName),
                'IRONPULSE' => strtoupper($bizName),
                'IRON<b>PULSE</b>' => strtoupper($bizName),
                'IronPulse' => $bizName,
                'Iron Pulse' => $bizName,
                'IRONPULSE Gym & Fitness Center' => $bizName.' Gym & Fitness Center',
                'jelly pop' => strtolower($bizName),
                'Jelly Pop' => $bizName,
                'JELLY POP' => strtoupper($bizName),
                'NORTHLINE' => strtoupper($bizName),
                'Northline Performance' => $bizName,
                'Northline' => $bizName,
                'VANTA//FORM' => strtoupper($bizName),
                'VANTA FORM' => strtoupper($bizName),
                'Vanta Form' => $bizName,
                'VANTA<span>//</span>FORM' => strtoupper($bizName),
                'VANTA//FORM — Personal Training Lab' => $bizName.' — Personal Training Lab',
                'strawberry fizz' => strtolower($bizName),
                'Rustic Strawberry Fizz' => $bizName,
                'Strawberry Fizz' => $bizName,
                'TirtaCeria Swim Academy' => $bizName,
                'TirtaCeria' => $bizName,
                'Tirta Ceria' => $bizName,
                'Tirta<span class="text-aqua">Ceria</span>' => e($bizName),
                'Tirta<span class="text-mint">Ceria</span> Swim Academy' => e($bizName),
                'SplashKids Swim School' => $bizName,
                'SplashKids' => $bizName,
                'Splash Kids' => $bizName,
                '🌊 SplashKids Swim School' => '🌊 '.e($bizName),
                '🌊 SplashKids' => '🌊 '.e($bizName),
            ];
            uksort($brandMap, fn ($a, $b) => strlen($b) <=> strlen($a));
            $html = str_replace(array_keys($brandMap), array_values($brandMap), $html);
            if ($slug === 'ironpulse-gym-fitness-center') {
                file_put_contents(storage_path('debug-posttitle-iron.txt'), (preg_match('/<title>(.*?)<\/title>/s', $html, $m) ? $m[1] : 'NOTITLE'));
            }
        }

        $custWa = $whatsapp ?: '6281234567890';
        $rawWa = $business['whatsapp'] ?? $custWa;
        $html = str_replace(
            ['6285850180285', '6281234567890', '6281399007744', '628112040880', '+62 812-3456-7890', '0812-3456-7890'],
            [$custWa, $custWa, $custWa, $custWa, $rawWa, $rawWa],
            $html
        );

        // Inline config overrides for JS-driven templates
        $html = str_replace('@@0001@@', "window.VANTA_CONFIG={whatsappNumber:'".$custWa."'}", $html);
        $html = str_replace('@@0002@@', "window.NORTHLINE_CONFIG={whatsappNumber:'".$custWa."'}", $html);
        $html = str_replace('@@0003@@', "window.JELLY_POP_CONFIG={whatsappNumber:'".$custWa."'}", $html);
        $html = str_replace('@@0004@@', "window.WEBIA_WA_ADMIN = window.WEBIA_WA_ADMIN || '".$custWa."';", $html);

        $address = $this->businessAddress($business);
        if ($address !== '') {
            $html = str_replace(
                [
                    'Mega Gym Mall Lt. 3, Jakarta Selatan',
                    'Kav. 45 Jakarta Selatan',
                    'Jl. Contoh Raya No. 88, Surabaya, Jawa Timur (alamat demo)',
                    'Jl. Contoh Raya No. 88, Surabaya',
                    'Jl. Senopati Aesthetic No. 88, Upper Level 2, Jakarta',
                    '📍 Jl. Tirta Boulevard No. 88, Jakarta Selatan',
                    'Jl. Tirta Boulevard No. 88, Jakarta Selatan',
                ],
                [
                    $address,
                    $address,
                    $address,
                    $address,
                    $address,
                    '📍 '.$address,
                    $address,
                ],
                $html
            );
        }

        if (! empty($business['email'])) {
            $email = $business['email'];
            $html = str_replace(
                [
                    'hello@ironpulse.id',
                    'hello@strawberryfizzpilates.com',
                ],
                $email,
                $html
            );
        }

        // Strawberry Fizz external JS hardcodes ADMIN_WHATSAPP; patch window.open at runtime.
        if ($slug === 'pilates-studio-strawberry-fizz') {
            $shim = '<script>(function(){const o=window.open;window.open=function(u,t,f){if(typeof u==="string"){u=u.replace(/6281234567890/g,'.json_encode($custWa).');}return o.call(window,u,t,f);};})();</script>';
            $html = str_replace('</body>', $shim.'</body>', $html);
        }

        if (str_starts_with($slug, 'swimming-school/')) {
            $swimShim = '<script>(function(){
                window.WEBIA_WA_ADMIN = '.json_encode($custWa).';
                const o = window.open;
                if (o) {
                    window.open = function(u,t,f){
                        if(typeof u==="string"){u=u.replace(/6285850180285|6281234567890/g, '.json_encode($custWa).');}
                        return o.call(window,u,t,f);
                    };
                }
                document.addEventListener("click", function(e){
                    const a = e.target.closest && e.target.closest("a[href*=\'wa.me\']");
                    if (a && typeof a.href === "string") {
                        a.href = a.href.replace(/6285850180285|6281234567890/g, '.json_encode($custWa).');
                    }
                }, true);
            })();</script>';
            $html = str_replace('</body>', $swimShim.'</body>', $html);
        }

        // Remap preview links to published site routes
        $siteBase = url('/s/'.$order->site_slug);
        $pairs = [
            '/webia/template/personal-trainer-jelly-pop/detail' => $siteBase.'/detail',
            '/webia/template/personal-trainer-jelly-pop' => $siteBase,
            '/webia/template/pilates-studio-strawberry-fizz/classes' => $siteBase.'/classes',
            '/webia/template/pilates-studio-strawberry-fizz/class-detail' => $siteBase.'/class-detail',
            '/webia/template/pilates-studio-strawberry-fizz' => $siteBase,
            '/webia/template/sports-gym-bold' => $siteBase,
            '/webia/template/ironpulse-gym-fitness-center' => $siteBase,
            '/webia/template/sports-fitness/personal-trainer/northline-blue' => $siteBase,
            '/webia/template/sports-fitness/personal-trainer/cyber-neon' => $siteBase,
        ];
        // Replace longer paths first
        uksort($pairs, fn ($a, $b) => strlen($b) <=> strlen($a));
        foreach ($pairs as $from => $to) {
            $html = str_replace(url($from), $to, $html);
            $html = str_replace($from, $to, $html);
        }

        return $html;
    }

    private const PET_ANIMAL_SERVICE_VIEWS = [
        'paws-clever-creative' => ['home' => 'website-bisnis.templates.pet-animal-service.paws-clever-creative'],
        'paws-joy-jellypop' => ['home' => 'website-bisnis.templates.pet-animal-service.paws-joy-jellypop'],
        'paws-canine-terra-earth-tone' => ['home' => 'website-bisnis.templates.pet-animal-service.paws-canine-terra-earth-tone'],
        'pawtopia-animal-care' => ['home' => 'website-bisnis.templates.pet-animal-service.pawtopia-animal-care'],
        'pawlora-animal-care' => ['home' => 'website-bisnis.templates.pet-animal-service.pawlora-animal-care'],
        'pawstead-animal-care' => ['home' => 'website-bisnis.templates.pet-animal-service.pawstead'],
        'petshop-minimalist-glacierblue' => [
            'home' => 'website-bisnis.templates.pet-animal-service.petshop.glacierblue.petshop-minimalist-glacierblue',
            'katalog' => 'website-bisnis.templates.pet-animal-service.petshop.glacierblue.petshop-katalog-minimalist-glacierblue',
            'produk' => 'website-bisnis.templates.pet-animal-service.petshop.glacierblue.petshop-produk-minimalist-glacierblue',
        ],
        'petshop-luxury-rosegold' => [
            'home' => 'website-bisnis.templates.pet-animal-service.petshop.rosegold.petshop-luxury-rosegold',
            'katalog' => 'website-bisnis.templates.pet-animal-service.petshop.rosegold.petshop-katalog-luxury-rosegold',
            'produk' => 'website-bisnis.templates.pet-animal-service.petshop.rosegold.petshop-produk-luxury-rosegold',
        ],
        'petshop-corporate-plumvelvet' => [
            'home' => 'website-bisnis.templates.pet-animal-service.petshop.plumvelvet.petshop-corporate-plumvelvet',
            'katalog' => 'website-bisnis.templates.pet-animal-service.petshop.plumvelvet.petshop-katalog-corporate-plumvelvet',
            'produk' => 'website-bisnis.templates.pet-animal-service.petshop.plumvelvet.petshop-produk-corporate-plumvelvet',
        ],
    ];

    private function handlePetAnimalService(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $slug = Str::after($siteConfigPath, 'pet-animal-service/');
        abort_unless(isset(self::PET_ANIMAL_SERVICE_VIEWS[$slug]), 404);

        $baseKey = str_starts_with($pageKey, 'produk/') ? 'produk' : $pageKey;
        abort_unless(isset(self::PET_ANIMAL_SERVICE_VIEWS[$slug][$baseKey]), 404);

        $viewName = self::PET_ANIMAL_SERVICE_VIEWS[$slug][$baseKey];
        $business = $order->business_data ?? [];
        $whatsapp = $this->whatsappNumber($business['whatsapp'] ?? '');
        $instagram = ltrim($business['instagram'] ?? '', '@');

        $productSlug = str_starts_with($pageKey, 'produk/') ? Str::after($pageKey, 'produk/') : null;

        $viewData = [
            'order' => $order,
            'page' => $pageKey,
            'business' => $business,
            'whatsapp' => $whatsapp,
            'instagram' => $instagram,
            'slug' => $productSlug,
        ];
        if (in_array($slug, ['petshop-corporate-plumvelvet'], true)) {
            $viewData['product'] = [
                'name' => 'Produk Contoh',
                'brand' => $business['business_name'] ?? 'PetBase',
                'category' => 'Pet',
                'price' => 100000,
                'description' => '',
                'specifications' => [],
            ];
        }

        $renderedHtml = view($viewName, $viewData)->render();

        $renderedHtml = $this->transformPetAnimalServiceHtml($renderedHtml, $business, $whatsapp, $slug, $order);

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function transformPetAnimalServiceHtml(string $html, array $business, string $whatsapp, string $slug, WebiaOrder $order): string
    {
        $bizName = $business['business_name'] ?? '';
        if ($bizName !== '') {
            $brandMap = [
                'Pawlora' => $bizName,
                'Canine Terra' => $bizName,
                'Paws & Clever' => $bizName,
                'Paws &amp; Clever' => $bizName,
                'Paws & Joy' => $bizName,
                'Paws &amp; Joy' => $bizName,
                'Pawstead' => $bizName,
                'Pawtopia' => $bizName,
                'PawMart' => $bizName,
                'PetBase' => $bizName,
                'Furry & Co.' => $bizName,
                'Furry &amp; Co.' => $bizName,
                'Furry & Co' => $bizName,
            ];
            uksort($brandMap, fn ($a, $b) => strlen($b) <=> strlen($a));
            $html = str_replace(array_keys($brandMap), array_values($brandMap), $html);
        }

        $custWa = $whatsapp ?: '6281234567890';
        $rawWa = $business['whatsapp'] ?? $custWa;
        $html = str_replace(
            ['6281234567890', '6281277889900', '6281299008812', '6285850180285', '+62 812-3456-7890', '0812-3456-7890'],
            [$custWa, $custWa, $custWa, $custWa, $rawWa, $rawWa],
            $html
        );

        // Inline config overrides for petshop templates
        $configTokens = [
            'window.PAWMART_CONFIG = {' => '@@PAWMART_CFG@@',
            'window.PETBASE_CONFIG = {' => '@@PETBASE_CFG@@',
            'window.FURRY_CONFIG = {' => '@@FURRY_CFG@@',
        ];
        foreach ($configTokens as $src => $token) {
            $html = str_replace($src, $token, $html);
        }
        // Restore with whatsappNumber override (best-effort: replace the number inside the protected block by re-injecting)
        $html = str_replace('@@PAWMART_CFG@@', 'window.PAWMART_CONFIG = {', $html);
        $html = str_replace('@@PETBASE_CFG@@', 'window.PETBASE_CONFIG = {', $html);
        $html = str_replace('@@FURRY_CFG@@', 'window.FURRY_CONFIG = {', $html);

        // Replace whatsappNumber values inside config blocks
        $html = preg_replace("/(window\.(?:PAWMART|PETBASE|FURRY)_CONFIG\s*=\s*\{[^}]*?whatsappNumber:\s*')\d+(')/s", '${1}'.$custWa.'${2}', $html);

        $address = $this->businessAddress($business);
        if ($address !== '') {
            $html = str_replace(
                [
                    'Jl. Taman Flora Boulevard No. 18, BSD City, Serpong, Tangerang Selatan 15310',
                    'Jl. Boulevard Raya Blok PA-12, Kelapa Gading (Indoor AC Stud',
                ],
                $address,
                $html
            );
        }

        if (! empty($business['email'])) {
            $email = $business['email'];
            $html = str_replace(
                [
                    'halo@pawlora.id',
                    'halo@pawsandclever.id',
                    'halo@pawstead.id',
                    'halo@pawtopia.id',
                ],
                $email,
                $html
            );
        }

        // Remap preview links to published site routes
        $siteBase = url('/s/'.$order->site_slug);
        $pairs = [
            '/webia/template/petshop-minimalist-glacierblue/katalog' => $siteBase.'/katalog',
            '/webia/template/petshop-minimalist-glacierblue/produk/' => $siteBase.'/produk/',
            '/webia/template/petshop-minimalist-glacierblue' => $siteBase,
            '/webia/template/petshop-luxury-rosegold/katalog' => $siteBase.'/katalog',
            '/webia/template/petshop-luxury-rosegold/produk/' => $siteBase.'/produk/',
            '/webia/template/petshop-luxury-rosegold' => $siteBase,
            '/webia/template/petshop-corporate-plumvelvet/katalog' => $siteBase.'/katalog',
            '/webia/template/petshop-corporate-plumvelvet/produk/' => $siteBase.'/produk/',
            '/webia/template/petshop-corporate-plumvelvet' => $siteBase,
            '/webia/template/pawlora-animal-care' => $siteBase,
            '/webia/template/paws-clever-creative' => $siteBase,
            '/webia/template/paws-joy-jellypop' => $siteBase,
            '/webia/template/paws-canine-terra-earth-tone' => $siteBase,
            '/webia/template/pawtopia-animal-care' => $siteBase,
            '/webia/template/pawstead' => $siteBase,
        ];
        uksort($pairs, fn ($a, $b) => strlen($b) <=> strlen($a));
        foreach ($pairs as $from => $to) {
            $html = str_replace(url($from), $to, $html);
            $html = str_replace($from, $to, $html);
        }

        return $html;
    }


}
