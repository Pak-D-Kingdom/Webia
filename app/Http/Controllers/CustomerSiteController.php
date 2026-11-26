<?php

namespace App\Http\Controllers;

use App\Models\WebiaOrder;
use App\Services\AiQuotaService;
use App\Services\CustomerSite\Concerns\HandlesCategorySitesA;
use App\Services\CustomerSite\Concerns\HandlesCategorySitesB;
use App\Services\CustomerSite\Concerns\HandlesConfigCategorySites;
use App\Services\CustomerSite\Concerns\ResolvesTenantTemplates;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Throwable;

class CustomerSiteController extends Controller
{
    use HandlesCategorySitesA;
    use HandlesCategorySitesB;
    use HandlesConfigCategorySites;
    use ResolvesTenantTemplates;

    public function __invoke(WebiaOrder $order, ?string $page = null): Response
    {
        abort_unless(
            $order->delivery_status === 'delivered'
            && $order->supportsCustomerSite(),
            404,
        );

        $order->loadMissing(['template', 'user']);

        $pageKey = $page ?? 'home';
        $tenantVersion = Cache::get("webia_site_ver:{$order->site_slug}", 1);
        $globalVersion = Cache::get('webia_site_global_ver', 1);
        $cacheKey = "webia_site_html:{$order->site_slug}:g{$globalVersion}:v{$tenantVersion}:".md5($pageKey);

        $html = Cache::get($cacheKey);
        $cacheHit = is_string($html);
        if (! $cacheHit) {
            $lock = Cache::lock("{$cacheKey}:lock", 15);
            if ($lock->get()) {
                try {
                    $html = Cache::remember($cacheKey, now()->addHours(6), fn (): string => $this->renderCustomerSite($order, $page));
                } finally {
                    $lock->release();
                }
            } else {
                $html = Cache::get($cacheKey);
                if (! is_string($html)) {
                    $html = Cache::remember($cacheKey, now()->addHours(6), fn (): string => $this->renderCustomerSite($order, $page));
                }
            }
        }

        Log::debug('webia.customer_site.cache', [
            'tenant_id' => $order->site_slug,
            'page' => $pageKey,
            'state' => $cacheHit ? 'hit' : 'miss',
        ]);

        $html = str_replace('__WEBIA_CSRF_TOKEN__', csrf_token(), $html);

        return response($html)
            ->header('X-Webia-Cache', $cacheHit ? 'HIT' : 'MISS')
            ->header('Cache-Control', 'private, no-cache, must-revalidate');
    }

    private function renderCustomerSite(WebiaOrder $order, ?string $page): string
    {
        $rendered = $this->renderCustomerSiteHtml($order, $page);

        if ($rendered instanceof Response) {
            return (string) $rendered->getContent();
        }

        if ($rendered instanceof View) {
            return $rendered->render();
        }

        return (string) $rendered;
    }

