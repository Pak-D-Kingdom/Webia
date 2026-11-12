<?php

namespace App\Http\Controllers;

use App\Models\WebiaOrder;
use App\Services\AiQuotaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CustomerSiteController extends Controller
{
    public function __invoke(WebiaOrder $order, ?string $page = null): View|Response
    {
        abort_unless(
            $order->delivery_status === 'delivered'
            && $order->supportsCustomerSite(),
            404,
        );

        $business = $order->business_data ?? [];
        $whatsapp = $this->whatsappNumber($business['whatsapp'] ?? '');
        $instagram = ltrim($business['instagram'] ?? '', '@');

        // 1. Cek apakah ada Template Khusus Klien (Dedicated Category Template)
        $tenantTemplate = $this->resolveTenantTemplateView($order);

        if ($tenantTemplate && view()->exists($tenantTemplate['view'])) {
            $renderedHtml = view($tenantTemplate['view'])->render();

            // Personalisasi konten teks, judul, nomor kontak, dan branding klien
            $renderedHtml = $this->personalizeTemplateHtml($renderedHtml, $tenantTemplate, $business, $order, $whatsapp, $instagram);

            // Injeksi otomatis widget AI Assistant & Zero Lost Lead Fallback dengan Tema Terpilih
            $rawWidgetTheme = $business['ai_widget_theme'] ?? ($order->business_data['ai_widget_theme'] ?? 'auto');
            $resolvedTheme = AiQuotaService::resolveWidgetTheme($rawWidgetTheme, $order->category_slug ?? '');

            $widgetHtml = view('components.site-ai-widget', [
                'order' => $order,
                'business' => $business,
                'whatsapp' => $whatsapp,
                'siteSlug' => $order->site_slug,
                'widgetTheme' => $resolvedTheme['slug'],
                'widgetIcon' => $resolvedTheme['icon'],
                'widgetThemeMeta' => $resolvedTheme,
            ])->render();

            if (str_contains($renderedHtml, '</body>')) {
                $renderedHtml = str_replace('</body>', $widgetHtml . "\n</body>", $renderedHtml);
            } else {
                $renderedHtml .= $widgetHtml;
            }

            return response($renderedHtml);
        }

        // 2. Fallback ke sistem config template lama jika view khusus belum terdaftar
        $page = $page ?? 'home';
        $siteConfigPath = $order->siteConfigPath();
        abort_unless($siteConfigPath !== null, 404);

        $views = str_starts_with($siteConfigPath, 'company/')
            ? ['home' => 'index', 'tentang-kami' => 'tentang-kami', 'portofolio' => 'portofolio']
            : ['home' => 'index', 'menu' => 'menu', 'reservasi' => 'reservasi'];
        abort_unless(isset($views[$page]), 404);

        $siteConfig = config('template.'.str_replace('/', '.', $siteConfigPath));
        abort_unless(is_array($siteConfig), 404);

        $siteConfig = match (true) {
            str_starts_with($siteConfigPath, 'company/elegan/') => $this->terracottaCompanyConfig($siteConfig, $business, $whatsapp, $instagram),
            str_starts_with($siteConfigPath, 'company/modern/') => $this->oceanTealCompanyConfig($siteConfig, $business, $whatsapp, $instagram),
            str_starts_with($siteConfigPath, 'company/classic/') => $this->warmNeutralCompanyConfig($siteConfig, $business, $whatsapp, $instagram),
            str_starts_with($siteConfigPath, 'f&b/vintage/') => $this->vintageSiteConfig($siteConfig, $business, $order, $whatsapp, $instagram),
            str_starts_with($siteConfigPath, 'f&b/elegan/') => $this->eleganSiteConfig($siteConfig, $business, $order, $whatsapp, $instagram),
            default => $this->minimalisSiteConfig($siteConfig, $business, $order, $whatsapp, $instagram),
        };
        if (! str_starts_with($siteConfigPath, 'company/')) {
            config(['cafe' => $siteConfig]);
        }

        $templatePath = Str::beforeLast($siteConfigPath, '/');
        $path = 'website-bisnis/template/'.$templatePath;
        $view = str_replace('/', '.', $path);
        $pageUrl = fn (string $name = 'home', string $hash = ''): string => route('sites.show', [
            'order' => $order->site_slug,
            'page' => $name === 'home' ? null : $name,
        ]).$hash;

        $renderedHtml = view($view.'.'.$views[$page], [
            'order' => $order,
            'v' => $view,
            'path' => $path,
            'currentPage' => $page,
            'cafe' => $siteConfig,
            'siteConfig' => $siteConfig,
            'pageUrl' => $pageUrl,
            'routeUrl' => $pageUrl,
        ])->render();

        // Injeksi otomatis widget AI Assistant & Zero Lost Lead Fallback dengan Tema Terpilih
        $rawWidgetTheme = $business['ai_widget_theme'] ?? ($order->business_data['ai_widget_theme'] ?? 'auto');
        $resolvedTheme = AiQuotaService::resolveWidgetTheme($rawWidgetTheme, $order->category_slug ?? '');

        $widgetHtml = view('components.site-ai-widget', [
            'order' => $order,
            'business' => $business,
            'whatsapp' => $whatsapp,
            'siteSlug' => $order->site_slug,
            'widgetTheme' => $resolvedTheme['slug'],
            'widgetIcon' => $resolvedTheme['icon'],
            'widgetThemeMeta' => $resolvedTheme,
        ])->render();

        if (str_contains($renderedHtml, '</body>')) {
            $renderedHtml = str_replace('</body>', $widgetHtml . "\n</body>", $renderedHtml);
        } else {
            $renderedHtml .= $widgetHtml;
        }

        return response($renderedHtml);
    }

    /**
     * Resolusi template blade terbaik di Webia sesuai kategori dan profil tiap klien
     */
    public function resolveTenantTemplateView(WebiaOrder $order): ?array
    {
        $tenantTemplateMap = [
            'tenant_automotive_01' => [
                'view' => 'website-bisnis.templates.automotive.otto-artistic-workshop',
                'demo_name' => 'Bengkel Otto',
                'demo_short' => 'Otto',
                'demo_phone' => '0812-3456-7890',
                'demo_address' => 'Jalan Mesin Kencang No. 8, Bandung',
            ],
            'tenant_beauty_01' => [
                'view' => 'website-bisnis.templates.beauty.glow-lab-creative-beauty-clinic',
                'demo_name' => 'GLOW LAB',
                'demo_short' => 'glow lab',
                'demo_phone' => '0812-3456-7890',
                'demo_address' => 'Jl. Senopati No. 45, Jakarta Selatan',
            ],
            'tenant_laundry_01' => [
                'view' => 'website-bisnis.template.home-services.minimalis.laundry-mint-fresh.pages.index',
                'demo_name' => 'FreshWash Laundry',
                'demo_short' => 'FreshWash',
                'demo_phone' => '0812-3456-7890',
                'demo_address' => 'Jl. Pandanaran No. 102, Semarang',
            ],
            'tenant_agriculture_01' => [
                'view' => 'website-bisnis.templates.agriculture.agriternak-organic-ethical-precision',
                'demo_name' => 'AgriTernak Organic',
                'demo_short' => 'AgriTernak',
                'demo_phone' => '0812-3456-7890',
                'demo_address' => 'Kawasan Agro Mandiri, Malang',
            ],
            'tenant_healthcare_01' => [
                'view' => 'website-bisnis.templates.healthcare.dental.azure-smile-clinic',
                'demo_name' => 'Azure Smile Clinic',
                'demo_short' => 'Azure Smile',
                'demo_phone' => '0812-3456-7890',
                'demo_address' => 'Jl. Raya Darmo No. 45, Surabaya',
            ],
            'tenant_fnb_01' => [
                'view' => 'website-bisnis.templates.fnb.restaurant.laut-biru-seafood',
                'demo_name' => 'Laut Biru Seafood',
                'demo_short' => 'Laut Biru',
                'demo_phone' => '0812-3456-7890',
                'demo_address' => 'Jl. Malioboro No. 24, Yogyakarta',
            ],
            'tenant_personal_brand_01' => [
                'view' => 'website-bisnis.templates.personal-brand.author-writer.arya-sanjaya-ruby-editorial',
                'demo_name' => 'Arya Sanjaya',
                'demo_short' => 'AryaSanjaya',
                'demo_phone' => '0812-3456-7890',
                'demo_address' => 'Jakarta Barat',
            ],
            'tenant_pet_01' => [
                'view' => 'website-bisnis.templates.pet-animal-service.pawtopia-animal-care',
                'demo_name' => 'Pawtopia Animal Care',
                'demo_short' => 'Pawtopia',
                'demo_phone' => '0812-3456-7890',
                'demo_address' => 'Jl. Pajajaran No. 88, Bogor',
            ],
            'tenant_travel_01' => [
                'view' => 'website-bisnis.templates.travel-tourism.adventure-outdoor-tour.wildtrail.wildtrail',
                'demo_name' => 'WILDTRAIL',
                'demo_short' => 'Wildtrail',
                'demo_phone' => '0812-3456-7890',
                'demo_address' => 'Jl. Sunset Road No. 88, Denpasar Bali',
            ],
            'tenant_logistics_01' => [
                'view' => 'website-bisnis.templates.transportation-logistics.delivery-service.cocoexpress.cocoexpress',
                'demo_name' => 'COCOEXPRESS',
                'demo_short' => 'CocoExpress',
                'demo_phone' => '0812-3456-7890',
                'demo_address' => 'Kawasan Pergudangan Tanjung Priok, Jakarta Utara',
            ],
            'tenant_furniture_01' => [
                'view' => 'website-bisnis.templates.interior-architecture.interior-design-studio.artistic-terracotta.artistic-terracotta',
                'demo_name' => 'Terracotta Studio',
                'demo_short' => 'Terracotta',
                'demo_phone' => '0812-3456-7890',
                'demo_address' => 'Sentra Ukir Tahunan, Jepara',
            ],
            'tenant_umrah_01' => [
                'view' => 'website-bisnis.templates.travel-tourism.umrah-haji.baitul-safar.baitul-safar',
                'demo_name' => 'Baitul Safar Umrah & Haji',
                'demo_short' => 'Baitul Safar',
                'demo_phone' => '0812-3456-7890',
                'demo_address' => 'Jl. Ahmad Yani No. 120, Surabaya',
            ],
            'tenant_education_01' => [
                'view' => 'website-bisnis.templates.education.ruby-academy-classic-school',
                'demo_name' => 'Ruby Academy',
                'demo_short' => 'Ruby Academy',
                'demo_phone' => '0812-3456-7890',
                'demo_address' => 'Jl. Dago Asri No. 15, Bandung',
            ],
            'tenant_professional_service_01' => [
                'view' => 'website-bisnis.templates.company.bangun-karsa-contractor-professional',
                'demo_name' => 'Bangun Karsa Contractor',
                'demo_short' => 'Bangun Karsa',
                'demo_phone' => '0812-3456-7890',
                'demo_address' => 'Gedung Wisma Antara Lt. 8, Jakarta Pusat',
            ],
            'tenant_fitness_01' => [
                'view' => 'website-bisnis.templates.sports-fitness.gym-fitness-center.ironpulse.ironpulse',
                'demo_name' => 'IRONPULSE Mega Athletic Gym',
                'demo_short' => 'IRONPULSE',
                'demo_phone' => '0812-3456-7890',
                'demo_address' => 'Jl. Senopati Raya No. 88, Surabaya',
            ],
            'tenant_property_01' => [
                'view' => 'website-bisnis.templates.property.property-traditional',
                'demo_name' => 'Pusaka Asri Residence',
                'demo_short' => 'Pusaka Asri',
                'demo_phone' => '0812-3456-7890',
                'demo_address' => 'Kawasan Residensial Asri, Surabaya',
            ],
        ];

        if (!empty($order->site_slug) && isset($tenantTemplateMap[$order->site_slug])) {
            return $tenantTemplateMap[$order->site_slug];
        }

        // Cek apakah order memiliki template DB dengan preview_view
        if ($order->template && filled($order->template->preview_view) && view()->exists($order->template->preview_view)) {
            return [
                'view' => $order->template->preview_view,
                'demo_name' => $order->template->name,
                'demo_short' => $order->template->name,
                'demo_phone' => '0812-3456-7890',
                'demo_address' => 'Indonesia',
            ];
        }

        return null;
    }

    /**
     * Personalisasi HTML template dengan data autentik bisnis klien
     */
    private function personalizeTemplateHtml(
        string $html,
        array $tenantTemplate,
        array $business,
        WebiaOrder $order,
        string $whatsapp,
        string $instagram
    ): string {
        $bizName = $business['business_name'] ?? 'Bisnis';
        $ownerName = $business['owner_name'] ?? $order->user?->name ?? 'Pemilik';
        $phone = $business['whatsapp'] ?? '081234567890';
        $city = $business['city'] ?? 'Indonesia';
        $address = $this->businessAddress($business);

        $replacements = [];

        // Prioritas penggantian nama demo
        if (!empty($tenantTemplate['demo_name'])) {
            $replacements[$tenantTemplate['demo_name']] = $bizName;
        }
        if (!empty($tenantTemplate['demo_short']) && $tenantTemplate['demo_short'] !== ($tenantTemplate['demo_name'] ?? '')) {
            $replacements[$tenantTemplate['demo_short']] = $bizName;
        }

        if (!empty($tenantTemplate['demo_phone'])) {
            $replacements[$tenantTemplate['demo_phone']] = $phone;
        }

        if (!empty($tenantTemplate['demo_address'])) {
            $replacements[$tenantTemplate['demo_address']] = $address ?: ($bizName . ', ' . $city);
        }

        // Ganti nomor WhatsApp link (href="https://wa.me/...")
        $cleanWa = $this->whatsappNumber($phone);
        $html = preg_replace('/href="https?:\/\/wa\.me\/[0-9]+[^"]*"/i', 'href="https://wa.me/' . $cleanWa . '?text=' . rawurlencode("Halo {$bizName}, saya ingin bertanya mengenai produk dan layanan Anda.") . '"', $html);

        // Ganti <title> agar sesuai identitas klien
        $html = preg_replace('/<title>(.*?)<\/title>/i', '<title>' . e($bizName) . ' – Layanan Terbaik di ' . e($city) . '</title>', $html, 1);

        foreach ($replacements as $search => $replace) {
            if ($search !== '' && $search !== null) {
                $html = str_replace($search, $replace, $html);
            }
        }

        // Sembunyikan floating button atau chat demo bawaan template statis agar tidak tabrakan dengan widget AI resmi Webia
        $html = str_replace(
            ['id="chat"', 'id="fab"', 'class="classic-chat-panel"', 'id="classic-chat-panel"'],
            ['id="chat" style="display:none!important;"', 'id="fab" style="display:none!important;"', 'class="classic-chat-panel" style="display:none!important;"', 'id="classic-chat-panel" style="display:none!important;"'],
            $html
        );

        return $html;
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

    private function replaceDemoName(array &$siteConfig, string $demoName, string $name): void
    {
        array_walk_recursive($siteConfig, function (&$value) use ($demoName, $name): void {
            if (is_string($value)) {
                $value = str_replace($demoName, $name, $value);
            }
        });
    }

    private function businessAddress(array $business): string
    {
        return trim(($business['address'] ?? '').($business['city'] ?? '' ? ', '.$business['city'] : ''));
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

    private function whatsappNumber(string $number): string
    {
        $digits = preg_replace('/\D/', '', $number) ?? '';

        return Str::startsWith($digits, '0') ? '62'.substr($digits, 1) : $digits;
    }

    /**
     * Endpoint API publik percakapan asisten AI live site klien
     * dilengkapi fitur proteksi kuota & Zero Lost Lead Fallback.
     */
    public function chat(Request $request, WebiaOrder $order): JsonResponse
    {
        abort_unless(
            $order->delivery_status === 'delivered' && !empty($order->site_slug),
            404
        );

        $request->validate([
            'message' => 'required|string|min:1|max:500',
        ]);

        $message = trim((string) $request->input('message'));
        $business = $order->business_data ?? [];
        $waRaw = $business['whatsapp'] ?? '081234567890';
        $waDigits = preg_replace('/[^0-9]/', '', $waRaw);
        if (str_starts_with($waDigits, '0')) {
            $waDigits = '62' . substr($waDigits, 1);
        }
        $bizName = $business['business_name'] ?? 'Toko';
        $waUrl = "https://wa.me/{$waDigits}?text=" . rawurlencode("Halo {$bizName}, saya ingin bertanya langsung seputar layanan dan produk Anda.");

        // Cek Kuota AI Tenant
        $quota = AiQuotaService::getTenantQuota(
            $order->site_slug,
            $order->package?->slug ?? 'pixel',
            (int) ($order->package?->chatbot_monthly_quota ?? 500)
        );

        if (!empty($quota['is_quota_exhausted'])) {
            return response()->json([
                'status' => 'quota_exhausted',
                'reply' => 'Mohon maaf, saat ini asisten AI tidak dapat digunakan. Silakan hubungi customer service kami langsung via WhatsApp agar pesan Anda segera dibantu!',
                'whatsapp_url' => $waUrl,
                'whatsapp_number' => $waRaw,
            ]);
        }

        // Jalankan percakapan AI & catat konsumsi kuota hanya jika belum dicatat oleh AI Engine
        $replyData = AiQuotaService::simulateChat($order->site_slug, $message);
        if (empty($replyData['engine_recorded'])) {
            AiQuotaService::recordUsage($order->site_slug);
        }

        return response()->json([
            'status' => 'success',
            'reply' => $replyData['reply'] ?? 'Terima kasih atas pertanyaannya. Ada yang bisa kami bantu lagi?',
            'whatsapp_url' => $waUrl,
        ]);
    }
}
