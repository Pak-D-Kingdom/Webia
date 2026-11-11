<?php

namespace App\Http\Controllers;

use App\Models\WebiaOrder;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CustomerSiteController extends Controller
{
    public function __invoke(WebiaOrder $order, ?string $page = null): View
    {
        abort_unless(
            $order->delivery_status === 'delivered'
            && $order->supportsCustomerSite(),
            404,
        );

        $page = $page ?? 'home';
        $siteConfigPath = $order->siteConfigPath();
        abort_unless($siteConfigPath !== null, 404);

        $isBrandingAgency = str_starts_with($siteConfigPath, 'professional-service/artistic/branding-creative-agency-terracotta/');
        $isRetail = str_starts_with($siteConfigPath, 'retail/');
        $views = match (true) {
            $isBrandingAgency => array_fill_keys(['home', 'layanan', 'keahlian', 'portofolio', 'janji'], 'branding-creative-agency'),
            str_starts_with($siteConfigPath, 'company/') => ['home' => 'index', 'tentang-kami' => 'tentang-kami', 'portofolio' => 'portofolio'],
            str_starts_with($siteConfigPath, 'retail/luxury/') => ['home' => 'index', 'catalog' => 'catalog', 'price' => 'price', 'stock' => 'stock', 'inquiry' => 'inquiry', 'shop' => 'shop'],
            str_starts_with($siteConfigPath, 'retail/organic/') => ['home' => 'index', 'katalog' => 'catalog', 'harga' => 'price', 'stok' => 'stock', 'inquiry' => 'inquiry', 'belanja' => 'shop'],
            str_starts_with($siteConfigPath, 'retail/premium-minimal/') => ['home' => 'index', 'katalog' => 'katalog', 'harga' => 'harga', 'ketersediaan' => 'ketersediaan', 'inquiry' => 'inquiry', 'keranjang' => 'keranjang'],
            default => ['home' => 'index', 'menu' => 'menu', 'reservasi' => 'reservasi'],
        };
        abort_unless(isset($views[$page]), 404);

        $business = $order->business_data ?? [];
        $whatsapp = $this->whatsappNumber($business['whatsapp'] ?? '');
        $instagram = ltrim($business['instagram'] ?? '', '@');
        $siteConfig = config('template.'.str_replace('/', '.', $siteConfigPath));
        abort_unless(is_array($siteConfig), 404);

        $siteConfig = match (true) {
            $isBrandingAgency => $this->brandingAgencyConfig($siteConfig, $business, $whatsapp),
            str_starts_with($siteConfigPath, 'company/elegan/') => $this->terracottaCompanyConfig($siteConfig, $business, $whatsapp, $instagram),
            str_starts_with($siteConfigPath, 'company/modern/') => $this->oceanTealCompanyConfig($siteConfig, $business, $whatsapp, $instagram),
            str_starts_with($siteConfigPath, 'company/classic/') => $this->warmNeutralCompanyConfig($siteConfig, $business, $whatsapp, $instagram),
            str_starts_with($siteConfigPath, 'retail/luxury/') => $this->luxuryRetailConfig($siteConfig, $business, $whatsapp, $instagram),
            str_starts_with($siteConfigPath, 'retail/organic/') => $this->organicRetailConfig($siteConfig, $business, $whatsapp, $instagram),
            str_starts_with($siteConfigPath, 'retail/premium-minimal/') => $this->premiumRetailConfig($siteConfig, $business, $whatsapp, $instagram),
            str_starts_with($siteConfigPath, 'f&b/vintage/') => $this->vintageSiteConfig($siteConfig, $business, $order, $whatsapp, $instagram),
            str_starts_with($siteConfigPath, 'f&b/elegan/') => $this->eleganSiteConfig($siteConfig, $business, $order, $whatsapp, $instagram),
            default => $this->minimalisSiteConfig($siteConfig, $business, $order, $whatsapp, $instagram),
        };
        if (! str_starts_with($siteConfigPath, 'company/') && ! $isRetail) {
            config(['cafe' => $siteConfig]);
        }

        $templatePath = Str::beforeLast($siteConfigPath, '/');
        $path = 'website-bisnis/template/'.$templatePath;
        $view = str_replace('/', '.', $path);
        $pageUrl = fn (string $name = 'home', string $hash = ''): string => route('sites.show', [
            'order' => $order->site_slug,
            'page' => $name === 'home' ? null : $name,
        ]).$hash;
        $routeUrl = fn (string $name = 'home', string $hash = ''): string => $pageUrl(
            $isBrandingAgency && in_array($name, ['harga', 'brief'], true) ? 'janji' : $name,
            $hash,
        );
        $retailPageUrl = fn (string $name = 'home', string $hash = ''): string => $pageUrl(
            $this->retailPageName($siteConfigPath, $name),
            $hash,
        );
        $assetPath = 'website-bisnis/template/'.$templatePath;

        return view($view.'.'.$views[$page], [
            'v' => $view,
            'path' => $path,
            'page' => $page,
            'currentPage' => $page,
            'c' => $siteConfig,
            'cafe' => $siteConfig,
            'cfg' => $siteConfig,
            'skin' => $siteConfig,
            'siteConfig' => $siteConfig,
            'pageUrl' => $pageUrl,
            'routeUrl' => $routeUrl,
            'r' => $isRetail ? $retailPageUrl : $routeUrl,
            'rp' => null,
            'ns' => $view,
            'active' => $this->retailRouteKey($siteConfigPath, $page),
            'img' => $isRetail ? asset('images/'.$assetPath) : fn (string $file): string => asset('images/'.$path.'/'.$file),
            'css' => asset('css/'.($isRetail ? $assetPath : $path).'/'.($isRetail ? 'skincare' : 'branding-creative-agency').'.css'),
            'js' => asset('js/'.($isRetail ? $assetPath : $path).'/'.($isRetail ? 'skincare' : 'branding-creative-agency').'.js'),
        ]);
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
}
