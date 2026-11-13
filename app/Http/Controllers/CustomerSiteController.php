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

            // Integrasi Widget Chatbot: Kembali ke desain asli template website klien masing-masing
            $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

            return response($renderedHtml);
        }

        // 2. Fallback ke sistem config template lama jika view khusus belum terdaftar
        $page = $page ?? 'home';
        [$pageSection, $pageIdentifier] = array_pad(explode('/', $page, 2), 2, null);
        $siteConfigPath = $order->siteConfigPath();
        abort_unless($siteConfigPath !== null, 404);

        $isBrandingAgency = str_starts_with($siteConfigPath, 'professional-service/artistic/branding-creative-agency-terracotta/');
        $isRetail = str_starts_with($siteConfigPath, 'retail/');
        $isHealthcare = str_starts_with($siteConfigPath, 'healthcare/');
        $isProperty = str_starts_with($siteConfigPath, 'property/');
        $isElearning = str_starts_with($siteConfigPath, 'e-learning/');
        $pageKey = match (true) {
            $pageIdentifier !== null && $pageSection === 'blog' => 'blog.show',
            $pageIdentifier !== null && $pageSection === 'property' => 'property.show',
            $pageIdentifier !== null && $pageSection === 'properties' => 'property.show',
            default => $page,
        };
        $views = match (true) {
            $isBrandingAgency => array_fill_keys(['home', 'layanan', 'keahlian', 'portofolio', 'janji'], 'branding-creative-agency'),
            str_starts_with($siteConfigPath, 'company/') => ['home' => 'index', 'tentang-kami' => 'tentang-kami', 'portofolio' => 'portofolio'],
            str_starts_with($siteConfigPath, 'retail/luxury/') => ['home' => 'index', 'catalog' => 'catalog', 'price' => 'price', 'stock' => 'stock', 'inquiry' => 'inquiry', 'shop' => 'shop'],
            str_starts_with($siteConfigPath, 'retail/organic/') => ['home' => 'index', 'katalog' => 'catalog', 'harga' => 'price', 'stok' => 'stock', 'inquiry' => 'inquiry', 'belanja' => 'shop'],
            str_starts_with($siteConfigPath, 'retail/premium-minimal/') => ['home' => 'index', 'katalog' => 'katalog', 'harga' => 'harga', 'ketersediaan' => 'ketersediaan', 'inquiry' => 'inquiry', 'keranjang' => 'keranjang'],
            str_starts_with($siteConfigPath, 'healthcare/professional/') => ['home' => 'index', 'layanan' => 'services', 'dokter-staff' => 'doctors', 'jadwal' => 'schedule', 'appointment' => 'appointment', 'faq' => 'faq', 'kebijakan' => 'policy'],
            str_starts_with($siteConfigPath, 'healthcare/luxury/') => ['home' => 'index', 'services' => 'services', 'doctors' => 'doctors', 'schedule' => 'schedule', 'appointment' => 'appointment', 'faq' => 'faq', 'policy' => 'policy'],
            str_starts_with($siteConfigPath, 'healthcare/elegan/') => ['home' => 'index', 'layanan' => 'services', 'dokter' => 'doctors', 'jadwal' => 'schedule', 'booking' => 'appointment', 'faq' => 'faq', 'kebijakan' => 'policy'],
            str_starts_with($siteConfigPath, 'property/luxury/') => ['home' => 'index', 'property' => 'property', 'property.show' => 'property-detail', 'about' => 'about', 'gallery' => 'gallery', 'booking' => 'booking', 'blog' => 'blog', 'blog.show' => 'blog-detail', 'contact' => 'contact'],
            str_starts_with($siteConfigPath, 'property/premium-minimal/') => ['home' => 'index', 'properties' => 'properties', 'property.show' => 'property', 'about-us' => 'about', 'gallery' => 'gallery', 'booking' => 'booking', 'blog' => 'blog', 'blog.show' => 'article', 'contact' => 'contact'],
            str_starts_with($siteConfigPath, 'property/professional/') => ['home' => 'index', 'property' => 'property', 'specification' => 'specification', 'price' => 'price', 'about-us' => 'about', 'gallery' => 'gallery', 'booking' => 'booking', 'blog' => 'blog', 'blog.show' => 'blog-show', 'contact' => 'contact'],
            $isElearning => ['home' => 'index', 'programs' => 'programs', 'schedules' => 'schedules', 'teachers' => 'teachers', 'pricing' => 'pricing', 'registration' => 'registration', 'course-content' => 'course-content', 'member-area' => 'member-area'],
            default => ['home' => 'index', 'menu' => 'menu', 'reservasi' => 'reservasi'],
        };
        abort_unless(isset($views[$pageKey]), 404);

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
            str_starts_with($siteConfigPath, 'healthcare/professional/') => $this->cleanWhiteHealthcareConfig($siteConfig, $business, $whatsapp, $instagram),
            str_starts_with($siteConfigPath, 'healthcare/luxury/') => $this->champagneHealthcareConfig($siteConfig, $business, $whatsapp, $instagram),
            str_starts_with($siteConfigPath, 'healthcare/elegan/') => $this->roseGoldHealthcareConfig($siteConfig, $business, $whatsapp, $instagram),
            str_starts_with($siteConfigPath, 'property/luxury/') => $this->emeraldPropertyConfig($siteConfig, $business, $whatsapp, $instagram),
            str_starts_with($siteConfigPath, 'property/premium-minimal/') => $this->naturePropertyConfig($siteConfig, $business, $whatsapp, $instagram),
            str_starts_with($siteConfigPath, 'property/professional/') => $this->coralPropertyConfig($siteConfig, $business, $whatsapp, $instagram),
            str_starts_with($siteConfigPath, 'e-learning/modern/') => $this->oceanElearningConfig($siteConfig, $business, $whatsapp, $instagram),
            str_starts_with($siteConfigPath, 'e-learning/playful-colorful/') => $this->pastelElearningConfig($siteConfig, $business, $whatsapp, $instagram),
            str_starts_with($siteConfigPath, 'e-learning/futuristic/') => $this->darkElearningConfig($siteConfig, $business, $whatsapp, $instagram),
            str_starts_with($siteConfigPath, 'f&b/vintage/') => $this->vintageSiteConfig($siteConfig, $business, $order, $whatsapp, $instagram),
            str_starts_with($siteConfigPath, 'f&b/elegan/') => $this->eleganSiteConfig($siteConfig, $business, $order, $whatsapp, $instagram),
            default => $this->minimalisSiteConfig($siteConfig, $business, $order, $whatsapp, $instagram),
        };
        if (! str_starts_with($siteConfigPath, 'company/') && ! $isRetail && ! $isProperty) {
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
        $healthcarePageUrl = function (string $name = 'home', array|string $parameters = '') use ($pageUrl, $siteConfigPath): string {
            $url = $pageUrl($this->healthcarePageName($siteConfigPath, $name));

            return is_array($parameters) && $parameters !== []
                ? $url.'?'.http_build_query($parameters)
                : $url.$parameters;
        };
        $propertyPageUrl = function (string $name = 'home', array|string $parameters = [], string $hash = '') use ($pageUrl, $siteConfigPath): string {
            $parameters = is_array($parameters) ? $parameters : [$parameters];
            $page = $this->propertyPageName($siteConfigPath, $name, $parameters);

            return $pageUrl($page).$hash;
        };
        $emeraldRoute = fn (string $name = 'index', string $hash = '', array $parameters = []): string => $propertyPageUrl($name, $parameters, $hash);
        $elearningPageUrl = function (string $name = 'home', array $parameters = []) use ($pageUrl): string {
            $url = $pageUrl(Str::afterLast($name, '.'));

            return $parameters === [] ? $url : $url.'?'.http_build_query($parameters);
        };
        $assetPath = 'website-bisnis/template/'.$templatePath;
        $customerRoute = match (true) {
            $isRetail => $retailPageUrl,
            $isHealthcare => $healthcarePageUrl,
            $isProperty => $propertyPageUrl,
            $isElearning => $elearningPageUrl,
            default => $routeUrl,
        };
        $healthcareViewData = $isHealthcare ? [
            'clinic' => $siteConfig,
            'tpl' => $view,
            'rp' => '',
        ] : [];
        $propertyViewData = $isProperty ? $this->propertyViewData(
            $siteConfigPath,
            $siteConfig,
            $view,
            $pageKey,
            $pageIdentifier,
            $propertyPageUrl,
            $emeraldRoute,
        ) : [];
        $elearningViewData = $isElearning ? [
            str_starts_with($siteConfigPath, 'e-learning/playful-colorful/') ? 't' : 'e' => $siteConfig,
            'r' => $elearningPageUrl,
            'isActive' => fn (string $name): bool => Str::afterLast($name, '.') === $pageKey,
        ] : [];

        $renderedHtml = view($view.'.'.$views[$pageKey], array_merge([
            'order' => $order,
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
            'r' => $customerRoute,
            'ns' => $view,
            'active' => $isRetail ? $this->retailRouteKey($siteConfigPath, $page) : $views[$pageKey],
            'img' => str_starts_with($siteConfigPath, 'healthcare/luxury/')
                ? asset('images/'.$assetPath)
                : ($isRetail ? asset('images/'.$assetPath) : fn (string $file): string => asset('images/'.$path.'/'.$file)),
            'css' => asset('css/'.($isRetail ? $assetPath : $path).'/'.($isRetail ? 'skincare' : 'branding-creative-agency').'.css'),
            'js' => asset('js/'.($isRetail ? $assetPath : $path).'/'.($isRetail ? 'skincare' : 'branding-creative-agency').'.js'),
        ], $healthcareViewData, $propertyViewData, $elearningViewData))->render();

        if ($isProperty) {
            $renderedHtml = str_replace(
                ['GreenHaven', 'GreenEstate', 'Coral Homes'],
                $business['business_name'] ?? 'Agensi Properti',
                $renderedHtml,
            );
        }

        // Integrasi Widget Chatbot: Kembali ke desain asli template website klien masing-masing
        $renderedHtml = $this->attachAiChatWidget($renderedHtml, $order, $business, $whatsapp);

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
                'view' => 'website-bisnis.templates.property.hearthstone-property',
                'demo_name' => 'Hearthstone Property',
                'demo_short' => 'Hearthstone',
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

        return $html;
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
            $order->delivery_status === 'delivered' && ! empty($order->site_slug),
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
            $waDigits = '62'.substr($waDigits, 1);
        }
        $bizName = $business['business_name'] ?? 'Toko';
        $waUrl = "https://wa.me/{$waDigits}?text=".rawurlencode("Halo {$bizName}, saya ingin bertanya langsung seputar layanan dan produk Anda.");

        // Cek Kuota AI Tenant
        $quota = AiQuotaService::getTenantQuota(
            $order->site_slug,
            $order->package?->slug ?? 'pixel',
            (int) ($order->package?->chatbot_monthly_quota ?? 500)
        );

        if (! empty($quota['is_quota_exhausted'])) {
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

    /**
     * Integrasi cerdas AI Chatbot:
     * - Jika template website memiliki widget/panel chat bawaan, gunakan UI asli template dan hubungkan ke AI backend via bridge script.
     * - Jika template belum memiliki UI chat bawaan, sematkan widget floating yang temanya otomatis selaras dengan kategori template.
     */
    private function attachAiChatWidget(
        string $html,
        WebiaOrder $order,
        array $business,
        string $whatsapp
    ): string {
        $cleanWa = preg_replace('/[^0-9]/', '', $whatsapp);
        if (str_starts_with($cleanWa, '0')) {
            $cleanWa = '62' . substr($cleanWa, 1);
        }
        $bizName = $business['business_name'] ?? 'Toko';
        $waChatUrl = "https://wa.me/{$cleanWa}?text=" . rawurlencode("Halo {$bizName}, saya ingin bertanya mengenai layanan dan produk Anda.");
        $chatUrl = route('sites.chat', ['order' => $order->site_slug]);
        $csrfToken = csrf_token();

        // Gunakan widget UI bawaan asli template klien dan sambungkan langsung ke AI backend Webia
        $bridgeScript = <<<HTML
<script id="webia-native-ai-bridge">
(function() {
    const chatUrl = "{$chatUrl}";
    const csrfToken = "{$csrfToken}";
    const defaultWaUrl = "{$waChatUrl}";

    async function sendToAi(message) {
        const res = await fetch(chatUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ message: message })
        });
        if (!res.ok) throw new Error('HTTP ' + res.status);
        return await res.json();
    }

    // 1. Hooking untuk template dengan ask(q) & say(t, role) (Bengkel Otto, Glow Lab, Bangun Karsa, dll.)
    function bindAskHook() {
        if (typeof window.ask === 'function') {
            window.ask = async function(query) {
                if (!query || !query.trim()) return;
                const text = query.trim();

                if (typeof window.say === 'function') {
                    window.say(text, 'u');
                }

                let typingEl = null;
                const ms = document.getElementById('ms') || document.getElementById('msgs');
                if (ms) {
                    typingEl = document.createElement('div');
                    typingEl.className = 'm b webia-typing-note';
                    typingEl.style.cssText = 'opacity:0.75; font-style:italic;';
                    typingEl.textContent = 'Mengetik jawaban...';
                    ms.appendChild(typingEl);
                    ms.scrollTop = ms.scrollHeight;
                }

                try {
                    const data = await sendToAi(text);
                    if (typingEl) typingEl.remove();
                    const reply = data.reply || 'Ada yang bisa kami bantu seputar layanan kami?';

                    if (typeof window.say === 'function') {
                        window.say(reply, 'b');
                    }

                    const waLinkEl = document.getElementById('wa') || document.getElementById('cw') || document.getElementById('rw');
                    if (waLinkEl) {
                        waLinkEl.href = data.whatsapp_url || defaultWaUrl;
                    }
                } catch (err) {
                    if (typingEl) typingEl.remove();
                    if (typeof window.say === 'function') {
                        window.say('Mohon maaf, terjadi kendala jaringan. Silakan hubungi kami via WhatsApp.', 'b');
                    }
                }
            };
        }

        const cf = document.getElementById('cf');
        const ci = document.getElementById('ci');
        if (cf && ci) {
            cf.onsubmit = function(e) {
                e.preventDefault();
                const v = ci.value.trim();
                if (v) {
                    ci.value = '';
                    if (typeof window.ask === 'function') {
                        window.ask(v);
                    }
                }
            };
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', bindAskHook);
    } else {
        bindAskHook();
    }
    setTimeout(bindAskHook, 400);

    // 2. Hooking untuk Ruby Academy (input #msg, button #send, reply #reply)
    document.addEventListener('DOMContentLoaded', function() {
        const sendBtn = document.getElementById('send');
        const msgInput = document.getElementById('msg');
        const replySmall = document.getElementById('reply');
        if (sendBtn && msgInput) {
            sendBtn.onclick = async function(e) {
                e.preventDefault();
                const text = msgInput.value.trim();
                if (!text) return;
                if (replySmall) replySmall.textContent = 'Menghubungi asisten...';
                try {
                    const data = await sendToAi(text);
                    if (replySmall) replySmall.textContent = data.reply || 'Silakan hubungi WhatsApp kami.';
                    msgInput.value = '';
                } catch(err) {
                    if (replySmall) replySmall.textContent = 'Terjadi kesalahan jaringan.';
                }
            };
        }
    });

    // 3. Hooking untuk Laundry Mint Fresh (FreshBot AI masot robot)
    document.addEventListener('DOMContentLoaded', function() {
        const lwForm = document.querySelector('[data-lw-chat-form]');
        const lwLog = document.querySelector('[data-lw-chat-log]');
        const lwInput = document.getElementById('lw-chat-input');
        if (lwForm && lwLog) {
            function addLwMsg(role, text) {
                const el = document.createElement('div');
                el.className = 'lw-msg lw-msg--' + role;
                el.textContent = text;
                lwLog.appendChild(el);
                lwLog.scrollTop = lwLog.scrollHeight;
                return el;
            }

            async function handleLwSend(text) {
                if (!text || !text.trim()) return;
                addLwMsg('user', text.trim());
                const typing = addLwMsg('bot', 'Mengetik jawaban...');
                typing.style.opacity = '0.7';
                try {
                    const data = await sendToAi(text.trim());
                    typing.remove();
                    addLwMsg('bot', data.reply || 'Ada yang bisa kami bantu?');
                } catch (e) {
                    typing.remove();
                    addLwMsg('bot', 'Mohon maaf, terjadi kendala jaringan.');
                }
            }

            lwForm.addEventListener('submit', function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                if (lwInput && lwInput.value) {
                    const val = lwInput.value;
                    lwInput.value = '';
                    handleLwSend(val);
                }
            }, true);

            document.querySelectorAll('[data-lw-chat-topic]').forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    const q = this.textContent.trim();
                    handleLwSend(q);
                }, true);
            });
        }
    });

    // 4. Hooking untuk AgriTernak Organic (window.handleAiSubmit & window.appendAiMessage)
    function bindAgriHook() {
        if (typeof window.handleAiSubmit === 'function' || document.getElementById('ai-chat-box')) {
            window.handleAiSubmit = async function(event) {
                if (event) event.preventDefault();
                const input = document.getElementById('ai-input');
                if (!input) return;
                const query = input.value.trim();
                if (!query) return;

                if (typeof window.appendAiMessage === 'function') {
                    window.appendAiMessage(query, 'user');
                }
                input.value = '';

                const chatBox = document.getElementById('ai-chat-box');
                let typingDiv = null;
                if (chatBox) {
                    typingDiv = document.createElement('div');
                    typingDiv.className = 'flex items-start gap-3';
                    typingDiv.innerHTML = '<div class="p-3 rounded-2xl rounded-tl-none bg-organic-surface-container-high text-xs italic opacity-75">Mengetik balasan...</div>';
                    chatBox.appendChild(typingDiv);
                    chatBox.scrollTop = chatBox.scrollHeight;
                }

                try {
                    const data = await sendToAi(query);
                    if (typingDiv) typingDiv.remove();
                    if (typeof window.appendAiMessage === 'function') {
                        window.appendAiMessage(data.reply || 'Ada yang bisa kami bantu seputar agrikultur organik?', 'bot');
                    }
                } catch(e) {
                    if (typingDiv) typingDiv.remove();
                    if (typeof window.appendAiMessage === 'function') {
                        window.appendAiMessage('Mohon maaf, terjadi kendala jaringan.', 'bot');
                    }
                }
            };
        }
    }
    setTimeout(bindAgriHook, 400);

    // 5. Hooking untuk Azure Smile Clinic (#ascChatForm, #ascChatInput, #ascChatMessages)
    document.addEventListener('DOMContentLoaded', function() {
        const ascForm = document.getElementById('ascChatForm');
        const ascInput = document.getElementById('ascChatInput');
        const ascMsgs = document.getElementById('ascChatMessages');
        if (ascForm && ascMsgs) {
            function addAscBubble(text, isUser) {
                const p = document.createElement('p');
                p.className = 'asc-chat-bubble';
                if (isUser) {
                    p.style.cssText = 'background:var(--asc-primary,#0070f3); color:#fff; align-self:flex-end; border-radius:12px 12px 0 12px; margin-left:auto;';
                }
                p.textContent = text;
                ascMsgs.appendChild(p);
                ascMsgs.scrollTop = ascMsgs.scrollHeight;
                return p;
            }

            async function handleAscChat(text) {
                if (!text || !text.trim()) return;
                addAscBubble(text.trim(), true);
                const typing = addAscBubble('Mengetik jawaban...', false);
                typing.style.opacity = '0.7';
                try {
                    const data = await sendToAi(text.trim());
                    typing.remove();
                    addAscBubble(data.reply || 'Ada yang bisa kami bantu mengenai perawatan gigi Anda?', false);
                } catch(e) {
                    typing.remove();
                    addAscBubble('Mohon maaf, terjadi gangguan jaringan.', false);
                }
            }

            ascForm.addEventListener('submit', function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                if (ascInput && ascInput.value) {
                    const q = ascInput.value;
                    ascInput.value = '';
                    handleAscChat(q);
                }
            }, true);

            document.querySelectorAll('.asc-chat-quick button').forEach(function(b) {
                b.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    handleAscChat(this.textContent.trim());
                }, true);
            });
        }
    });

    // 6. Hooking untuk Laut Biru Seafood (#lb-chat-form, #lb-chat-input, #lb-messages)
    document.addEventListener('DOMContentLoaded', function() {
        const lbForm = document.getElementById('lb-chat-form');
        const lbInput = document.getElementById('lb-chat-input');
        const lbMsgs = document.getElementById('lb-messages');
        if (lbForm && lbMsgs) {
            function addLbMsg(text, isUser) {
                const div = document.createElement('div');
                div.className = isUser ? 'lb-msg lb-msg-user' : 'lb-msg lb-msg-bot';
                div.style.cssText = isUser ? 'background:var(--lb-blue,#0284c7); color:#fff; align-self:flex-end; border-radius:12px 12px 2px 12px; padding:8px 12px; max-width:85%; margin-bottom:8px;' : 'background:#f1f5f9; color:#0f172a; align-self:flex-start; border-radius:12px 12px 12px 2px; padding:8px 12px; max-width:85%; margin-bottom:8px;';
                div.textContent = text;
                lbMsgs.appendChild(div);
                lbMsgs.scrollTop = lbMsgs.scrollHeight;
                return div;
            }

            async function handleLbChat(text) {
                if (!text || !text.trim()) return;
                addLbMsg(text.trim(), true);
                const typing = addLbMsg('Mengetik jawaban...', false);
                typing.style.opacity = '0.7';
                try {
                    const data = await sendToAi(text.trim());
                    typing.remove();
                    addLbMsg(data.reply || 'Ada yang bisa kami bantu seputar menu seafood?', false);
                } catch(e) {
                    typing.remove();
                    addLbMsg('Mohon maaf, terjadi kendala jaringan.', false);
                }
            }

            lbForm.addEventListener('submit', function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                if (lbInput && lbInput.value) {
                    const q = lbInput.value;
                    lbInput.value = '';
                    handleLbChat(q);
                }
            }, true);
        }
    });

    // 7. Hooking untuk Arya Sanjaya (window.handleAiChat, #ai-input, #ai-chat-body)
    function bindAryaHook() {
        if (typeof window.handleAiChat === 'function' || document.getElementById('ai-modal-box')) {
            window.handleAiChat = async function(e) {
                if (e) e.preventDefault();
                const input = document.getElementById('ai-input');
                if (!input) return;
                const query = input.value.trim();
                if (!query) return;

                const chatBody = document.getElementById('ai-chat-body');
                if (chatBody) {
                    const userDiv = document.createElement('div');
                    userDiv.className = 'flex gap-3 justify-end';
                    userDiv.innerHTML = '<div class="p-3 bg-arya-ruby-800 text-white rounded text-xs max-w-[80%] leading-relaxed">' + query + '</div>';
                    chatBody.appendChild(userDiv);

                    const typingDiv = document.createElement('div');
                    typingDiv.className = 'flex gap-3';
                    typingDiv.innerHTML = '<div class="p-3 bg-white border border-stone-200 rounded text-xs text-stone-500 italic">Mengetik balasan...</div>';
                    chatBody.appendChild(typingDiv);
                    chatBody.scrollTop = chatBody.scrollHeight;

                    input.value = '';

                    try {
                        const data = await sendToAi(query);
                        typingDiv.remove();
                        const botDiv = document.createElement('div');
                        botDiv.className = 'flex gap-3';
                        botDiv.innerHTML = '<div class="p-3 bg-white border border-stone-200 rounded text-xs text-arya-charcoal-900 leading-relaxed shadow-sm">' + (data.reply || 'Ada yang bisa saya bantu seputar karya tulis saya?') + '</div>';
                        chatBody.appendChild(botDiv);
                        chatBody.scrollTop = chatBody.scrollHeight;
                    } catch(err) {
                        typingDiv.remove();
                    }
                }
            };
        }
    }
    setTimeout(bindAryaHook, 400);

    // 8. Hooking untuk CocoExpress (window.handleAiMessage, #aiChatBox, #aiInput, #chatMessages)
    function bindCocoHook() {
        if (typeof window.handleAiMessage === 'function' || document.getElementById('aiChatBox')) {
            window.handleAiMessage = async function(event) {
                if (event) event.preventDefault();
                const input = document.getElementById('aiInput');
                if (!input) return;
                const q = input.value.trim();
                if (!q) return;

                const chatMessages = document.getElementById('chatMessages');
                if (chatMessages) {
                    const uMsg = document.createElement('div');
                    uMsg.className = 'bg-coco-caramel text-white p-3 rounded-2xl rounded-tr-none text-right shadow-sm';
                    uMsg.textContent = q;
                    chatMessages.appendChild(uMsg);

                    const tMsg = document.createElement('div');
                    tMsg.className = 'bg-white p-3 rounded-2xl rounded-tl-none border border-coco-caramel/20 text-coco-dark italic opacity-75';
                    tMsg.textContent = 'ChocoBot sedang mencari info...';
                    chatMessages.appendChild(tMsg);
                    chatMessages.scrollTop = chatMessages.scrollHeight;

                    input.value = '';

                    try {
                        const data = await sendToAi(q);
                        tMsg.remove();
                        const bMsg = document.createElement('div');
                        bMsg.className = 'bg-white p-3 rounded-2xl rounded-tl-none border border-coco-caramel/20 text-coco-dark shadow-sm';
                        bMsg.textContent = data.reply || 'Ada yang bisa saya bantu seputar pengiriman paket Anda?';
                        chatMessages.appendChild(bMsg);
                        chatMessages.scrollTop = chatMessages.scrollHeight;
                    } catch(e) {
                        tMsg.remove();
                    }
                }
            };
        }
    }
    setTimeout(bindCocoHook, 400);

    // 9. Hooking untuk Artistic Terracotta Studio (window.sendChatMessage, #chat-input, #chat-messages)
    function bindTerraHook() {
        if (typeof window.sendChatMessage === 'function' || document.getElementById('ai-chat-modal')) {
            window.sendChatMessage = async function() {
                const input = document.getElementById('chat-input');
                if (!input) return;
                const q = input.value.trim();
                if (!q) return;

                const messagesContainer = document.getElementById('chat-messages');
                if (messagesContainer) {
                    const uDiv = document.createElement('div');
                    uDiv.className = 'flex justify-end';
                    uDiv.innerHTML = '<div class="bg-terra-700 text-terra-100 rounded-2xl rounded-tr-none p-3 text-xs max-w-[80%]">' + q + '</div>';
                    messagesContainer.appendChild(uDiv);

                    const tDiv = document.createElement('div');
                    tDiv.className = 'flex justify-start';
                    tDiv.innerHTML = '<div class="bg-terra-800 text-terra-200 border border-terra-700 rounded-2xl rounded-tl-none p-3 text-xs italic">Menyiapkan jawaban desain...</div>';
                    messagesContainer.appendChild(tDiv);
                    messagesContainer.scrollTop = messagesContainer.scrollHeight;

                    input.value = '';

                    try {
                        const data = await sendToAi(q);
                        tDiv.remove();
                        const bDiv = document.createElement('div');
                        bDiv.className = 'flex justify-start';
                        bDiv.innerHTML = '<div class="bg-terra-800 text-terra-100 border border-terra-700 rounded-2xl rounded-tl-none p-3 text-xs max-w-[80%]">' + (data.reply || 'Ada yang bisa saya bantu seputar interior dan furnitur?') + '</div>';
                        messagesContainer.appendChild(bDiv);
                        messagesContainer.scrollTop = messagesContainer.scrollHeight;
                    } catch(e) {
                        tDiv.remove();
                    }
                }
            };
        }
    }
    setTimeout(bindTerraHook, 400);

    // 10. Hooking untuk Wildtrail & Baitul Safar (#qb button, #ms)
    document.addEventListener('DOMContentLoaded', function() {
        const qb = document.getElementById('qb');
        const ms = document.getElementById('ms');
        if (qb && ms) {
            qb.addEventListener('click', async function(e) {
                const btn = e.target.closest('button');
                if (!btn) return;
                e.preventDefault();
                e.stopImmediatePropagation();
                const q = btn.textContent.trim();

                const uDiv = document.createElement('div');
                uDiv.className = 'm u';
                uDiv.textContent = q;
                ms.appendChild(uDiv);

                const tDiv = document.createElement('div');
                tDiv.className = 'm';
                tDiv.style.opacity = '0.75';
                tDiv.textContent = 'Mengetik balasan...';
                ms.appendChild(tDiv);
                ms.scrollTop = ms.scrollHeight;

                try {
                    const data = await sendToAi(q);
                    tDiv.remove();
                    const bDiv = document.createElement('div');
                    bDiv.className = 'm';
                    bDiv.textContent = data.reply || 'Ada yang bisa kami bantu?';
                    ms.appendChild(bDiv);
                    ms.scrollTop = ms.scrollHeight;
                } catch(err) {
                    tDiv.remove();
                }
            }, true);
        }
    });

    // 11. Hooking untuk Pawtopia Animal Care (.chips button, #msgs)
    document.addEventListener('DOMContentLoaded', function() {
        const pawChips = document.querySelector('#chat .chips');
        const pawMsgs = document.getElementById('msgs');
        if (pawChips && pawMsgs) {
            pawChips.addEventListener('click', async function(e) {
                const btn = e.target.closest('button');
                if (!btn) return;
                e.preventDefault();
                e.stopImmediatePropagation();
                const q = btn.textContent.trim();

                const uDiv = document.createElement('div');
                uDiv.className = 'm me';
                uDiv.textContent = q;
                pawMsgs.appendChild(uDiv);

                const tDiv = document.createElement('div');
                tDiv.className = 'm bot';
                tDiv.style.opacity = '0.75';
                tDiv.textContent = 'Sedang mencari info hewan...';
                pawMsgs.appendChild(tDiv);
                pawMsgs.scrollTop = pawMsgs.scrollHeight;

                try {
                    const data = await sendToAi(q);
                    tDiv.remove();
                    const bDiv = document.createElement('div');
                    bDiv.className = 'm bot';
                    bDiv.textContent = data.reply || 'Ada yang bisa kami bantu seputar anabul Anda?';
                    pawMsgs.appendChild(bDiv);
                    pawMsgs.scrollTop = pawMsgs.scrollHeight;
                } catch(err) {
                    tDiv.remove();
                }
            }, true);
        }
    });

    // 12. Hooking untuk Hearthstone Property (.cq button, #msgs)
    document.addEventListener('DOMContentLoaded', function() {
        const hearthCq = document.querySelector('#chat .cq');
        const msgs = document.getElementById('msgs');
        if (hearthCq && msgs) {
            hearthCq.addEventListener('click', async function(e) {
                const btn = e.target.closest('button');
                if (!btn) return;
                e.preventDefault();
                e.stopImmediatePropagation();
                const q = btn.textContent.trim();

                const uDiv = document.createElement('div');
                uDiv.className = 'm me';
                uDiv.textContent = q;
                msgs.appendChild(uDiv);

                const tDiv = document.createElement('div');
                tDiv.className = 'm bot';
                tDiv.style.opacity = '0.75';
                tDiv.textContent = 'Mengecek ketersediaan properti...';
                msgs.appendChild(tDiv);
                msgs.scrollTop = ms.scrollHeight;

                try {
                    const data = await sendToAi(q);
                    tDiv.remove();
                    const bDiv = document.createElement('div');
                    bDiv.className = 'm bot';
                    bDiv.textContent = data.reply || 'Ada yang bisa kami bantu mengenai unit hunian ini?';
                    msgs.appendChild(bDiv);
                    msgs.scrollTop = msgs.scrollHeight;
                } catch(err) {
                    tDiv.remove();
                }
            }, true);
        }
    });

    // 13. Hooking untuk IRONPULSE (#ch, [data-q], #ms)
    document.addEventListener('DOMContentLoaded', function() {
        const ch = document.getElementById('ch');
        if (ch) {
            ch.addEventListener('click', async function(e) {
                const btn = e.target.closest('[data-q]');
                if (!btn) return;
                e.preventDefault();
                e.stopImmediatePropagation();
                const q = btn.textContent.trim();

                const msPulse = document.getElementById('ms');
                if (msPulse) {
                    const uP = document.createElement('p');
                    uP.className = 'u';
                    uP.textContent = q;
                    msPulse.appendChild(uP);

                    const tP = document.createElement('p');
                    tP.style.opacity = '0.75';
                    tP.style.fontStyle = 'italic';
                    tP.textContent = 'Pulse AI sedang mengecek program...';
                    msPulse.appendChild(tP);
                    msPulse.scrollTop = msPulse.scrollHeight;

                    try {
                        const data = await sendToAi(q);
                        tP.remove();
                        const bP = document.createElement('p');
                        bP.textContent = data.reply || 'Ada yang ingin ditanyakan seputar latihan dan membership?';
                        msPulse.appendChild(bP);
                        msPulse.scrollTop = msPulse.scrollHeight;
                    } catch(err) {
                        tP.remove();
                    }
                }
            }, true);
        }
    });
})();
</script>
HTML;

        if (str_contains($html, '</body>')) {
            return str_replace('</body>', $bridgeScript . "\n</body>", $html);
        }
        return $html . $bridgeScript;
    }
}