    private function renderCustomerSiteHtml(WebiaOrder $order, ?string $page = null): View|Response
    {

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


    public function chat(Request $request, WebiaOrder $order): JsonResponse
    {
        abort_unless(
            $order->delivery_status === 'delivered' && ! empty($order->site_slug),
            404
        );

        // Widget universal mengirim kontrak percakapan standar (messages),
        // sedangkan adapter UI template lama mengirim satu field message.
        $isWidgetProtocol = is_array($request->input('messages'));
        if ($isWidgetProtocol) {
            $request->validate([
                'messages' => 'required|array|min:1|max:20',
                'messages.*.role' => 'required|in:user,assistant',
                'messages.*.content' => 'required|string|min:1|max:1000',
            ]);
            $message = '';
            foreach (array_reverse($request->input('messages')) as $chatMessage) {
                if (($chatMessage['role'] ?? null) === 'user') {
                    $message = trim((string) ($chatMessage['content'] ?? ''));
                    break;
                }
            }
            abort_if($message === '', 422, 'Pesan pengguna tidak ditemukan.');
        } else {
            $request->validate([
                'message' => 'required|string|min:1|max:500',
            ]);
            $message = trim((string) $request->input('message'));
        }
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
            Log::warning('webia.ai_chat.quota_exhausted', [
                'tenant_id' => $order->site_slug,
                'template_slug' => $order->template?->slug ?? ($order->template_snapshot['slug'] ?? null),
            ]);

            $quotaReply = 'Mohon maaf, saat ini asisten AI tidak dapat digunakan. Silakan hubungi customer service kami langsung via WhatsApp agar pesan Anda segera dibantu!';
            if ($isWidgetProtocol) {
                return response()->json([
                    'success' => true,
                    'layer' => 'l4',
                    'message' => ['role' => 'assistant', 'content' => $quotaReply],
                    'meta' => ['quota_blocked' => true],
                    'whatsapp' => $waRaw,
                ]);
            }

            return response()->json([
                'status' => 'quota_exhausted',
                'reply' => $quotaReply,
                'whatsapp_url' => $waUrl,
                'whatsapp_number' => $waRaw,
            ]);
        }

        // Jalankan percakapan AI & catat konsumsi kuota hanya jika belum dicatat oleh AI Engine
        try {
            $replyData = AiQuotaService::simulateChat($order->site_slug, $message);
        } catch (Throwable $exception) {
            Log::error('webia.ai_chat.failed', [
                'tenant_id' => $order->site_slug,
                'template_slug' => $order->template?->slug ?? ($order->template_snapshot['slug'] ?? null),
                'exception' => $exception::class,
            ]);

            if ($isWidgetProtocol) {
                return response()->json([
                    'success' => false,
                    'message' => 'Asisten sedang mengalami kendala. Silakan hubungi customer service melalui WhatsApp.',
                ], 503);
            }

            return response()->json([
                'status' => 'fallback',
                'reply' => 'Mohon maaf, asisten sedang mengalami kendala. Silakan hubungi customer service kami melalui WhatsApp.',
                'whatsapp_url' => $waUrl,
            ], 503);
        }

        if (empty($replyData['engine_recorded'])) {
            AiQuotaService::recordUsage($order->site_slug);
        }

        Log::info('webia.ai_chat.completed', [
            'tenant_id' => $order->site_slug,
            'template_slug' => $order->template?->slug ?? ($order->template_snapshot['slug'] ?? null),
            'engine_recorded' => ! empty($replyData['engine_recorded']),
            'reply_available' => filled($replyData['reply'] ?? null),
        ]);

        $reply = $replyData['reply'] ?? 'Terima kasih atas pertanyaannya. Ada yang bisa kami bantu lagi?';
        if ($isWidgetProtocol) {
            return response()->json([
                'success' => true,
                'layer' => 'l4',
                'message' => ['role' => 'assistant', 'content' => $reply],
                'meta' => $replyData['meta'] ?? [],
                'tenant_id' => $order->site_slug,
                'tenant_name' => $business['business_name'] ?? null,
                'whatsapp' => $waRaw,
            ]);
        }

        return response()->json([
            'status' => 'success',
            'reply' => $reply,
            'whatsapp_url' => $waUrl,
        ]);
    }

    public function bridgeEvent(Request $request, WebiaOrder $order): JsonResponse
    {
        abort_unless($order->delivery_status === 'delivered' && ! empty($order->site_slug), 404);

        $event = $request->validate([
            'event' => 'required|in:loaded,adapter_bound,chat_started,chat_failed',
            'adapter' => 'nullable|string|max:80',
            'latency_ms' => 'nullable|integer|min:0|max:120000',
        ]);

        Log::info('webia.client_bridge.event', [
            'tenant_id' => $order->site_slug,
            'template_slug' => $order->template?->slug ?? ($order->template_snapshot['slug'] ?? null),
            ...$event,
        ]);

        return response()->json(['status' => 'recorded']);
    }
}
