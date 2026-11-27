<?php

namespace App\Services\CustomerSite\Concerns;

use App\Models\WebiaOrder;
use App\Services\AiQuotaService;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

trait HandlesConfigCategorySites
{
    private function handlePhotographyConfig(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $configKey = 'template.'.str_replace('/', '.', $siteConfigPath);
        $business = $order->business_data ?? [];
        $whatsapp = $this->whatsappNumber($business['whatsapp'] ?? '');
        $instagram = ltrim($business['instagram'] ?? '', '@');

        $validPages = ['home', 'portofolio', 'video-ugc', 'paket', 'hak-guna', 'platform', 'kolaborasi', 'kampanye', 'testimoni', 'tanya-ai'];
        $page = in_array($pageKey, $validPages, true) ? $pageKey : 'home';
        abort_unless($pageKey === 'home' || in_array($pageKey, $validPages, true), 404);

        // Override demo config values with customer business data before rendering.
        $siteConfig = config($configKey);
        abort_unless(is_array($siteConfig), 404);
        if (is_array($siteConfig)) {
            if (! empty($business['business_name'])) {
                $siteConfig['brand'] = $business['business_name'];
            }
            if ($whatsapp !== '') {
                $siteConfig['whatsapp'] = $whatsapp;
            }
            if (! empty($business['email'])) {
                $siteConfig['email'] = $business['email'];
            }
            config([$configKey => $siteConfig]);
        }

        $viewName = 'website-bisnis.template.photography-creative-studio.bold.ugc-content-creator-studio-pink-voltage.ugc-content-creator-studio';
        $renderedHtml = view($viewName, [
            'page' => $page,
        ])->render();

        $bizName = $business['business_name'] ?? '';
        $custWa = $whatsapp ?: '62895630300345';

        if ($bizName !== '') {
            $html = str_replace('VOLT Studio', $bizName, $renderedHtml);
            $html = str_replace('VOLT', strtoupper($bizName), $html);
        } else {
            $html = $renderedHtml;
        }

        $rawWa = $business['whatsapp'] ?? $custWa;
        $html = str_replace('62895630300345', $custWa, $html);

        if (! empty($business['email'])) {
            $html = str_replace('hello@voltstudio.id', $business['email'], $html);
        }

        // Remap preview links to published site routes.
        $siteBase = url('/s/'.$order->site_slug);
        $previewBase = url('/webia/template/photography-creative-studio/bold/ugc-content-creator-studio-pink-voltage');
        $html = str_replace($previewBase, $siteBase, $html);

        $html = $this->attachAiChatWidget($html, $order, $business, $whatsapp);

        return response($html);
    }

    private const HOME_SERVICES_CONFIG_VIEWS = [
        'modern/laundry-baby-blue/laundry' => 'baby-blue',
        'minimalis/laundry-mint-fresh/laundry' => 'mint-fresh',
        'professional/laundry-classic-trust/laundry' => 'classic-trust',
    ];

