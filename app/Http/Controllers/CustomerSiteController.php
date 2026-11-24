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

        if (str_starts_with($siteConfigPath, 'automotive/')) {
            return $this->handleAutomotive($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'technology/')) {
            return $this->handleTechnology($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'beauty/')) {
            return $this->handleBeauty($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'fnb/')) {
            return $this->handleFnb($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'transportation-logistics/')) {
            return $this->handleTransportationLogistics($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'education/')) {
            return $this->handleEducation($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'sports-fitness/')) {
            return $this->handleSportsFitness($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'pet-animal-service/')) {
            return $this->handlePetAnimalService($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'photography/')) {
            return $this->handlePhotography($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'home-services/')) {
            return $this->handleHomeServices($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'nonprofit-community/')) {
            return $this->handleNonprofit($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'interior-architecture/')) {
            return $this->handleInterior($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'agriculture/')) {
            return $this->handleAgriculture($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'agriculture&farming/')) {
            return $this->handleAgricultureConfig($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'education-culture/')) {
            return $this->handleEducationCulture($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'specialty-beverage/')) {
            return $this->handleSpecialtyBeverage($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'retail-boutique/')) {
            return $this->handleRetailBoutique($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'personal-brand/')) {
            return $this->handlePersonalBrand($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'company-contractor/')) {
            return $this->handleCompanyContractor($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'property-standalone/')) {
            return $this->handlePropertyStandalone($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'wedding-standalone/') || str_starts_with($siteConfigPath, 'wedding-event/')) {
            return $this->handleWeddingStandalone($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'wedding-multi/')) {
            return $this->handleWeddingMulti($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'travel-baitul/')) {
            return $this->handleTravelBaitul($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'photography-creative-studio/futuristic/')) {
            return $this->handleUgcDarkMode($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'photography-creative-studio/')) {
            return $this->handlePhotographyConfig($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'interior&architecture/')) {
            return $this->handleInteriorConfig($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'nonprofit&community/')) {
            return $this->handleNonprofitConfig($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'travel&tourism/')) {
            return $this->handleTravelConfig($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'travel-standalone/')) {
            return $this->handleTravelStandalone($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'healthcare-standalone/')) {
            return $this->handleHealthcareStandalone($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'traditional-costume-rental/')) {
            return $this->handleTraditionalCostumeRental($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'libraries-digital-archives/')) {
            return $this->handleLibrariesDigitalArchives($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'food-subscription/')) {
            return $this->handleFoodSubscription($order, $siteConfigPath, $pageKey);
        }

        if (str_starts_with($siteConfigPath, 'professional-service/strike-branding-creative')) {
            return $this->handleStrikeBranding($order, $siteConfigPath, $pageKey);
        }
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

        if (! empty($order->site_slug) && isset($tenantTemplateMap[$order->site_slug])) {
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
        if (! empty($tenantTemplate['demo_name'])) {
            $replacements[$tenantTemplate['demo_name']] = $bizName;
        }
        if (! empty($tenantTemplate['demo_short']) && $tenantTemplate['demo_short'] !== ($tenantTemplate['demo_name'] ?? '')) {
            $replacements[$tenantTemplate['demo_short']] = $bizName;
        }

        if (! empty($tenantTemplate['demo_phone'])) {
            $replacements[$tenantTemplate['demo_phone']] = $phone;
        }

        if (! empty($tenantTemplate['demo_address'])) {
            $replacements[$tenantTemplate['demo_address']] = $address ?: ($bizName.', '.$city);
        }

        // Ganti nomor WhatsApp link (href="https://wa.me/...")
        $cleanWa = $this->whatsappNumber($phone);
        $html = preg_replace('/href="https?:\/\/wa\.me\/[0-9]+[^"]*"/i', 'href="https://wa.me/'.$cleanWa.'?text='.rawurlencode("Halo {$bizName}, saya ingin bertanya mengenai produk dan layanan Anda.").'"', $html);

        // Ganti <title> agar sesuai identitas klien
        $html = preg_replace('/<title>(.*?)<\/title>/i', '<title>'.e($bizName).' – Layanan Terbaik di '.e($city).'</title>', $html, 1);

        foreach ($replacements as $search => $replace) {
            if ($search !== '' && $search !== null) {
                $html = str_replace($search, $replace, $html);
            }
        }

        return $html;
    }

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
            $cleanWa = '62'.substr($cleanWa, 1);
        }
        $bizName = $business['business_name'] ?? 'Toko';
        $waChatUrl = "https://wa.me/{$cleanWa}?text=".rawurlencode("Halo {$bizName}, saya ingin bertanya mengenai layanan dan produk Anda.");
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

    // 1. Hooking untuk template dengan ask(q) & say(t, role)
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

    // 2. Hooking untuk UI chat dengan input #msg, button #send, dan elemen #reply
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

    // 3. Hooking untuk UI chat dengan [data-lw-chat-form] dan [data-lw-chat-log]
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

    // 4. Hooking untuk UI chat dengan window.handleAiSubmit & window.appendAiMessage
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

    // 5. Hooking untuk UI chat dengan #ascChatForm, #ascChatInput, #ascChatMessages
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

    // 6. Hooking untuk UI chat dengan #lb-chat-form, #lb-chat-input, #lb-messages
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

    // 7. Hooking untuk UI chat dengan window.handleAiChat, #ai-input, #ai-chat-body
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

    // 8. Hooking untuk UI chat dengan window.handleAiMessage, #aiChatBox, #aiInput, #chatMessages
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

    // 9. Hooking untuk UI chat dengan window.sendChatMessage, #chat-input, #chat-messages
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

    // 10. Hooking untuk UI chat dengan #qb button, #ms
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

    // 11. Hooking untuk UI chat dengan .chips button, #msgs
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

    // 12. Hooking untuk UI chat dengan .cq button, #msgs
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

    // 13. Hooking untuk UI chat dengan #ch, [data-q], #ms
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

    // 14. Hooking untuk UI chat dengan data-chat-form, data-chat-log, data-chat-ask
    document.addEventListener('DOMContentLoaded', function() {
        const hrForm = document.querySelector('[data-chat-form]');
        const hrLog = document.querySelector('[data-chat-log]');
        const hrInput = document.getElementById('hrChatInput') || document.querySelector('[data-chat-input]');
        if (hrForm && hrLog) {
            function addHrMsg(role, text) {
                const row = document.createElement('div');
                row.className = 'hr-msg hr-msg--' + role;
                row.innerHTML = '<div class="hr-bubble hr-bubble--' + role + '">' + text + '</div>';
                hrLog.appendChild(row);
                hrLog.scrollTop = hrLog.scrollHeight;
                return row;
            }

            async function handleHrSend(text) {
                if (!text || !text.trim()) return;
                addHrMsg('user', text.trim());
                const typing = addHrMsg('bot', 'Menghitung estimasi & jawaban...');
                typing.style.opacity = '0.7';
                try {
                    const data = await sendToAi(text.trim());
                    typing.remove();
                    addHrMsg('bot', data.reply || 'Ada yang bisa kami bantu seputar renovasi rumah?');
                } catch(e) {
                    typing.remove();
                    addHrMsg('bot', 'Mohon maaf, terjadi kendala jaringan.');
                }
            }

            hrForm.addEventListener('submit', function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                if (hrInput && hrInput.value) {
                    const q = hrInput.value;
                    hrInput.value = '';
                    handleHrSend(q);
                }
            }, true);

            document.querySelectorAll('[data-chat-ask]').forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    handleHrSend(this.getAttribute('data-chat-ask') || this.textContent.trim());
                }, true);
            });
        }
    });

    // 15. Hooking untuk UI chat dengan #rr-chat-form, #rr-chat-log, #rr-chat-input
    document.addEventListener('DOMContentLoaded', function() {
        const rrForm = document.getElementById('rr-chat-form');
        const rrLog = document.getElementById('rr-chat-log');
        const rrInput = document.getElementById('rr-chat-input');
        if (rrForm && rrLog) {
            function addRrMsg(role, text) {
                const el = document.createElement('div');
                el.className = 'rr-chat__msg rr-chat__msg--' + role;
                el.textContent = text;
                rrLog.appendChild(el);
                rrLog.scrollTop = rrLog.scrollHeight;
                return el;
            }

            async function handleRrSend(text) {
                if (!text || !text.trim()) return;
                addRrMsg('user', text.trim());
                const typing = addRrMsg('bot', 'Mengetik jawaban...');
                typing.style.opacity = '0.7';
                try {
                    const data = await sendToAi(text.trim());
                    typing.remove();
                    addRrMsg('bot', data.reply || 'Ada yang bisa kami bantu?');
                } catch(e) {
                    typing.remove();
                    addRrMsg('bot', 'Mohon maaf, terjadi kendala jaringan.');
                }
            }

            rrForm.addEventListener('submit', function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                if (rrInput && rrInput.value) {
                    const q = rrInput.value;
                    rrInput.value = '';
                    handleRrSend(q);
                }
            }, true);

            document.querySelectorAll('#rr-chat-quick button').forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    handleRrSend(this.textContent.trim());
                }, true);
            });
        }
    });

    // 16. Hooking untuk UI chat dengan .fd-chat__form, .fd-chat__body, .fd-chat__chips button
    document.addEventListener('DOMContentLoaded', function() {
        const fdForm = document.querySelector('.fd-chat__form');
        const fdBody = document.querySelector('.fd-chat__body');
        const fdInput = fdForm ? fdForm.querySelector('input') : null;
        if (fdForm && fdBody) {
            function addFdMsg(role, text) {
                const row = document.createElement('div');
                row.className = 'fd-chat__row fd-chat__row--' + role;
                row.innerHTML = '<div class="fd-chat__bubble">' + text + '</div>';
                fdBody.appendChild(row);
                fdBody.scrollTop = fdBody.scrollHeight;
                return row;
            }

            async function handleFdSend(text) {
                if (!text || !text.trim()) return;
                addFdMsg('user', text.trim());
                const typing = addFdMsg('bot', 'Menyiapkan info yayasan...');
                typing.style.opacity = '0.7';
                try {
                    const data = await sendToAi(text.trim());
                    typing.remove();
                    addFdMsg('bot', data.reply || 'Ada yang bisa kami bantu seputar program donasi?');
                } catch(e) {
                    typing.remove();
                    addFdMsg('bot', 'Mohon maaf, terjadi gangguan jaringan.');
                }
            }

            fdForm.addEventListener('submit', function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                if (fdInput && fdInput.value) {
                    const q = fdInput.value;
                    fdInput.value = '';
                    handleFdSend(q);
                }
            }, true);

            document.querySelectorAll('.fd-chat__chips button').forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    handleFdSend(this.textContent.trim());
                }, true);
            });
        }
    });

    // 17. Hooking untuk UI chat dengan [data-uh-chatbot]
    document.addEventListener('DOMContentLoaded', function() {
        const uhForm = document.querySelector('[data-uh-chatbot] form') || document.querySelector('.uh-chatwin__form');
        const uhBody = document.querySelector('.uh-chatwin__body') || document.querySelector('[data-uh-chatlog]');
        const uhInput = uhForm ? uhForm.querySelector('input') : null;
        if (uhForm && uhBody) {
            function addUhMsg(role, text) {
                const row = document.createElement('div');
                row.className = 'uh-chatwin__row uh-chatwin__row--' + role;
                row.innerHTML = '<div class="uh-chatwin__bubble">' + text + '</div>';
                uhBody.appendChild(row);
                uhBody.scrollTop = uhBody.scrollHeight;
                return row;
            }

            async function handleUhSend(text) {
                if (!text || !text.trim()) return;
                addUhMsg('user', text.trim());
                const typing = addUhMsg('bot', 'Muthawwif AI sedang mencari rincian paket...');
                typing.style.opacity = '0.7';
                try {
                    const data = await sendToAi(text.trim());
                    typing.remove();
                    addUhMsg('bot', data.reply || 'Ada yang bisa kami bantu seputar keberangkatan umrah & haji?');
                } catch(e) {
                    typing.remove();
                    addUhMsg('bot', 'Mohon maaf, terjadi gangguan jaringan.');
                }
            }

            uhForm.addEventListener('submit', function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                if (uhInput && uhInput.value) {
                    const q = uhInput.value;
                    uhInput.value = '';
                    handleUhSend(q);
                }
            }, true);

            document.querySelectorAll('.uh-chatwin__chips button').forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    handleUhSend(this.textContent.trim());
                }, true);
            });
        }
    });

    // 18. Hooking untuk UI chat dengan [data-bca-chat]
    document.addEventListener('DOMContentLoaded', function() {
        const bcaChat = document.querySelector('[data-bca-chat]');
        if (bcaChat) {
            const bcaForm = bcaChat.querySelector('form');
            const bcaLog = bcaChat.querySelector('[data-bca-chat-log]');
            const bcaInput = bcaForm ? bcaForm.querySelector('input') : null;

            if (bcaForm && bcaLog) {
                function addBcaMsg(text, role) {
                    const el = document.createElement('div');
                    el.className = 'bca-msg bca-msg--' + role;
                    const p = document.createElement('p');
                    p.textContent = text;
                    el.appendChild(p);
                    bcaLog.appendChild(el);
                    bcaLog.scrollTop = bcaLog.scrollHeight;
                    return el;
                }

                async function handleBcaSend(text) {
                    if (!text || !text.trim()) return;
                    addBcaMsg(text.trim(), 'me');
                    const typing = document.createElement('div');
                    typing.className = 'bca-msg bca-msg--bot';
                    typing.innerHTML = '<span class="bca-typing" aria-label="Sedang mengetik"><i></i><i></i><i></i></span>';
                    bcaLog.appendChild(typing);
                    bcaLog.scrollTop = bcaLog.scrollHeight;

                    try {
                        const data = await sendToAi(text.trim());
                        typing.remove();
                        addBcaMsg(data.reply || 'Ada yang bisa kami bantu seputar project branding Anda?', 'bot');
                    } catch(e) {
                        typing.remove();
                        addBcaMsg('Mohon maaf, terjadi kendala jaringan.', 'bot');
                    }
                }

                bcaForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    if (bcaInput && bcaInput.value) {
                        const q = bcaInput.value;
                        bcaInput.value = '';
                        handleBcaSend(q);
                    }
                }, true);

                bcaChat.querySelectorAll('[data-bca-quick]').forEach(function(btn) {
                    btn.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopImmediatePropagation();
                        const q = this.getAttribute('data-bca-quick') || this.textContent.trim();
                        handleBcaSend(q);
                    }, true);
                });
            }
        }

        // 19. Hooking untuk UI chat dengan #ai-chat-window, #ai-chat-messages, #ai-chat-input
        function bindSodaHook() {
            const sodaWindow = document.getElementById('ai-chat-window');
            const sodaMessages = document.getElementById('ai-chat-messages');
            const sodaInput = document.getElementById('ai-chat-input');
            if (!sodaWindow || !sodaMessages || !sodaInput) return;

            function escapeHtml(str) {
                const div = document.createElement('div');
                div.textContent = str;
                return div.innerHTML;
            }

            async function handleSodaAiSend(text) {
                if (!text || !text.trim()) return;
                const query = text.trim();
                sodaMessages.innerHTML += '<div class="bg-coral text-white p-2.5 rounded-2xl rounded-tr-none ml-8 font-medium">' + escapeHtml(query) + '</div>';
                sodaInput.value = '';
                sodaMessages.scrollTop = sodaMessages.scrollHeight;

                const typing = document.createElement('div');
                typing.className = 'bg-white p-2.5 rounded-2xl rounded-tl-none border border-plum/15 text-cocoa italic opacity-75';
                typing.textContent = 'SodaAI sedang menyusun rekomendasi menu keluarga...';
                sodaMessages.appendChild(typing);
                sodaMessages.scrollTop = sodaMessages.scrollHeight;

                try {
                    const data = await sendToAi(query);
                    typing.remove();
                    const replyDiv = document.createElement('div');
                    replyDiv.className = 'bg-white p-2.5 rounded-2xl rounded-tl-none border border-plum/15 text-cocoa leading-relaxed';
                    replyDiv.innerHTML = data.reply ? data.reply.replace(/\\n/g, '<br>') : 'Ada yang bisa SodaAI bantu seputar meal plan keluarga Anda?';
                    sodaMessages.appendChild(replyDiv);
                } catch (e) {
                    typing.remove();
                    const errDiv = document.createElement('div');
                    errDiv.className = 'bg-white p-2.5 rounded-2xl rounded-tl-none border border-red-200 text-red-600';
                    errDiv.textContent = 'Mohon maaf, terjadi kendala jaringan. Silakan hubungi kami via WhatsApp.';
                    sodaMessages.appendChild(errDiv);
                }
                sodaMessages.scrollTop = sodaMessages.scrollHeight;
            }

            window.handleAIChatSubmit = function(e) {
                if (e) {
                    e.preventDefault();
                    if (typeof e.stopImmediatePropagation === 'function') e.stopImmediatePropagation();
                }
                if (sodaInput && sodaInput.value) {
                    handleSodaAiSend(sodaInput.value);
                }
            };

            window.sendQuickAIPrompt = function(txt) {
                handleSodaAiSend(txt);
            };

            const sodaForm = sodaInput.closest('form');
            if (sodaForm && !sodaForm.dataset.webiaBound) {
                sodaForm.dataset.webiaBound = '1';
                sodaForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    if (sodaInput && sodaInput.value) {
                        handleSodaAiSend(sodaInput.value);
                    }
                }, true);
            }
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', bindSodaHook);
        } else {
            bindSodaHook();
        }
        setTimeout(bindSodaHook, 400);
        setTimeout(bindSodaHook, 900);

        // 20. Hooking untuk Swimming School (#ai-chat-window, #ai-messages, #ai-input, askCoachAI)
        function bindTirtaHook() {
            const tirtaMsgs = document.getElementById('ai-messages');
            const tirtaInput = document.getElementById('ai-input');
            if (!tirtaMsgs || !tirtaInput) return;

            async function handleTirtaAiSend(text) {
                if (!text || !text.trim()) return;
                const query = text.trim();

                const uMsg = document.createElement('div');
                uMsg.className = 'bg-aqua text-white p-3 rounded-2xl rounded-tr-none ml-auto max-w-[82%] font-medium shadow-sm';
                uMsg.textContent = query;
                tirtaMsgs.appendChild(uMsg);
                tirtaInput.value = '';
                tirtaMsgs.scrollTop = tirtaMsgs.scrollHeight;

                const typing = document.createElement('div');
                typing.className = 'bg-mint/30 text-navy p-3 rounded-2xl rounded-tl-none mr-auto max-w-[88%] font-medium shadow-sm italic opacity-75';
                typing.textContent = 'Coach Splash sedang mencari info program...';
                tirtaMsgs.appendChild(typing);
                tirtaMsgs.scrollTop = tirtaMsgs.scrollHeight;

                try {
                    const data = await sendToAi(query);
                    typing.remove();
                    const bMsg = document.createElement('div');
                    bMsg.className = 'bg-mint/30 text-navy p-3 rounded-2xl rounded-tl-none mr-auto max-w-[88%] font-medium shadow-sm leading-relaxed';
                    bMsg.innerHTML = (data.reply || 'Ada yang bisa Coach Splash bantu seputar program renang?').replace(/\\n/g, '<br>');
                    tirtaMsgs.appendChild(bMsg);
                } catch(e) {
                    typing.remove();
                    const err = document.createElement('div');
                    err.className = 'bg-red-50 text-red-600 p-2.5 rounded-2xl rounded-tl-none mr-auto max-w-[88%] text-xs';
                    err.textContent = 'Mohon maaf, terjadi kendala jaringan. Silakan hubungi WhatsApp kami.';
                    tirtaMsgs.appendChild(err);
                }
                tirtaMsgs.scrollTop = tirtaMsgs.scrollHeight;
            }

            window.askCoachAI = function(question) {
                handleTirtaAiSend(question);
            };

            const origHandleAIChatSubmit = window.handleAIChatSubmit;
            window.handleAIChatSubmit = function(e) {
                if (e) {
                    e.preventDefault();
                    if (typeof e.stopImmediatePropagation === 'function') e.stopImmediatePropagation();
                }
                if (tirtaInput && tirtaInput.value) {
                    handleTirtaAiSend(tirtaInput.value);
                } else if (typeof origHandleAIChatSubmit === 'function') {
                    origHandleAIChatSubmit(e);
                }
            };

            const tirtaForm = tirtaInput.closest('form');
            if (tirtaForm && !tirtaForm.dataset.webiaBound) {
                tirtaForm.dataset.webiaBound = '1';
                tirtaForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    if (tirtaInput && tirtaInput.value) {
                        handleTirtaAiSend(tirtaInput.value);
                    }
                }, true);
            }
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', bindTirtaHook);
        } else {
            bindTirtaHook();
        }
        setTimeout(bindTirtaHook, 400);
        setTimeout(bindTirtaHook, 900);

        // 21. Hooking untuk Museum & Heritage (Aethelgard, Aquaverse - sendAIMessage, #ai-input, #ai-chat-box)
        function bindMuseumHook() {
            const mChatBox = document.getElementById('ai-chat-box');
            const mInput = document.getElementById('ai-input');
            if (!mChatBox || !mInput) return;

            window.sendAIMessage = async function(e) {
                if (e) {
                    e.preventDefault();
                    if (typeof e.stopImmediatePropagation === 'function') e.stopImmediatePropagation();
                }
                const query = mInput.value.trim();
                if (!query) return;

                const uMsg = document.createElement('p');
                uMsg.innerHTML = '<strong>Pengunjung:</strong> ' + query.replace(/</g, '&lt;');
                mChatBox.appendChild(uMsg);
                mInput.value = '';
                mChatBox.scrollTop = mChatBox.scrollHeight;

                const typing = document.createElement('p');
                typing.style.opacity = '0.7';
                typing.style.fontStyle = 'italic';
                typing.textContent = 'Kurator AI sedang mencari arsip sejarah...';
                mChatBox.appendChild(typing);
                mChatBox.scrollTop = mChatBox.scrollHeight;

                try {
                    const data = await sendToAi(query);
                    typing.remove();
                    const bMsg = document.createElement('p');
                    bMsg.innerHTML = '<strong>Panduan AI:</strong> ' + (data.reply || 'Ada artefak atau informasi pameran yang ingin Anda ketahui?').replace(/\\n/g, '<br>');
                    mChatBox.appendChild(bMsg);
                } catch(err) {
                    typing.remove();
                    const errMsg = document.createElement('p');
                    errMsg.style.color = '#ef4444';
                    errMsg.textContent = 'Mohon maaf, terjadi kendala jaringan saat menghubungi Kurator AI.';
                    mChatBox.appendChild(errMsg);
                }
                mChatBox.scrollTop = mChatBox.scrollHeight;
            };

            const mForm = mInput.closest('form');
            if (mForm && !mForm.dataset.webiaBound) {
                mForm.dataset.webiaBound = '1';
                mForm.addEventListener('submit', window.sendAIMessage, true);
            }
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', bindMuseumHook);
        } else {
            bindMuseumHook();
        }
        setTimeout(bindMuseumHook, 400);
        setTimeout(bindMuseumHook, 900);
    });
})();
</script>
HTML;

        if (str_contains($html, '</body>')) {
            return str_replace('</body>', $bridgeScript."\n</body>", $html);
        }

        return $html.$bridgeScript;
    }
}
