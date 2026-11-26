<?php

namespace App\Services\CustomerSite\Concerns;

use App\Models\WebiaOrder;
use App\Services\AiQuotaService;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

trait HandlesCategorySitesB
{
    private const PHOTOGRAPHY_VIEWS = [
        'lumiere-photography-studio' => ['home' => 'website-bisnis.templates.photography.lumiere-photography-studio'],
        'noir-studio-photography' => ['home' => 'website-bisnis.templates.photography.noir-studio-photography'],
        'peachy-studio' => ['home' => 'website-bisnis.templates.photography.peachy-studio'],
        'candy-cloud-ugc-content-creator-studio' => ['home' => 'website-bisnis.templates.photography-creative.ugc-content-creator-studio.candy-cloud-studio.candy-cloud-studio'],
        'photography-motiongraphics-premiumminimal-champagneglow-putri' => ['home' => 'website-bisnis.templates.photography-creative.motion-graphics.photography-motiongraphics-premiumminimal-champagneglow-putri'],
        'photography-motiongraphics-traditionalcultural-coralpeach-putri' => ['home' => 'website-bisnis.templates.photography-creative.motion-graphics.photography-motiongraphics-traditionalcultural-coralpeach-putri'],
    ];

    private function handlePhotography(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $slug = Str::after($siteConfigPath, 'photography/');
        abort_unless(isset(self::PHOTOGRAPHY_VIEWS[$slug]), 404);
        abort_unless(isset(self::PHOTOGRAPHY_VIEWS[$slug][$pageKey]), 404);

        $viewName = self::PHOTOGRAPHY_VIEWS[$slug][$pageKey];
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

        $renderedHtml = $this->transformPhotographyHtml($renderedHtml, $business, $whatsapp, $slug, $order);

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function transformPhotographyHtml(string $html, array $business, string $whatsapp, string $slug, WebiaOrder $order): string
    {
        $bizName = $business['business_name'] ?? '';
        if ($bizName !== '') {
            $brandMap = [
                'Lumière Studio' => $bizName,
                'Lumiere Studio' => $bizName,
                'Noir Studio' => $bizName,
                'Peachy Studio' => $bizName,
                'Candy Cloud Studio' => $bizName,
                'Candy Cloud' => $bizName,
                'AuraMotion 3D Studio' => $bizName,
                'AuraMotion' => $bizName,
                'PusakaMotion 3D Studio' => $bizName,
                'PusakaMotion' => $bizName,
            ];
            uksort($brandMap, fn ($a, $b) => strlen($b) <=> strlen($a));
            $html = str_replace(array_keys($brandMap), array_values($brandMap), $html);
        }

        $custWa = $whatsapp ?: '6281234567890';
        $rawWa = $business['whatsapp'] ?? $custWa;
        $html = str_replace(
            ['6281234567890', '+62 812-3456-7890', '0812-3456-7890'],
            [$custWa, $rawWa, $rawWa],
            $html
        );

        $address = $this->businessAddress($business);
        if ($address !== '') {
            $html = str_replace(
                [
                    'Jl. Raya Kertajaya No.123',
                    'Jl. Melati No. 12, Jakarta Selatan',
                    'Jl. Tirtodipuran No. 45, Mantrijeron, D.I. Yogyakarta',
                ],
                $address,
                $html
            );
        }

        if (! empty($business['email'])) {
            $email = $business['email'];
            $html = str_replace(
                [
                    'hello@lumiere.studio',
                    'hello@noirstudio.id',
                    'hello@peachystudio.com',
                    'hello@candycloudstudio.com',
                    'adrian@brand.com',
                    'brief@pusakamotion.id',
                    'director@studio.id',
                ],
                $email,
                $html
            );
        }

        // Remap preview links to published site routes
        $siteBase = url('/s/'.$order->site_slug);
        $pairs = [
            '/webia/template/lumiere-photography-studio' => $siteBase,
            '/webia/template/noir-studio-photography' => $siteBase,
            '/webia/template/peachy-studio' => $siteBase,
            '/webia/template/candy-cloud-ugc-content-creator-studio' => $siteBase,
            '/webia/template/photography-motiongraphics-premiumminimal-champagneglow-putri' => $siteBase,
            '/webia/template/photography-motiongraphics-traditionalcultural-coralpeach-putri' => $siteBase,
        ];
        uksort($pairs, fn ($a, $b) => strlen($b) <=> strlen($a));
        foreach ($pairs as $from => $to) {
            $html = str_replace(url($from), $to, $html);
            $html = str_replace($from, $to, $html);
        }

        return $html;
    }

    private const HOME_SERVICES_VIEWS = [
        'madubersih-home-cleaning-vintage' => ['home' => 'website-bisnis.templates.home-services.home-cleaning-deep-cleaning.madubersih-vintage'],
        'astroclean-home-cleaning-cosmic' => ['home' => 'website-bisnis.templates.home-services.home-cleaning-deep-cleaning.astroclean-cosmic'],
        'matcha-clean-organic-deep-cleaning' => ['home' => 'website-bisnis.templates.home-services.home-cleaning-deep-cleaning.matcha-clean.matcha-clean'],
        'aurelia-home-renovation' => ['home' => 'website-bisnis.templates.home-services.home-renovation-repair.aurelia.aurelia'],
    ];

    private const HOME_RENOVATION_CONFIG_VIEWS = [
        'organic/home-renovation-repair-sage-green/home-renovation-repair' => 'sage',
        'vintage/home-renovation-repair-chocolate-luxe/home-renovation-repair' => 'chocolate',
    ];

    private function handleHomeServices(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $slug = Str::after($siteConfigPath, 'home-services/');
        if (isset(self::HOME_RENOVATION_CONFIG_VIEWS[$slug])) {
            return $this->handleHomeRenovationConfig($order, $siteConfigPath, $pageKey);
        }

        if (isset(self::HOME_SERVICES_CONFIG_VIEWS[$slug])) {
            return $this->handleHomeServicesConfig($order, $siteConfigPath, $pageKey);
        }

        abort_unless(isset(self::HOME_SERVICES_VIEWS[$slug]), 404);
        abort_unless(isset(self::HOME_SERVICES_VIEWS[$slug][$pageKey]), 404);

        $viewName = self::HOME_SERVICES_VIEWS[$slug][$pageKey];
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

        $renderedHtml = $this->transformHomeServicesHtml($renderedHtml, $business, $whatsapp, $slug, $order);

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function transformHomeServicesHtml(string $html, array $business, string $whatsapp, string $slug, WebiaOrder $order): string
    {
        $bizName = $business['business_name'] ?? '';
        if ($bizName !== '') {
            $brandMap = [
                'MaduBersih' => $bizName,
                'AstroClean' => $bizName,
                'MATCHA CLEAN' => strtoupper($bizName),
                'MATCHA' => strtoupper($bizName),
                'MATCHA CLEAN | Organic Botanical & Deep Home Sanitization' => $bizName.' | Organic Botanical & Deep Home Sanitization',
                'AURELIA' => strtoupper($bizName),
                'AURELIA | Haute Architecture &amp; Renovation Services' => $bizName.' | Haute Architecture &amp; Renovation Services',
            ];
            uksort($brandMap, fn ($a, $b) => strlen($b) <=> strlen($a));
            $html = str_replace(array_keys($brandMap), array_values($brandMap), $html);
        }

        $custWa = $whatsapp ?: '6281234567890';
        $rawWa = $business['whatsapp'] ?? $custWa;
        $html = str_replace(
            ['6281234567890', '6281298765432', '+62 812-3456-7890', '0812-3456-7890'],
            [$custWa, $custWa, $rawWa, $rawWa],
            $html
        );

        $address = $this->businessAddress($business);
        if ($address !== '') {
            $html = str_replace(
                [
                    'Jakarta Selatan & Kebayoran',
                    'Beverly Hills',
                ],
                $address,
                $html
            );
        }

        if (! empty($business['email'])) {
            $email = $business['email'];
            $html = str_replace(
                [
                    'harrington@estate.com',
                ],
                $email,
                $html
            );
        }

        // Remap preview links to published site routes
        $siteBase = url('/s/'.$order->site_slug);
        $pairs = [
            '/webia/template/madubersih-home-cleaning-vintage' => $siteBase,
            '/webia/template/astroclean-home-cleaning-cosmic' => $siteBase,
            '/webia/template/matcha-clean-organic-deep-cleaning' => $siteBase,
            '/webia/template/aurelia-home-renovation' => $siteBase,
        ];
        uksort($pairs, fn ($a, $b) => strlen($b) <=> strlen($a));
        foreach ($pairs as $from => $to) {
            $html = str_replace(url($from), $to, $html);
            $html = str_replace($from, $to, $html);
        }

        return $html;
    }

    private const NONPROFIT_VIEWS = [
        'relakita-volunteer-warm-sunrise' => ['home' => 'website-bisnis.templates.nonprofit-community.relakita-volunteer-warm-sunrise'],
        'kolektif-aksi-kita-volunteer-midnight-navy' => ['home' => 'website-bisnis.templates.nonprofit-community.kolektif-aksi-kita-volunteer-midnight-navy'],
        'revolt-impact-social-organization' => ['home' => 'website-bisnis.templates.nonprofit-community.social-organization.revolt-impact.revolt-impact'],
        'lentera-nusantara-volunteer-group' => ['home' => 'website-bisnis.templates.nonprofit-community.volunteer-group.lentera-nusantara.lentera-nusantara'],
    ];

    private function handleNonprofit(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $slug = Str::after($siteConfigPath, 'nonprofit-community/');
        abort_unless(isset(self::NONPROFIT_VIEWS[$slug]), 404);
        abort_unless(isset(self::NONPROFIT_VIEWS[$slug][$pageKey]), 404);

        $viewName = self::NONPROFIT_VIEWS[$slug][$pageKey];
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

        $renderedHtml = $this->transformNonprofitHtml($renderedHtml, $business, $whatsapp, $slug, $order);

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function transformNonprofitHtml(string $html, array $business, string $whatsapp, string $slug, WebiaOrder $order): string
    {
        $bizName = $business['business_name'] ?? '';
        if ($bizName !== '') {
            $brandMap = [
                'Kolektif Aksi Kita' => $bizName,
                'REVOLT // IMPACT' => strtoupper($bizName),
                'REVOLT' => strtoupper($bizName),
                'Lentera Nusantara' => $bizName,
                'Relakita' => $bizName,
            ];
            // mixed-case title entries for uppercase brands
            $brandMap['REVOLT // IMPACT — Social Organization'] = $bizName.' — Social Organization';
            uksort($brandMap, fn ($a, $b) => strlen($b) <=> strlen($a));
            $html = str_replace(array_keys($brandMap), array_values($brandMap), $html);
        }

        $custWa = $whatsapp ?: '6281234567890';
        $rawWa = $business['whatsapp'] ?? $custWa;
        $html = str_replace(
            ['6281234567890', '+62 812-3456-7890', '0812-3456-7890'],
            [$custWa, $rawWa, $rawWa],
            $html
        );

        $address = $this->businessAddress($business);
        if ($address !== '') {
            $html = str_replace(
                [
                    'Jl. Cikini Raya No. 45, Menteng',
                    'Jl. Tebet Barat Raya No. 45, Jakarta Selatan 12810.',
                ],
                $address,
                $html
            );
        }

        if (! empty($business['email'])) {
            $email = $business['email'];
            $html = str_replace(
                [
                    'kontak@relakita.org',
                ],
                $email,
                $html
            );
        }

        // Remap preview links to published site routes
        $siteBase = url('/s/'.$order->site_slug);
        $pairs = [
            '/webia/template/relakita-volunteer-warm-sunrise' => $siteBase,
            '/webia/template/kolektif-aksi-kita-volunteer-midnight-navy' => $siteBase,
            '/webia/template/revolt-impact-social-organization' => $siteBase,
            '/webia/template/lentera-nusantara-volunteer-group' => $siteBase,
        ];
        uksort($pairs, fn ($a, $b) => strlen($b) <=> strlen($a));
        foreach ($pairs as $from => $to) {
            $html = str_replace(url($from), $to, $html);
            $html = str_replace($from, $to, $html);
        }

        return $html;
    }

    private const INTERIOR_VIEWS = [
        'interior-design-studio-artistic-terracotta' => ['home' => 'website-bisnis.templates.interior-architecture.interior-design-studio.artistic-terracotta.artistic-terracotta'],
        'aethel-moss-architectural-studio' => ['home' => 'website-bisnis.templates.interior-architecture.architecture-building-design.aethel-moss.aethel-moss'],
        'nantara-architecture-traditional-cultural' => ['home' => 'website-bisnis.templates.interior-architecture.architecture-building-design.nantara-architecture.nantara-architecture'],
    ];

    private function handleInterior(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $slug = Str::after($siteConfigPath, 'interior-architecture/');
        abort_unless(isset(self::INTERIOR_VIEWS[$slug]), 404);
        abort_unless(isset(self::INTERIOR_VIEWS[$slug][$pageKey]), 404);

        $viewName = self::INTERIOR_VIEWS[$slug][$pageKey];
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

        $renderedHtml = $this->transformInteriorHtml($renderedHtml, $business, $whatsapp, $slug, $order);

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function transformInteriorHtml(string $html, array $business, string $whatsapp, string $slug, WebiaOrder $order): string
    {
        $bizName = $business['business_name'] ?? '';
        if ($bizName !== '') {
            $brandMap = [
                'Artistic Terracotta' => $bizName,
                'Terracotta Studio' => $bizName,
                'AETHEL MOSS' => strtoupper($bizName),
                'Aethel Moss' => $bizName,
                'Aethel Moss Studio' => $bizName,
                'Nantara Architecture' => $bizName,
            ];
            $brandMap['AETHEL MOSS | Architectural'] = $bizName.' | Architectural';
            uksort($brandMap, fn ($a, $b) => strlen($b) <=> strlen($a));
            $html = str_replace(array_keys($brandMap), array_values($brandMap), $html);
        }

        $custWa = $whatsapp ?: '6281234567890';
        $rawWa = $business['whatsapp'] ?? $custWa;
        $html = str_replace(
            ['6281234567890', '+62 812-3456-7890', '0812-3456-7890'],
            [$custWa, $rawWa, $rawWa],
            $html
        );

        $address = $this->businessAddress($business);
        if ($address !== '') {
            $html = str_replace(
                [
                    'Jl. Senopati No. 88, Kebayoran Baru, Jakarta Selatan',
                    'Jl. Raya Canggu No. 12, Badung, Bali',
                    'Jl. Palagan Tentara Pelajar Km 9, Sleman, DI Yogyakarta',
                    'Jl. Raya Solo-Jepara Km 12, Surakarta',
                ],
                $address,
                $html
            );
        }

        if (! empty($business['email'])) {
            $email = $business['email'];
            $html = str_replace(
                [
                    'contact@terracottastudio.com',
                    'alexandra@domain.com',
                    'studio@aethelmoss.com',
                ],
                $email,
                $html
            );
        }

        // Remap preview links to published site routes
        $siteBase = url('/s/'.$order->site_slug);
        $pairs = [
            '/webia/template/interior-design-studio-artistic-terracotta' => $siteBase,
            '/webia/template/aethel-moss-architectural-studio' => $siteBase,
            '/webia/template/nantara-architecture-traditional-cultural' => $siteBase,
        ];
        uksort($pairs, fn ($a, $b) => strlen($b) <=> strlen($a));
        foreach ($pairs as $from => $to) {
            $html = str_replace(url($from), $to, $html);
            $html = str_replace($from, $to, $html);
        }

        return $html;
    }

    private const AGRICULTURE_VIEWS = [
        'agriternak-organic-ethical-precision' => ['home' => 'website-bisnis.templates.agriculture.agriternak-organic-ethical-precision'],
        'agriternak-futuristic-iot' => ['home' => 'website-bisnis.templates.agriculture.agriternak-futuristic-iot'],
        'agriternak-bold-livestock' => ['home' => 'website-bisnis.templates.agriculture.agriternak-bold-livestock'],
        'agriculture-peralatanpertanian-corporate-sagegreen-putri' => ['home' => 'website-bisnis.templates.agriculture.peralatan-pertanian.agriculture-peralatanpertanian-corporate-sagegreen-putri'],
        'agriculture-peralatanpertanian-creative-matchalatte-putri' => ['home' => 'website-bisnis.templates.agriculture.peralatan-pertanian.agriculture-peralatanpertanian-creative-matchalatte-putri'],
        'agriculture-peralatanpertanian-playfulcolorful-arcticfrost-putri' => ['home' => 'website-bisnis.templates.agriculture.peralatan-pertanian.agriculture-peralatanpertanian-playfulcolorful-arcticfrost-putri'],
    ];

    private function handleAgriculture(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $slug = Str::after($siteConfigPath, 'agriculture/');
        abort_unless(isset(self::AGRICULTURE_VIEWS[$slug]), 404);
        abort_unless(isset(self::AGRICULTURE_VIEWS[$slug][$pageKey]), 404);

        $viewName = self::AGRICULTURE_VIEWS[$slug][$pageKey];
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

        $renderedHtml = $this->transformAgricultureHtml($renderedHtml, $business, $whatsapp, $slug, $order);

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function transformAgricultureHtml(string $html, array $business, string $whatsapp, string $slug, WebiaOrder $order): string
    {
        $bizName = $business['business_name'] ?? '';
        if ($bizName !== '') {
            $brandMap = [
                'AgriTernak' => $bizName,
                'AgroPratama Machinery' => $bizName,
                'AgroPratama' => $bizName,
                'MatchaAgro Machinery' => $bizName,
                'MatchaAgro' => $bizName,
                'FrostyAgro Equipment' => $bizName,
                'FrostyAgro' => $bizName,
            ];
            uksort($brandMap, fn ($a, $b) => strlen($b) <=> strlen($a));
            $html = str_replace(array_keys($brandMap), array_values($brandMap), $html);
        }

        $custWa = $whatsapp ?: '6281234567890';
        $rawWa = $business['whatsapp'] ?? $custWa;
        $html = str_replace(
            ['6281234567890', '+62 812-3456-7890', '0812-3456-7890'],
            [$custWa, $rawWa, $rawWa],
            $html
        );

        $address = $this->businessAddress($business);
        if ($address !== '') {
            $html = str_replace(
                [
                    'Jl. Agro Industri No. 42, Bogor, Jawa Barat',
                    'Jl. Agro Industri No. 42, Bogor, Jawa Barat 16115',
                ],
                $address,
                $html
            );
        }

        if (! empty($business['email'])) {
            $email = $business['email'];
            $html = str_replace(
                [
                    'halo@agriternak.id',
                    'hendra@perusahaan.co.id',
                ],
                $email,
                $html
            );
        }

        // Remap preview links to published site routes
        $siteBase = url('/s/'.$order->site_slug);
        $pairs = [
            '/webia/template/agriternak-organic-ethical-precision' => $siteBase,
            '/webia/template/agriternak-futuristic-iot' => $siteBase,
            '/webia/template/agriternak-bold-livestock' => $siteBase,
            '/webia/template/agriculture-peralatanpertanian-corporate-sagegreen-putri' => $siteBase,
            '/webia/template/agriculture-peralatanpertanian-creative-matchalatte-putri' => $siteBase,
            '/webia/template/agriculture-peralatanpertanian-playfulcolorful-arcticfrost-putri' => $siteBase,
        ];
        uksort($pairs, fn ($a, $b) => strlen($b) <=> strlen($a));
        foreach ($pairs as $from => $to) {
            $html = str_replace(url($from), $to, $html);
            $html = str_replace($from, $to, $html);
        }

        return $html;
    }

    private const EDUCATION_CULTURE_VIEWS = [
        'verdant-archive-museum-collection' => ['home' => 'website-bisnis.templates.education-culture.verdant-archive-museum-collection'],
    ];

    private function handleEducationCulture(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $slug = Str::after($siteConfigPath, 'education-culture/');
        abort_unless(isset(self::EDUCATION_CULTURE_VIEWS[$slug]), 404);
        abort_unless(isset(self::EDUCATION_CULTURE_VIEWS[$slug][$pageKey]), 404);

        $viewName = self::EDUCATION_CULTURE_VIEWS[$slug][$pageKey];
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

        $renderedHtml = $this->transformEducationCultureHtml($renderedHtml, $business, $whatsapp);

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function transformEducationCultureHtml(string $html, array $business, string $whatsapp): string
    {
        $bizName = $business['business_name'] ?? '';
        if ($bizName !== '') {
            $brandMap = [
                'Verdant Archive &amp; Artifact Database' => $bizName,
                'VERDANT ARCHIVE' => strtoupper($bizName),
                'Verdant Archive' => $bizName,
            ];
            uksort($brandMap, fn ($a, $b) => strlen($b) <=> strlen($a));
            $html = str_replace(array_keys($brandMap), array_values($brandMap), $html);

            $html = str_replace('Halo%20Verdant%20Archive', 'Halo%20'.rawurlencode($bizName), $html);
        }

        $custWa = $whatsapp ?: '6281234567890';
        $html = str_replace('6281234567890', $custWa, $html);

        $address = $this->businessAddress($business);
        if ($address !== '') {
            $html = str_replace('Gedung Dokumentasi Budaya Lt. 3, Pusat Arsip', $address, $html);
        }

        if (! empty($business['email'])) {
            $html = str_replace('arsip@verdant-heritage.org', $business['email'], $html);
        }

        return $html;
    }

    private const SPECIALTY_BEVERAGE_VIEWS = [
        'kebun-seduh-botanical-elegant' => ['home' => 'website-bisnis.templates.specialty-beverage.kebun-seduh-botanical-elegant'],
        'koharu-matcha-japanese-minimalist' => ['home' => 'website-bisnis.templates.specialty-beverage.koharu-matcha-japanese-minimalist'],
    ];

    private function handleSpecialtyBeverage(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $slug = Str::after($siteConfigPath, 'specialty-beverage/');
        abort_unless(isset(self::SPECIALTY_BEVERAGE_VIEWS[$slug]), 404);
        abort_unless(isset(self::SPECIALTY_BEVERAGE_VIEWS[$slug][$pageKey]), 404);

        $viewName = self::SPECIALTY_BEVERAGE_VIEWS[$slug][$pageKey];
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

        $renderedHtml = $this->transformSpecialtyBeverageHtml($renderedHtml, $business, $whatsapp);

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function transformSpecialtyBeverageHtml(string $html, array $business, string $whatsapp): string
    {
        $bizName = $business['business_name'] ?? '';
        if ($bizName !== '') {
            $html = str_replace(
                ['Kebun Seduh', 'Koharu Matcha', 'KOHARU MATCHA', 'KOHARU', 'Koharu'],
                [$bizName, $bizName, strtoupper($bizName), strtoupper($bizName), $bizName],
                $html
            );
        }

        $custWa = $whatsapp ?: '6281234567890';
        $html = str_replace('6281234567890', $custWa, $html);

        return $html;
    }

    private const RETAIL_BOUTIQUE_VIEWS = [
        'aurora-petit-yellow-sunshine' => ['home' => 'website-bisnis.templates.retail.baby-kids-products.aurora-petit-yellow-sunshine'],
        'petit-wonder-candy-cloud' => ['home' => 'website-bisnis.templates.retail.baby-kids-products.petit-wonder-candy-cloud'],
        'pebble-sprouts-baby-kids' => ['home' => 'website-bisnis.templates.retail.baby-kids-products.pebble-sprouts.pebble-sprouts'],
        'vibesnatch-fashion-store' => ['home' => 'website-bisnis.templates.retail.fashion-clothing-store.vibesnatch.vibesnatch'],
    ];

    private function handleRetailBoutique(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $slug = Str::after($siteConfigPath, 'retail-boutique/');
        abort_unless(isset(self::RETAIL_BOUTIQUE_VIEWS[$slug]), 404);
        abort_unless(isset(self::RETAIL_BOUTIQUE_VIEWS[$slug][$pageKey]), 404);

        $viewName = self::RETAIL_BOUTIQUE_VIEWS[$slug][$pageKey];
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

        $renderedHtml = $this->transformRetailBoutiqueHtml($renderedHtml, $business, $whatsapp);

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function transformRetailBoutiqueHtml(string $html, array $business, string $whatsapp): string
    {
        $bizName = $business['business_name'] ?? '';
        $custWa = $whatsapp ?: '6281234567890';

        if ($bizName !== '') {
            $encodedName = rawurlencode($bizName);
            $html = str_replace(
                ['Halo%20Aurora%20Petit', 'Halo%20Admin%20Petit%20Wonder', 'Hi%20VIBESNATCH'],
                ['Halo%20'.$encodedName, 'Halo%20Admin%20'.$encodedName, 'Hi%20'.$encodedName],
                $html
            );

            $brandMap = [
                'AURORA &amp; PETIT' => strtoupper($bizName),
                'Aurora &amp; Petit' => $bizName,
                'AURORA & PETIT' => strtoupper($bizName),
                'PETIT WONDER' => strtoupper($bizName),
                'Petit Wonder' => $bizName,
                'Pebble &amp; Sprouts' => $bizName,
                'Pebble & Sprouts' => $bizName,
                'Pebble Sprouts' => $bizName,
                'VIBESNATCH' => strtoupper($bizName),
            ];
            uksort($brandMap, fn ($a, $b) => strlen($b) <=> strlen($a));
            $html = str_replace(array_keys($brandMap), array_values($brandMap), $html);
        }

        $rawWa = $business['whatsapp'] ?? $custWa;
        $html = str_replace(
            ['6281234567890', '+62 812-3456-7890', '628123456789'],
            [$custWa, $rawWa, $custWa],
            $html
        );

        $address = $this->businessAddress($business);
        if ($address !== '') {
            $html = str_replace(
                [
                    'Pondok Indah Mall 3 (PIM 3), Lantai 2 Unit 208, Jakarta Selatan',
                    'Tunjungan Plaza 6, Lantai 4, Surabaya Pusat',
                    'Jl. Kemang Timur No. 42B, Jakarta Selatan',
                    'Pakuwon Mall Level 2, Unit 88, Surabaya',
                    'Jl. Kemang Raya No. 45B, Jakarta Selatan',
                    'PIK Avenue Mall L2 #204, Jakarta Utara',
                    'Jl. Raya Darmo No. 88, Surabaya Barat',
                ],
                $address,
                $html
            );
        }

        if (! empty($business['email'])) {
            $html = str_replace('hello@pebblesprouts.co.id', $business['email'], $html);
        }

        return $html;
    }

    private const PERSONAL_BRAND_VIEWS = [
        'aria-thorne-author-writer' => ['home' => 'website-bisnis.templates.personal-brand.author-writer.aria-thorne.aria-thorne'],
        'arya-sanjaya-plum-velvet' => ['home' => 'website-bisnis.templates.personal-brand.author-writer.arya-sanjaya-plum-velvet'],
        'arya-sanjaya-ruby-editorial' => ['home' => 'website-bisnis.templates.personal-brand.author-writer.arya-sanjaya-ruby-editorial'],
    ];

    private function handlePersonalBrand(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $slug = Str::after($siteConfigPath, 'personal-brand/');
        abort_unless(isset(self::PERSONAL_BRAND_VIEWS[$slug]), 404);
        abort_unless(isset(self::PERSONAL_BRAND_VIEWS[$slug][$pageKey]), 404);

        $viewName = self::PERSONAL_BRAND_VIEWS[$slug][$pageKey];
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

        $renderedHtml = $this->transformPersonalBrandHtml($renderedHtml, $business, $whatsapp);

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function transformPersonalBrandHtml(string $html, array $business, string $whatsapp): string
    {
        $bizName = $business['business_name'] ?? '';
        if ($bizName !== '') {
            $html = str_replace(['Arya Sanjaya', 'Aria Thorne'], $bizName, $html);
            $html = preg_replace_callback('/\b(?:Aria|Thorne)\b/', fn () => $bizName, $html) ?? $html;
            $html = str_replace(
                ['Halo%20Tim%20Aria%20Thorne'],
                ['Halo%20Tim%20'.rawurlencode($bizName)],
                $html
            );
        }

        $custWa = $whatsapp ?: '6281234567890';
        $html = str_replace(
            ['6281234567890', '628123456789'],
            [$custWa, $custWa],
            $html
        );

        return $html;
    }

    private const COMPANY_CONTRACTOR_VIEWS = [
        'bangun-karsa-contractor-professional' => ['home' => 'website-bisnis.templates.company.bangun-karsa-contractor-professional'],
        'langit-karya-contractor-minimalist' => ['home' => 'website-bisnis.templates.company.langit-karya-contractor-minimalist'],
    ];

    private function handleCompanyContractor(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $slug = Str::after($siteConfigPath, 'company-contractor/');
        abort_unless(isset(self::COMPANY_CONTRACTOR_VIEWS[$slug]), 404);
        abort_unless(isset(self::COMPANY_CONTRACTOR_VIEWS[$slug][$pageKey]), 404);

        $viewName = self::COMPANY_CONTRACTOR_VIEWS[$slug][$pageKey];
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

        $renderedHtml = $this->transformCompanyContractorHtml($renderedHtml, $business, $whatsapp);

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function transformCompanyContractorHtml(string $html, array $business, string $whatsapp): string
    {
        $bizName = $business['business_name'] ?? '';
        if ($bizName !== '') {
            $brandMap = [
                'Bangun Karsa' => $bizName,
                'Langit Karya' => $bizName,
            ];
            $html = str_replace(array_keys($brandMap), array_values($brandMap), $html);
        }

        $custWa = $whatsapp ?: '6281234567890';
        $html = str_replace('6281234567890', $custWa, $html);

        return $html;
    }

    private const PROPERTY_STANDALONE_VIEWS = [
        'denim-horizon-property-minimalist' => ['home' => 'website-bisnis.templates.property.property-minimalist'],
        'pusaka-asri-property-traditional' => ['home' => 'website-bisnis.templates.property.property-traditional'],
    ];

    private function handlePropertyStandalone(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $slug = Str::after($siteConfigPath, 'property-standalone/');
        abort_unless(isset(self::PROPERTY_STANDALONE_VIEWS[$slug]), 404);
        abort_unless(isset(self::PROPERTY_STANDALONE_VIEWS[$slug][$pageKey]), 404);

        $viewName = self::PROPERTY_STANDALONE_VIEWS[$slug][$pageKey];
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

        $renderedHtml = $this->transformPropertyStandaloneHtml($renderedHtml, $business, $whatsapp);

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function transformPropertyStandaloneHtml(string $html, array $business, string $whatsapp): string
    {
        $bizName = $business['business_name'] ?? '';
        $custWa = $whatsapp ?: '6281234567890';

        if ($bizName !== '') {
            $encodedName = rawurlencode($bizName);
            $html = str_replace(
                ['Denim%20Horizon', 'Pusaka%20Asri'],
                [$encodedName, $encodedName],
                $html
            );

            $brandMap = [
                'Denim Horizon' => $bizName,
                'Pusaka Asri' => $bizName,
            ];
            $html = str_replace(array_keys($brandMap), array_values($brandMap), $html);
        }

        $rawWa = $business['whatsapp'] ?? $custWa;
        $html = str_replace(
            ['6281277004674', '6281198708889'],
            [$custWa, $custWa],
            $html
        );

        $address = $this->businessAddress($business);
        if ($address !== '') {
            $html = str_replace(
                [
                    'Jl. Pusaka Raya No. 8, Cilandak Hills',
                    'Jl. Pusaka Raya No. 8, Cilandak Hills, Pasar Minggu, Jakarta Selatan, DKI Jakarta 12560',
                ],
                $address,
                $html
            );
        }

        if (! empty($business['email'])) {
            $html = str_replace(
                ['gallery@denimhorizon.id', 'concierge@pusakaasri.co.id'],
                $business['email'],
                $html
            );
        }

        return $html;
    }

    private const WEDDING_STANDALONE_VIEWS = [
        'wedding-organizer-elegant' => ['home' => 'website-bisnis.templates.wedding-event.wedding-organizer.wedding-organizer-elegant'],
        'solenne-sunshine' => ['home' => 'website-bisnis.templates.wedding-event.Catering-Wedding-Cake.solenne-sunshine.solenne-sunshine'],
    ];

    private function handleWeddingStandalone(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $slug = Str::after(Str::after($siteConfigPath, 'wedding-standalone/'), 'wedding-event/');
        abort_unless(isset(self::WEDDING_STANDALONE_VIEWS[$slug]), 404);
        abort_unless(isset(self::WEDDING_STANDALONE_VIEWS[$slug][$pageKey]), 404);

        $viewName = self::WEDDING_STANDALONE_VIEWS[$slug][$pageKey];
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

        $renderedHtml = $this->transformWeddingStandaloneHtml($renderedHtml, $business, $whatsapp);

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function transformWeddingStandaloneHtml(string $html, array $business, string $whatsapp): string
    {
        $bizName = $business['business_name'] ?? '';
        $custWa = $whatsapp ?: '6285850180285';

        if ($bizName !== '') {
            $html = str_replace('Halo%20Aura%20Amour%20Wedding', 'Halo%20'.rawurlencode($bizName), $html);
            $html = str_replace('Aura Amour', $bizName, $html);
            $html = str_replace(
                ['Solenne & Sugar', 'Solenne <i>&amp;</i> Sugar', 'Solenne &amp; Sugar', 'The Solenne Table', 'Solenne'],
                [$bizName, '<em>'.e($bizName).'</em>', e($bizName), 'The '.e($bizName).' Table', $bizName],
                $html
            );
        }

        $html = str_replace(['6285850180285', '6281234567890'], $custWa, $html);

        return $html;
    }

    private const TRAVEL_BAITUL_VIEWS = [
        'baitul-safar-umrah-haji' => ['home' => 'website-bisnis.templates.travel-tourism.umrah-haji.baitul-safar.baitul-safar'],
    ];

    private function handleTravelBaitul(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $slug = Str::after($siteConfigPath, 'travel-baitul/');
        abort_unless(isset(self::TRAVEL_BAITUL_VIEWS[$slug]), 404);
        abort_unless(isset(self::TRAVEL_BAITUL_VIEWS[$slug][$pageKey]), 404);

        $viewName = self::TRAVEL_BAITUL_VIEWS[$slug][$pageKey];
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

        $renderedHtml = $this->transformTravelBaitulHtml($renderedHtml, $business, $whatsapp);

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function transformTravelBaitulHtml(string $html, array $business, string $whatsapp): string
    {
        $bizName = $business['business_name'] ?? '';
        if ($bizName !== '') {
            $html = str_replace('Baitul Safar', $bizName, $html);
        }

        $custWa = $whatsapp ?: '6281234567890';
        $html = str_replace('6281234567890', $custWa, $html);

        return $html;
    }

    private const HEALTHCARE_STANDALONE_VIEWS = [
        'healthcare-dental-azure' => ['home' => 'website-bisnis.templates.healthcare.dental.azure-smile-clinic'],
        'healthcare-dental-mint' => ['home' => 'website-bisnis.templates.healthcare.dental.mint-dental-house'],
        'healthcare-dental-sunset' => ['home' => 'website-bisnis.templates.healthcare.dental.sunset-dental-care'],
        'mitra-jiwa-psikologi-konseling' => ['home' => 'website-bisnis.templates.healthcare.psychology.mitra-jiwa'],
        'ruang-tenang-psikologi-konseling' => ['home' => 'website-bisnis.template.healthcare.psychology.ruang-tenang.index'],
        'aurelia-mind-psikologi-konseling' => ['home' => 'website-bisnis.templates.healthcare.psychology.aurelia-mind'],
    ];

    private function handleHealthcareStandalone(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $slug = Str::after($siteConfigPath, 'healthcare-standalone/');
        abort_unless(isset(self::HEALTHCARE_STANDALONE_VIEWS[$slug]), 404);
        abort_unless(isset(self::HEALTHCARE_STANDALONE_VIEWS[$slug][$pageKey]), 404);

        $viewName = self::HEALTHCARE_STANDALONE_VIEWS[$slug][$pageKey];
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

        $renderedHtml = $this->transformHealthcareStandaloneHtml($renderedHtml, $business, $whatsapp);

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function transformHealthcareStandaloneHtml(string $html, array $business, string $whatsapp): string
    {
        $bizName = $business['business_name'] ?? '';
        $custWa = $whatsapp ?: '6281234567890';

        if ($bizName !== '') {
            $brandMap = [
                'Azure Smile Clinic' => $bizName,
                'Mint Dental House' => $bizName,
                'GlowDental Studio & Orthodontics' => $bizName,
                'GlowDental Studio' => $bizName,
                'GlowDental' => $bizName,
                'Mitra Jiwa' => $bizName,
                'Ruang Tenang' => $bizName,
                'Aurelia Mind — Psikologi & Konseling Eksklusif' => $bizName.' — Psikologi & Konseling Eksklusif',
                'Aurelia Mind' => $bizName,
                'Concierge Aurelia' => 'Concierge '.$bizName,
            ];
            uksort($brandMap, fn ($a, $b) => strlen($b) <=> strlen($a));
            $html = str_replace(array_keys($brandMap), array_values($brandMap), $html);
        }

        // Fill empty WhatsApp links (azure/mint/sunset) with customer number
        $html = preg_replace('/wa\.me\/(?![0-9])/', 'wa.me/'.$custWa, $html) ?? $html;

        $rawWa = $business['whatsapp'] ?? $custWa;
        $html = str_replace(
            ['6281234567890', '+62 812-3456-7890'],
            [$custWa, $rawWa],
            $html
        );

        $address = $this->businessAddress($business);
        if ($address !== '') {
            $html = str_replace('Jl. Senopati No. 88, Kebayoran Baru, Jakarta Selatan (Samping Parkir Barat)', $address, $html);
        }

        if (! empty($business['email'])) {
            $html = str_replace(
                ['halo@mitrajiwa.id', 'halo@ruangtenang.id', 'halo@aureliamind.id'],
                $business['email'],
                $html
            );
        }

        return $html;
    }

    private const TRAVEL_STANDALONE_VIEWS = [
        'wildtrail-adventure-outdoor' => ['home' => 'website-bisnis.templates.travel-tourism.adventure-outdoor-tour.wildtrail.wildtrail'],
    ];

    private function handleTravelStandalone(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $slug = Str::after($siteConfigPath, 'travel-standalone/');
        abort_unless(isset(self::TRAVEL_STANDALONE_VIEWS[$slug]), 404);
        abort_unless(isset(self::TRAVEL_STANDALONE_VIEWS[$slug][$pageKey]), 404);

        $viewName = self::TRAVEL_STANDALONE_VIEWS[$slug][$pageKey];
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

        $renderedHtml = $this->transformTravelStandaloneHtml($renderedHtml, $business, $whatsapp, $slug, $order);

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function transformTravelStandaloneHtml(string $html, array $business, string $whatsapp, string $slug, WebiaOrder $order): string
    {
        $bizName = $business['business_name'] ?? '';
        if ($bizName !== '') {
            $brandMap = [
                'WILDTRAIL — Explore the Wild' => $bizName.' — Explore the Wild',
                'WILDTRAIL' => strtoupper($bizName),
                'Wildtrail' => $bizName,
            ];
            uksort($brandMap, fn ($a, $b) => strlen($b) <=> strlen($a));
            $html = str_replace(array_keys($brandMap), array_values($brandMap), $html);
        }

        $custWa = $whatsapp ?: '6281234567890';
        $rawWa = $business['whatsapp'] ?? $custWa;
        $html = str_replace(
            ['6281234567890', '0812-3456-7890', '+62 812-3456-7890'],
            [$custWa, $rawWa, $rawWa],
            $html
        );

        $address = $this->businessAddress($business);
        if ($address !== '') {
            $html = str_replace(
                ['Surabaya, Jawa Timur', 'Surabaya'],
                $address,
                $html
            );
        }

        if (! empty($business['email'])) {
            $html = str_replace('halo@wildtrail.id', $business['email'], $html);
        }

        $shim = '<script>(function(){
            window.WEBIA_WA_ADMIN = '.json_encode($custWa).';
            const o = window.open;
            if (o) {
                window.open = function(u,t,f){
                    if(typeof u==="string"){u=u.replace(/6281234567890/g, '.json_encode($custWa).');}
                    return o.call(window,u,t,f);
                };
            }
            document.addEventListener("DOMContentLoaded", function(){
                const wa = document.querySelector(".fab .wa");
                if (wa) wa.href = "https://wa.me/" + '.json_encode($custWa).';
            });
            document.addEventListener("click", function(e){
                const a = e.target.closest && e.target.closest("a[href*=\'wa.me\']");
                if (a && typeof a.href === "string") {
                    a.href = a.href.replace(/6281234567890/g, '.json_encode($custWa).');
                }
            }, true);
        })();</script>';
        $html = str_replace('</body>', $shim.'</body>', $html);

        return $html;
    }

    private const WEDDING_MULTI_VIEWS = [
        'catering-wedding-cake-minimalist-ruby-luxe' => ['home' => 'website-bisnis.templates.wedding-event.catering-wedding-cake.ruby-luxe.catering-wedding-cake-ruby-luxe', 'katalog' => 'website-bisnis.templates.wedding-event.catering-wedding-cake.ruby-luxe.catering-katalog-ruby-luxe', 'detail' => 'website-bisnis.templates.wedding-event.catering-wedding-cake.ruby-luxe.catering-detail-ruby-luxe'],
        'event-organizer-modern-burgundy-wine' => ['home' => 'website-bisnis.templates.wedding-event.event-organizer.burgundy-wine.event-organizer-modern-burgundy-wine', 'katalog' => 'website-bisnis.templates.wedding-event.event-organizer.burgundy-wine.event-organizer-katalog-burgundy-wine', 'detail' => 'website-bisnis.templates.wedding-event.event-organizer.burgundy-wine.event-organizer-detail-burgundy-wine'],
    ];

    private function handleWeddingMulti(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $slug = Str::after($siteConfigPath, 'wedding-multi/');
        abort_unless(isset(self::WEDDING_MULTI_VIEWS[$slug]), 404);

        $baseKey = in_array($pageKey, ['home', 'katalog', 'detail'], true) ? $pageKey : $pageKey;
        abort_unless(isset(self::WEDDING_MULTI_VIEWS[$slug][$baseKey]), 404);

        $viewName = self::WEDDING_MULTI_VIEWS[$slug][$baseKey];
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

        $renderedHtml = $this->transformWeddingMultiHtml($renderedHtml, $business, $whatsapp);

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function transformWeddingMultiHtml(string $html, array $business, string $whatsapp): string
    {
        $bizName = $business['business_name'] ?? '';
        if ($bizName !== '') {
            $html = str_replace(['Ruby Luxe', 'Burgundy Moments'], $bizName, $html);
        }

        $custWa = $whatsapp ?: '6285850180285';
        $html = str_replace('6285850180285', $custWa, $html);

        return $html;
    }


    private const TRADITIONAL_COSTUME_RENTAL_VIEWS = [
        'kencana-wastra' => 'website-bisnis.templates.traditional-textiles-heritage-fashion.traditional-costume-rental.kencana-wastra.kencana-wastra',
    ];

    private function handleTraditionalCostumeRental(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $slug = Str::after($siteConfigPath, 'traditional-costume-rental/');
        abort_unless(isset(self::TRADITIONAL_COSTUME_RENTAL_VIEWS[$slug]), 404);
        abort_unless($pageKey === 'home', 404);

        $viewName = self::TRADITIONAL_COSTUME_RENTAL_VIEWS[$slug];
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

        $bizName = $business['business_name'] ?? '';
        $custWa = $whatsapp ?: '6281234567890';

        if ($bizName !== '') {
            $renderedHtml = str_replace(
                ['Kencana Wastra', 'KENCANA WASTRA', 'Kencana%20Wastra'],
                [$bizName, strtoupper($bizName), rawurlencode($bizName)],
                $renderedHtml
            );
        }

        $renderedHtml = str_replace('6281234567890', $custWa, $renderedHtml);

        $address = $this->businessAddress($business);
        if ($address !== '') {
            $renderedHtml = str_replace(
                'Jl. Gunawarman Heritage No. 45, Jakarta Selatan',
                $address,
                $renderedHtml
            );
        }

        if (! empty($business['email'])) {
            $renderedHtml = str_replace('info@kencanawastra.id', $business['email'], $renderedHtml);
        }

        $siteBase = url('/s/'.$order->site_slug);
        $previewBase = url('/webia/template/kencana-wastra-traditional-costume-rental');
        $renderedHtml = str_replace($previewBase, $siteBase, $renderedHtml);

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function handleLibrariesDigitalArchives(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $business = $order->business_data ?? [];
        $whatsapp = $this->whatsappNumber($business['whatsapp'] ?? '');
        $instagram = ltrim($business['instagram'] ?? '', '@');
        $custWa = $whatsapp ?: '6281234567890';
        $siteBase = url('/s/'.$order->site_slug);

        if (str_contains($siteConfigPath, 'historical-document-archive')) {
            $cfgKey = 'template.libraries-digital-archives.vintage-editorial.historical-document-archive-burgundy-classic.historical-document-archive';
            $rel = 'libraries-digital-archives/vintage-editorial/historical-document-archive-burgundy-classic';
            $viewBase = 'website-bisnis.template.libraries-digital-archives.vintage-editorial.historical-document-archive-burgundy-classic.';

            $hda = config($cfgKey);
            abort_unless(is_array($hda), 404);

            if (! empty($business['business_name'])) {
                $hda['site']['name'] = $business['business_name'];
                $hda['site']['institution'] = $business['business_name'];
            }
            if ($whatsapp !== '') {
                $hda['site']['whatsapp']['number'] = $whatsapp;
            }
            if (! empty($business['email'])) {
                $hda['site']['email'] = $business['email'];
            }
            if (! empty($business['address'])) {
                $hda['site']['address'] = $business['address'];
            }

            $routes = $hda['routes'] ?? [];
            $matchedDef = null;
            $slug = null;
            $cleanPage = ($pageKey === 'home') ? '' : $pageKey;

            foreach ($routes as $def) {
                $uri = trim($def['uri'], '/');
                if ($uri === $cleanPage) {
                    $matchedDef = $def;
                    break;
                }
                if (str_contains($uri, '{slug}')) {
                    $pattern = str_replace('{slug}', '*', $uri);
                    if (Str::is($pattern, $cleanPage)) {
                        $matchedDef = $def;
                        $slug = Str::afterLast($cleanPage, '/');
                        break;
                    }
                }
            }

            abort_unless($matchedDef !== null, 404);

            $find = fn (string $list, string $s) => collect($hda[$list] ?? [])->firstWhere('slug', $s);
            $routeUriMap = [];
            foreach ($routes as $def) {
                $routeUriMap[$def['name']] = $def['uri'];
            }
            $hu = function (string $name, ?string $s = null) use ($routeUriMap, $siteBase) {
                if ($s === null && str_contains($name, ':')) {
                    [$name, $s] = explode(':', $name, 2);
                }
                $uri = $routeUriMap[$name] ?? $name;
                if ($s !== null) {
                    $uri = str_replace('{slug}', $s, $uri);
                }
                $cleanUri = trim($uri, '/');

                return $cleanUri === '' ? $siteBase : $siteBase.'/'.$cleanUri;
            };
            $ha = fn (string $path) => asset('images/website-bisnis/template/'.$rel.'/'.$path);
            $hr = fn (string $list, array $slugs) => collect($slugs)->map(fn ($s) => $find($list, $s))->filter()->values()->all();
            $hw = fn (string $list, string $key, string $val) => collect($hda[$list] ?? [])->where($key, $val)->values()->all();

            $item = null;
            if (! empty($matchedDef['source'])) {
                $item = $find($matchedDef['source'], (string) $slug);
                abort_unless($item, 404);
            }

            $page = $hda['pages'][$matchedDef['page']] ?? [];
            if ($item) {
                $page['title'] = $item['title'];
                $page['lead'] = $item['desc'] ?? ($item['short'] ?? '');
            }

            $idx = [];
            foreach ($hda['documents'] ?? [] as $d) {
                $idx[] = [
                    'id' => 'doc:'.$d['slug'],
                    'type' => $d['type'],
                    'title' => $d['title'],
                    'sub' => $d['author'].' · '.$d['year'],
                    'year' => (int) (preg_match('/\d{3,4}/', (string) $d['year'], $m) ? $m[0] : 0),
                    'period' => $d['period'],
                    'category' => $find('categories', $d['category'])['title'] ?? '',
                    'location' => $find('locations', $d['location'])['title'] ?? '',
                    'url' => $hu('document', $d['slug']),
                    'image' => $ha($d['image']),
                ];
            }
            $more = [
                ['collections', 'col', 'Collection', 'collection'],
                ['stories', 'story', 'Story', 'story'],
                ['figures', 'fig', 'Figure', 'figure'],
                ['events', 'event', 'Event', 'event'],
                ['exhibitions', 'exh', 'Exhibition', 'exhibition'],
                ['news', 'news', 'News', 'news-item'],
            ];
            foreach ($more as [$list, $key, $label, $routeName]) {
                foreach ($hda[$list] ?? [] as $x) {
                    $idx[] = [
                        'id' => $key.':'.$x['slug'],
                        'type' => $label,
                        'title' => $x['title'],
                        'sub' => $x['author'] ?? ($x['date'] ?? ($x['dates'] ?? ($x['period'] ?? ''))),
                        'url' => $hu($routeName, $x['slug']),
                        'image' => $ha($x['image']),
                    ];
                }
            }

            $wa = $hda['site']['whatsapp'] ?? [];
            $hwa = 'https://wa.me/'.preg_replace('/\D+/', '', (string) ($wa['number'] ?? '')).'?text='.rawurlencode($wa['message'] ?? '');
            $flags = JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP;

            $probe = [$matchedDef['name'], $page['parent'] ?? ''];
            $navKey = null;
            foreach ($hda['nav'] ?? [] as $n) {
                $nRoutes = array_merge([$n['route'] ?? ''], array_column($n['children'] ?? [], 'route'));
                if (array_intersect($probe, $nRoutes)) {
                    $navKey = $n['label'];
                    break;
                }
            }

            $renderedHtml = view($viewBase.$matchedDef['view'], [
                'hda' => $hda,
                'hu' => $hu,
                'ha' => $ha,
                'hr' => $hr,
                'hf' => $find,
                'hw' => $hw,
                'hv' => $viewBase,
                'hcss' => asset('css/website-bisnis/template/'.$rel.'/historical-document-archive.css'),
                'hjs' => asset('js/website-bisnis/template/'.$rel.'/historical-document-archive.js'),
                'hwa' => $hwa,
                'hindex' => json_encode($idx, $flags),
                'hassistant' => json_encode($hda['assistant'] ?? [], $flags),
                'page' => $page,
                'item' => $item,
                'route' => $matchedDef['name'],
                'navKey' => $navKey,
                'slug' => $slug,
            ])->render();

            $bizName = $business['business_name'] ?? '';
            if ($bizName !== '') {
                $renderedHtml = str_replace(
                    ['Historical Document Archive', 'National Historical Archive'],
                    [$bizName, $bizName],
                    $renderedHtml
                );
            }

            $previewBase = url('/webia/template/libraries-digital-archives/vintage-editorial/historical-document-archive-burgundy-classic');
            $renderedHtml = str_replace($previewBase, $siteBase, $renderedHtml);

            $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

            return response($renderedHtml);
        }

        // Digital Library (Arctic Frost & Ocean Blue)
        $isArctic = str_contains($siteConfigPath, 'arctic-frost');
        $configKey = $isArctic
            ? 'template.libraries-digital-archives.academic-minimalist.digital-library-platform-arctic-frost.digital-library-platform'
            : 'template.libraries-digital-archives.modern.digital-library-platform-ocean-blue.digital-library';
        $viewBase = $isArctic
            ? 'website-bisnis.template.libraries-digital-archives.academic-minimalist.digital-library-platform-arctic-frost.'
            : 'website-bisnis.template.libraries-digital-archives.modern.digital-library-platform-ocean-blue.';
        $homeView = $isArctic ? $viewBase.'digital-library-platform' : $viewBase.'index';
        $pageView = $viewBase.'page';

        $validPages = ['home', 'katalog', 'kategori', 'detail-buku', 'baca', 'koleksi-pilihan', 'terbaru', 'terpopuler', 'akademik', 'keanggotaan', 'tentang-kami', 'knowledge-hub', 'artikel', 'faq', 'kontak', 'masuk', 'daftar', 'dashboard', 'pinjaman', 'riwayat', 'wishlist', 'profil'];
        abort_unless(in_array($pageKey, $validPages, true), 404);

        $siteConfig = config($configKey);
        if (is_array($siteConfig)) {
            if (! empty($business['business_name'])) {
                $siteConfig['name'] = $business['business_name'];
            }
            if ($whatsapp !== '') {
                $siteConfig['whatsapp'] = $whatsapp;
            }
            if (! empty($business['email'])) {
                $siteConfig['email'] = $business['email'];
            }
            if (! empty($business['address'])) {
                $siteConfig['address'] = $business['address'];
            }
            config([$configKey => $siteConfig]);
        }

        $viewName = $pageKey === 'home' ? $homeView : $pageView;
        $renderedHtml = view($viewName, [
            'page' => $pageKey,
            'order' => $order,
            'business' => $business,
            'whatsapp' => $whatsapp,
            'instagram' => $instagram,
        ])->render();

        $bizName = $business['business_name'] ?? '';
        if ($bizName !== '') {
            $renderedHtml = str_replace(['Digital Library', 'DigitalLibrary'], [$bizName, $bizName], $renderedHtml);
        }
        $renderedHtml = str_replace(['622112345678', '+62 21 1234 5678'], [$custWa, $custWa], $renderedHtml);

        if (! empty($business['email'])) {
            $renderedHtml = str_replace('info@digitallibrary.id', $business['email'], $renderedHtml);
        }

        $address = $this->businessAddress($business);
        if ($address !== '') {
            $renderedHtml = str_replace('Jl. Knowledge No. 123, Jakarta', $address, $renderedHtml);
        }

        $previewBase = $isArctic
            ? url('/webia/template/libraries-digital-archives/academic-minimalist/digital-library-platform-arctic-frost')
            : url('/webia/template/libraries-digital-archives/modern/digital-library-platform-ocean-blue');
        $renderedHtml = str_replace($previewBase, $siteBase, $renderedHtml);

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private const FOOD_SUBSCRIPTION_VIEWS = [
        'blushbowl-diet-meal' => ['home' => 'website-bisnis.templates.food-subscription.diet-meal.blushbowl.blushbowl'],
        'sodatable-family-meal-plan' => ['home' => 'website-bisnis.templates.food-subscription.weekly-family-meal-plan.sodatable.sodatable'],
    ];

    private function handleFoodSubscription(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $slug = Str::after($siteConfigPath, 'food-subscription/');
        abort_unless(isset(self::FOOD_SUBSCRIPTION_VIEWS[$slug]), 404);
        abort_unless(isset(self::FOOD_SUBSCRIPTION_VIEWS[$slug][$pageKey]), 404);

        $viewName = self::FOOD_SUBSCRIPTION_VIEWS[$slug][$pageKey];
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

        $renderedHtml = $this->transformFoodSubscriptionHtml($renderedHtml, $business, $whatsapp, $slug);
        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function transformFoodSubscriptionHtml(string $html, array $business, string $whatsapp, string $slug): string
    {
        $bizName = $business['business_name'] ?? '';
        $custWa = $whatsapp ?: '6281234567890';

        if ($slug === 'blushbowl-diet-meal') {
            if ($bizName !== '') {
                $html = str_replace(
                    ['BlushBowl Nutrition', 'BlushBowl', 'BLUSHBOWL'],
                    [$bizName, $bizName, strtoupper($bizName)],
                    $html
                );
            }
            $html = str_replace('6281234567890', $custWa, $html);

            $address = $this->businessAddress($business);
            if ($address !== '') {
                $html = str_replace('Jl. Senopati Nutrisi No. 28, Jakarta Selatan', $address, $html);
            }
            if (! empty($business['email'])) {
                $html = str_replace('halo@blushbowl.id', $business['email'], $html);
            }
        } elseif ($slug === 'sodatable-family-meal-plan') {
            if ($bizName !== '') {
                $html = str_replace(
                    ['SodaTable Family Kitchen', 'SodaTable', 'SODATABLE'],
                    [$bizName, $bizName, strtoupper($bizName)],
                    $html
                );
            }
            $html = str_replace('6281234567890', $custWa, $html);

            $address = $this->businessAddress($business);
            if ($address !== '') {
                $html = str_replace('Jl. Kemang Raya Keluarga No. 18, Jakarta Selatan 12730', $address, $html);
            }
            if (! empty($business['email'])) {
                $html = str_replace('halo@sodatable.id', $business['email'], $html);
            }
        }

        return $html;
    }

    private function handleStrikeBranding(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        abort_unless($pageKey === 'home', 404);

        $viewName = 'website-bisnis.templates.professional-service.branding-creative.strike.strike';
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

        $bizName = $business['business_name'] ?? '';
        $custWa = $whatsapp ?: '6281234567890';

        if ($bizName !== '') {
            $renderedHtml = str_replace(
                [
                    'STUDIO BOLD® / STRIKE®',
                    'STUDIO BOLD®',
                    'STUDIO BOLD',
                    'Studio Bold',
                    'STRIKE STUDIO',
                    'STRIKE®',
                    'STRIKE',
                ],
                [
                    $bizName,
                    $bizName,
                    strtoupper($bizName),
                    $bizName,
                    strtoupper($bizName),
                    strtoupper($bizName),
                    strtoupper($bizName),
                ],
                $renderedHtml
            );
        }

        $renderedHtml = str_replace('6281234567890', $custWa, $renderedHtml);

        if (! empty($business['email'])) {
            $renderedHtml = str_replace('HELLO@STUDIO-BOLD.COM', strtoupper($business['email']), $renderedHtml);
        }

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    /**
     * Endpoint API publik percakapan asisten AI live site klien
     * dilengkapi fitur proteksi kuota & Zero Lost Lead Fallback.
     */

}