    private function handleHomeServicesConfig(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $slug = Str::after($siteConfigPath, 'home-services/');
        $variant = self::HOME_SERVICES_CONFIG_VIEWS[$slug] ?? null;
        abort_unless($variant !== null, 404);

        $configKey = match ($variant) {
            'baby-blue' => 'template.home-services.modern.laundry-baby-blue.laundry',
            'mint-fresh' => 'template.home-services.minimalis.laundry-mint-fresh.laundry',
            'classic-trust' => 'template.home-services.professional.laundry-classic-trust.laundry',
        };

        $viewMap = match ($variant) {
            'baby-blue' => [
                'home' => 'website-bisnis.template.home-services.modern.laundry-baby-blue.index',
                'layanan' => 'website-bisnis.template.home-services.modern.laundry-baby-blue.layanan',
                'harga' => 'website-bisnis.template.home-services.modern.laundry-baby-blue.harga',
                'pilihan-layanan' => 'website-bisnis.template.home-services.modern.laundry-baby-blue.pilihan-layanan',
                'estimasi-waktu' => 'website-bisnis.template.home-services.modern.laundry-baby-blue.estimasi-waktu',
                'area-layanan' => 'website-bisnis.template.home-services.modern.laundry-baby-blue.area-layanan',
                'cara-order' => 'website-bisnis.template.home-services.modern.laundry-baby-blue.cara-order',
                'jam-operasional' => 'website-bisnis.template.home-services.modern.laundry-baby-blue.jam-operasional',
                'order-inquiry' => 'website-bisnis.template.home-services.modern.laundry-baby-blue.order-inquiry',
                'ai-chatbot' => 'website-bisnis.template.home-services.modern.laundry-baby-blue.ai-chatbot',
            ],
            'mint-fresh' => [
                'home' => 'website-bisnis.template.home-services.minimalis.laundry-mint-fresh.pages.home',
                'layanan' => 'website-bisnis.template.home-services.minimalis.laundry-mint-fresh.pages.layanan',
                'daftar-harga' => 'website-bisnis.template.home-services.minimalis.laundry-mint-fresh.pages.harga',
                'opsi-layanan' => 'website-bisnis.template.home-services.minimalis.laundry-mint-fresh.pages.opsi',
                'estimasi-waktu' => 'website-bisnis.template.home-services.minimalis.laundry-mint-fresh.pages.estimasi',
                'area-jemput-antar' => 'website-bisnis.template.home-services.minimalis.laundry-mint-fresh.pages.area',
                'cara-pemesanan' => 'website-bisnis.template.home-services.minimalis.laundry-mint-fresh.pages.cara',
                'jam-operasional' => 'website-bisnis.template.home-services.minimalis.laundry-mint-fresh.pages.jam',
                'order-inquiry' => 'website-bisnis.template.home-services.minimalis.laundry-mint-fresh.pages.inquiry',
            ],
            'classic-trust' => [
                'home' => 'website-bisnis.template.home-services.professional.laundry-classic-trust.index',
                'layanan-laundry' => 'website-bisnis.template.home-services.professional.laundry-classic-trust.services',
                'daftar-harga' => 'website-bisnis.template.home-services.professional.laundry-classic-trust.prices',
                'service-options' => 'website-bisnis.template.home-services.professional.laundry-classic-trust.options',
                'estimasi-waktu' => 'website-bisnis.template.home-services.professional.laundry-classic-trust.turnaround',
                'area-jemput-antar' => 'website-bisnis.template.home-services.professional.laundry-classic-trust.coverage',
                'cara-pemesanan' => 'website-bisnis.template.home-services.professional.laundry-classic-trust.instructions',
                'jam-operasional' => 'website-bisnis.template.home-services.professional.laundry-classic-trust.hours',
                'order-inquiry' => 'website-bisnis.template.home-services.professional.laundry-classic-trust.inquiry',
            ],
        };

        $page = $pageKey === 'home' ? 'home' : $pageKey;
        abort_unless(isset($viewMap[$page]), 404);
        $viewName = $viewMap[$page];

        $business = $order->business_data ?? [];
        $whatsapp = $this->whatsappNumber($business['whatsapp'] ?? '');
        $instagram = ltrim($business['instagram'] ?? '', '@');

        // Override demo config with customer business data.
        $siteConfig = config($configKey);
        if (is_array($siteConfig)) {
            if (isset($siteConfig['brand']['name']) && ! empty($business['business_name'])) {
                $siteConfig['brand']['name'] = $business['business_name'];
            }
            if (isset($siteConfig['contact']) && is_array($siteConfig['contact'])) {
                if ($whatsapp !== '') {
                    $siteConfig['contact']['whatsapp'] = $whatsapp;
                    $siteConfig['contact']['phone'] = $business['whatsapp'] ?? $siteConfig['contact']['phone'] ?? '';
                }
                if (! empty($business['email'])) {
                    $siteConfig['contact']['email'] = $business['email'];
                }
                if (! empty($business['address'])) {
                    $siteConfig['contact']['address'] = $business['address'];
                }
            }
            config([$configKey => $siteConfig]);
        }

        $renderedHtml = view($viewName, [
            'laundry' => $siteConfig ?? config($configKey),
            'order' => $order,
            'page' => $pageKey,
            'business' => $business,
            'whatsapp' => $whatsapp,
            'instagram' => $instagram,
        ])->render();

        // Transform any remaining demo brand/WA/email/address strings.
        $bizName = $business['business_name'] ?? '';
        $custWa = $whatsapp ?: '62895630300345';
        $demoBrands = match ($variant) {
            'baby-blue' => ['BlueLaundry'],
            'mint-fresh' => ['FreshWash'],
            'classic-trust' => ['FreshWash'],
        };
        if ($bizName !== '') {
            foreach ($demoBrands as $demo) {
                $renderedHtml = str_replace($demo, $bizName, $renderedHtml);
            }
        }
        $renderedHtml = str_replace('62895630300345', $custWa, $renderedHtml);

        if (! empty($business['email'])) {
            $demoEmails = match ($variant) {
                'baby-blue' => ['info@bluelaundry.id'],
                'mint-fresh' => ['hello@freshwash.id'],
                'classic-trust' => ['hello@freshwash.id'],
            };
            $renderedHtml = str_replace($demoEmails, $business['email'], $renderedHtml);
        }

        $address = $this->businessAddress($business);
        if ($address !== '') {
            $demoAddresses = match ($variant) {
                'baby-blue' => ['Jl. Melati No.12, Surabaya', 'Jl. Melati No.12, Surabaya'],
                'mint-fresh' => ['Jl. Melati No. 12, Surabaya'],
                'classic-trust' => ['Jl. Melati No. 12, Surabaya'],
            };
            $renderedHtml = str_replace($demoAddresses, $address, $renderedHtml);
        }

        // Remap preview links to published site routes.
        $siteBase = url('/s/'.$order->site_slug);
        $previewBases = match ($variant) {
            'baby-blue' => ['http://localhost:8000/webia/template/home-services/modern/laundry-baby-blue', url('/webia/template/home-services/modern/laundry-baby-blue')],
            'mint-fresh' => ['http://localhost:8000/webia/template/home-services/minimalis/laundry-mint-fresh', url('/webia/template/home-services/minimalis/laundry-mint-fresh')],
            'classic-trust' => ['http://localhost:8000/webia/template/home-services/professional/laundry-classic-trust', url('/webia/template/home-services/professional/laundry-classic-trust')],
        };
        foreach ($previewBases as $pb) {
            $renderedHtml = str_replace($pb, $siteBase, $renderedHtml);
        }

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function handleAgricultureConfig(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $variant = match (true) {
            str_starts_with($siteConfigPath, 'agriculture&farming/corporate/') => 'forest-moss',
            str_starts_with($siteConfigPath, 'agriculture&farming/organic/') => 'earth-tone',
            str_starts_with($siteConfigPath, 'agriculture&farming/professional/') => 'classic-trust',
            default => null,
        };
        abort_unless($variant !== null, 404);

        $configKey = match ($variant) {
            'forest-moss' => 'template.agriculture&farming.corporate.agribisnis-forest-moss.agribisnis',
            'earth-tone' => 'template.agriculture&farming.organic.agribisnis-earth-tone.agribisnis',
            'classic-trust' => 'template.agriculture&farming.professional.agribisnis-classic-trust.agribisnis',
        };

        $viewMap = match ($variant) {
            'forest-moss' => [
                'home' => 'website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.index',
                'katalog-komoditas' => 'website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.pages.katalog',
                'informasi-tanaman-panen' => 'website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.pages.panen',
                'spesifikasi-produk' => 'website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.pages.spesifikasi',
                'jumlah-pemesanan-minimal' => 'website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.pages.moq',
                'kapasitas-pasokan' => 'website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.pages.kapasitas',
                'jangkauan-distribusi' => 'website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.pages.distribusi',
                'sertifikasi' => 'website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.pages.sertifikasi',
                'inquiry-b2b' => 'website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.pages.inquiry',
                'permintaan-penawaran' => 'website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.pages.penawaran',
                'ai-assistant' => 'website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss.pages.chatbot',
            ],
            'earth-tone' => [
                'home' => 'website-bisnis.template.agriculture&farming.organic.agribisnis-earth-tone.index',
                'komoditas' => 'website-bisnis.template.agriculture&farming.organic.agribisnis-earth-tone.komoditas',
                'informasi-panen' => 'website-bisnis.template.agriculture&farming.organic.agribisnis-earth-tone.informasi-panen',
                'spesifikasi-produk' => 'website-bisnis.template.agriculture&farming.organic.agribisnis-earth-tone.spesifikasi-produk',
                'jumlah-pesanan-minimum' => 'website-bisnis.template.agriculture&farming.organic.agribisnis-earth-tone.jumlah-pesanan-minimum',
                'kapasitas-pasokan' => 'website-bisnis.template.agriculture&farming.organic.agribisnis-earth-tone.kapasitas-pasokan',
                'jangkauan-distribusi' => 'website-bisnis.template.agriculture&farming.organic.agribisnis-earth-tone.jangkauan-distribusi',
                'sertifikasi' => 'website-bisnis.template.agriculture&farming.organic.agribisnis-earth-tone.sertifikasi',
                'inquiry-b2b' => 'website-bisnis.template.agriculture&farming.organic.agribisnis-earth-tone.inquiry-b2b',
                'permintaan-penawaran' => 'website-bisnis.template.agriculture&farming.organic.agribisnis-earth-tone.permintaan-penawaran',
                'ai-chatbot' => 'website-bisnis.template.agriculture&farming.organic.agribisnis-earth-tone.ai-chatbot',
            ],
            'classic-trust' => [
                'home' => 'website-bisnis.template.agriculture&farming.professional.agribisnis-classic-trust.index',
                'komoditas' => 'website-bisnis.template.agriculture&farming.professional.agribisnis-classic-trust.komoditas',
                'informasi-panen' => 'website-bisnis.template.agriculture&farming.professional.agribisnis-classic-trust.panen',
                'spesifikasi-produk' => 'website-bisnis.template.agriculture&farming.professional.agribisnis-classic-trust.spesifikasi',
                'minimum-order' => 'website-bisnis.template.agriculture&farming.professional.agribisnis-classic-trust.minimum-order',
                'kapasitas-pasokan' => 'website-bisnis.template.agriculture&farming.professional.agribisnis-classic-trust.kapasitas',
                'jangkauan-distribusi' => 'website-bisnis.template.agriculture&farming.professional.agribisnis-classic-trust.distribusi',
                'sertifikasi' => 'website-bisnis.template.agriculture&farming.professional.agribisnis-classic-trust.sertifikasi',
                'b2b-inquiry' => 'website-bisnis.template.agriculture&farming.professional.agribisnis-classic-trust.b2b-inquiry',
                'quotation-request' => 'website-bisnis.template.agriculture&farming.professional.agribisnis-classic-trust.quotation-request',
                'ai-assistant' => 'website-bisnis.template.agriculture&farming.professional.agribisnis-classic-trust.ai-assistant',
            ],
        };

        $page = $pageKey === 'home' ? 'home' : $pageKey;
        abort_unless(isset($viewMap[$page]), 404);
        $viewName = $viewMap[$page];

        $business = $order->business_data ?? [];
        $whatsapp = $this->whatsappNumber($business['whatsapp'] ?? '');
        $instagram = ltrim($business['instagram'] ?? '', '@');

        // Override demo config with customer business data.
        $siteConfig = config($configKey);
        if (is_array($siteConfig)) {
            if ($variant === 'forest-moss') {
                if (isset($siteConfig['site']) && is_array($siteConfig['site'])) {
                    if (! empty($business['business_name'])) {
                        $siteConfig['site']['name'] = $business['business_name'];
                    }
                    if ($whatsapp !== '') {
                        $siteConfig['site']['whatsapp'] = $whatsapp;
                    }
                    if (! empty($business['email'])) {
                        $siteConfig['site']['email'] = $business['email'];
                    }
                    if (! empty($business['address'])) {
                        $siteConfig['site']['address'] = $business['address'];
                    }
                }
            } elseif ($variant === 'earth-tone') {
                if (isset($siteConfig['brand']) && is_array($siteConfig['brand'])) {
                    if (! empty($business['business_name'])) {
                        $siteConfig['brand']['name'] = $business['business_name'];
                    }
                }
                if (isset($siteConfig['contact']) && is_array($siteConfig['contact'])) {
                    if ($whatsapp !== '') {
                        $siteConfig['contact']['whatsapp'] = $whatsapp;
                    }
                    if (! empty($business['email'])) {
                        $siteConfig['contact']['email'] = $business['email'];
                    }
                    if (! empty($business['address'])) {
                        $siteConfig['contact']['address'] = $business['address'];
                    }
                }
            } elseif ($variant === 'classic-trust') {
                if (isset($siteConfig['meta']) && is_array($siteConfig['meta'])) {
                    if (! empty($business['business_name'])) {
                        $siteConfig['meta']['brand'] = $business['business_name'];
                    }
                    if (isset($siteConfig['meta']['whatsapp']) && is_array($siteConfig['meta']['whatsapp'])) {
                        if ($whatsapp !== '') {
                            $siteConfig['meta']['whatsapp']['number'] = $whatsapp;
                        }
                    }
                }
            }
            config([$configKey => $siteConfig]);
        }

        $viewData = ['order' => $order, 'page' => $pageKey, 'business' => $business, 'whatsapp' => $whatsapp, 'instagram' => $instagram];
        if ($variant === 'classic-trust') {
            $viewData['agro'] = $siteConfig ?? config($configKey);
            $viewData['v'] = 'website-bisnis.template.agriculture&farming.professional.agribisnis-classic-trust';
        } elseif ($variant === 'earth-tone') {
            $prefix = 'webia/template/agriculture-farming/organic/agribisnis-earth-tone';
            $previewBase = url($prefix);
            $viewData['u'] = [
                'home' => $previewBase,
                'komoditas' => url($prefix.'/komoditas'),
                'panen' => url($prefix.'/informasi-panen'),
                'spesifikasi' => url($prefix.'/spesifikasi-produk'),
                'moq' => url($prefix.'/jumlah-pesanan-minimum'),
                'kapasitas' => url($prefix.'/kapasitas-pasokan'),
                'distribusi' => url($prefix.'/jangkauan-distribusi'),
                'sertifikasi' => url($prefix.'/sertifikasi'),
                'b2b' => url($prefix.'/inquiry-b2b'),
                'penawaran' => url($prefix.'/permintaan-penawaran'),
                'chatbot' => url($prefix.'/ai-chatbot'),
                'whatsapp' => 'https://wa.me/'.($siteConfig['contact']['whatsapp'] ?? '62895630300345').'?text='.rawurlencode($siteConfig['contact']['whatsapp_text'] ?? 'Halo AgroHarvest, saya ingin bertanya tentang komoditas dan kemitraan.'),
                'whatsapp_karir' => 'https://wa.me/'.($siteConfig['contact']['whatsapp'] ?? '62895630300345').'?text='.rawurlencode('Halo AgroHarvest, saya tertarik dengan informasi karir.'),
            ];
            $viewData['data'] = $siteConfig ?? config($configKey);
            $viewData['v'] = 'website-bisnis.template.agriculture&farming.organic.agribisnis-earth-tone';
            $viewData['css'] = asset('css/website-bisnis/template/agriculture&farming/organic/agribisnis-earth-tone/agribisnis.css');
            $viewData['js'] = asset('js/website-bisnis/template/agriculture&farming/organic/agribisnis-earth-tone/agribisnis.js');
            $viewData['img'] = asset('images/website-bisnis/template/agriculture&farming/organic/agribisnis-earth-tone');
        } else {
            $viewData['cfg'] = $siteConfig ?? config($configKey);
        }

        $renderedHtml = view($viewName, $viewData)->render();

        // Transform remaining demo brand/WA/email/address strings.
        $bizName = $business['business_name'] ?? '';
        $custWa = $whatsapp ?: '62895630300345';
        $demoBrands = match ($variant) {
            'forest-moss' => ['Green Harvest', 'GREEN HARVEST'],
            'earth-tone' => ['AgroHarvest'],
            'classic-trust' => ['AgroTrade'],
        };
        if ($bizName !== '') {
            foreach ($demoBrands as $demo) {
                $renderedHtml = str_replace($demo, $bizName, $renderedHtml);
            }
        }
        $renderedHtml = str_replace('62895630300345', $custWa, $renderedHtml);

        if (! empty($business['email'])) {
            $demoEmails = match ($variant) {
                'forest-moss' => ['info@greenharvest.co.id'],
                'earth-tone' => ['sales@agroharvest.co.id'],
                'classic-trust' => [],
            };
            if (! empty($demoEmails)) {
                $renderedHtml = str_replace($demoEmails, $business['email'], $renderedHtml);
            }
        }

        $address = $this->businessAddress($business);
        if ($address !== '') {
            $demoAddresses = match ($variant) {
                'forest-moss' => ['Banyuwangi, Jawa Timur, Indonesia'],
                'earth-tone' => ['Jl. Pertanian No. 88, Surabaya, Indonesia'],
                'classic-trust' => [],
            };
            if (! empty($demoAddresses)) {
                $renderedHtml = str_replace($demoAddresses, $address, $renderedHtml);
            }
        }

        // Remap preview links to published site routes.
        $siteBase = url('/s/'.$order->site_slug);
        $previewBases = match ($variant) {
            'forest-moss' => [url('/webia/template/agriculture-farming/corporate/agribisnis-forest-moss')],
            'earth-tone' => [url('/webia/template/agriculture-farming/organic/agribisnis-earth-tone')],
            'classic-trust' => [url('/webia/template/agribisnis-classic-trust')],
        };
        foreach ($previewBases as $pb) {
            $renderedHtml = str_replace($pb, $siteBase, $renderedHtml);
        }

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function handleInteriorConfig(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $variant = match (true) {
            str_starts_with($siteConfigPath, 'interior&architecture/rustic/') => 'terracotta',
            str_starts_with($siteConfigPath, 'interior&architecture/premium-minimal/') => 'mocha',
            str_starts_with($siteConfigPath, 'interior&architecture/luxury/') => 'chocolate',
            default => null,
        };
        abort_unless($variant !== null, 404);

        $configKey = match ($variant) {
            'terracotta' => 'template.interior&architecture.rustic.furniture-terracotta.furniture',
            'mocha' => 'template.interior&architecture.premium-minimal.furniture-mocha-cream.furniture',
            'chocolate' => 'template.interior&architecture.luxury.furniture-chocolate-luxe.furniture',
        };

        $viewMap = match ($variant) {
            'terracotta' => [
                'home' => 'website-bisnis.template.interior&architecture.rustic.furniture-terracotta.index',
                'hero-banner' => 'website-bisnis.template.interior&architecture.rustic.furniture-terracotta.hero',
                'katalog' => 'website-bisnis.template.interior&architecture.rustic.furniture-terracotta.catalog',
                'custom-design' => 'website-bisnis.template.interior&architecture.rustic.furniture-terracotta.custom-design',
                'material-finishing' => 'website-bisnis.template.interior&architecture.rustic.furniture-terracotta.materials',
                'dimensi-produk' => 'website-bisnis.template.interior&architecture.rustic.furniture-terracotta.dimensions',
                'galeri-proyek' => 'website-bisnis.template.interior&architecture.rustic.furniture-terracotta.gallery',
                'custom-order' => 'website-bisnis.template.interior&architecture.rustic.furniture-terracotta.order-form',
                'lead-time-produksi' => 'website-bisnis.template.interior&architecture.rustic.furniture-terracotta.lead-time',
                'permintaan-penawaran' => 'website-bisnis.template.interior&architecture.rustic.furniture-terracotta.quotation',
                'ai-faq' => 'website-bisnis.template.interior&architecture.rustic.furniture-terracotta.ai-faq',
            ],
            'mocha' => [
                'home' => 'website-bisnis.template.interior&architecture.premium-minimal.furniture-mocha-cream.index',
                'hero-banner' => 'website-bisnis.template.interior&architecture.premium-minimal.furniture-mocha-cream.hero',
                'katalog' => 'website-bisnis.template.interior&architecture.premium-minimal.furniture-mocha-cream.katalog',
                'custom-design' => 'website-bisnis.template.interior&architecture.premium-minimal.furniture-mocha-cream.custom-design',
                'material-finishing' => 'website-bisnis.template.interior&architecture.premium-minimal.furniture-mocha-cream.material-finishing',
                'ukuran-produk' => 'website-bisnis.template.interior&architecture.premium-minimal.furniture-mocha-cream.ukuran-produk',
                'project-gallery' => 'website-bisnis.template.interior&architecture.premium-minimal.furniture-mocha-cream.project-gallery',
                'custom-order' => 'website-bisnis.template.interior&architecture.premium-minimal.furniture-mocha-cream.custom-order',
                'production-lead-time' => 'website-bisnis.template.interior&architecture.premium-minimal.furniture-mocha-cream.production-lead-time',
                'permintaan-penawaran' => 'website-bisnis.template.interior&architecture.premium-minimal.furniture-mocha-cream.permintaan-penawaran',
                'ai-chatbot' => 'website-bisnis.template.interior&architecture.premium-minimal.furniture-mocha-cream.ai-chatbot',
            ],
            'chocolate' => [
                'home' => 'website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.index',
                'hero' => 'website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.hero',
                'katalog' => 'website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.catalog',
                'custom-design' => 'website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.custom-design',
                'material-finishing' => 'website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.materials',
                'dimensi' => 'website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.dimensions',
                'galeri' => 'website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.gallery',
                'custom-order' => 'website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.order',
                'lead-time' => 'website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.lead-time',
                'penawaran' => 'website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.quotation',
                'ai-chat' => 'website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.ai-chat',
            ],
        };

        $page = $pageKey === 'home' ? 'home' : $pageKey;
        abort_unless(isset($viewMap[$page]), 404);
        $viewName = $viewMap[$page];

        $business = $order->business_data ?? [];
        $whatsapp = $this->whatsappNumber($business['whatsapp'] ?? '');
        $instagram = ltrim($business['instagram'] ?? '', '@');

        $siteConfig = config($configKey);
        if (is_array($siteConfig)) {
            if ($variant === 'terracotta') {
                if (isset($siteConfig['meta']) && is_array($siteConfig['meta'])) {
                    if (! empty($business['business_name'])) {
                        $siteConfig['meta']['name'] = $business['business_name'];
                    }
                }
                if (isset($siteConfig['contact']) && is_array($siteConfig['contact'])) {
                    if ($whatsapp !== '') {
                        $siteConfig['contact']['whatsapp'] = $whatsapp;
                    }
                    if (! empty($business['email'])) {
                        $siteConfig['contact']['email'] = $business['email'];
                    }
                    if (! empty($business['address'])) {
                        $siteConfig['contact']['address'] = $business['address'];
                    }
                }
            } elseif ($variant === 'mocha') {
                if (isset($siteConfig['brand']) && is_array($siteConfig['brand'])) {
                    if (! empty($business['business_name'])) {
                        $siteConfig['brand']['name'] = $business['business_name'];
                    }
                }
                if (isset($siteConfig['contact']) && is_array($siteConfig['contact'])) {
                    if ($whatsapp !== '') {
                        $siteConfig['contact']['whatsapp'] = $whatsapp;
                    }
                    if (! empty($business['email'])) {
                        $siteConfig['contact']['email'] = $business['email'];
                    }
                    if (! empty($business['address'])) {
                        $siteConfig['contact']['address'] = $business['address'];
                    }
                }
            } elseif ($variant === 'chocolate') {
                if (isset($siteConfig['brand']) && is_array($siteConfig['brand'])) {
                    if (! empty($business['business_name'])) {
                        $siteConfig['brand']['name'] = $business['business_name'];
                    }
                }
                if (isset($siteConfig['contact']) && is_array($siteConfig['contact'])) {
                    if ($whatsapp !== '') {
                        $siteConfig['contact']['whatsapp'] = $whatsapp;
                    }
                    if (! empty($business['email'])) {
                        $siteConfig['contact']['email'] = $business['email'];
                    }
                    if (! empty($business['address'])) {
                        $siteConfig['contact']['address'] = $business['address'];
                    }
                }
            }
            config([$configKey => $siteConfig]);
        }

        $viewData = [
            'order' => $order,
            'page' => $pageKey,
            'business' => $business,
            'whatsapp' => $whatsapp,
            'instagram' => $instagram,
        ];
        if ($variant === 'terracotta') {
            $viewData['furniture'] = $siteConfig ?? config($configKey);
        } elseif ($variant === 'mocha') {
            $viewData['mocha'] = $siteConfig ?? config($configKey);
        } elseif ($variant === 'chocolate') {
            $viewData['furniture'] = $siteConfig ?? config($configKey);
            $viewData['activePage'] = $pageKey === 'home' ? 'home' : $pageKey;
        }

        $renderedHtml = view($viewName, $viewData)->render();

        // Transform remaining demo brand/WA/email/address strings.
        $bizName = $business['business_name'] ?? '';
        $custWa = $whatsapp ?: '62895630300345';
        $demoBrands = match ($variant) {
            'terracotta' => ['RusticFurni', 'RUSTICFURNI'],
            'mocha' => ['WoodenLane'],
            'chocolate' => ['LuxeFurni'],
        };
        if ($bizName !== '') {
            foreach ($demoBrands as $demo) {
                $renderedHtml = str_replace($demo, $bizName, $renderedHtml);
            }
        }
        $renderedHtml = str_replace('62895630300345', $custWa, $renderedHtml);

        if (! empty($business['email'])) {
            $demoEmails = match ($variant) {
                'terracotta' => ['hello@rusticfurni.id'],
                'mocha' => ['info@woodenlane.id'],
                'chocolate' => ['hello@luxefurni.id'],
            };
            $renderedHtml = str_replace($demoEmails, $business['email'], $renderedHtml);
        }

        $address = $this->businessAddress($business);
        if ($address !== '') {
            $demoAddresses = match ($variant) {
                'terracotta' => ['Jl. Suka Maju No. 88, Bandung'],
                'mocha' => ['Jl. Melati No. 12, Jakarta Selatan'],
                'chocolate' => ['Jakarta, Indonesia'],
            };
            $renderedHtml = str_replace($demoAddresses, $address, $renderedHtml);
        }

        // Remap preview links to published site routes.
        $siteBase = url('/s/'.$order->site_slug);
        $previewBases = match ($variant) {
            'terracotta' => [url('/webia/template/interior-architecture/rustic/furniture-terracotta')],
            'mocha' => [url('/webia/template/interior-architecture/premium-minimal/furniture-mocha-cream')],
            'chocolate' => [url('/webia/template/interior-architecture/luxury/furniture-chocolate-luxe')],
        };
        foreach ($previewBases as $pb) {
            $renderedHtml = str_replace($pb, $siteBase, $renderedHtml);
        }

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function handleNonprofitConfig(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $variant = match (true) {
            str_starts_with($siteConfigPath, 'nonprofit&community/professional/') => 'foundation-classic',
            str_starts_with($siteConfigPath, 'nonprofit&community/creative/foundation-nature-green') => 'foundation-nature',
            str_starts_with($siteConfigPath, 'nonprofit&community/minimalis/') => 'foundation-warm',
            str_starts_with($siteConfigPath, 'nonprofit&community/bold/') => 'citrus-pop',
            str_starts_with($siteConfigPath, 'nonprofit&community/creative/social-organization-tropical-rush') => 'tropical-rush',
            default => null,
        };
        abort_unless($variant !== null, 404);

        $configKey = match ($variant) {
            'foundation-classic' => 'template.nonprofit&community.professional.foundation-classic-trust.foundation',
            'foundation-nature' => 'template.nonprofit&community.creative.foundation-nature-green.foundation',
            'foundation-warm' => 'template.nonprofit&community.minimalis.foundation-warm-neutral.foundation',
            'citrus-pop' => 'template.nonprofit&community.bold.social-organization-citrus-pop.social-organization',
            'tropical-rush' => null,
        };

        $business = $order->business_data ?? [];
        $whatsapp = $this->whatsappNumber($business['whatsapp'] ?? '');
        $instagram = ltrim($business['instagram'] ?? '', '@');
        $custWa = $whatsapp ?: '62895630300345';

        // Single-blade variants (citrus-pop, tropical-rush) use $page param.
        if (in_array($variant, ['citrus-pop', 'tropical-rush'], true)) {
            $viewName = match ($variant) {
                'citrus-pop' => 'website-bisnis.template.nonprofit&community.bold.social-organization-citrus-pop.social-organization',
                'tropical-rush' => 'website-bisnis.template.nonprofit&community.creative.social-organization-tropical-rush.social-organization',
            };
            $validPages = ['home', 'profil', 'program', 'galeri', 'dampak', 'event', 'gabung', 'mitra', 'kontak', 'faq-ai'];
            $page = in_array($pageKey, $validPages, true) ? $pageKey : 'home';
            abort_unless($pageKey === 'home' || in_array($pageKey, $validPages, true), 404);

            if ($configKey !== null) {
                $siteConfig = config($configKey);
                if (is_array($siteConfig)) {
                    if (isset($siteConfig['org']) && is_array($siteConfig['org'])) {
                        if (! empty($business['business_name'])) {
                            $siteConfig['org']['name'] = $business['business_name'];
                        }
                        if ($whatsapp !== '') {
                            $siteConfig['org']['wa'] = $whatsapp;
                        }
                        if (! empty($business['email'])) {
                            $siteConfig['org']['email'] = $business['email'];
                        }
                        if (! empty($business['address'])) {
                            $siteConfig['org']['addr'] = $business['address'];
                        }
                    }
                    config([$configKey => $siteConfig]);
                }
            }

            $viewData = ['page' => $page];
            if ($variant === 'citrus-pop') {
                $siteConfig = $configKey !== null ? (config($configKey) ?? []) : [];
                $viewData['d'] = $siteConfig;
                $viewData['v'] = 'website-bisnis.template.nonprofit&community.bold.social-organization-citrus-pop.';
                $viewData['title'] = $siteConfig['pages'][$page]['t'] ?? 'SegarKita';
                $viewData['base'] = url('/s/'.$order->site_slug);
                $viewData['img'] = asset('images/website-bisnis/template/nonprofit&community/bold/social-organization-citrus-pop/');
                $viewData['css'] = asset('css/website-bisnis/template/nonprofit&community/bold/social-organization-citrus-pop/social-organization.css');
                $viewData['js'] = asset('js/website-bisnis/template/nonprofit&community/bold/social-organization-citrus-pop/social-organization.js');
                $viewData['inc'] = $viewData['v'].'partials.'.$page;
            }

            $renderedHtml = view($viewName, $viewData)->render();

            // Transform remaining demo brand/WA strings.
            $bizName = $business['business_name'] ?? '';
            $demoBrands = $variant === 'citrus-pop' ? ['SegarKita'] : ['Gerak Nusa'];
            if ($bizName !== '') {
                foreach ($demoBrands as $demo) {
                    $renderedHtml = str_replace($demo, $bizName, $renderedHtml);
                }
            }
            $renderedHtml = str_replace('62895630300345', $custWa, $renderedHtml);

            // Remap preview links.
            $siteBase = url('/s/'.$order->site_slug);
            $previewBases = $variant === 'citrus-pop'
                ? [url('/webia/template/nonprofit-community/bold/social-organization-citrus-pop')]
                : [url('/webia/template/nonprofit-community/creative/social-organization-tropical-rush')];
            foreach ($previewBases as $pb) {
                $renderedHtml = str_replace($pb, $siteBase, $renderedHtml);
            }

            $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

            return response($renderedHtml);
        }

        // Multi-page variants.
        $viewMap = match ($variant) {
            'foundation-classic' => [
                'home' => 'website-bisnis.template.nonprofit&community.professional.foundation-classic-trust.index',
                'tentang-kami' => 'website-bisnis.template.nonprofit&community.professional.foundation-classic-trust.mission-vision',
                'program-kami' => 'website-bisnis.template.nonprofit&community.professional.foundation-classic-trust.programs',
                'dampak' => 'website-bisnis.template.nonprofit&community.professional.foundation-classic-trust.impact',
                'donasi' => 'website-bisnis.template.nonprofit&community.professional.foundation-classic-trust.donation',
                'transparansi-keuangan' => 'website-bisnis.template.nonprofit&community.professional.foundation-classic-trust.financial-report',
                'mitra-sponsor' => 'website-bisnis.template.nonprofit&community.professional.foundation-classic-trust.partners',
                'relawan' => 'website-bisnis.template.nonprofit&community.professional.foundation-classic-trust.volunteer',
                'berita-acara' => 'website-bisnis.template.nonprofit&community.professional.foundation-classic-trust.news-events',
                'chatbot' => 'website-bisnis.template.nonprofit&community.professional.foundation-classic-trust.chatbot',
            ],
            'foundation-nature' => [
                'home' => 'website-bisnis.template.nonprofit&community.creative.foundation-nature-green.index',
                'tentang-kami' => 'website-bisnis.template.nonprofit&community.creative.foundation-nature-green.tentang-kami',
                'program' => 'website-bisnis.template.nonprofit&community.creative.foundation-nature-green.program',
                'dampak' => 'website-bisnis.template.nonprofit&community.creative.foundation-nature-green.dampak',
                'donasi' => 'website-bisnis.template.nonprofit&community.creative.foundation-nature-green.donasi',
                'transparansi' => 'website-bisnis.template.nonprofit&community.creative.foundation-nature-green.transparansi',
                'mitra' => 'website-bisnis.template.nonprofit&community.creative.foundation-nature-green.mitra',
                'relawan' => 'website-bisnis.template.nonprofit&community.creative.foundation-nature-green.relawan',
                'berita' => 'website-bisnis.template.nonprofit&community.creative.foundation-nature-green.berita',
                'ai-chatbot' => 'website-bisnis.template.nonprofit&community.creative.foundation-nature-green.ai-chatbot',
            ],
            'foundation-warm' => [
                'home' => 'website-bisnis.template.nonprofit&community.minimalis.foundation-warm-neutral.index',
                'misi-visi' => 'website-bisnis.template.nonprofit&community.minimalis.foundation-warm-neutral.mission-vision',
                'program' => 'website-bisnis.template.nonprofit&community.minimalis.foundation-warm-neutral.programs',
                'dampak' => 'website-bisnis.template.nonprofit&community.minimalis.foundation-warm-neutral.impact',
                'donasi' => 'website-bisnis.template.nonprofit&community.minimalis.foundation-warm-neutral.donation',
                'transparansi' => 'website-bisnis.template.nonprofit&community.minimalis.foundation-warm-neutral.transparency',
                'mitra-sponsor' => 'website-bisnis.template.nonprofit&community.minimalis.foundation-warm-neutral.partners',
                'relawan' => 'website-bisnis.template.nonprofit&community.minimalis.foundation-warm-neutral.volunteer',
                'berita-acara' => 'website-bisnis.template.nonprofit&community.minimalis.foundation-warm-neutral.news',
                'hopebot' => 'website-bisnis.template.nonprofit&community.minimalis.foundation-warm-neutral.chatbot',
            ],
        };

        $page = $pageKey === 'home' ? 'home' : $pageKey;
        abort_unless(isset($viewMap[$page]), 404);
        $viewName = $viewMap[$page];

        $siteConfig = $configKey !== null ? config($configKey) : null;
        if (is_array($siteConfig)) {
            if ($variant === 'foundation-classic') {
                if (isset($siteConfig['brand']) && is_array($siteConfig['brand'])) {
                    if (! empty($business['business_name'])) {
                        $siteConfig['brand']['name'] = $business['business_name'];
                    }
                }
                if (isset($siteConfig['contact']) && is_array($siteConfig['contact'])) {
                    if ($whatsapp !== '') {
                        $siteConfig['contact']['whatsapp'] = $whatsapp;
                    }
                    if (! empty($business['email'])) {
                        $siteConfig['contact']['email'] = $business['email'];
                    }
                    if (! empty($business['address'])) {
                        $siteConfig['contact']['address'] = $business['address'];
                    }
                }
            } elseif ($variant === 'foundation-nature') {
                if (isset($siteConfig['brand']) && is_array($siteConfig['brand'])) {
                    if (! empty($business['business_name'])) {
                        $siteConfig['brand']['name'] = $business['business_name'];
                    }
                }
                if (isset($siteConfig['contact']) && is_array($siteConfig['contact'])) {
                    if ($whatsapp !== '') {
                        $siteConfig['contact']['whatsapp'] = $whatsapp;
                    }
                    if (! empty($business['email'])) {
                        $siteConfig['contact']['email'] = $business['email'];
                    }
                    if (! empty($business['address'])) {
                        $siteConfig['contact']['address'] = $business['address'];
                    }
                }
            } elseif ($variant === 'foundation-warm') {
                if (isset($siteConfig['brand']) && is_array($siteConfig['brand'])) {
                    if (! empty($business['business_name'])) {
                        $siteConfig['brand']['name'] = $business['business_name'];
                    }
                }
                if (isset($siteConfig['contact']) && is_array($siteConfig['contact'])) {
                    if ($whatsapp !== '') {
                        $siteConfig['contact']['whatsapp'] = $whatsapp;
                    }
                    if (! empty($business['email'])) {
                        $siteConfig['contact']['email'] = $business['email'];
                    }
                    if (! empty($business['address'])) {
                        $siteConfig['contact']['address'] = $business['address'];
                    }
                }
            }
            config([$configKey => $siteConfig]);
        }

        // Build view data per variant.
        $viewData = ['order' => $order, 'page' => $pageKey, 'business' => $business, 'whatsapp' => $whatsapp, 'instagram' => $instagram];
        if ($variant === 'foundation-classic') {
            $base = 'website-bisnis.template.nonprofit&community.professional.foundation-classic-trust';
            $path = 'website-bisnis/template/nonprofit&community/professional/foundation-classic-trust';
            $viewData['fd'] = $siteConfig ?? config($configKey);
            $viewData['fdBase'] = $base;
            $viewData['fdImg'] = 'images/'.$path;
            $viewData['fdCss'] = 'css/'.$path.'/foundation.css';
            $viewData['fdJs'] = 'js/'.$path.'/foundation.js';
        } elseif ($variant === 'foundation-warm') {
            $viewBase = 'website-bisnis.template.nonprofit&community.minimalis.foundation-warm-neutral';
            $assetDir = 'template/nonprofit&community/minimalis/foundation-warm-neutral';
            $viewData['f'] = $siteConfig ?? config($configKey);
            $viewData['v'] = $viewBase;
            $viewData['rp'] = 'foundation-warm-neutral.';
            $viewData['img'] = 'images/website-bisnis/'.$assetDir;
            $viewData['css'] = 'css/website-bisnis/'.$assetDir.'/foundation.css';
            $viewData['js'] = 'js/website-bisnis/'.$assetDir.'/foundation.js';
        }
        // foundation-nature: blade self-loads config via layout.

        $renderedHtml = view($viewName, $viewData)->render();

        // Transform remaining demo brand/WA/email/address strings.
        $bizName = $business['business_name'] ?? '';
        $custWa = $whatsapp ?: '62895630300345';
        $demoBrands = match ($variant) {
            'foundation-classic' => ['Harapan Untuk Negeri'],
            'foundation-nature' => ['GreenHope'],
            'foundation-warm' => ['HopeTogether'],
            'citrus-pop' => ['SegarKita'],
            'tropical-rush' => ['Gerak Nusa'],
        };
        if ($bizName !== '') {
            foreach ($demoBrands as $demo) {
                $renderedHtml = str_replace($demo, $bizName, $renderedHtml);
            }
        }
        $renderedHtml = str_replace('62895630300345', $custWa, $renderedHtml);

        if (! empty($business['email'])) {
            $demoEmails = match ($variant) {
                'foundation-classic' => ['halo@harapanuntuknegeri.org'],
                'foundation-nature' => ['info@greenhope.or.id'],
                'foundation-warm' => ['info@hopetogether.or.id'],
                'citrus-pop' => ['halo@segarkita.id'],
                'tropical-rush' => [],
            };
            if (! empty($demoEmails)) {
                $renderedHtml = str_replace($demoEmails, $business['email'], $renderedHtml);
            }
        }

        $address = $this->businessAddress($business);
        if ($address !== '') {
            $demoAddresses = match ($variant) {
                'foundation-classic' => ['Jl. Kebahagiaan No. 100, Jakarta Pusat'],
                'foundation-nature' => ['Jl. Merdeka No. 123, Bandung, Jawa Barat'],
                'foundation-warm' => ['Jl. Harapan Baru No. 77, Jakarta Selatan'],
                'citrus-pop' => ['Rumah Segar, Jl. Kebon Jeruk No. 12'],
                'tropical-rush' => [],
            };
            if (! empty($demoAddresses)) {
                $renderedHtml = str_replace($demoAddresses, $address, $renderedHtml);
            }
        }

        // Remap preview links to published site routes.
        $siteBase = url('/s/'.$order->site_slug);
        $previewBases = match ($variant) {
            'foundation-classic' => [url('/webia/template/nonprofit-community/professional/foundation-classic-trust')],
            'foundation-nature' => [url('/webia/template/nonprofit-community/creative/foundation-nature-green')],
            'foundation-warm' => [url('/webia/template/nonprofit-community/minimalis/foundation-warm-neutral')],
            'citrus-pop' => [url('/webia/template/nonprofit-community/bold/social-organization-citrus-pop')],
            'tropical-rush' => [url('/webia/template/nonprofit-community/creative/social-organization-tropical-rush')],
        };
        foreach ($previewBases as $pb) {
            $renderedHtml = str_replace($pb, $siteBase, $renderedHtml);
        }

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function handleTravelConfig(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $variant = match (true) {
            str_starts_with($siteConfigPath, 'travel&tourism/modern/') => 'ocean-teal',
            str_starts_with($siteConfigPath, 'travel&tourism/organic/') => 'forest-moss',
            str_starts_with($siteConfigPath, 'travel&tourism/luxury/') => 'navy',
            default => null,
        };
        abort_unless($variant !== null, 404);

        $configKey = match ($variant) {
            'ocean-teal' => 'template.travel&tourism.modern.travel-agent-ocean-teal.travel-agent',
            'forest-moss' => 'template.travel&tourism.organic.travel-agent-forest-moss.travel-agent',
            'navy' => 'template.travel&tourism.luxury.travel-agent-navy-champagne-gold.travel-agent',
        };

        $business = $order->business_data ?? [];
        $whatsapp = $this->whatsappNumber($business['whatsapp'] ?? '');
        $instagram = ltrim($business['instagram'] ?? '', '@');
        $custWa = $whatsapp ?: '62895630300345';

        // Override config.
        $siteConfig = config($configKey);
        if (is_array($siteConfig)) {
            if (isset($siteConfig['brand']) && is_array($siteConfig['brand'])) {
                if (! empty($business['business_name'])) {
                    $siteConfig['brand']['name'] = $business['business_name'];
                }
            }
            if (isset($siteConfig['contact']) && is_array($siteConfig['contact'])) {
                if ($whatsapp !== '') {
                    $siteConfig['contact']['whatsapp'] = $whatsapp;
                }
                if (! empty($business['email'])) {
                    $siteConfig['contact']['email'] = $business['email'];
                }
                if (! empty($business['address'])) {
                    $siteConfig['contact']['address'] = $business['address'];
                }
            }
            config([$configKey => $siteConfig]);
        }
        $cfg = $siteConfig ?? config($configKey);

        if ($variant === 'ocean-teal') {
            $taNs = 'website-bisnis.template.travel&tourism.modern.travel-agent-ocean-teal';
            $taPath = 'template/travel&tourism/modern/travel-agent-ocean-teal';
            $taPages = ['index', 'destinasi', 'paket-tour', 'itinerary', 'harga', 'jadwal', 'galeri', 'inquiry', 'testimoni', 'ai-chat'];
            $page = in_array($pageKey, $taPages, true) ? $pageKey : 'index';
            abort_unless(in_array($pageKey, $taPages, true) || $pageKey === 'home', 404);
            if ($pageKey === 'home') {
                $page = 'index';
            }
            $viewName = $taNs.'.'.$page;
            $taName = 'template.travel-agent-ocean-teal.';
            $imgBase = 'images/website-bisnis/'.$taPath;
            $previewBase = url('/webia/template/travel-agent-ocean-teal');
            $routes = [];
            foreach ($taPages as $name) {
                $routes[$name] = rtrim($previewBase.'/'.($name === 'index' ? '' : $name), '/');
            }
            $viewData = [
                'ns' => $taNs,
                'active' => $page,
                'ta' => $cfg,
                'assets' => [
                    'css' => asset('css/website-bisnis/'.$taPath.'/travel-agent.css'),
                    'js' => asset('js/website-bisnis/'.$taPath.'/travel-agent.js'),
                ],
                'routes' => $routes,
                'img' => fn (string $file) => asset($imgBase.'/'.$file),
                'rp' => fn ($n) => 'Rp '.number_format($n, 0, ',', '.'),
                'icon' => fn (string $name, string $class = '') => $name,
            ];
        } elseif ($variant === 'forest-moss') {
            $ns = 'website-bisnis.template.travel&tourism.organic.travel-agent-forest-moss';
            $path = 'website-bisnis/template/travel&tourism/organic/travel-agent-forest-moss';
            $pages = ['index', 'destinasi', 'paket-tour', 'itinerary', 'harga', 'jadwal-keberangkatan', 'galeri', 'booking-inquiry', 'testimoni', 'asisten-ai'];
            // map URL page key to blade name
            $pageMap = [
                'home' => 'index',
                'destinasi' => 'destinasi',
                'paket-tour' => 'paket-tour',
                'itinerary' => 'itinerary',
                'harga' => 'harga',
                'jadwal' => 'jadwal-keberangkatan',
                'galeri' => 'galeri',
                'inquiry' => 'booking-inquiry',
                'testimoni' => 'testimoni',
                'ai-chat' => 'asisten-ai',
            ];
            $page = $pageKey === 'home' ? 'index' : ($pageMap[$pageKey] ?? null);
            abort_unless($page !== null && in_array($page, $pages, true), 404);
            $viewName = $ns.'.'.$page;
            $assets = [
                'css' => asset('css/'.$path.'/travel-agent.css'),
                'js' => asset('js/'.$path.'/travel-agent.js'),
                'img' => asset('images/'.$path),
            ];
            $viewData = [
                'ns' => $ns,
                'cfg' => $cfg,
                'assets' => $assets,
                'r' => fn (string $name) => url('/s/'.$order->site_slug),
                'img' => fn (string $file) => $assets['img'].'/'.$file,
            ];
        } else {
            $ns = 'website-bisnis.template.travel&tourism.luxury.travel-agent-navy-champagne-gold';
            $tvPath = 'travel&tourism/luxury/travel-agent-navy-champagne-gold';
            $pages = ['beranda', 'destinasi', 'paket', 'itinerary', 'harga', 'jadwal', 'galeri', 'testimoni', 'inquiry', 'faq'];
            // URL page keys map to page names
            $pageMap = [
                'home' => 'beranda',
                'destinasi' => 'destinasi',
                'paket' => 'paket',
                'itinerary' => 'itinerary',
                'harga' => 'harga',
                'jadwal' => 'jadwal',
                'galeri' => 'galeri',
                'testimoni' => 'testimoni',
                'inquiry' => 'inquiry',
                'faq' => 'faq',
            ];
            $page = $pageKey === 'home' ? 'beranda' : ($pageMap[$pageKey] ?? null);
            abort_unless($page !== null && in_array($page, $pages, true), 404);
            $viewName = $ns.'.'.($page === 'beranda' ? 'index' : $page);
            $viewData = [
                'ns' => $ns,
                'page' => $page,
                't' => $cfg,
                'css' => asset('css/website-bisnis/template/'.$tvPath.'/travel-agent.css'),
                'js' => asset('js/website-bisnis/template/'.$tvPath.'/travel-agent.js'),
                'url' => fn (string $p = '') => url('/s/'.$order->site_slug.($p !== '' ? '/'.ltrim($p, '/') : '')),
                'img' => fn (string $f) => asset('images/website-bisnis/template/'.$tvPath.'/'.$f),
                'idr' => fn ($n) => 'Rp '.number_format((int) $n, 0, ',', '.'),
                'icon' => fn (string $n) => $n,
            ];
        }

        $renderedHtml = view($viewName, $viewData)->render();

        // Transform remaining demo brand/WA/email/address strings.
        $bizName = $business['business_name'] ?? '';
        $demoBrands = match ($variant) {
            'ocean-teal' => ['OceanJourney'],
            'forest-moss' => ['GreenTrip'],
            'navy' => ['GrandJourney'],
        };
        if ($bizName !== '') {
            foreach ($demoBrands as $demo) {
                $renderedHtml = str_replace($demo, $bizName, $renderedHtml);
            }
        }
        $renderedHtml = str_replace('62895630300345', $custWa, $renderedHtml);

        if (! empty($business['email'])) {
            $demoEmails = match ($variant) {
                'ocean-teal' => ['halo@oceanjourney.id'],
                'forest-moss' => ['halo@greentrip.id'],
                'navy' => ['info@grandjourney.id'],
            };
            $renderedHtml = str_replace($demoEmails, $business['email'], $renderedHtml);
        }

        $address = $this->businessAddress($business);
        if ($address !== '') {
            $demoAddresses = match ($variant) {
                'ocean-teal' => ['Jl. Pantai Indah No. 88, Jakarta Utara'],
                'forest-moss' => [],
                'navy' => [],
            };
            if (! empty($demoAddresses)) {
                $renderedHtml = str_replace($demoAddresses, $address, $renderedHtml);
            }
        }

        // Remap preview links to published site routes.
        $siteBase = url('/s/'.$order->site_slug);
        $previewBases = match ($variant) {
            'ocean-teal' => [url('/webia/template/travel-agent-ocean-teal'), url('/webia/template/travel&tourism/modern/travel-agent-ocean-teal')],
            'forest-moss' => [url('/webia/template/travel&tourism/organic/travel-agent-forest-moss')],
            'navy' => [url('/webia/template/travel-tourism/luxury/travel-agent-navy-champagne-gold')],
        };
        foreach ($previewBases as $pb) {
            $renderedHtml = str_replace($pb, $siteBase, $renderedHtml);
        }

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function handleHomeRenovationConfig(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $variant = self::HOME_RENOVATION_CONFIG_VIEWS[Str::after($siteConfigPath, 'home-services/')] ?? null;
        abort_unless($variant !== null, 404);

        $business = $order->business_data ?? [];
        $whatsapp = $this->whatsappNumber($business['whatsapp'] ?? '');
        $instagram = ltrim($business['instagram'] ?? '', '@');
        $custWa = $whatsapp ?: '62895630300345';

        if ($variant === 'sage') {
            $configKey = 'template.home-services.organic.home-renovation-repair-sage-green.home-renovation-repair';
            $viewBase = 'website-bisnis.template.home-services.organic.home-renovation-repair-sage-green';
            $viewMap = [
                'home' => $viewBase.'.home',
                'layanan' => $viewBase.'.pages.layanan',
                'paket-layanan' => $viewBase.'.pages.paket-layanan',
                'galeri' => $viewBase.'.pages.galeri',
                'proyek' => $viewBase.'.pages.proyek',
                'area-layanan' => $viewBase.'.pages.area-layanan',
                'proses-kerja' => $viewBase.'.pages.proses-kerja',
                'permintaan-penawaran' => $viewBase.'.pages.permintaan-penawaran',
                'booking-survei' => $viewBase.'.pages.booking-survei',
            ];
            $page = $pageKey === 'home' ? 'home' : $pageKey;
            abort_unless(isset($viewMap[$page]), 404);
            $viewName = $viewMap[$page];

            $siteConfig = config($configKey);
            if (is_array($siteConfig)) {
                if (isset($siteConfig['site']) && is_array($siteConfig['site'])) {
                    if (! empty($business['business_name'])) {
                        $siteConfig['site']['name'] = $business['business_name'];
                    }
                    if ($whatsapp !== '') {
                        $siteConfig['site']['whatsapp'] = $whatsapp;
                    }
                    if (! empty($business['email'])) {
                        $siteConfig['site']['email'] = $business['email'];
                    }
                    if (! empty($business['address'])) {
                        $siteConfig['site']['address'] = $business['address'];
                    }
                }
                config([$configKey => $siteConfig]);
            }

            $renderedHtml = view($viewName, [
                'page' => $pageKey === 'home' ? 'home' : $pageKey,
                'order' => $order,
                'business' => $business,
                'whatsapp' => $whatsapp,
                'instagram' => $instagram,
            ])->render();

            // Transform
            $bizName = $business['business_name'] ?? '';
            if ($bizName !== '') {
                $renderedHtml = str_replace('Renovaku', $bizName, $renderedHtml);
            }
            $renderedHtml = str_replace('62895630300345', $custWa, $renderedHtml);
            if (! empty($business['email'])) {
                $renderedHtml = str_replace('info@renovaku.id', $business['email'], $renderedHtml);
            }
            $address = $this->businessAddress($business);
            if ($address !== '') {
                $renderedHtml = str_replace('Jl. Melati Indah No. 45, Jakarta', $address, $renderedHtml);
            }
            $siteBase = url('/s/'.$order->site_slug);
            $previewBase = url('/webia/template/home-services/organic/home-renovation-repair-sage-green');
            $renderedHtml = str_replace($previewBase, $siteBase, $renderedHtml);
        } else {
            $configKey = 'template.home-services.vintage.home-renovation-repair-chocolate-luxe.home-renovation-repair';
            $view = 'website-bisnis.template.home-services.vintage.home-renovation-repair-chocolate-luxe.home-renovation-repair';
            $pageMap = [
                'home' => 'home',
                'layanan' => 'layanan',
                'paket' => 'paket',
                'galeri' => 'galeri',
                'proyek' => 'proyek',
                'area' => 'area',
                'proses' => 'proses',
                'penawaran' => 'penawaran',
                'survei' => 'survei',
            ];
            $page = $pageMap[$pageKey] ?? null;
            abort_unless($page !== null, 404);
            $viewName = $view;

            $siteConfig = config($configKey);
            if (is_array($siteConfig)) {
                if (isset($siteConfig['brand']) && is_array($siteConfig['brand'])) {
                    if (! empty($business['business_name'])) {
                        $siteConfig['brand']['name'] = $business['business_name'];
                    }
                    if (isset($siteConfig['brand']['whatsapp']) && is_array($siteConfig['brand']['whatsapp'])) {
                        if ($whatsapp !== '') {
                            $siteConfig['brand']['whatsapp']['number'] = $whatsapp;
                        }
                    }
                }
                if (isset($siteConfig['contact']) && is_array($siteConfig['contact'])) {
                    if ($whatsapp !== '') {
                        $siteConfig['contact']['whatsapp'] = $whatsapp;
                    }
                    if (! empty($business['email'])) {
                        $siteConfig['contact']['email'] = $business['email'];
                    }
                    if (! empty($business['address'])) {
                        $siteConfig['contact']['address'] = $business['address'];
                    }
                }
                config([$configKey => $siteConfig]);
            }

            $renderedHtml = view($viewName, [
                'page' => $page,
                'order' => $order,
                'business' => $business,
                'whatsapp' => $whatsapp,
                'instagram' => $instagram,
            ])->render();

            $bizName = $business['business_name'] ?? '';
            if ($bizName !== '') {
                $renderedHtml = str_replace('Renovate', $bizName, $renderedHtml);
            }
            $renderedHtml = str_replace('62895630300345', $custWa, $renderedHtml);
            if (! empty($business['email'])) {
                $renderedHtml = str_replace('hello@renovate.id', $business['email'], $renderedHtml);
            }
            $address = $this->businessAddress($business);
            if ($address !== '') {
                $renderedHtml = str_replace('Jl. Kemang Raya No. 88, Jakarta', $address, $renderedHtml);
            }
            $siteBase = url('/s/'.$order->site_slug);
            $previewBase = url('/webia/template/home-services/vintage/home-renovation-repair-chocolate-luxe');
            $renderedHtml = str_replace($previewBase, $siteBase, $renderedHtml);
        }

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function handleUgcDarkMode(WebiaOrder $order, string $siteConfigPath, string $pageKey): Response
    {
        $configKey = 'template.photography-creative-studio.futuristic.ugc-content-creator-studio-dark-mode.ugc-content-creator-studio';
        $business = $order->business_data ?? [];
        $whatsapp = $this->whatsappNumber($business['whatsapp'] ?? '');
        $instagram = ltrim($business['instagram'] ?? '', '@');
        $custWa = $whatsapp ?: '62895630300345';

        $validPages = ['home', 'portfolio', 'samples', 'packages', 'rights', 'platforms', 'brands', 'inquiry', 'testimonials', 'faq'];
        $page = in_array($pageKey, $validPages, true) ? $pageKey : 'home';
        abort_unless($pageKey === 'home' || in_array($pageKey, $validPages, true), 404);

        $siteConfig = config($configKey);
        if (is_array($siteConfig)) {
            if (isset($siteConfig['brand']) && is_array($siteConfig['brand'])) {
                if (! empty($business['business_name'])) {
                    $siteConfig['brand']['name'] = $business['business_name'];
                }
            }
            if (isset($siteConfig['contact']) && is_array($siteConfig['contact'])) {
                if ($whatsapp !== '') {
                    $siteConfig['contact']['wa'] = $whatsapp;
                }
                if (! empty($business['email'])) {
                    $siteConfig['contact']['email'] = $business['email'];
                }
            }
            config([$configKey => $siteConfig]);
        }

        $data = require config_path('template/photography-creative-studio/futuristic/ugc-content-creator-studio-dark-mode/ugc-content-creator-studio.php');
        if (is_array($siteConfig)) {
            if (isset($data['brand']) && is_array($data['brand'])) {
                if (! empty($business['business_name'])) {
                    $data['brand']['name'] = $business['business_name'];
                }
            }
            if (isset($data['contact']) && is_array($data['contact'])) {
                if ($whatsapp !== '') {
                    $data['contact']['wa'] = $whatsapp;
                }
                if (! empty($business['email'])) {
                    $data['contact']['email'] = $business['email'];
                }
            }
        }

        $viewName = 'website-bisnis.template.photography-creative-studio.futuristic.ugc-content-creator-studio-dark-mode.ugc-content-creator-studio';
        $renderedHtml = view($viewName, [
            'page' => $page,
            'd' => $data,
        ])->render();

        $bizName = $business['business_name'] ?? '';
        if ($bizName !== '') {
            $renderedHtml = str_replace('SOROT Studio', $bizName, $renderedHtml);
            $renderedHtml = str_replace('SOROT', strtoupper($bizName), $renderedHtml);
        }
        $renderedHtml = str_replace('62895630300345', $custWa, $renderedHtml);
        if (! empty($business['email'])) {
            $renderedHtml = str_replace('halo@sorotstudio.id', $business['email'], $renderedHtml);
        }

        $siteBase = url('/s/'.$order->site_slug);
        $previewBase = url('/webia/template/photography-creative-studio/futuristic/ugc-content-creator-studio-dark-mode');
        $renderedHtml = str_replace($previewBase, $siteBase, $renderedHtml);

        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

        return response($renderedHtml);
    }

    private function brandingAgencyConfig(array $siteConfig, array $business, string $whatsapp): array
    {
        $name = $business['business_name'] ?? 'Studio Kreatif';
        $this->replaceDemoName($siteConfig, $siteConfig['brand']['name'], $name);

        return array_replace($siteConfig, [
            'brand' => array_replace($siteConfig['brand'], [
                'name' => $name,
                'short' => $name,
                'sub' => '',
                'tagline' => ($business['tagline'] ?? null) ?: $siteConfig['brand']['tagline'],
                'whatsapp' => $whatsapp,
                'phone' => $business['whatsapp'] ?? '',
                'email' => '',
                'address' => $this->businessAddress($business),
                'wa_text' => 'Halo '.$name.', saya ingin berkonsultasi soal branding.',
            ]),
            'topbar' => array_replace($siteConfig['topbar'], ['notice' => 'Konsultasikan kebutuhan branding dan materi kreatif Anda.']),
            'nav' => ['layanan', 'keahlian', 'portofolio', 'janji'],
            'footnav' => ['layanan', 'keahlian', 'portofolio', 'janji'],
            'hero' => array_replace($siteConfig['hero'], [
                'lead' => ($business['description'] ?? null) ?: $siteConfig['hero']['lead'],
                'facts' => [],
            ]),
            'services' => array_replace($siteConfig['services'], [
                'items' => array_map(fn (array $service): array => array_replace($service, ['price' => '']), $siteConfig['services']['items']),
            ]),
            'pricing' => array_replace($siteConfig['pricing'], ['plans' => []]),
            'appointment' => array_replace($siteConfig['appointment'], ['slots' => []]),
            'expertise' => array_replace($siteConfig['expertise'], ['awards' => []]),
            'customer_site' => true,
        ]);
    }

    private function terracottaCompanyConfig(array $siteConfig, array $business, string $whatsapp, string $instagram): array
    {
        $name = $business['business_name'] ?? 'Perusahaan';
        $this->replaceDemoName($siteConfig, $siteConfig['brand']['name'], $name);

        return array_replace($siteConfig, [
            'brand' => array_replace($siteConfig['brand'], [
                'name' => $name,
                'tagline' => ($business['tagline'] ?? null) ?: $siteConfig['brand']['tagline'],
            ]),
            'topbar' => array_replace($siteConfig['topbar'], [
                'address' => $this->businessAddress($business),
                'email' => '',
                'phone' => $business['whatsapp'] ?? '',
            ]),
            'whatsapp' => array_replace($siteConfig['whatsapp'], ['number' => $whatsapp]),
            'social' => $instagram === '' ? [] : [['k' => 'ig', 'n' => 'Instagram', 'u' => 'https://instagram.com/'.$instagram]],
            'nav' => array_values(array_filter($siteConfig['nav'], fn (array $item): bool => ! in_array($item['t'], ['Sertifikasi', 'Klien'], true))),
            'footer_links' => array_values(array_filter($siteConfig['footer_links'], fn (array $item): bool => ! in_array($item['t'], ['Sertifikasi', 'Klien'], true))),
            'hero' => array_replace($siteConfig['hero'], ['text' => ($business['description'] ?? null) ?: $siteConfig['hero']['text']]),
            'about' => array_replace($siteConfig['about'], ['text' => ($business['description'] ?? null) ?: $siteConfig['about']['text']]),
            'certifications' => array_replace($siteConfig['certifications'], ['items' => []]),
            'clients' => array_replace($siteConfig['clients'], ['items' => []]),
        ]);
    }

    private function oceanTealCompanyConfig(array $siteConfig, array $business, string $whatsapp, string $instagram): array
    {
        $name = $business['business_name'] ?? 'Perusahaan';
        $this->replaceDemoName($siteConfig, $siteConfig['brand']['name'], $name);

        return array_replace($siteConfig, [
            'brand' => array_replace($siteConfig['brand'], [
                'name' => $name,
                'tagline' => ($business['tagline'] ?? null) ?: $siteConfig['brand']['tagline'],
            ]),
            'topbar' => array_replace($siteConfig['topbar'], [
                'address' => $this->businessAddress($business),
                'email' => '',
                'phone' => $business['whatsapp'] ?? '',
                'phone_href' => '+'.$whatsapp,
            ]),
            'socials' => $instagram === '' ? [] : [['icon' => 'instagram', 'label' => 'Instagram', 'url' => 'https://instagram.com/'.$instagram]],
            'nav' => array_values(array_filter($siteConfig['nav'], fn (array $item): bool => ! in_array($item['key'], ['sertifikasi', 'klien'], true))),
            'footer_nav' => array_values(array_filter($siteConfig['footer_nav'], fn (array $item): bool => ! in_array($item['key'], ['sertifikasi', 'klien'], true))),
            'whatsapp' => array_replace($siteConfig['whatsapp'], ['number' => $whatsapp]),
            'hero' => array_replace($siteConfig['hero'], [
                'text' => ($business['description'] ?? null) ?: $siteConfig['hero']['text'],
                'stats' => [],
            ]),
            'about' => array_replace($siteConfig['about'], ['paragraphs' => [($business['description'] ?? null) ?: $siteConfig['about']['paragraphs'][0]]]),
            'certifications' => array_replace($siteConfig['certifications'], ['items' => []]),
            'clients' => array_replace($siteConfig['clients'], ['items' => []]),
            'ai_faq' => array_replace($siteConfig['ai_faq'], [
                'items' => array_values(array_filter($siteConfig['ai_faq']['items'], fn (array $item): bool => ! str_contains(strtolower($item['q']), 'sertifikasi'))),
            ]),
        ]);
    }

    private function warmNeutralCompanyConfig(array $siteConfig, array $business, string $whatsapp, string $instagram): array
    {
        $name = $business['business_name'] ?? 'Perusahaan';
        $this->replaceDemoName($siteConfig, $siteConfig['company']['name'], $name);

        return array_replace($siteConfig, [
            'company' => array_replace($siteConfig['company'], [
                'name' => $name,
                'tagline' => ($business['tagline'] ?? null) ?: $siteConfig['company']['tagline'],
                'address' => $this->businessAddress($business),
                'email' => '',
                'phone' => $business['whatsapp'] ?? '',
                'phone_href' => '+'.$whatsapp,
            ]),
            'social' => $instagram === '' ? [] : [['icon' => 'instagram', 'label' => 'Instagram', 'url' => 'https://instagram.com/'.$instagram]],
            'nav' => array_values(array_filter($siteConfig['nav'], fn (array $item): bool => ! in_array($item['label'], ['Sertifikasi', 'Klien'], true))),
            'whatsapp' => array_replace($siteConfig['whatsapp'], ['number' => $whatsapp]),
            'hero' => array_replace($siteConfig['hero'], [
                'eyebrow' => ($business['tagline'] ?? null) ?: $siteConfig['hero']['eyebrow'],
                'lead' => ($business['description'] ?? null) ?: $siteConfig['hero']['lead'],
            ]),
            'about' => array_replace($siteConfig['about'], ['paragraphs' => [($business['description'] ?? null) ?: $siteConfig['about']['paragraphs'][0]]]),
            'certifications' => [],
            'clients' => [],
            'faq' => array_values(array_filter($siteConfig['faq'], fn (array $item): bool => ! in_array($item['id'], ['sertifikasi', 'klien'], true))),
        ]);
    }

    private function luxuryRetailConfig(array $siteConfig, array $business, string $whatsapp, string $instagram): array
    {
        $name = $business['business_name'] ?? 'Toko Skincare';
        $this->replaceDemoName($siteConfig, $siteConfig['brand']['name'], $name);

        return array_replace($siteConfig, [
            'brand' => array_replace($siteConfig['brand'], [
                'name' => $name,
                'tagline' => ($business['tagline'] ?? null) ?: $siteConfig['brand']['tagline'],
            ]),
            'contact' => array_replace($siteConfig['contact'], [
                'whatsapp' => $whatsapp,
                'phone_display' => $business['whatsapp'] ?? '',
                'email' => '',
                'address' => $this->businessAddress($business),
            ]),
            'social' => $instagram === '' ? [] : [['icon' => 'bi-instagram', 'label' => 'Instagram', 'url' => 'https://instagram.com/'.$instagram]],
            'hero' => array_replace($siteConfig['hero'], [
                'title' => ($business['tagline'] ?? null) ?: $siteConfig['hero']['title'],
                'text' => ($business['description'] ?? null) ?: $siteConfig['hero']['text'],
            ]),
            'customer_site' => true,
        ]);
    }

    private function organicRetailConfig(array $siteConfig, array $business, string $whatsapp, string $instagram): array
    {
        $name = $business['business_name'] ?? 'Toko Skincare';
        $this->replaceDemoName($siteConfig, $siteConfig['brand']['name'], $name);

        return array_replace($siteConfig, [
            'brand' => array_replace($siteConfig['brand'], [
                'name' => $name,
                'tagline' => ($business['tagline'] ?? null) ?: $siteConfig['brand']['tagline'],
                'title' => $name.' - '.(($business['tagline'] ?? null) ?: $siteConfig['brand']['tagline']),
                'description' => ($business['description'] ?? null) ?: $siteConfig['brand']['description'],
            ]),
            'whatsapp' => array_replace($siteConfig['whatsapp'], [
                'number' => $whatsapp,
                'display' => $business['whatsapp'] ?? '',
                'greeting' => 'Halo '.$name.', saya ingin bertanya tentang produk.',
            ]),
            'contact' => array_replace($siteConfig['contact'], [
                'address' => $this->businessAddress($business),
                'email' => '',
            ]),
            'socials' => $instagram === '' ? [] : [['icon' => 'instagram', 'label' => 'Instagram', 'url' => 'https://instagram.com/'.$instagram]],
            'hero' => array_replace($siteConfig['hero'], [
                'title' => ($business['tagline'] ?? null) ?: $siteConfig['hero']['title'],
                'text' => ($business['description'] ?? null) ?: $siteConfig['hero']['text'],
            ]),
            'customer_site' => true,
        ]);
    }

    private function premiumRetailConfig(array $siteConfig, array $business, string $whatsapp, string $instagram): array
    {
        $name = $business['business_name'] ?? 'Toko Skincare';
        $this->replaceDemoName($siteConfig, $siteConfig['name'], $name);

        return array_replace($siteConfig, [
            'name' => $name,
            'tagline' => ($business['tagline'] ?? null) ?: $siteConfig['tagline'],
            'whatsapp' => $whatsapp,
            'whatsapp_display' => $business['whatsapp'] ?? '',
            'contact' => array_replace($siteConfig['contact'], [
                'address' => $this->businessAddress($business),
                'phone' => $business['whatsapp'] ?? '',
                'email' => '',
            ]),
            'social' => $instagram === '' ? [] : [['icon' => 'bi-instagram', 'label' => 'Instagram', 'url' => 'https://instagram.com/'.$instagram]],
            'hero' => array_replace($siteConfig['hero'], [
                'title' => ($business['tagline'] ?? null) ?: $siteConfig['hero']['title'],
                'text' => ($business['description'] ?? null) ?: $siteConfig['hero']['text'],
            ]),
            'customer_site' => true,
        ]);
    }

    private function cleanWhiteHealthcareConfig(array $siteConfig, array $business, string $whatsapp, string $instagram): array
    {
        $name = $business['business_name'] ?? 'Klinik Kecantikan';
        $this->replaceDemoName($siteConfig, $siteConfig['brand']['name'], $name);

        return array_replace($siteConfig, [
            'brand' => array_replace($siteConfig['brand'], [
                'name' => $name,
                'tagline' => ($business['tagline'] ?? null) ?: $siteConfig['brand']['tagline'],
            ]),
            'contact' => array_replace($siteConfig['contact'], [
                'phone' => $business['whatsapp'] ?? '',
                'whatsapp' => $whatsapp,
                'email' => '',
                'address' => $this->businessAddress($business),
            ]),
            'social' => $instagram === '' ? [] : [['label' => 'Instagram', 'icon' => 'instagram', 'url' => 'https://instagram.com/'.$instagram]],
            'hero' => array_replace($siteConfig['hero'], [
                'text' => ($business['description'] ?? null) ?: $siteConfig['hero']['text'],
                'trust' => [],
            ]),
            'notifications' => [],
            'customer_site' => true,
        ]);
    }

    private function champagneHealthcareConfig(array $siteConfig, array $business, string $whatsapp, string $instagram): array
    {
        $name = $business['business_name'] ?? 'Klinik Kecantikan';
        $this->replaceDemoName($siteConfig, $siteConfig['brand']['name'], $name);

        return array_replace($siteConfig, [
            'brand' => array_replace($siteConfig['brand'], [
                'name' => $name,
                'tagline' => ($business['tagline'] ?? null) ?: $siteConfig['brand']['tagline'],
                'description' => ($business['description'] ?? null) ?: $siteConfig['brand']['description'],
            ]),
            'contact' => array_replace($siteConfig['contact'], [
                'address' => $this->businessAddress($business),
                'phone' => $business['whatsapp'] ?? '',
                'phone_raw' => '+'.$whatsapp,
                'email' => '',
                'whatsapp' => $whatsapp,
            ]),
            'social' => $instagram === '' ? [] : [['label' => 'Instagram', 'icon' => 'bi-instagram', 'url' => 'https://instagram.com/'.$instagram]],
            'hero' => array_replace($siteConfig['hero'], [
                'text' => ($business['description'] ?? null) ?: $siteConfig['hero']['text'],
                'badges' => [],
            ]),
            'customer_site' => true,
        ]);
    }

    private function roseGoldHealthcareConfig(array $siteConfig, array $business, string $whatsapp, string $instagram): array
    {
        $name = $business['business_name'] ?? 'Klinik Kecantikan';
        $this->replaceDemoName($siteConfig, $siteConfig['brand']['name'], $name);

        return array_replace($siteConfig, [
            'brand' => array_replace($siteConfig['brand'], [
                'name' => $name,
                'tagline' => ($business['tagline'] ?? null) ?: $siteConfig['brand']['tagline'],
            ]),
            'contact' => array_replace($siteConfig['contact'], [
                'phone' => $business['whatsapp'] ?? '',
                'whatsapp' => $whatsapp,
                'booking_whatsapp' => $whatsapp,
                'email' => '',
                'address' => $this->businessAddress($business),
            ]),
            'socials' => $instagram === '' ? [] : [['label' => 'Instagram', 'icon' => 'bi-instagram', 'url' => 'https://instagram.com/'.$instagram]],
            'hero' => array_replace($siteConfig['hero'], [
                'text' => ($business['description'] ?? null) ?: $siteConfig['hero']['text'],
                'trust' => [],
            ]),
            'notifications' => [],
            'customer_site' => true,
        ]);
    }

    private function emeraldPropertyConfig(array $siteConfig, array $business, string $whatsapp, string $instagram): array
    {
        $name = $business['business_name'] ?? 'Agensi Properti';
        $this->replaceDemoName($siteConfig, $siteConfig['site']['name'], $name);

        return array_replace($siteConfig, [
            'site' => array_replace($siteConfig['site'], [
                'name' => $name,
                'tagline' => ($business['tagline'] ?? null) ?: $siteConfig['site']['tagline'],
                'address' => $this->businessAddress($business),
                'email' => '',
                'phone' => $business['whatsapp'] ?? '',
                'social' => $instagram === '' ? [] : [['icon' => 'instagram', 'label' => 'Instagram', 'url' => 'https://instagram.com/'.$instagram]],
            ]),
            'about' => array_replace($siteConfig['about'], ['text' => [($business['description'] ?? null) ?: $siteConfig['about']['text'][0]]]),
            'whatsapp' => array_replace($siteConfig['whatsapp'], ['number' => $whatsapp]),
            'customer_site' => true,
        ]);
    }

    private function naturePropertyConfig(array $siteConfig, array $business, string $whatsapp, string $instagram): array
    {
        $name = $business['business_name'] ?? 'Agensi Properti';
        $this->replaceDemoName($siteConfig, $siteConfig['brand']['name'], $name);

        return array_replace($siteConfig, [
            'brand' => array_replace($siteConfig['brand'], [
                'name' => $name,
                'tagline' => ($business['tagline'] ?? null) ?: $siteConfig['brand']['tagline'],
            ]),
            'contact' => array_replace($siteConfig['contact'], [
                'address' => $this->businessAddress($business),
                'email' => '',
                'phone' => $business['whatsapp'] ?? '',
                'phone_tel' => '+'.$whatsapp,
                'whatsapp' => $whatsapp,
            ]),
            'socials' => $instagram === '' ? [] : [['label' => 'Instagram', 'icon' => 'instagram', 'url' => 'https://instagram.com/'.$instagram]],
            'hero' => array_replace($siteConfig['hero'], ['desc' => ($business['description'] ?? null) ?: $siteConfig['hero']['desc']]),
            'about' => array_replace($siteConfig['about'], ['text' => ($business['description'] ?? null) ?: $siteConfig['about']['text']]),
            'customer_site' => true,
        ]);
    }

    private function coralPropertyConfig(array $siteConfig, array $business, string $whatsapp, string $instagram): array
    {
        $name = $business['business_name'] ?? 'Agensi Properti';
        $this->replaceDemoName($siteConfig, $siteConfig['brand']['name'], $name);

        return array_replace($siteConfig, [
            'brand' => array_replace($siteConfig['brand'], [
                'name' => $name,
                'upper' => Str::upper($name),
                'tagline' => ($business['tagline'] ?? null) ?: $siteConfig['brand']['tagline'],
            ]),
            'contact' => array_replace($siteConfig['contact'], [
                'address' => $this->businessAddress($business),
                'address_line1' => $business['address'] ?? '',
                'address_line2' => $business['city'] ?? '',
                'email' => '',
                'email_extra' => '',
                'phone' => $business['whatsapp'] ?? '',
                'phone_link' => '+'.$whatsapp,
                'whatsapp' => $whatsapp,
                'whatsapp_leads' => $whatsapp,
            ]),
            'socials' => $instagram === '' ? [] : [['name' => 'Instagram', 'icon' => 'instagram', 'url' => 'https://instagram.com/'.$instagram]],
            'hero' => array_replace($siteConfig['hero'], ['text' => ($business['description'] ?? null) ?: $siteConfig['hero']['text']]),
            'about' => array_replace($siteConfig['about'], [
                'text' => [($business['description'] ?? null) ?: $siteConfig['about']['text'][0]],
                'stats' => [],
            ]),
            'customer_site' => true,
        ]);
    }

    private function oceanElearningConfig(array $siteConfig, array $business, string $whatsapp, string $instagram): array
    {
        $name = $business['business_name'] ?? 'Akademi Online';
        $this->replaceDemoName($siteConfig, $siteConfig['brand']['name'], $name);

        return array_replace($siteConfig, [
            'brand' => array_replace($siteConfig['brand'], [
                'name' => $name,
                'tagline' => ($business['tagline'] ?? null) ?: $siteConfig['brand']['tagline'],
            ]),
            'contact' => array_replace($siteConfig['contact'], [
                'address' => $this->businessAddress($business),
                'email' => '',
                'phone' => $business['whatsapp'] ?? '',
                'whatsapp' => $whatsapp,
            ]),
            'registration' => array_replace($siteConfig['registration'], [
                'whatsapp' => $whatsapp,
                'whatsapp_display' => $business['whatsapp'] ?? '',
            ]),
            'social' => $instagram === '' ? [] : [['key' => 'instagram', 'label' => 'Instagram', 'url' => 'https://instagram.com/'.$instagram]],
            'hero' => array_replace($siteConfig['hero'], ['text' => ($business['description'] ?? null) ?: $siteConfig['hero']['text']]),
            'customer_site' => true,
        ]);
    }

    private function pastelElearningConfig(array $siteConfig, array $business, string $whatsapp, string $instagram): array
    {
        $name = $business['business_name'] ?? 'Akademi Online';
        $this->replaceDemoName($siteConfig, $siteConfig['brand']['name'], $name);

        return array_replace($siteConfig, [
            'meta' => array_replace($siteConfig['meta'], ['title' => $name]),
            'brand' => array_replace($siteConfig['brand'], [
                'name' => $name,
                'tagline' => ($business['tagline'] ?? null) ?: $siteConfig['brand']['tagline'],
            ]),
            'contact' => array_replace($siteConfig['contact'], [
                'address' => $this->businessAddress($business),
                'email' => '',
                'phone' => $business['whatsapp'] ?? '',
                'phone_e164' => '+'.$whatsapp,
                'whatsapp' => $whatsapp,
                'form_whatsapp' => $whatsapp,
                'form_whatsapp_display' => $business['whatsapp'] ?? '',
            ]),
            'socials' => $instagram === '' ? [] : [['label' => 'Instagram', 'icon' => 'bi-instagram', 'url' => 'https://instagram.com/'.$instagram]],
            'hero' => array_replace($siteConfig['hero'], [
                'desc' => ($business['description'] ?? null) ?: $siteConfig['hero']['desc'],
                'stats' => [],
            ]),
            'customer_site' => true,
        ]);
    }

    private function darkElearningConfig(array $siteConfig, array $business, string $whatsapp, string $instagram): array
    {
        $name = $business['business_name'] ?? 'Akademi Online';
        $this->replaceDemoName($siteConfig, $siteConfig['brand']['name'], $name);

        return array_replace($siteConfig, [
            'brand' => array_replace($siteConfig['brand'], [
                'name' => $name,
                'tagline' => ($business['tagline'] ?? null) ?: $siteConfig['brand']['tagline'],
            ]),
            'topbar' => array_replace($siteConfig['topbar'], [
                'address' => $this->businessAddress($business),
                'email' => '',
                'phone' => $business['whatsapp'] ?? '',
                'phone_href' => '+'.$whatsapp,
            ]),
            'socials' => $instagram === '' ? [] : [['icon' => 'instagram', 'label' => 'Instagram', 'url' => 'https://instagram.com/'.$instagram]],
            'whatsapp' => array_replace($siteConfig['whatsapp'], [
                'number' => $whatsapp,
                'display' => $business['whatsapp'] ?? '',
            ]),
            'hero' => array_replace($siteConfig['hero'], [
                'text' => ($business['description'] ?? null) ?: $siteConfig['hero']['text'],
                'features' => [],
            ]),
            'customer_site' => true,
        ]);
    }

    private function propertyPageName(string $siteConfigPath, string $name, array $parameters): string
    {
        $name = Str::afterLast($name, '.');

        return match (true) {
            str_starts_with($siteConfigPath, 'property/luxury/') => match ($name) {
                'index' => 'home',
                'show' => isset($parameters['post']) ? 'blog/'.$parameters['post'] : 'property/'.$parameters['slug'],
                default => $name,
            },
            str_starts_with($siteConfigPath, 'property/premium-minimal/') => match ($name) {
                'home' => 'home',
                'property' => 'properties/'.$parameters['slug'],
                'show' => 'blog/'.$parameters['slug'],
                'about' => 'about-us',
                default => $name,
            },
            default => match ($name) {
                'home' => 'home',
                'about' => 'about-us',
                'show' => 'blog/'.($parameters['slug'] ?? $parameters[0]),
                default => $name,
            },
        };
    }

    private function propertyViewData(
        string $siteConfigPath,
        array $siteConfig,
        string $view,
        string $pageKey,
        ?string $pageIdentifier,
        callable $propertyPageUrl,
        callable $emeraldRoute,
    ): array {
        if (str_starts_with($siteConfigPath, 'property/luxury/')) {
            return array_filter([
                'cfg' => $siteConfig,
                'route' => $emeraldRoute,
                'slug' => $pageKey === 'property.show' ? $pageIdentifier : null,
                'post' => $pageKey === 'blog.show' ? $pageIdentifier : null,
            ], fn (mixed $value): bool => $value !== null);
        }

        if (str_starts_with($siteConfigPath, 'property/premium-minimal/')) {
            $property = $pageKey === 'property.show' ? collect($siteConfig['properties'])->firstWhere('slug', $pageIdentifier) : null;
            $post = $pageKey === 'blog.show' ? collect($siteConfig['blog'])->firstWhere('slug', $pageIdentifier) : null;
            abort_if($pageKey === 'property.show' && ! $property, 404);
            abort_if($pageKey === 'blog.show' && ! $post, 404);

            return array_filter([
                't' => $siteConfig,
                'ns' => $view.'.',
                'active' => match ($pageKey) {
                    'property.show' => 'properties',
                    'blog.show' => 'blog',
                    default => Str::before($pageKey === 'about-us' ? 'about' : $pageKey, '.'),
                },
                'r' => $propertyPageUrl,
                'img' => fn (string $file): string => asset($siteConfig['assets']['images'].'/'.$file),
                'property' => $property,
                'post' => $post,
            ], fn (mixed $value): bool => $value !== null);
        }

        $post = $pageKey === 'blog.show' ? collect($siteConfig['blog']['posts'])->firstWhere('slug', $pageIdentifier) : null;
        abort_if($pageKey === 'blog.show' && ! $post, 404);
        $currentRoute = 'coral-peach.'.match ($pageKey) {
            'home' => 'home',
            'about-us' => 'about',
            'blog.show' => 'blog.show',
            default => $pageKey,
        };

        return array_filter([
            'site' => $siteConfig,
            'r' => $propertyPageUrl,
            'isActive' => fn (string $pattern): bool => Str::is($pattern, $currentRoute),
            'post' => $post,
        ], fn (mixed $value): bool => $value !== null);
    }

    private function healthcarePageName(string $siteConfigPath, string $name): string
    {
        $name = Str::afterLast($name, '.');

        return match (true) {
            str_starts_with($siteConfigPath, 'healthcare/professional/') => [
                'home' => 'home', 'services' => 'layanan', 'doctors' => 'dokter-staff', 'schedule' => 'jadwal', 'appointment' => 'appointment', 'faq' => 'faq', 'policy' => 'kebijakan',
            ][$name] ?? $name,
            str_starts_with($siteConfigPath, 'healthcare/luxury/') => $name,
            default => [
                'index' => 'home', 'services' => 'layanan', 'doctors' => 'dokter', 'schedule' => 'jadwal', 'appointment' => 'booking', 'faq' => 'faq', 'policy' => 'kebijakan',
            ][$name] ?? $name,
        };
    }

    private function retailPageName(string $siteConfigPath, string $name): string
    {
        return match (true) {
            str_starts_with($siteConfigPath, 'retail/luxury/') => $name === 'index' ? 'home' : $name,
            str_starts_with($siteConfigPath, 'retail/organic/') => [
                'home' => 'home', 'catalog' => 'katalog', 'price' => 'harga', 'stock' => 'stok', 'inquiry' => 'inquiry', 'shop' => 'belanja',
            ][$name] ?? $name,
            default => [
                'home' => 'home', 'catalog' => 'katalog', 'price' => 'harga', 'stock' => 'ketersediaan', 'inquiry' => 'inquiry', 'cart' => 'keranjang',
            ][$name] ?? $name,
        };
    }

    private function retailRouteKey(string $siteConfigPath, string $page): string
    {
        return match (true) {
            $page === 'home' && str_starts_with($siteConfigPath, 'retail/luxury/') => 'index',
            str_starts_with($siteConfigPath, 'retail/organic/') => array_search($page, [
                'home' => 'home', 'catalog' => 'katalog', 'price' => 'harga', 'stock' => 'stok', 'inquiry' => 'inquiry', 'shop' => 'belanja',
            ], true) ?: $page,
            str_starts_with($siteConfigPath, 'retail/premium-minimal/') => array_search($page, [
                'home' => 'home', 'catalog' => 'katalog', 'price' => 'harga', 'stock' => 'ketersediaan', 'inquiry' => 'inquiry', 'cart' => 'keranjang',
            ], true) ?: $page,
            default => $page,
        };
    }


    private function minimalisSiteConfig(array $siteConfig, array $business, WebiaOrder $order, string $whatsapp, string $instagram): array
    {
        return array_replace($siteConfig, [
            'name' => $business['business_name'] ?? 'Cafe',
            'tagline' => ($business['tagline'] ?? null) ?: 'Cafe & Eatery',
            'hero_title' => ($business['tagline'] ?? null) ?: ($business['business_name'] ?? 'Cafe & Eatery'),
            'description' => ($business['description'] ?? null) ?: 'Tempat nyaman untuk menikmati kopi, makanan, dan kebersamaan.',
            'phone' => $business['whatsapp'] ?? '',
            'whatsapp' => $whatsapp,
            'email' => $order->user?->email ?? '',
            'address' => $business['address'] ?? '',
            'city' => $business['city'] ?? '',
            'city_short' => $business['city'] ?? '',
            'social' => $instagram === '' ? [] : [['Instagram', 'ig', 'https://instagram.com/'.$instagram]],
        ]);
    }

    private function eleganSiteConfig(array $siteConfig, array $business, WebiaOrder $order, string $whatsapp, string $instagram): array
    {
        $name = $business['business_name'] ?? 'Cafe';
        $address = trim(($business['address'] ?? '').($business['city'] ?? '' ? ', '.$business['city'] : ''));
        // Teks konten demo masih menyebut nama template demo; tukar dengan nama bisnis pelanggan.
        array_walk_recursive($siteConfig, function (&$value) use ($siteConfig, $name): void {
            if (is_string($value)) {
                $value = str_replace($siteConfig['brand']['name'], $name, $value);
            }
        });

        $faqItems = collect($siteConfig['faq']['items'])->map(function (array $item) use ($business): array {
            if (isset($item['keywords'])) {
                match (true) {
                    in_array('lokasi', $item['keywords'], true) => $item['a'] = 'Kami berada di '.($business['address'] ?? '').', '.($business['city'] ?? '').'.',
                    default => null,
                };
            }

            return $item;
        });
        $addressUrl = ($business['address_url'] ?? '') ?: ($siteConfig['contact']['maps_url'] ?? '');

        return array_replace($siteConfig, [
            'brand' => [
                'name' => $name,
                'title' => $name,
                'description' => ($business['description'] ?? null) ?: 'Nikmati kopi, hidangan, dan suasana elegan di '.$name.'. Reservasi meja atau pesan lewat WhatsApp.',
                'footer_text' => $siteConfig['brand']['footer_text'],
            ],
            'contact' => [
                'address' => $address,
                'address_full' => $address,
                'phone' => $business['whatsapp'] ?? '',
                'whatsapp' => $whatsapp,
                'email' => $order->user?->email ?? '',
                'open_text' => $siteConfig['contact']['open_text'],
                'maps_url' => $addressUrl,
                'chat_message' => 'Halo '.$name.', saya ingin bertanya tentang menu dan promo.',
            ],
            'social' => $instagram === '' ? [] : [['name' => 'Instagram', 'icon' => 'instagram', 'url' => 'https://instagram.com/'.$instagram]],
            'slides' => [array_replace($siteConfig['slides'][0], [
                'text' => ($business['description'] ?? null) ?: $siteConfig['slides'][0]['text'],
            ])],
            'location' => array_replace($siteConfig['location'], ['embed_url' => $addressUrl]),
            'faq' => array_replace($siteConfig['faq'], ['items' => $faqItems->all()]),
        ]);
    }

    private function vintageSiteConfig(array $siteConfig, array $business, WebiaOrder $order, string $whatsapp, string $instagram): array
    {
        $name = $business['business_name'] ?? 'Cafe';
        // Teks konten demo masih menyebut nama template demo; tukar dengan nama bisnis pelanggan.
        array_walk_recursive($siteConfig, function (&$value) use ($siteConfig, $name): void {
            if (is_string($value)) {
                $value = str_replace($siteConfig['brand']['name'], $name, $value);
            }
        });

        $faqItems = collect($siteConfig['faq']['items'])->map(function (array $item) use ($name, $business): array {
            if (isset($item['keywords'])) {
                match (true) {
                    in_array('lokasi', $item['keywords'], true) => $item['answer'] = $name.' ada di '.($business['address'] ?? '').', '.($business['city'] ?? '').'.',
                    in_array('whatsapp', $item['keywords'], true) => $item['answer'] = 'Hubungi kami di '.($business['whatsapp'] ?? '').' atau chat langsung lewat tombol WhatsApp bulat di pojok kanan bawah layar.',
                    default => null,
                };
            }

            return $item;
        });

        $addressUrl = ($business['address_url'] ?? '') ?: ($siteConfig['contact']['maps_url'] ?? '');

        return array_replace($siteConfig, [
            'brand' => array_replace($siteConfig['brand'], ['tagline' => ($business['tagline'] ?? null) ?: 'Café & Eatery']),
            'contact' => [
                'phone' => $business['whatsapp'] ?? '',
                'wa_number' => $whatsapp,
                'email' => $order->user?->email ?? '',
                'address' => $business['address'] ?? '',
                'address_short' => $business['address'] ?? '',
                'maps_url' => $addressUrl,
            ],
            'socials' => $instagram === '' ? [] : [['key' => 'instagram', 'label' => 'Instagram', 'url' => 'https://instagram.com/'.$instagram]],
            'topbar_socials' => $instagram === '' ? [] : ['instagram'],
            'hero' => array_replace($siteConfig['hero'], [
                'subtitle' => ($business['tagline'] ?? null) ?: 'Café & Eatery',
                'text' => ($business['description'] ?? null) ?: 'Tempat nyaman untuk menikmati kopi, makanan, dan kebersamaan.',
            ]),
            'whatsapp' => array_replace($siteConfig['whatsapp'], ['message' => 'Halo '.$name.', saya ingin bertanya.']),
            'reservation' => array_replace($siteConfig['reservation'], ['wa_title' => 'Halo '.$name.', saya ingin reservasi meja:']),
            'faq' => array_replace($siteConfig['faq'], ['items' => $faqItems]),
        ]);
    }


}
