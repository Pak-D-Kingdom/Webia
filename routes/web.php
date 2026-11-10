<?php

use App\Http\Controllers\Admin\AdminAiQuotaController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\HostingInvoiceController as AdminHostingInvoiceController;
use App\Http\Controllers\Admin\HostingServiceController as AdminHostingServiceController;
use App\Http\Controllers\Admin\HostingTaskController as AdminHostingTaskController;
use App\Http\Controllers\Admin\WebiaAddonController;
use App\Http\Controllers\Admin\WebiaOrderController as AdminWebiaOrderController;
use App\Http\Controllers\Admin\WebiaPackageController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\CustomerAiController;
use App\Http\Controllers\CustomerSiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HostingInvoiceController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RubyRegisterController;
use App\Http\Controllers\WebiaOrderController;
use App\Http\Controllers\WebsiteBisnis\TemplateCollectionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\HtmlString;

// WEBIA — Homepage utama
Route::view('/', 'website-bisnis.index')->name('home');
Route::redirect('/webia', '/');

// Webhook & callback Midtrans — diluar middleware auth (dipanggil server Midtrans / redirect publik).
Route::post('/payments/midtrans/notify', [MidtransController::class, 'notify'])->middleware('throttle:60,1')->name('payments.midtrans.notify');
Route::get('/payments/midtrans/callback', [MidtransController::class, 'callback'])->middleware('throttle:30,1')->name('payments.midtrans.callback');

// Dev-only simulasi pembayaran; guest dari checkout publik juga boleh (dijaga di controller).
Route::get('/payments/midtrans/simulate/{payment}', [MidtransController::class, 'simulateShow'])->middleware('throttle:10,1')->name('payments.midtrans.simulate');
Route::post('/payments/midtrans/simulate/{payment}', [MidtransController::class, 'simulatePay'])->middleware('throttle:10,1')->name('payments.midtrans.simulate.pay');
Route::get('/payments/midtrans/hosting/simulate/{payment}', [MidtransController::class, 'simulateHostingShow'])->middleware(['auth', 'throttle:10,1'])->name('payments.midtrans.hosting.simulate');
Route::post('/payments/midtrans/hosting/simulate/{payment}', [MidtransController::class, 'simulateHostingPay'])->middleware(['auth', 'throttle:10,1'])->name('payments.midtrans.hosting.simulate.pay');
Route::get('/s/{order:site_slug}/{page?}', CustomerSiteController::class)
    ->whereIn('page', ['menu', 'reservasi'])
    ->name('sites.show');

Route::middleware('guest')->group(function (): void {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('throttle:6,1');
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->middleware('throttle:6,1')->name('password.email');
    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [NewPasswordController::class, 'store'])->middleware('throttle:6,1')->name('password.store');
});

// Buat pesanan bisa diakses guest: akun dibuat otomatis saat pesanan dikirim.
Route::get('/orders/create', [WebiaOrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [WebiaOrderController::class, 'store'])->middleware('throttle:10,1')->name('orders.store');
Route::get('/orders/{order}/payment-status', [WebiaOrderController::class, 'guestPaymentStatus'])->middleware(['signed', 'throttle:12,1'])->name('orders.payment-status');
Route::get('/orders/success', function () {
    if (! session('guest_order')) {
        return redirect()->route('home');
    }

    return view('orders.success');
})->name('orders.success');

Route::middleware('auth')->group(function (): void {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/ai-assistant', [CustomerAiController::class, 'index'])->name('customer.ai');
    Route::post('/ai-assistant/faq', [CustomerAiController::class, 'storeFaq'])->name('customer.ai.store-faq');
    Route::post('/ai-assistant/settings', [CustomerAiController::class, 'updateSettings'])->name('customer.ai.settings');
    Route::post('/ai-assistant/business-info', [CustomerAiController::class, 'updateBusinessInfo'])->name('customer.ai.business-info');
    Route::post('/ai-assistant/simulate', [CustomerAiController::class, 'simulateChat'])->name('customer.ai.simulate');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->middleware('throttle:6,1')->name('profile.update');
    Route::patch('/profile/password', [ProfileController::class, 'updatePassword'])->middleware('throttle:6,1')->name('profile.password');
    Route::get('/orders', [WebiaOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [WebiaOrderController::class, 'show'])->name('orders.show');
    Route::get('/orders/{order}/payment-status/live', [WebiaOrderController::class, 'authenticatedPaymentStatus'])->middleware('throttle:12,1')->name('orders.payment-status.authenticated');
    Route::post('/orders/{order}/receipt', [WebiaOrderController::class, 'uploadReceipt'])->middleware('throttle:5,1')->name('orders.receipt');
    Route::post('/orders/{order}/pay', [WebiaOrderController::class, 'pay'])->middleware('throttle:6,1')->name('orders.pay');
    Route::post('/orders/{order}/pay/check', [WebiaOrderController::class, 'checkStatus'])->middleware('throttle:10,1')->name('orders.pay.check');
    Route::post('/orders/{order}/business', [WebiaOrderController::class, 'saveBusinessData'])->middleware('throttle:10,1')->name('orders.business');
    Route::get('/hosting-invoices', [HostingInvoiceController::class, 'index'])->name('hosting-invoices.index');
    Route::get('/hosting-invoices/{hostingInvoice}', [HostingInvoiceController::class, 'show'])->name('hosting-invoices.show');
    Route::post('/hosting-invoices/{hostingInvoice}/pay', [HostingInvoiceController::class, 'pay'])->middleware('throttle:6,1')->name('hosting-invoices.pay');
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/read-all', [NotificationController::class, 'readAll'])->name('notifications.read-all');
    Route::post('/notifications/{notification}/read', [NotificationController::class, 'read'])->name('notifications.read');

    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function (): void {
        Route::get('/', AdminDashboardController::class)->name('dashboard');
        Route::resource('packages', WebiaPackageController::class)->except('show');
        Route::post('packages/{package}/toggle', [WebiaPackageController::class, 'toggle'])->name('packages.toggle');
        Route::resource('addons', WebiaAddonController::class)->except('show');
        Route::post('addons/{addon}/toggle', [WebiaAddonController::class, 'toggle'])->name('addons.toggle');
        Route::get('orders', [AdminWebiaOrderController::class, 'index'])->name('orders.index');
        Route::get('orders/{order}', [AdminWebiaOrderController::class, 'show'])->name('orders.show');
        Route::get('orders/{order}/receipt', [AdminWebiaOrderController::class, 'receipt'])->name('orders.receipt');
        Route::post('orders/{order}/verify', [AdminWebiaOrderController::class, 'verify'])->name('orders.verify');
        Route::post('orders/{order}/progress', [AdminWebiaOrderController::class, 'progress'])->name('orders.progress');
        Route::resource('hosting-services', AdminHostingServiceController::class)->only(['index', 'create', 'store', 'show']);
        Route::patch('hosting-services/{hostingService}/price', [AdminHostingServiceController::class, 'updatePrice'])->name('hosting-services.price');
        Route::patch('hosting-services/{hostingService}/stop', [AdminHostingServiceController::class, 'stop'])->name('hosting-services.stop');
        Route::post('hosting-invoices/{hostingInvoice}/cancel', [AdminHostingInvoiceController::class, 'cancel'])->name('hosting-invoices.cancel');
        Route::post('hosting-invoices/{hostingInvoice}/replace', [AdminHostingInvoiceController::class, 'replace'])->name('hosting-invoices.replace');
        Route::get('hosting-tasks', [AdminHostingTaskController::class, 'index'])->name('hosting-tasks.index');
        Route::post('hosting-tasks/{hostingTask}/complete', [AdminHostingTaskController::class, 'complete'])->name('hosting-tasks.complete');
        Route::get('ai-quotas', [AdminAiQuotaController::class, 'index'])->name('ai.index');
        Route::get('ai-quotas/export', [AdminAiQuotaController::class, 'export'])->name('ai.export');
        Route::post('ai-quotas/{tenant_id}/tier', [AdminAiQuotaController::class, 'updateTier'])->name('ai.update-tier');
        Route::get('ai-quotas/{tenant_id}/knowledge', [AdminAiQuotaController::class, 'getKnowledge'])->name('ai.knowledge.get');
        Route::post('ai-quotas/{tenant_id}/knowledge', [AdminAiQuotaController::class, 'saveKnowledge'])->name('ai.knowledge.save');
        Route::get('ai-quotas/{tenant_id}/unanswered', [AdminAiQuotaController::class, 'getUnanswered'])->name('ai.unanswered');
    });
});

// Route::view('/webia/koleksi', 'website-bisnis.collections.index')
//     ->name('webia.collections');

Route::get(
    '/webia/koleksi',
    [TemplateCollectionController::class, 'index']
)->name('collections');

Route::view(
    '/webia/template/nantara-architecture-traditional-cultural',
    'website-bisnis.templates.interior-architecture.architecture-building-design.nantara-architecture.nantara-architecture'
)->name('webia.template.nantara-architecture-traditional-cultural');

Route::view(
    '/webia/template/aurelia-home-renovation',
    'website-bisnis.templates.home-services.home-renovation-repair.aurelia.aurelia'
)->name('webia.template.aurelia-home-renovation');

Route::view(
    '/webia/template/matcha-clean-organic-deep-cleaning',
    'website-bisnis.templates.home-services.home-cleaning-deep-cleaning.matcha-clean.matcha-clean'
)->name('webia.template.matcha-clean-organic-deep-cleaning');

Route::view(
    '/webia/template/aurumco-catering',
    'website-bisnis.templates.fnb.aurumco-catering'
)->name('webia.template.aurumco-catering');

Route::view(
    '/webia/template/vallaco-catering',
    'website-bisnis.templates.fnb.vallaco-catering'
)->name('webia.template.vallaco-catering');
Route::view(
    '/webia/template/rasa-rupa-artistik',
    'website-bisnis.templates.fnb.rasa-rupa-artistik'
)->name('webia.template.fnb.rasa-rupa-artistik');
Route::view(
    '/webia/template/tetangga-kenyang-friendly',
    'website-bisnis.templates.fnb.tetangga-kenyang-friendly'
)->name('webia.template.fnb.tetangga-kenyang-friendly');
Route::view(
    '/webia/template/hulu-pantry-asal-usul',
    'website-bisnis.templates.fnb.hulu-pantry-asal-usul'
)->name('webia.template.fnb.hulu-pantry-asal-usul');
Route::view(
    '/webia/template/kusuma-ningrat-royal-heritage',
    'website-bisnis.templates.fnb.kusuma-ningrat-royal-heritage'
)->name('webia.template.kusuma-ningrat-royal-heritage');

Route::view(
    '/webia/template/nuvia-skin-tech-clinic',
    'website-bisnis.templates.beauty.nuvia-skin-tech-clinic'
)->name('webia.template.beauty.nuvia-skin-tech-clinic');

Route::view(
    '/webia/template/glow-lab-creative-beauty-clinic',
    'website-bisnis.templates.beauty.glow-lab-creative-beauty-clinic'
)->name('webia.template.beauty.glow-lab-creative-beauty-clinic');

Route::view(
    '/webia/template/atelier-kulit-creative-beauty-clinic',
    'website-bisnis.templates.beauty.atelier-kulit-creative-beauty-clinic'
)->name('webia.template.beauty.atelier-kulit-creative-beauty-clinic');

Route::view(
    '/webia/template/tanah-warna-rustic-makeup-artist',
    'website-bisnis.templates.beauty.tanah-warna-rustic-makeup-artist'
)->name('webia.template.beauty.tanah-warna-rustic-makeup-artist');

Route::view(
    '/webia/template/rosalind-vintage-makeup-artist',
    'website-bisnis.templates.beauty.rosalind-vintage-makeup-artist'
)->name('webia.template.beauty.rosalind-vintage-makeup-artist');

Route::view(
    '/webia/template/visage-editorial-makeup-artist',
    'website-bisnis.templates.beauty.visage-editorial-makeup-artist'
)->name('webia.template.beauty.visage-editorial-makeup-artist');

Route::view(
    '/webia/template/voltrix-futuristic-automotive',
    'website-bisnis.templates.automotive.voltrix-futuristic-automotive'
)->name('webia.template.automotive.voltrix-futuristic-automotive');

Route::view(
    '/webia/template/nightshift-dark-mode-automotive',
    'website-bisnis.templates.automotive.nightshift-dark-mode-automotive'
)->name('webia.template.automotive.nightshift-dark-mode-automotive');

Route::view(
    '/webia/template/arvo-modern-automotive',
    'website-bisnis.templates.automotive.arvo-modern-automotive'
)->name('webia.template.automotive.arvo-modern-automotive');
Route::view(
    '/webia/template/apex-heritage-automotive-elegant',
    'website-bisnis.templates.automotive.apex-heritage-automotive-elegant'
)->name('webia.template.automotive.apex-heritage-automotive-elegant');
Route::view(
    '/webia/template/apex-scuderia-automotive-minimalist',
    'website-bisnis.templates.automotive.apex-scuderia-automotive-minimalist'
)->name('webia.template.automotive.apex-scuderia-automotive-minimalist');

Route::view(
    '/webia/template/samudra-auto-detailing-artistic',
    'website-bisnis.templates.automotive.samudra-auto-detailing-artistic'
)->name('webia.template.automotive.samudra-auto-detailing-artistic');

Route::view(
    '/webia/template/noir-auto-detailing-luxury',
    'website-bisnis.templates.automotive.noir-auto-detailing-luxury'
)->name('webia.template.automotive.noir-auto-detailing-luxury');
Route::view(
    '/webia/template/aurum-premium-auto-detailing',
    'website-bisnis.templates.automotive.aurum-premium-auto-detailing'
)->name('webia.template.automotive.aurum-premium-auto-detailing');
Route::view(
    '/webia/template/otto-artistic-workshop',
    'website-bisnis.templates.automotive.otto-artistic-workshop'
)->name('webia.template.automotive.otto-artistic-workshop');
Route::view(
    '/webia/template/maison-otto-elegant-workshop',
    'website-bisnis.templates.automotive.maison-otto-elegant-workshop'
)->name('webia.template.automotive.maison-otto-elegant-workshop');
Route::view(
    '/webia/template/roseline-professional-workshop',
    'website-bisnis.templates.automotive.roseline-professional-workshop'
)->name('webia.template.automotive.roseline-professional-workshop');
Route::view(
    '/webia/template/bangun-karsa-contractor-professional',
    'website-bisnis.templates.company.bangun-karsa-contractor-professional'
)->name('webia.template.company.bangun-karsa-contractor-professional');
Route::view(
    '/webia/template/langit-karya-contractor-minimalist',
    'website-bisnis.templates.company.langit-karya-contractor-minimalist'
)->name('webia.template.company.langit-karya-contractor-minimalist');

Route::view(
    '/webia/template/denim-horizon-property-minimalist',
    'website-bisnis.templates.property.property-minimalist'
)->name('webia.template.property.denim-horizon-property-minimalist');

Route::view(
    '/webia/template/pusaka-asri-property-traditional',
    'website-bisnis.templates.property.property-traditional'
)->name('webia.template.property.pusaka-asri-property-traditional');

Route::view(
    '/webia/template/agriternak-organic-ethical-precision',
    'website-bisnis.templates.agriculture.agriternak-organic-ethical-precision'
)->name('webia.template.agriculture.agriternak-organic-ethical-precision');

Route::view(
    '/webia/template/agriternak-futuristic-iot',
    'website-bisnis.templates.agriculture.agriternak-futuristic-iot'
)->name('webia.template.agriculture.agriternak-futuristic-iot');

Route::view(
    '/webia/template/agriternak-bold-livestock',
    'website-bisnis.templates.agriculture.agriternak-bold-livestock'
)->name('webia.template.agriculture.agriternak-bold-livestock');

Route::view(
    '/webia/template/fnb-bakery-playful-colorful',
    'website-bisnis.templates.fnb.bakery.bakery-playful-colorful'
)->name('webia.template.fnb.bakery.playful.colorful');
Route::view(
    '/webia/template/bakery-bold-luxury',
    'website-bisnis.templates.fnb.bakery.bakery-bold-luxury'
)->name('webia.template.fnb.bakery.bold-luxury');
Route::view(
    '/webia/template/midnightbaker-futuristic',
    'website-bisnis.templates.fnb.bakery.midnightbaker-futuristic'
)->name('webia.template.fnb.bakery.midnightbaker');
Route::view(
    '/webia/template/paws-clever-creative',
    'website-bisnis.templates.pet-animal-service.paws-clever-creative'
)->name('webia.template.pet-animal-service.paws-clever-creative');
Route::view(
    '/webia/template/paws-joy-jellypop',
    'website-bisnis.templates.pet-animal-service.paws-joy-jellypop'
)->name('webia.template.pet-animal-service.paws-joy-jellypop');
Route::view(
    '/webia/template/paws-canine-terra-earth-tone',
    'website-bisnis.templates.pet-animal-service.paws-canine-terra-earth-tone'
)->name('webia.template.pet-animal-service.paws-canine-terra-earth-tone');

Route::view(
    '/webia/template/pawtopia-animal-care',
    'website-bisnis.templates.pet-animal-service.pawtopia-animal-care'
)->name('webia.template.pet-animal-service.pawtopia-animal-care');

Route::view(
    '/webia/template/pawlora-animal-care',
    'website-bisnis.templates.pet-animal-service.pawlora-animal-care'
)->name('webia.template.pet-animal-service.pawlora-animal-care');

// WEBIA — Template Nail Art Professional Soft Pink
// URL lama dipertahankan agar konsisten; view mengikuti struktur folder baru.
Route::view(
    '/webia/template/nail-art-professional-soft-pink',
    'website-bisnis.templates.beauty.nailart.nailart-professional-softpink'
)->name('webia.template.beauty.nailart.professional-softpink');
Route::view('/webia/template/nail-art-professional-soft-pink/gallery', 'website-bisnis.templates.beauty.nailart.nailart-professional-softpink-gallery')->name('webia.template.beauty.nailart.professional-softpink.gallery');

// WEBIA Template 02 — Nail Art Minimalist Sage Green
Route::view(
    '/webia/template/nail-art-minimalist-sage-green',
    'website-bisnis.templates.beauty.nailart.nailart-minimalist-sagegreen'
)->name('webia.template.beauty.nailart.minimalist-sagegreen');
Route::view('/webia/template/nail-art-minimalist-sage-green/gallery', 'website-bisnis.templates.beauty.nailart.nailart-minimalist-sagegreen-gallery')->name('webia.template.beauty.nailart.minimalist-sagegreen.gallery');

// WEBIA Template 03 — Luxury Yellow Sunshine
Route::view(
    '/webia/template/nail-art-luxury-yellow-sunshine',
    'website-bisnis.templates.beauty.nailart.nailart-luxury-yellowsunshine'
)->name('webia.template.beauty.nailart.luxury-yellowsunshine');
Route::view('/webia/template/nail-art-luxury-yellow-sunshine/gallery', 'website-bisnis.templates.beauty.nailart.nailart-luxury-yellowsunshine-gallery')->name('webia.template.beauty.nailart.luxury-yellowsunshine.gallery');

// WEBIA — Laut Biru Seafood Restaurant
Route::view(
    '/webia/template/laut-biru-seafood',
    'website-bisnis.templates.fnb.restaurant.laut-biru-seafood'
)->name('webia.template.fnb.restaurant.laut-biru-seafood');

// WEBIA — Restoran Azura
Route::view(
    '/webia/template/restoran-azura',
    'website-bisnis.templates.fnb.restaurant.restoran-azura'
)->name('webia.template.fnb.restaurant.restoran-azura');

// WEBIA — NOIR Restaurant & Dining
Route::view(
    '/webia/template/noir-restaurant',
    'website-bisnis.templates.fnb.restaurant.noir-restaurant'
)->name('webia.template.fnb.restaurant.noir-restaurant');

// WEBIA — Tunas Cendekia Preschool & Daycare
Route::view(
    '/webia/template/tunas-cendekia-preschool-daycare',
    'website-bisnis.templates.education.preschool.tunas-cendekia-preschool-daycare'
)->name('webia.template.education.tunas-cendekia-preschool-daycare');

Route::view(
    '/webia/template/rumah-latte-preschool-daycare',
    'website-bisnis.templates.education.preschool.rumah-latte-preschool-daycare'
)->name('webia.template.education.rumah-latte-preschool-daycare');

Route::view(
    '/webia/template/lumiere-photography-studio',
    'website-bisnis.templates.photography.lumiere-photography-studio'
)->name('webia.template.photography.lumiere-studio');

Route::view(
    '/webia/template/noir-studio-photography',
    'website-bisnis.templates.photography.noir-studio-photography'
)->name('webia.template.photography.noir-studio');

Route::view(
    '/webia/template/peachy-studio',
    'website-bisnis.templates.photography.peachy-studio'
)->name('webia.template.photography.peachy-studio');

// WEBIA template 4 — Automotive Dealer Vintage (Heritage Motors)
Route::view(
    '/webia/template/automotive-dealer-vintage',
    'website-bisnis.templates.automotive.dealer.automotive-dealer-vintage'
)->name('webia.template.automotive.dealer.vintage');

// WEBIA Template 04 — Heritage Motors collection page
Route::view(
    '/webia/template/automotive-dealer-vintage/collection',
    'website-bisnis.templates.automotive.dealer.automotive-dealer-vintage-collection'
)->name('webia.template.automotive.dealer.vintage.collection');

Route::view(
    '/webia/template/healthcare-dental-mint',
    'website-bisnis.templates.healthcare.dental.mint-dental-house'
)->name('webia.template.healthcare-dental-mint');

Route::view(
    '/webia/template/healthcare-dental-azure',
    'website-bisnis.templates.healthcare.dental.azure-smile-clinic'
)->name('webia.template.healthcare-dental-azure');

// Sunset Dental Care Template
Route::view(
    '/webia/template/healthcare-dental-sunset',
    'website-bisnis.templates.healthcare.dental.sunset-dental-care'
)->name('webia.template.healthcare-dental-sunset');

// =====================================================
// WEBIA - PET SHOP MINIMALIST GLACIER BLUE
// =====================================================

Route::view(
    '/webia/template/petshop-minimalist-glacierblue',
    'website-bisnis.templates.pet-animal-service.petshop.glacierblue.petshop-minimalist-glacierblue'
)->name('webia.template.petshop-minimalist-glacierblue');

Route::view(
    '/webia/template/petshop-minimalist-glacierblue/katalog',
    'website-bisnis.templates.pet-animal-service.petshop.glacierblue.petshop-katalog-minimalist-glacierblue'
)->name('webia.template.petshop-minimalist-glacierblue.katalog');

Route::view(
    '/webia/template/petshop-minimalist-glacierblue/produk/{slug}',
    'website-bisnis.templates.pet-animal-service.petshop.glacierblue.petshop-produk-minimalist-glacierblue'
)->name('webia.template.petshop-minimalist-glacierblue.produk');

// =====================================================
// WEBIA - PET SHOP LUXURY ROSE GOLD
// =====================================================

Route::view(
    '/webia/template/petshop-luxury-rosegold',
    'website-bisnis.templates.pet-animal-service.petshop.rosegold.petshop-luxury-rosegold'
)->name('webia.template.petshop-luxury-rosegold');

Route::view(
    '/webia/template/petshop-luxury-rosegold/katalog',
    'website-bisnis.templates.pet-animal-service.petshop.rosegold.petshop-katalog-luxury-rosegold'
)->name('webia.template.petshop-luxury-rosegold.katalog');

Route::view(
    '/webia/template/petshop-luxury-rosegold/produk/{slug}',
    'website-bisnis.templates.pet-animal-service.petshop.rosegold.petshop-produk-luxury-rosegold'
)->name('webia.template.petshop-luxury-rosegold.produk');

// ==============================================
// WEBIA - TECHNOLOGY & IT (SOFTWARE HOUSE)
// =====================================================
Route::view(
    '/webia/template/technology-softwarehouse-professional',
    'website-bisnis.templates.technology.softwarehouse.technology-softwarehouse-modern'
)->name('webia.template.technology-softwarehouse-professional');
Route::view(
    '/webia/template/technology-softwarehouse-modern',
    'website-bisnis.templates.technology.softwarehouse.technology-softwarehouse-modern'
)->name('webia.template.technology-softwarehouse-modern');

// =====================================================
// WEBIA - TECHNOLOGY & IT — PUTRI (Software House Elegant Baby Blue)
// =====================================================
Route::view(
    '/webia/template/technology-softwarehouse-elegant-babyblue-putri',
    'website-bisnis.templates.technology.softwarehouse.technology-softwarehouse-elegant-babyblue-putri'
)->name('webia.template.technology-softwarehouse-elegant-babyblue-putri');

// =====================================================
// WEBIA - TECHNOLOGY & IT — PUTRI (Software House Minimalist Soft Pink)
// =====================================================
Route::view(
    '/webia/template/technology-softwarehouse-minimalist-softpink-putri',
    'website-bisnis.templates.technology.softwarehouse.technology-softwarehouse-minimalist-softpink-putri'
)->name('webia.template.technology-softwarehouse-minimalist-softpink-putri');

// =====================================================
// WEBIA - TECHNOLOGY & IT — PUTRI (Data Analytics Luxury Pastel Mix)
// =====================================================
Route::view(
    '/webia/template/technology-dataanalytics-luxury-pastelmix-putri',
    'website-bisnis.templates.technology.data-analytics.technology-dataanalytics-luxury-pastelmix-putri'
)->name('webia.template.technology-dataanalytics-luxury-pastelmix-putri');

// =====================================================
// WEBIA - TECHNOLOGY & IT — PUTRI (Data Analytics Corporate Ocean Teal)
// =====================================================
Route::view(
    '/webia/template/technology-dataanalytics-corporate-oceanteal-putri',
    'website-bisnis.templates.technology.data-analytics.technology-dataanalytics-corporate-oceanteal-putri'
)->name('webia.template.technology-dataanalytics-corporate-oceanteal-putri');

// =====================================================
// WEBIA - TECHNOLOGY & IT — PUTRI (Data Analytics Creative Arctic Frost)
// =====================================================
Route::view(
    '/webia/template/technology-dataanalytics-creative-arcticfrost-putri',
    'website-bisnis.templates.technology.data-analytics.technology-dataanalytics-creative-arcticfrost-putri'
)->name('webia.template.technology-dataanalytics-creative-arcticfrost-putri');

// =====================================================
// WEBIA - AGRICULTURE & FARMING — PUTRI (Perlengkapan & Peralatan Pertanian Corporate Sage Green)
// =====================================================
Route::view(
    '/webia/template/agriculture-peralatanpertanian-corporate-sagegreen-putri',
    'website-bisnis.templates.agriculture.peralatan-pertanian.agriculture-peralatanpertanian-corporate-sagegreen-putri'
)->name('webia.template.agriculture-peralatanpertanian-corporate-sagegreen-putri');

// =====================================================
// WEBIA - AGRICULTURE & FARMING — PUTRI (Perlengkapan & Peralatan Pertanian Creative Matcha Latte)
// =====================================================
Route::view(
    '/webia/template/agriculture-peralatanpertanian-creative-matchalatte-putri',
    'website-bisnis.templates.agriculture.peralatan-pertanian.agriculture-peralatanpertanian-creative-matchalatte-putri'
)->name('webia.template.agriculture-peralatanpertanian-creative-matchalatte-putri');

// =====================================================
// WEBIA - AGRICULTURE & FARMING — PUTRI (Perlengkapan & Peralatan Pertanian Playful & Colorful Arctic Frost)
// =====================================================
Route::view(
    '/webia/template/agriculture-peralatanpertanian-playfulcolorful-arcticfrost-putri',
    'website-bisnis.templates.agriculture.peralatan-pertanian.agriculture-peralatanpertanian-playfulcolorful-arcticfrost-putri'
)->name('webia.template.agriculture-peralatanpertanian-playfulcolorful-arcticfrost-putri');

// =====================================================
// WEBIA - PHOTOGRAPHY & CREATIVE STUDIO — PUTRI (Motion Graphics & 3D Studio Premium Minimal Champagne Glow)
// =====================================================
Route::view(
    '/webia/template/photography-motiongraphics-premiumminimal-champagneglow-putri',
    'website-bisnis.templates.photography-creative.motion-graphics.photography-motiongraphics-premiumminimal-champagneglow-putri'
)->name('webia.template.photography-motiongraphics-premiumminimal-champagneglow-putri');

// =====================================================
// WEBIA - SPORTS & FITNESS (GYM & FITNESS)
// =====================================================
Route::view(
    '/webia/template/sports-gym-bold',
    'website-bisnis.templates.sports-fitness.gym.sports-gym-bold'
)->name('webia.template.sports-gym-bold');

// =====================================================
// WEBIA - EDUCATION (ONLINE COURSE)
// =====================================================
Route::view(
    '/webia/template/education-onlinecourse-modern',
    'website-bisnis.templates.education.online-course.education-onlinecourse-modern'
)->name('webia.template.education-onlinecourse-modern');

Route::view(
    '/webia/template/spark-academy-maximum-impact',
    'website-bisnis.templates.education.spark-academy-maximum-impact'
)->name('webia.template.education.spark-academy');

Route::view(
    '/webia/template/ruby-academy-classic-school',
    'website-bisnis.templates.education.ruby-academy-classic-school'
)->name('webia.template.education.ruby-academy-classic-school');

Route::view(
    '/webia/template/arctic-academy-school',
    'website-bisnis.templates.education.arctic-academy-school'
)->name('webia.template.education.arctic-academy-school');

Route::view(
    '/webia/template/education/preschool-daycare-jeli-kecil',
    'website-bisnis.template.education.preschool-daycare-jeli-kecil.index'
)->name('webia.template.education.jeli-kecil');

Route::view(
    '/webia/template/healthcare/psychology/ruang-tenang',
    'website-bisnis.template.healthcare.psychology.ruang-tenang.index'
)->name('webia.template.healthcare.psychology.ruang-tenang');

Route::view(
    '/webia/template/healthcare/psychology/mitra-jiwa',
    'website-bisnis.templates.healthcare.psychology.mitra-jiwa'
)->name('webia.template.healthcare.psychology.mitra-jiwa');

Route::view(
    '/webia/template/healthcare/psychology/aurelia-mind',
    'website-bisnis.templates.healthcare.psychology.aurelia-mind'
)->name('webia.template.healthcare.psychology.aurelia-mind');

// =====================================================
// WEBIA - WEDDING & EVENT (WEDDING ORGANIZER)
// =====================================================
Route::view(
    '/webia/template/wedding-organizer-elegant',
    'website-bisnis.templates.wedding-event.wedding-organizer.wedding-organizer-elegant'
)->name('webia.template.wedding-organizer-elegant');

// =====================================================
// WEBIA - PET SHOP CORPORATE PLUM VELVET
// =====================================================

Route::prefix('webia/template')->group(function () {
    Route::view(
        '/petshop-corporate-plumvelvet',
        'website-bisnis.templates.pet-animal-service.petshop.plumvelvet.petshop-corporate-plumvelvet'
    )->name('webia.template.petshop.corporate.plumvelvet');

    Route::view(
        '/petshop-corporate-plumvelvet/katalog',
        'website-bisnis.templates.pet-animal-service.petshop.plumvelvet.petshop-katalog-corporate-plumvelvet'
    )->name('webia.template.petshop.corporate.plumvelvet.katalog');

    Route::view(
        '/petshop-corporate-plumvelvet/produk/{slug}',
        'website-bisnis.templates.pet-animal-service.petshop.plumvelvet.petshop-produk-corporate-plumvelvet'
    )->name('webia.template.petshop.corporate.plumvelvet.produk');
});

Route::prefix('webia/template')->group(function () {
    Route::view(
        '/event-organizer-modern-burgundy-wine',
        'website-bisnis.templates.wedding-event.event-organizer.burgundy-wine.event-organizer-modern-burgundy-wine'
    )->name('webia.template.event-organizer.burgundy-wine');

    Route::view(
        '/event-organizer-modern-burgundy-wine/katalog',
        'website-bisnis.templates.wedding-event.event-organizer.burgundy-wine.event-organizer-katalog-burgundy-wine'
    )->name('webia.template.event-organizer.burgundy-wine.katalog');

    Route::view(
        '/event-organizer-modern-burgundy-wine/detail',
        'website-bisnis.templates.wedding-event.event-organizer.burgundy-wine.event-organizer-detail-burgundy-wine'
    )->name('webia.template.event-organizer.burgundy-wine.detail');
});

Route::prefix('webia/template')->group(function () {
    Route::view(
        '/catering-wedding-cake-ruby-luxe',
        'website-bisnis.templates.wedding-event.catering-wedding-cake.ruby-luxe.catering-wedding-cake-ruby-luxe'
    )->name('webia.template.catering-wedding-cake.ruby-luxe');

    Route::view(
        '/catering-wedding-cake-ruby-luxe/katalog',
        'website-bisnis.templates.wedding-event.catering-wedding-cake.ruby-luxe.catering-katalog-ruby-luxe'
    )->name('webia.template.catering-wedding-cake.ruby-luxe.katalog');

    Route::view(
        '/catering-wedding-cake-ruby-luxe/detail',
        'website-bisnis.templates.wedding-event.catering-wedding-cake.ruby-luxe.catering-detail-ruby-luxe'
    )->name('webia.template.catering-wedding-cake.ruby-luxe.detail');
});

// ==== Template klasik full-family (digabung dari nabiila-fe) ====
$minimalis = function (string $page) {
    return function () use ($page) {
        $path = 'website-bisnis/template/f&b/minimalis/cafe-earthtone';
        $v = str_replace('/', '.', $path);

        config(['cafe' => config('template.f&b.minimalis.cafe-earthtone.cafe')]);

        return view("$v.$page", ['v' => $v, 'path' => $path, 'pageUrl' => fn(string $name = 'home', string $hash = '') => route("webia.fnb.minimalis.{$name}") . $hash]);
    };
};

Route::prefix('webia/template/fnb/minimalis')->name('webia.fnb.minimalis.')->group(function () use ($minimalis) {
    Route::get('/', $minimalis('index'))->name('home');
    Route::get('/menu', $minimalis('menu'))->name('menu');
    Route::get('/reservasi', $minimalis('reservasi'))->name('reservasi');
});

$elegan = function (string $page) {
    return function () use ($page) {
        $path = 'website-bisnis/template/f&b/elegan/cafe-earthtone';
        $v = str_replace('/', '.', $path);

        config(['cafe' => config('template.f&b.elegan.cafe-earthtone.cafe')]);

        return view("$v.$page", ['v' => $v, 'path' => $path]);
    };
};

Route::prefix('webia/template/fnb/elegan')->name('webia.fnb.elegan.')->group(function () use ($elegan) {
    Route::get('/', $elegan('index'))->name('home');
    Route::get('/menu', $elegan('menu'))->name('menu');
    Route::get('/reservasi', $elegan('reservasi'))->name('reservasi');
});

$vintage = fn(string $page) => function () use ($page) {
    $cafe = config('template.f&b.vintage.cafe-earthtone.cafe');

    return view(
        "website-bisnis.template.f&b.vintage.cafe-earthtone.{$page}",
        ['cafe' => $cafe, 'routeUrl' => fn(string $key, string $anchor = '') => route($cafe['routes'][$key]) . $anchor]
    );
};

Route::prefix('webia/template/fnb/vintage')->name('webia.fnb.vintage.')->group(function () use ($vintage) {
    Route::get('/', $vintage('index'))->name('home');
    Route::get('/menu', $vintage('menu'))->name('menu');
    Route::get('/reservasi', $vintage('reservasi'))->name('reservasi');
});

Route::prefix('webia/template/company/elegan/company-profile-terracotta')
    ->name('company-terracotta.')
    ->group(function () {
        $v = 'website-bisnis.template.company.elegan.company-profile-terracotta';

        Route::view('/', "$v.index")->name('home');
        Route::view('/tentang-kami', "$v.tentang-kami")->name('about');
        Route::view('/portofolio', "$v.portofolio")->name('portfolio');
    });

Route::prefix('webia/template/company/modern/company-profile-ocean-teal')
    ->name('company-profile-ocean-teal.')
    ->group(function () {
        $ns = 'website-bisnis.template.company.modern.company-profile-ocean-teal';

        Route::view('/', $ns . '.index')->name('home');
        Route::view('/tentang-kami', $ns . '.tentang-kami')->name('about');
        Route::view('/portofolio', $ns . '.portofolio')->name('portfolio');
    });

Route::prefix('webia/template/company/classic/company-profile-warm-neutral')
    ->name('company-profile-warm-neutral.')
    ->group(function () {
        $ns = 'website-bisnis.template.company.classic.company-profile-warm-neutral';

        Route::view('/', $ns . '.index')->name('home');
        Route::view('/tentang-kami', $ns . '.tentang-kami')->name('about');
        Route::view('/portofolio', $ns . '.portofolio')->name('portfolio');
    });

Route::prefix('webia/template/property/luxury/real-estate-agency-emerald-green')
    ->name('website-bisnis.template.property.luxury.real-estate-agency-emerald-green.')
    ->group(function () {
        $view = 'website-bisnis.template.property.luxury.real-estate-agency-emerald-green';

        Route::view('/', $view . '.index')->name('index');
        Route::view('/property', $view . '.property')->name('property');
        Route::view('/property/{slug}', $view . '.property-detail')->name('property.show');
        Route::view('/about', $view . '.about')->name('about');
        Route::view('/gallery', $view . '.gallery')->name('gallery');
        Route::view('/booking', $view . '.booking')->name('booking');
        Route::view('/blog', $view . '.blog')->name('blog');
        Route::view('/blog/{post}', $view . '.blog-detail')->name('blog.show');
        Route::view('/contact', $view . '.contact')->name('contact');
    });

Route::prefix('webia/template/property/premium-minimal/real-estate-agency-nature-green')
    ->name('property.premium-minimal.nature-green.')
    ->group(function () {
        $name = 'property.premium-minimal.nature-green.';
        $ns = 'website-bisnis.template.property.premium-minimal.real-estate-agency-nature-green.';
        $cfg = 'template.property.premium-minimal.real-estate-agency-nature-green.real-estate-agency';

        // Satu pintu render: semua halaman mendapat data & helper yang sama.
        $page = fn(string $view, string $active) => view($ns . $view, [
            'ns' => $ns,
            'active' => $active,
            't' => config($cfg),
            'r' => fn(string $route, array $params = []) => route($name . $route, $params),
            'img' => fn(string $file) => asset(config($cfg . '.assets.images') . '/' . $file),
        ]);

        Route::get('/', fn() => $page('index', 'home'))->name('home');
        Route::get('/properties', fn() => $page('properties', 'properties'))->name('properties');
        Route::get('/properties/{slug}', function (string $slug) use ($page, $cfg) {
            $property = collect(config($cfg . '.properties'))->firstWhere('slug', $slug);
            abort_if($property === null, 404);

            return $page('property', 'properties')->with('property', $property);
        })->name('property');
        Route::get('/about-us', fn() => $page('about', 'about'))->name('about');
        Route::get('/gallery', fn() => $page('gallery', 'gallery'))->name('gallery');
        Route::get('/booking', fn() => $page('booking', 'booking'))->name('booking');
        Route::get('/blog', fn() => $page('blog', 'blog'))->name('blog');
        Route::get('/blog/{slug}', function (string $slug) use ($page, $cfg) {
            $post = collect(config($cfg . '.blog'))->firstWhere('slug', $slug);
            abort_if($post === null, 404);

            return $page('article', 'blog')->with('post', $post);
        })->name('blog.show');
        Route::get('/contact', fn() => $page('contact', 'contact'))->name('contact');
    });

Route::prefix('webia/template/property/professional/real-estate-agency-coral-peach')
    ->name('coral-peach.')
    ->group(function () {
        $view = 'website-bisnis.template.property.professional.real-estate-agency-coral-peach';
        $site = fn() => config('template.property.professional.real-estate-agency-coral-peach.real-estate-agency');

        Route::get('/', fn() => view("$view.index", ['site' => $site()]))->name('home');
        Route::get('/property', fn() => view("$view.property", ['site' => $site()]))->name('property');
        Route::get('/specification', fn() => view("$view.specification", ['site' => $site()]))->name('specification');
        Route::get('/price', fn() => view("$view.price", ['site' => $site()]))->name('price');
        Route::get('/about-us', fn() => view("$view.about", ['site' => $site()]))->name('about');
        Route::get('/gallery', fn() => view("$view.gallery", ['site' => $site()]))->name('gallery');
        Route::get('/booking', fn() => view("$view.booking", ['site' => $site()]))->name('booking');
        Route::get('/blog', fn() => view("$view.blog", ['site' => $site()]))->name('blog');
        Route::get('/blog/{slug}', function (string $slug) use ($view, $site) {
            $data = $site();
            $post = collect($data['blog']['posts'])->firstWhere('slug', $slug);
            abort_if(! $post, 404);

            return view("$view.blog-show", ['site' => $data, 'post' => $post]);
        })->name('blog.show');
        Route::get('/contact', fn() => view("$view.contact", ['site' => $site()]))->name('contact');
    });

$elNs = 'website-bisnis.template.e-learning.modern.e-learning-ocean-blue';

Route::prefix('webia/template/e-learning/modern/e-learning-ocean-blue')
    ->name('elearning.')
    ->group(function () use ($elNs) {
        Route::view('/', "{$elNs}.index")->name('home');
        Route::view('/programs', "{$elNs}.programs")->name('programs');
        Route::view('/schedules', "{$elNs}.schedules")->name('schedules');
        Route::view('/teachers', "{$elNs}.teachers")->name('teachers');
        Route::view('/pricing', "{$elNs}.pricing")->name('pricing');
        Route::view('/registration', "{$elNs}.registration")->name('registration');
        Route::view('/course-content', "{$elNs}.course-content")->name('course-content');
        Route::view('/member-area', "{$elNs}.member-area")->name('member-area');
    });

$elNs = 'website-bisnis.template.e-learning.playful-colorful.e-learning-pastel-mix';
$elPath = 'webia/template/e-learning/playful-colorful/e-learning-pastel-mix';

// Nama route = "{$elNs}.{halaman}" → harus sama dengan config 'route_prefix' di e-learning.php
Route::prefix($elPath)->name($elNs . '.')->group(function () use ($elNs) {
    Route::view('/', $elNs . '.index')->name('home');
    Route::view('/programs', $elNs . '.programs')->name('programs');
    Route::view('/schedules', $elNs . '.schedules')->name('schedules');
    Route::view('/teachers', $elNs . '.teachers')->name('teachers');
    Route::view('/pricing', $elNs . '.pricing')->name('pricing');
    Route::view('/registration', $elNs . '.registration')->name('registration');
    Route::view('/course-content', $elNs . '.course-content')->name('course-content');
    Route::view('/member-area', $elNs . '.member-area')->name('member-area');
});

Route::prefix('webia/template/e-learning/futuristic/e-learning-dark-mode')
    ->name('e-learning-dark-mode.')
    ->group(function () {
        $ns = 'website-bisnis.template.e-learning.futuristic.e-learning-dark-mode';

        Route::view('/', $ns . '.index')->name('home');
        Route::view('/programs', $ns . '.programs')->name('programs');
        Route::view('/schedules', $ns . '.schedules')->name('schedules');
        Route::view('/teachers', $ns . '.teachers')->name('teachers');
        Route::view('/pricing', $ns . '.pricing')->name('pricing');
        Route::view('/registration', $ns . '.registration')->name('registration');
        Route::view('/course-content', $ns . '.course-content')->name('course-content');
        Route::view('/member-area', $ns . '.member-area')->name('member-area');
    });

Route::prefix('webia/template/healthcare/professional/klinik-kecantikan-clean-white')
    ->name('klinik-kecantikan.')
    ->group(function () {
        $view = 'website-bisnis.template.healthcare.professional.klinik-kecantikan-clean-white.';

        Route::view('/', $view . 'index')->name('home');
        Route::view('/layanan', $view . 'services')->name('services');
        Route::view('/dokter-staff', $view . 'doctors')->name('doctors');
        Route::view('/jadwal', $view . 'schedule')->name('schedule');
        Route::view('/appointment', $view . 'appointment')->name('appointment');
        Route::view('/faq', $view . 'faq')->name('faq');
        Route::view('/kebijakan', $view . 'policy')->name('policy');
    });

Route::prefix('webia/template/healthcare/luxury/klinik-kecantikan-champagne-glow')
    ->name('glow.')
    ->group(function () {

        $view = 'website-bisnis.template.healthcare.luxury.klinik-kecantikan-champagne-glow';
        $config = 'template.healthcare.luxury.klinik-kecantikan-champagne-glow.klinik-kecantikan';

        // Helper kecil: render view + kirim data config (`$c`), prefix view (`$v`),
        // dan URL dasar gambar template (`$img`).
        $page = fn(string $name) => fn() => view("{$view}.{$name}", [
            'c' => config($config),
            'v' => $view,
            'img' => asset('images/website-bisnis/template/healthcare/luxury/klinik-kecantikan-champagne-glow'),
        ]);

        Route::get('/', $page('index'))->name('home');
        Route::get('/services', $page('services'))->name('services');
        Route::get('/doctors', $page('doctors'))->name('doctors');
        Route::get('/schedule', $page('schedule'))->name('schedule');
        Route::get('/appointment', $page('appointment'))->name('appointment');
        Route::get('/faq', $page('faq'))->name('faq');
        Route::get('/policy', $page('policy'))->name('policy');
    });

Route::prefix('webia/template/healthcare/elegan/klinik-kecantikan-rose-gold')
    ->name('webia.template.healthcare.elegan.klinik-kecantikan-rose-gold.')
    ->group(function () {
        // Namespace view, key config, dan prefix nama route — dibaca oleh seluruh blade.
        $tpl = 'website-bisnis.template.healthcare.elegan.klinik-kecantikan-rose-gold';
        $cfg = 'template.healthcare.elegan.klinik-kecantikan-rose-gold.klinik-kecantikan';
        $rp = 'webia.template.healthcare.elegan.klinik-kecantikan-rose-gold.';

        // Variabel ditulis eksplisit: arrow function hanya menangkap variabel yang
        // disebut langsung di badannya (compact('tpl') TIDAK menangkapnya).
        $data = fn(string $page) => ['tpl' => $tpl, 'cfg' => $cfg, 'rp' => $rp, 'page' => $page];

        Route::view('/', "$tpl.index", $data('home'))->name('index');
        Route::view('/layanan', "$tpl.services", $data('services'))->name('services');
        Route::view('/dokter', "$tpl.doctors", $data('doctors'))->name('doctors');
        Route::view('/jadwal', "$tpl.schedule", $data('schedule'))->name('schedule');
        Route::view('/booking', "$tpl.appointment", $data('appointment'))->name('appointment');
        Route::view('/faq', "$tpl.faq", $data('faq'))->name('faq');
        Route::view('/kebijakan', "$tpl.policy", $data('policy'))->name('policy');
    });

Route::prefix('webia/template/retail/luxury/skincare-soft-pink')
    ->name('website-bisnis.template.retail.luxury.skincare-soft-pink.')
    ->group(function () {
        $ns = 'website-bisnis.template.retail.luxury.skincare-soft-pink'; // namespace view
        $rp = $ns . '.';                                                  // prefix nama route
        $cfg = 'template.retail.luxury.skincare-soft-pink.skincare';       // config/template/.../skincare.php

        $data = fn() => [
            'ns' => $ns,
            'rp' => $rp,
            'cfg' => config($cfg),
            'img' => asset('images/website-bisnis/template/retail/luxury/skincare-soft-pink'),
            'css' => asset('css/website-bisnis/template/retail/luxury/skincare-soft-pink/skincare.css'),
            'js' => asset('js/website-bisnis/template/retail/luxury/skincare-soft-pink/skincare.js'),
        ];

        Route::get('/', fn() => view($ns . '.index', $data()))->name('index');
        Route::get('/catalog', fn() => view($ns . '.catalog', $data()))->name('catalog');
        Route::get('/price', fn() => view($ns . '.price', $data()))->name('price');
        Route::get('/stock', fn() => view($ns . '.stock', $data()))->name('stock');
        Route::get('/inquiry', fn() => view($ns . '.inquiry', $data()))->name('inquiry');
        Route::get('/shop', fn() => view($ns . '.shop', $data()))->name('shop');
    });

$ns = 'website-bisnis.template.retail.premium-minimal.skincare-warm-neutral';
$data = [
    'ns' => $ns,
    'skin' => config('template.retail.premium-minimal.skincare-warm-neutral.skincare'),
];

Route::prefix('webia/template/retail/premium-minimal/skincare-warm-neutral')
    ->name('skincare-warm-neutral.')
    ->group(function () use ($ns, $data) {
        Route::view('/', $ns . '.index', $data)->name('home');
        Route::view('/katalog', $ns . '.katalog', $data)->name('catalog');
        Route::view('/harga', $ns . '.harga', $data)->name('price');
        Route::view('/ketersediaan', $ns . '.ketersediaan', $data)->name('stock');
        Route::view('/inquiry', $ns . '.inquiry', $data)->name('inquiry');
        Route::view('/keranjang', $ns . '.keranjang', $data)->name('cart');
    });

Route::prefix('webia/template/retail/organic/skincare-sage-green')
    ->name('skincare-sage-green.')
    ->group(function () {
        $view = 'website-bisnis.template.retail.organic.skincare-sage-green.';

        Route::view('/', $view . 'index')->name('home');      // Beranda + preview semua fitur
        Route::view('/katalog', $view . 'catalog')->name('catalog'); // Product catalog
        Route::view('/harga', $view . 'price')->name('price');     // Price
        Route::view('/stok', $view . 'stock')->name('stock');     // Stock / availability
        Route::view('/inquiry', $view . 'inquiry')->name('inquiry'); // Inquiry (kirim ke WhatsApp)
        Route::view('/belanja', $view . 'shop')->name('shop');       // Optional e-commerce
    });

$taNs = 'website-bisnis.template.travel&tourism.modern.travel-agent-ocean-teal';
$taConfig = 'template.travel&tourism.modern.travel-agent-ocean-teal.travel-agent';
$taPath = 'template/travel&tourism/modern/travel-agent-ocean-teal';
$taName = 'template.travel-agent-ocean-teal.';

// nama route / nama view => uri
$taPages = [
    'index' => '/',
    'destinasi' => 'destinasi',
    'paket-tour' => 'paket-tour',
    'itinerary' => 'itinerary',
    'harga' => 'harga',
    'jadwal' => 'jadwal',
    'galeri' => 'galeri',
    'inquiry' => 'inquiry',
    'testimoni' => 'testimoni',
    'ai-chat' => 'ai-chat',
];

Route::prefix('webia/template/travel-agent-ocean-teal')
    ->name($taName)
    ->group(function () use ($taNs, $taConfig, $taPath, $taName, $taPages) {

        // Data yang dikirim ke semua view template ini.
        $data = function (string $page) use ($taNs, $taConfig, $taPath, $taName, $taPages): array {
            $ta = config($taConfig);
            $imgBase = "images/website-bisnis/{$taPath}";

            return [
                'ns' => $taNs,
                'active' => $page,
                'ta' => $ta,
                'assets' => [
                    'css' => asset("css/website-bisnis/{$taPath}/travel-agent.css"),
                    'js' => asset("js/website-bisnis/{$taPath}/travel-agent.js"),
                ],
                'routes' => collect($taPages)
                    ->map(fn($uri, $name) => route($taName . $name))
                    ->all(),
                // helper tampilan
                'img' => fn(string $file) => asset("{$imgBase}/{$file}"),
                'rp' => fn(int|float $n) => 'Rp ' . number_format($n, 0, ',', '.'),
                'icon' => fn(string $name, string $class = '') => new HtmlString(
                    '<svg class="ta-ic ' . e($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" '
                        . 'stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">'
                        . ($ta['icons'][$name] ?? '') . '</svg>'
                ),
            ];
        };

        foreach ($taPages as $name => $uri) {
            Route::get($uri, fn() => view("{$taNs}.{$name}", $data($name)))->name($name);
        }
    });

Route::prefix('webia/template/travel&tourism/organic/travel-agent-forest-moss')
    ->name('webia.travel-agent-forest-moss.')
    ->group(function () {

        $ns = 'website-bisnis.template.travel&tourism.organic.travel-agent-forest-moss';
        $path = 'website-bisnis/template/travel&tourism/organic/travel-agent-forest-moss';
        $cfg = config('template.travel&tourism.organic.travel-agent-forest-moss.travel-agent');

        $assets = [
            'css' => asset("css/{$path}/travel-agent.css"),
            'js' => asset("js/{$path}/travel-agent.js"),
            'img' => asset("images/{$path}"),
        ];

        // Data yang dibagikan ke semua view template ini
        $shared = [
            'ns' => $ns,
            'cfg' => $cfg,
            'assets' => $assets,
            'r' => fn(string $name) => route($cfg['route_prefix'] . $name),   // helper URL
            'img' => fn(string $file) => $assets['img'] . '/' . $file,           // helper gambar
        ];

        Route::get('/', fn() => view($ns . '.index', $shared))->name('index');
        Route::get('/destinasi', fn() => view($ns . '.destinasi', $shared))->name('destinasi');
        Route::get('/paket-tour', fn() => view($ns . '.paket-tour', $shared))->name('paket-tour');
        Route::get('/itinerary', fn() => view($ns . '.itinerary', $shared))->name('itinerary');
        Route::get('/harga', fn() => view($ns . '.harga', $shared))->name('harga');
        Route::get('/jadwal-keberangkatan', fn() => view($ns . '.jadwal-keberangkatan', $shared))->name('jadwal-keberangkatan');
        Route::get('/galeri', fn() => view($ns . '.galeri', $shared))->name('galeri');
        Route::get('/booking-inquiry', fn() => view($ns . '.booking-inquiry', $shared))->name('booking-inquiry');
        Route::get('/testimoni', fn() => view($ns . '.testimoni', $shared))->name('testimoni');
        Route::get('/asisten-ai', fn() => view($ns . '.asisten-ai', $shared))->name('asisten-ai');
    });

$ns = 'website-bisnis.template.travel&tourism.luxury.travel-agent-navy-champagne-gold';
$tvPrefix = 'webia/template/travel-tourism/luxury/travel-agent-navy-champagne-gold'; // ubah jika URL template berbeda
$tvPath = 'travel&tourism/luxury/travel-agent-navy-champagne-gold';
$tvConfig = require config_path('template/' . $tvPath . '/travel-agent.php');

Route::prefix($tvPrefix)->name('webia.template.travel-agent-navy-champagne-gold.')
    ->group(function () use ($ns, $tvPrefix, $tvPath, $tvConfig) {

        // Data bersama untuk semua halaman (view tidak perlu tahu path asset / URL)
        $data = fn(string $page) => [
            'ns' => $ns,
            'page' => $page,
            't' => $tvConfig,
            'css' => asset('css/website-bisnis/template/' . $tvPath . '/travel-agent.css'),
            'js' => asset('js/website-bisnis/template/' . $tvPath . '/travel-agent.js'),
            // helper kecil yang dipakai di Blade
            'url' => fn(string $p = '') => url($tvPrefix . ($p !== '' ? '/' . ltrim($p, '/') : '')),
            'img' => fn(string $f) => asset('images/website-bisnis/template/' . $tvPath . '/' . $f),
            'idr' => fn($n) => 'Rp ' . number_format((int) $n, 0, ',', '.'),
            'icon' => fn(string $n) => view($ns . '.partials.icon', ['name' => $n])->render(),
        ];

        Route::get('/', fn() => view($ns . '.index', $data('beranda')))->name('index');
        Route::get('/destinasi', fn() => view($ns . '.destinasi', $data('destinasi')))->name('destinasi');
        Route::get('/paket', fn() => view($ns . '.paket', $data('paket')))->name('paket');
        Route::get('/itinerary', fn() => view($ns . '.itinerary', $data('itinerary')))->name('itinerary');
        Route::get('/harga', fn() => view($ns . '.harga', $data('harga')))->name('harga');
        Route::get('/jadwal', fn() => view($ns . '.jadwal', $data('jadwal')))->name('jadwal');
        Route::get('/galeri', fn() => view($ns . '.galeri', $data('galeri')))->name('galeri');
        Route::get('/testimoni', fn() => view($ns . '.testimoni', $data('testimoni')))->name('testimoni');
        Route::get('/inquiry', fn() => view($ns . '.inquiry', $data('inquiry')))->name('inquiry');
        Route::get('/faq', fn() => view($ns . '.faq', $data('faq')))->name('faq');
    });

Route::prefix('webia/template/interior-architecture/rustic/furniture-terracotta')
    ->name('webia.template.furniture-terracotta.')
    ->group(function () {
        $view = 'website-bisnis.template.interior&architecture.rustic.furniture-terracotta.';

        Route::view('/', $view . 'index')->name('index');          // Beranda (preview semua section)
        Route::view('/hero-banner', $view . 'hero')->name('hero');            // Hero banner
        Route::view('/katalog', $view . 'catalog')->name('catalog');      // Furniture catalog
        Route::view('/custom-design', $view . 'custom-design')->name('custom-design');
        Route::view('/material-finishing', $view . 'materials')->name('materials');  // Materials & finishes
        Route::view('/dimensi-produk', $view . 'dimensions')->name('dimensions');
        Route::view('/galeri-proyek', $view . 'gallery')->name('gallery');      // Project gallery
        Route::view('/custom-order', $view . 'order-form')->name('order-form');
        Route::view('/lead-time-produksi', $view . 'lead-time')->name('lead-time');  // Production lead time
        Route::view('/permintaan-penawaran', $view . 'quotation')->name('quotation');  // Quotation request
        Route::view('/ai-faq', $view . 'ai-faq')->name('ai-faq');        // AI chatbot FAQ
    });

Route::prefix('webia/template/interior-architecture/premium-minimal/furniture-mocha-cream')
    ->name('furniture-mocha-cream.')
    ->group(function () {
        $ns = 'website-bisnis.template.interior&architecture.premium-minimal.furniture-mocha-cream';

        Route::view('/', $ns . '.index')->name('home');
        Route::view('/hero-banner', $ns . '.hero')->name('hero');
        Route::view('/katalog', $ns . '.katalog')->name('catalog');
        Route::view('/custom-design', $ns . '.custom-design')->name('custom-design');
        Route::view('/material-finishing', $ns . '.material-finishing')->name('materials');
        Route::view('/ukuran-produk', $ns . '.ukuran-produk')->name('dimensions');
        Route::view('/project-gallery', $ns . '.project-gallery')->name('gallery');
        Route::view('/custom-order', $ns . '.custom-order')->name('custom-order');
        Route::view('/production-lead-time', $ns . '.production-lead-time')->name('lead-time');
        Route::view('/permintaan-penawaran', $ns . '.permintaan-penawaran')->name('quotation');
        Route::view('/ai-chatbot', $ns . '.ai-chatbot')->name('ai-chatbot');
    });

Route::prefix('webia/template/interior-architecture/luxury/furniture-chocolate-luxe')
    ->name('webia.template.furniture-chocolate-luxe.')
    ->group(function () {
        $viewBase = 'website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe';
        $configKey = 'template.interior&architecture.luxury.furniture-chocolate-luxe.furniture';

        // nama route => [uri, nama view]
        $pages = [
            'home' => ['/', 'index'],
            'hero' => ['hero', 'hero'],
            'catalog' => ['katalog', 'catalog'],
            'custom-design' => ['custom-design', 'custom-design'],
            'materials' => ['material-finishing', 'materials'],
            'dimensions' => ['dimensi', 'dimensions'],
            'gallery' => ['galeri', 'gallery'],
            'order' => ['custom-order', 'order'],
            'lead-time' => ['lead-time', 'lead-time'],
            'quotation' => ['penawaran', 'quotation'],
            'ai-chat' => ['ai-chat', 'ai-chat'],
        ];

        foreach ($pages as $name => [$uri, $view]) {
            Route::get($uri, function () use ($viewBase, $configKey, $view, $name) {
                return view($viewBase . '.' . $view, [
                    'furniture' => config($configKey),
                    'activePage' => $name,
                ]);
            })->name($name);
        }
    });

/*
|--------------------------------------------------------------------------
| Laundry Baby Blue - View Composer
|--------------------------------------------------------------------------
*/

View::composer(
    'website-bisnis.template.home-services.modern.laundry-baby-blue.*',
    function ($view) {
        $cfg = config('template.home-services.modern.laundry-baby-blue.laundry');

        // Cadangan jika config tidak terbaca otomatis
        if (! is_array($cfg)) {
            $cfg = require config_path(
                'template/home-services/modern/laundry-baby-blue/laundry.php'
            );
        }

        $view->with([
            'laundry' => $cfg,

            'lbAsset' => fn(string $type, string $file = '') => asset(rtrim($cfg['assets'][$type] . '/' . $file, '/')),

            'lbRoute' => fn(string $name) => route('webia.laundry-baby-blue.' . $name),
        ]);
    }
);

/*
|--------------------------------------------------------------------------
| Laundry Baby Blue - Routes
|--------------------------------------------------------------------------
*/

Route::prefix('webia/template/home-services/modern/laundry-baby-blue')
    ->name('webia.laundry-baby-blue.')
    ->group(function () {
        $view = 'website-bisnis.template.home-services.modern.laundry-baby-blue';
        $data = ['laundry' => config('template.home-services.modern.laundry-baby-blue.laundry')
            ?? require config_path('template/home-services/modern/laundry-baby-blue/laundry.php')];

        Route::view('/', $view . '.index', $data)->name('home');       // Beranda (preview semua section)
        Route::view('/layanan', $view . '.layanan', $data)->name('layanan');    // Laundry services
        Route::view('/harga', $view . '.harga', $data)->name('harga');      // Price list by item/kg
        Route::view('/pilihan-layanan', $view . '.pilihan-layanan', $data)->name('pilihan');    // Service options
        Route::view('/estimasi-waktu', $view . '.estimasi-waktu', $data)->name('estimasi');   // Estimated turnaround time
        Route::view('/area-layanan', $view . '.area-layanan', $data)->name('area');       // Pickup & delivery coverage
        Route::view('/cara-order', $view . '.cara-order', $data)->name('cara-order'); // Order instructions
        Route::view('/jam-operasional', $view . '.jam-operasional', $data)->name('jam');        // Operating hours
        Route::view('/order-inquiry', $view . '.order-inquiry', $data)->name('order-inquiry'); // Order inquiry
        Route::view('/ai-chatbot', $view . '.ai-chatbot', $data)->name('ai-chatbot'); // AI chatbot (FAQ harga & proses)
    });

Route::prefix('webia/template/home-services/minimalis/laundry-mint-fresh')
    ->name('laundry-mint-fresh.')
    ->group(function () {
        $v = 'website-bisnis.template.home-services.minimalis.laundry-mint-fresh.';

        Route::view('/', $v . 'pages.home')->name('home');
        Route::view('/layanan', $v . 'pages.layanan')->name('layanan');
        Route::view('/daftar-harga', $v . 'pages.harga')->name('harga');
        Route::view('/opsi-layanan', $v . 'pages.opsi')->name('opsi');
        Route::view('/estimasi-waktu', $v . 'pages.estimasi')->name('estimasi');
        Route::view('/area-jemput-antar', $v . 'pages.area')->name('area');
        Route::view('/cara-pemesanan', $v . 'pages.cara')->name('cara');
        Route::view('/jam-operasional', $v . 'pages.jam')->name('jam');
        Route::view('/order-inquiry', $v . 'pages.inquiry')->name('inquiry');
    });

Route::prefix('webia/template/home-services/professional/laundry-classic-trust')
    ->name('laundry-classic-trust.')
    ->group(function () {
        $v = 'website-bisnis.template.home-services.professional.laundry-classic-trust';

        Route::view('/', "$v.index")->name('home');
        Route::view('/layanan-laundry', "$v.services")->name('services');
        Route::view('/daftar-harga', "$v.prices")->name('prices');
        Route::view('/service-options', "$v.options")->name('options');
        Route::view('/estimasi-waktu', "$v.turnaround")->name('turnaround');
        Route::view('/area-jemput-antar', "$v.coverage")->name('coverage');
        Route::view('/cara-pemesanan', "$v.instructions")->name('instructions');
        Route::view('/jam-operasional', "$v.hours")->name('hours');
        Route::view('/order-inquiry', "$v.inquiry")->name('contact');
    });

Route::prefix('webia/template/logistics-company-classic-trust')
    ->name('webia.template.logistics-company.')
    ->group(function () {
        $view = 'website-bisnis.template.transportation&logistics.corporate.logistics-company-classic-trust.';

        Route::view('/', $view . 'index')->name('home');
        Route::view('/layanan', $view . 'layanan')->name('layanan');
        Route::view('/opsi-pengiriman', $view . 'opsi-pengiriman')->name('opsi-pengiriman');
        Route::view('/jangkauan', $view . 'jangkauan')->name('jangkauan');
        Route::view('/armada-gudang', $view . 'armada-gudang')->name('armada-gudang');
        Route::view('/proses-pengiriman', $view . 'proses-pengiriman')->name('proses-pengiriman');
        Route::view('/tracking', $view . 'tracking')->name('tracking');
        Route::view('/klien', $view . 'klien')->name('klien');
        Route::view('/penawaran', $view . 'penawaran')->name('penawaran');
        Route::view('/ai-chatbot', $view . 'ai-chatbot')->name('ai-chatbot');
    });

Route::prefix('webia/template/transportation-logistics/modern/logistics-company-midnight-navy')
    ->name('logistics-company.')
    ->group(function () {
        $ns = 'website-bisnis.template.transportation&logistics.modern.logistics-company-midnight-navy';
        $site = require config_path('template/transportation&logistics/modern/logistics-company-midnight-navy/logistics-company.php');
        $data = ['site' => $site];

        Route::view('/', $ns . '.index', $data)->name('home');
        Route::view('/layanan', $ns . '.layanan', $data)->name('services');
        Route::view('/solusi-freight', $ns . '.solusi-freight', $data)->name('freight');
        Route::view('/jangkauan', $ns . '.jangkauan', $data)->name('coverage');
        Route::view('/armada-gudang', $ns . '.armada-gudang', $data)->name('fleet');
        Route::view('/proses-pengiriman', $ns . '.proses-pengiriman', $data)->name('process');
        Route::view('/tracking', $ns . '.tracking', $data)->name('tracking');
        Route::view('/klien-korporat', $ns . '.klien-korporat', $data)->name('clients');
        Route::view('/minta-penawaran', $ns . '.minta-penawaran', $data)->name('quotation');
        Route::view('/ai-assistant', $ns . '.ai-assistant', $data)->name('chatbot');
    });

Route::prefix('webia/template/transportation-logistics/bold/logistics-company-orange-energy')
    ->name('webia.template.logistics-company-orange-energy.')
    ->group(function () {
        $rp = 'webia.template.logistics-company-orange-energy.';
        $view = 'website-bisnis.template.transportation&logistics.bold.logistics-company-orange-energy.';
        $cfg = 'template.transportation&logistics.bold.logistics-company-orange-energy.logistics-company';
        $imgBase = 'images/website-bisnis/template/transportation&logistics/bold/logistics-company-orange-energy/';

        // Data yang dibagikan ke semua view template (frontend statis, tanpa database).
        $data = fn(): array => [
            'site' => config($cfg),
            'v' => $view,
            'rp' => $rp,
            'to' => fn(?string $name = null): string => $name ? route($rp . $name) : '#',
            'img' => fn(string $file): string => asset($imgBase . $file),
        ];

        // uri => [nama route, nama file blade]
        $pages = [
            '/' => ['home', 'index'],
            'layanan' => ['layanan', 'layanan'],
            'opsi-pengiriman' => ['opsi-pengiriman', 'opsi-pengiriman'],
            'jangkauan' => ['jangkauan', 'jangkauan'],
            'armada-gudang' => ['armada-gudang', 'armada-gudang'],
            'proses-pengiriman' => ['proses-pengiriman', 'proses-pengiriman'],
            'tracking' => ['tracking', 'tracking'],
            'klien-korporat' => ['klien-korporat', 'klien-korporat'],
            'penawaran' => ['penawaran', 'penawaran'],
            'ai-assistant' => ['ai-assistant', 'ai-assistant'],
        ];

        foreach ($pages as $uri => [$name, $file]) {
            Route::get($uri, fn() => view($view . $file, $data()))->name($name);
        }
    });

Route::prefix('webia/template/agriculture-farming/corporate/agribisnis-forest-moss')
    ->name('agribisnis.')
    ->group(function () {
        $v = 'website-bisnis.template.agriculture&farming.corporate.agribisnis-forest-moss';

        Route::view('/', $v . '.index')->name('home');
        Route::view('/katalog-komoditas', $v . '.pages.katalog')->name('katalog');
        Route::view('/informasi-tanaman-panen', $v . '.pages.panen')->name('panen');
        Route::view('/spesifikasi-produk', $v . '.pages.spesifikasi')->name('spesifikasi');
        Route::view('/jumlah-pemesanan-minimal', $v . '.pages.moq')->name('moq');
        Route::view('/kapasitas-pasokan', $v . '.pages.kapasitas')->name('kapasitas');
        Route::view('/jangkauan-distribusi', $v . '.pages.distribusi')->name('distribusi');
        Route::view('/sertifikasi', $v . '.pages.sertifikasi')->name('sertifikasi');
        Route::view('/inquiry-b2b', $v . '.pages.inquiry')->name('inquiry');
        Route::view('/permintaan-penawaran', $v . '.pages.penawaran')->name('penawaran');
        Route::view('/ai-assistant', $v . '.pages.chatbot')->name('chatbot');
    });

Route::prefix('webia/template/agriculture-farming/organic/agribisnis-earth-tone')
    ->name('webia.template.agribisnis-earth-tone.')
    ->group(function () {

        $prefix = 'webia/template/agriculture-farming/organic/agribisnis-earth-tone';
        $viewBase = 'website-bisnis.template.agriculture&farming.organic.agribisnis-earth-tone';
        $assetBase = 'website-bisnis/template/agriculture&farming/organic/agribisnis-earth-tone';

        // $view = nama file blade, $key = kunci halaman (untuk menu aktif & tautan)
        $render = static function (string $view, string $key) use ($prefix, $viewBase, $assetBase) {
            // Data statis dibaca dari config/template/.../agribisnis.php (tanpa database)
            $data = config('template.agriculture&farming.organic.agribisnis-earth-tone.agribisnis');

            if (! is_array($data) || $data === []) {
                $file = config_path('template/agriculture&farming/organic/agribisnis-earth-tone/agribisnis.php');
                $data = is_file($file) ? require $file : [];
            }

            $waNumber = $data['contact']['whatsapp'] ?? '62895630300345';
            $waBase = 'https://wa.me/' . $waNumber;

            // Semua URL dibangun dari prefix sendiri (bukan route name) agar tidak bentrok.
            $urls = [
                'home' => url($prefix),
                'komoditas' => url($prefix . '/komoditas'),
                'panen' => url($prefix . '/informasi-panen'),
                'spesifikasi' => url($prefix . '/spesifikasi-produk'),
                'moq' => url($prefix . '/jumlah-pesanan-minimum'),
                'kapasitas' => url($prefix . '/kapasitas-pasokan'),
                'distribusi' => url($prefix . '/jangkauan-distribusi'),
                'sertifikasi' => url($prefix . '/sertifikasi'),
                'b2b' => url($prefix . '/inquiry-b2b'),
                'penawaran' => url($prefix . '/permintaan-penawaran'),
                'chatbot' => url($prefix . '/ai-chatbot'),
                'whatsapp' => $waBase . '?text=' . rawurlencode($data['contact']['whatsapp_text'] ?? 'Halo AgroHarvest'),
                'whatsapp_karir' => $waBase . '?text=' . rawurlencode('Halo AgroHarvest, saya tertarik dengan informasi karir.'),
            ];

            return view($viewBase . '.' . $view, [
                'data' => $data,
                'u' => $urls,
                'page' => $key,
                'v' => $viewBase,
                'css' => asset('css/' . $assetBase . '/agribisnis.css'),
                'js' => asset('js/' . $assetBase . '/agribisnis.js'),
                'img' => asset('images/' . $assetBase),
            ]);
        };

        Route::get('/', fn() => $render('index', 'home'))->name('home');
        Route::get('/komoditas', fn() => $render('komoditas', 'komoditas'))->name('komoditas');
        Route::get('/informasi-panen', fn() => $render('informasi-panen', 'panen'))->name('panen');
        Route::get('/spesifikasi-produk', fn() => $render('spesifikasi-produk', 'spesifikasi'))->name('spesifikasi');
        Route::get('/jumlah-pesanan-minimum', fn() => $render('jumlah-pesanan-minimum', 'moq'))->name('moq');
        Route::get('/kapasitas-pasokan', fn() => $render('kapasitas-pasokan', 'kapasitas'))->name('kapasitas');
        Route::get('/jangkauan-distribusi', fn() => $render('jangkauan-distribusi', 'distribusi'))->name('distribusi');
        Route::get('/sertifikasi', fn() => $render('sertifikasi', 'sertifikasi'))->name('sertifikasi');
        Route::get('/inquiry-b2b', fn() => $render('inquiry-b2b', 'b2b'))->name('b2b');
        Route::get('/permintaan-penawaran', fn() => $render('permintaan-penawaran', 'penawaran'))->name('penawaran');
        Route::get('/ai-chatbot', fn() => $render('ai-chatbot', 'chatbot'))->name('chatbot');
    });

$agroConfigKey = 'template.agriculture&farming.professional.agribisnis-classic-trust.agribisnis';
$agroConfigFile = config_path('template/agriculture&farming/professional/agribisnis-classic-trust/agribisnis.php');
$agroData = config($agroConfigKey) ?: (is_file($agroConfigFile) ? require $agroConfigFile : []);
$agroView = 'website-bisnis.template.agriculture&farming.professional.agribisnis-classic-trust';

Route::prefix('webia/template/agribisnis-classic-trust')
    ->name('agribisnis-classic-trust.')
    ->group(function () use ($agroData, $agroView) {
        $data = ['agro' => $agroData, 'v' => $agroView];

        Route::view('/', $agroView . '.index', $data)->name('home');
        Route::view('/komoditas', $agroView . '.komoditas', $data)->name('komoditas');
        Route::view('/informasi-panen', $agroView . '.panen', $data)->name('panen');
        Route::view('/spesifikasi-produk', $agroView . '.spesifikasi', $data)->name('spesifikasi');
        Route::view('/minimum-order', $agroView . '.minimum-order', $data)->name('minimum');
        Route::view('/kapasitas-pasokan', $agroView . '.kapasitas', $data)->name('kapasitas');
        Route::view('/jangkauan-distribusi', $agroView . '.distribusi', $data)->name('distribusi');
        Route::view('/sertifikasi', $agroView . '.sertifikasi', $data)->name('sertifikasi');
        Route::view('/b2b-inquiry', $agroView . '.b2b-inquiry', $data)->name('b2b');
        Route::view('/quotation-request', $agroView . '.penawaran', $data)->name('penawaran');
        Route::view('/ai-assistant', $agroView . '.ai-assistant', $data)->name('ai');
    });

Route::prefix('webia/template/nonprofit-community/professional/foundation-classic-trust')
    ->name('foundation-classic-trust.')
    ->group(function () {
        $base = 'website-bisnis.template.nonprofit&community.professional.foundation-classic-trust';
        $path = 'website-bisnis/template/nonprofit&community/professional/foundation-classic-trust';

        $data = [
            'fd' => require config_path('template/nonprofit&community/professional/foundation-classic-trust/foundation.php'),
            'fdBase' => $base,
            'fdImg' => 'images/' . $path,
            'fdCss' => 'css/' . $path . '/foundation.css',
            'fdJs' => 'js/' . $path . '/foundation.js',
        ];

        Route::view('/', $base . '.index', $data)->name('index');
        Route::view('/tentang-kami', $base . '.mission-vision', $data)->name('mission');
        Route::view('/program-kami', $base . '.programs', $data)->name('programs');
        Route::view('/dampak', $base . '.impact', $data)->name('impact');
        Route::view('/donasi', $base . '.donation', $data)->name('donation');
        Route::view('/transparansi-keuangan', $base . '.financial-report', $data)->name('financial');
        Route::view('/mitra-sponsor', $base . '.partners', $data)->name('partners');
        Route::view('/relawan', $base . '.volunteer', $data)->name('volunteer');
        Route::view('/berita-acara', $base . '.news-events', $data)->name('news');
        Route::view('/chatbot', $base . '.chatbot', $data)->name('chatbot');
    });

Route::prefix('webia/template/nonprofit-community/creative/foundation-nature-green')
    ->name('webia.template.nonprofit-community.creative.foundation-nature-green.')
    ->group(function () {
        $view = 'website-bisnis.template.nonprofit&community.creative.foundation-nature-green.';

        Route::get('/', fn() => view($view . 'index'))->name('home');
        Route::get('/tentang-kami', fn() => view($view . 'tentang-kami'))->name('tentang-kami');
        Route::get('/program', fn() => view($view . 'program'))->name('program');
        Route::get('/dampak', fn() => view($view . 'dampak'))->name('dampak');
        Route::get('/donasi', fn() => view($view . 'donasi'))->name('donasi');
        Route::get('/transparansi', fn() => view($view . 'transparansi'))->name('transparansi');
        Route::get('/mitra', fn() => view($view . 'mitra'))->name('mitra');
        Route::get('/relawan', fn() => view($view . 'relawan'))->name('relawan');
        Route::get('/berita', fn() => view($view . 'berita'))->name('berita');
        Route::get('/ai-chatbot', fn() => view($view . 'ai-chatbot'))->name('ai-chatbot');
    });

Route::prefix('webia/template/nonprofit-community/minimalis/foundation-warm-neutral')
    ->name('foundation-warm-neutral.')
    ->group(function () {

        $viewBase = 'website-bisnis.template.nonprofit&community.minimalis.foundation-warm-neutral';
        $assetDir = 'template/nonprofit&community/minimalis/foundation-warm-neutral';

        // Konten dibaca dari config; jika belum ter-load (mis. config cache lama), baca file langsung.
        $config = config('template.nonprofit&community.minimalis.foundation-warm-neutral.foundation');
        if (empty($config) || ! is_array($config)) {
            $file = base_path('config/' . $assetDir . '/foundation.php');
            $config = is_file($file) ? require $file : [];
        }

        $data = [
            'f' => $config,
            'v' => $viewBase,
            'rp' => 'foundation-warm-neutral.',
            'img' => 'images/website-bisnis/' . $assetDir,
            'css' => 'css/website-bisnis/' . $assetDir . '/foundation.css',
            'js' => 'js/website-bisnis/' . $assetDir . '/foundation.js',
        ];

        $pages = [
            'home' => ['/',                'index'],
            'mission-vision' => ['/misi-visi',       'mission-vision'],
            'programs' => ['/program',         'programs'],
            'impact' => ['/dampak',          'impact'],
            'donation' => ['/donasi',          'donation'],
            'transparency' => ['/transparansi',    'transparency'],
            'partners' => ['/mitra-sponsor',   'partners'],
            'volunteer' => ['/relawan',         'volunteer'],
            'news' => ['/berita-acara',    'news'],
            'chatbot' => ['/hopebot',         'chatbot'],
        ];

        foreach ($pages as $name => $page) {
            Route::view($page[0], $viewBase . '.' . $page[1], $data)->name($name);
        }
    });

Route::prefix('webia/template/nonprofit-community/creative/social-organization-tropical-rush')
    ->name('webia.so.')
    ->group(function () {
        $view = 'website-bisnis.template.nonprofit&community.creative.social-organization-tropical-rush.social-organization';

        $pages = [
            'home' => '/',
            'profil' => 'profil',
            'program' => 'program',
            'galeri' => 'galeri',
            'dampak' => 'dampak',
            'event' => 'event',
            'gabung' => 'gabung',
            'mitra' => 'mitra',
            'kontak' => 'kontak',
            'faq-ai' => 'faq-ai',
        ];

        foreach ($pages as $name => $uri) {
            Route::get($uri, fn() => view($view, ['page' => $name]))->name($name);
        }
    });

Route::prefix('webia/template/nonprofit-community/bold/social-organization-citrus-pop')->group(function () {
    $view = 'website-bisnis.template.nonprofit&community.bold.social-organization-citrus-pop.';
    $dir = 'website-bisnis/template/nonprofit&community/bold/social-organization-citrus-pop/';
    $key = 'template.nonprofit&community.bold.social-organization-citrus-pop.social-organization';

    $ctx = function (string $page) use ($view, $dir, $key) {
        $data = config($key) ?: require config_path('template/nonprofit&community/bold/social-organization-citrus-pop/social-organization.php');

        return [
            'd' => $data,
            'v' => $view,
            'page' => $page,
            'inc' => $view . 'partials.' . $page,
            'title' => $data['pages'][$page]['t'],
            'base' => rtrim(url('/webia/template/nonprofit-community/bold/social-organization-citrus-pop'), '/'),
            'img' => asset('images/' . $dir),
            'css' => asset('css/' . $dir . 'social-organization.css'),
            'js' => asset('js/' . $dir . 'social-organization.js'),
        ];
    };

    Route::get('/', fn() => view($view . 'social-organization', $ctx('beranda')))->name('citrus.beranda');

    foreach (['profil', 'program', 'galeri', 'kisah', 'event', 'daftar', 'mitra', 'kontak', 'chatbot'] as $page) {
        Route::get('/' . $page, fn() => view($view . 'halaman', $ctx($page)))->name('citrus.' . $page);
    }
});

Route::get('/webia/template/photography-creative-studio/bold/ugc-content-creator-studio-pink-voltage/{page?}', function (?string $page = null) {
    return view('website-bisnis.template.photography-creative-studio.bold.ugc-content-creator-studio-pink-voltage.ugc-content-creator-studio', ['page' => $page ?: 'home']);
})->where('page', 'home|portofolio|video-ugc|paket|hak-guna|platform|kolaborasi|kampanye|testimoni|tanya-ai')->name('webia.template.ugc-content-creator-studio');

Route::prefix('webia/template/photography-creative-studio/futuristic/ugc-content-creator-studio-dark-mode')
    ->name('ugc.')
    ->group(function () {
        $pages = [
            'home' => '',
            'portfolio' => 'creator-portfolio',
            'samples' => 'ugc-video-samples',
            'packages' => 'content-packages',
            'rights' => 'deliverables-usage-rights',
            'platforms' => 'supported-platforms',
            'brands' => 'brand-collaborations',
            'inquiry' => 'campaign-inquiry',
            'testimonials' => 'client-testimonials',
            'faq' => 'ai-chatbot-faq',
        ];

        $view = 'website-bisnis.template.photography-creative-studio.futuristic.ugc-content-creator-studio-dark-mode.ugc-content-creator-studio';
        $data = require config_path('template/photography-creative-studio/futuristic/ugc-content-creator-studio-dark-mode/ugc-content-creator-studio.php');

        foreach ($pages as $key => $slug) {
            Route::view($slug, $view, ['page' => $key, 'd' => $data])->name($key);
        }
    });

Route::get('/webia/template/wedding-event/bold/event-organizer-sunset-gradient/{page?}', function (?string $page = null) {
    $path = config_path('template/wedding-event/bold/event-organizer-sunset-gradient/event-organizer.php');
    $cfg = config('template.wedding-event.bold.event-organizer-sunset-gradient.event-organizer');

    if (! is_array($cfg)) {
        $cfg = require $path;
    }

    abort_if($page !== null && ! isset($cfg['pages'][$page]), 404);

    return view('website-bisnis.template.wedding-event.bold.event-organizer-sunset-gradient.event-organizer', [
        'c' => $cfg,
        'page' => $page,
    ]);
})->where('page', '[a-z\-]+')->name('webia.event-organizer');

Route::prefix('webia/template/wedding-event/creative/event-organizer-purple-dream')
    ->name('webia.template.event-organizer-purple-dream.')
    ->group(function () {
        $view = 'website-bisnis.template.wedding-event.creative.event-organizer-purple-dream.';

        Route::view('/', $view . 'beranda', ['page' => 'home'])->name('home');
        Route::view('/layanan', $view . 'layanan', ['page' => 'layanan'])->name('layanan');
        Route::view('/portofolio', $view . 'portofolio', ['page' => 'portofolio'])->name('portofolio');
        Route::view('/paket-event', $view . 'paket-event', ['page' => 'paket'])->name('paket');
        Route::view('/proyek-kami', $view . 'proyek-kami', ['page' => 'proyek'])->name('proyek');
        Route::view('/klien', $view . 'klien', ['page' => 'klien'])->name('klien');
        Route::view('/proses', $view . 'proses', ['page' => 'proses'])->name('proses');
        Route::view('/penawaran', $view . 'penawaran', ['page' => 'penawaran'])->name('penawaran');
        Route::view('/faq-ai', $view . 'faq-ai', ['page' => 'faq'])->name('faq');
    });

Route::prefix('webia/template/travel-tourism/elegan/umrah-haji-navy-champagne-gold')
    ->name('umrah-haji-navy.')
    ->group(function () {
        $viewBase   = 'website-bisnis.template.travel&tourism.elegan.umrah-haji-navy-champagne-gold';
        $imgBase    = 'images/website-bisnis/template/travel&tourism/elegan/umrah-haji-navy-champagne-gold/';
        $cssFile    = 'css/website-bisnis/template/travel&tourism/elegan/umrah-haji-navy-champagne-gold/umrah-haji.css';
        $jsFile     = 'js/website-bisnis/template/travel&tourism/elegan/umrah-haji-navy-champagne-gold/umrah-haji.js';
        $configKey  = 'template.travel&tourism.elegan.umrah-haji-navy-champagne-gold.umrah-haji';
        $configFile = 'template/travel&tourism/elegan/umrah-haji-navy-champagne-gold/umrah-haji.php';

        // Memuat data statis; jika config belum terbaca, file dimuat langsung
        $loadData = function () use ($configKey, $configFile) {
            $data = config($configKey);

            if (! is_array($data)) {
                $data = require config_path($configFile);
            }

            return $data;
        };

        // Membuat response satu halaman
        $page = function (string $name, string $view) use ($viewBase, $imgBase, $cssFile, $jsFile, $loadData) {
            $d = $loadData();

            // Awalan nama route diambil dari route yang sedang aktif (aman di dalam group lain)
            $currentRoute = (string) Route::currentRouteName();
            $routePrefix  = substr($currentRoute, 0, (int) strrpos($currentRoute, '.'));

            return view($viewBase . '.' . $view, [
                'd'    => $d,
                'page' => $name,
                'v'    => $viewBase,
                'css'  => asset($cssFile),
                'js'   => asset($jsFile),
                'img'  => fn($file) => asset($imgBase . $file),
                'r'    => fn($route) => route($routePrefix . '.' . $route),
                'rp'   => fn($n) => 'Rp ' . number_format($n, 0, ',', '.'),
                'wa'   => fn($text = null) => 'https://wa.me/' . $d['contact']['wa'] . ($text ? '?text=' . rawurlencode($text) : ''),
            ]);
        };

        Route::get('/', fn() => $page('home', 'umrah-haji'))->name('home');
        Route::get('paket-umrah-haji', fn() => $page('paket', 'paket'))->name('paket');
        Route::get('jadwal-keberangkatan', fn() => $page('jadwal', 'jadwal'))->name('jadwal');
        Route::get('harga-paket', fn() => $page('harga', 'harga'))->name('harga');
        Route::get('hotel-pesawat', fn() => $page('hotel', 'hotel'))->name('hotel');
        Route::get('itinerary', fn() => $page('itinerary', 'itinerary'))->name('itinerary');
        Route::get('tim-kami', fn() => $page('tim', 'tim'))->name('tim');
        Route::get('persyaratan', fn() => $page('persyaratan', 'persyaratan'))->name('persyaratan');
        Route::get('testimoni', fn() => $page('testimoni', 'testimoni'))->name('testimoni');
        Route::get('ai-chat', fn() => $page('chat', 'chat'))->name('chat');
    });

view()->composer(
    'website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green.*',
    function ($view) {
        $request = request();
        $shared  = $request->attributes->get('umrah-haji.shared');

        if ($shared === null) {
            $uh      = config('template.travel&tourism.classic.umrah-haji-emerald-green.umrah-haji');
            $imgBase = 'images/website-bisnis/template/travel&tourism/classic/umrah-haji-emerald-green/';
            $name    = optional(request()->route())->getName();
            $active  = is_string($name) && str_starts_with($name, 'umrah-haji.')
                ? substr($name, strlen('umrah-haji.'))
                : 'home';

            $url = fn(string $key) => route('umrah-haji.' . $key);
            $img = fn(string $file) => asset($imgBase . $file);
            $wa  = fn(string $text) => 'https://wa.me/' . $uh['brand']['whatsapp'] . '?text=' . rawurlencode($text);

            $icons = [
                'packages' => 'kaaba',
                'schedules' => 'calendar',
                'prices' => 'tag',
                'hotel-flight' => 'hotel',
                'itinerary' => 'route',
                'team' => 'guide',
                'requirements' => 'file',
                'testimonials' => 'star',
            ];

            // indeks pencarian di navbar
            $search = [];
            foreach ($uh['nav'] as $item) {
                if ($item['key'] === 'home') {
                    continue;
                }
                $search[] = [
                    'label' => $item['label'],
                    'text'  => $uh['pages'][$item['key']]['text'] ?? '',
                    'url'   => $url($item['key']),
                    'icon'  => $icons[$item['key']] ?? 'file',
                    'keys'  => '',
                ];
            }
            foreach ($uh['packages'] as $pkg) {
                $search[] = [
                    'label' => $pkg['name'],
                    'text'  => $pkg['duration'] . ' · mulai ' . $pkg['price'],
                    'url'   => $url('packages') . '#' . $pkg['slug'],
                    'icon'  => 'kaaba',
                    'keys'  => $pkg['type'] . ' ' . $pkg['route'],
                ];
            }
            $search[] = [
                'label' => $uh['pages']['chatbot']['title'],
                'text'  => $uh['pages']['chatbot']['text'],
                'url'   => $url('chatbot'),
                'icon'  => 'message',
                'keys'  => 'faq tanya chat bantuan',
            ];

            // FAQ chatbot (tautan sudah berupa URL penuh)
            $faq = [];
            foreach ($uh['faq'] as $f) {
                $faq[] = [
                    'keys'       => $f['keys'],
                    'a'          => $f['a'],
                    'url'        => isset($f['link']) ? $url($f['link']) : null,
                    'link_label' => $f['link_label'] ?? null,
                ];
            }

            $shared = [
                'uh'     => $uh,
                'active' => $active,
                'url'    => $url,
                'img'    => $img,
                'wa'     => $wa,
                'css'    => asset('css/website-bisnis/template/travel&tourism/classic/umrah-haji-emerald-green/umrah-haji.css'),
                'js'     => asset('js/website-bisnis/template/travel&tourism/classic/umrah-haji-emerald-green/umrah-haji.js'),
                'jsData' => [
                    'wa'     => $wa($uh['hero']['wa_consult']),
                    'ai'     => ['welcome' => $uh['ai']['welcome'], 'fallback' => $uh['ai']['fallback']],
                    'faq'    => $faq,
                    'search' => $search,
                ],
            ];

            $request->attributes->set('umrah-haji.shared', $shared);
        }

        $view->with($shared);
    }
);

// ---- Rute halaman (Route::view: tanpa controller, tanpa Closure) ----
Route::prefix('webia/template/travel-tourism/classic/umrah-haji-emerald-green')
    ->name('umrah-haji.')
    ->group(function () {
        $v = 'website-bisnis.template.travel&tourism.classic.umrah-haji-emerald-green';

        Route::view('/', $v . '.index')->name('home');
        Route::view('/paket', $v . '.packages')->name('packages');
        Route::view('/jadwal', $v . '.schedules')->name('schedules');
        Route::view('/harga', $v . '.prices')->name('prices');
        Route::view('/hotel-pesawat', $v . '.hotel-flight')->name('hotel-flight');
        Route::view('/itinerary', $v . '.itinerary')->name('itinerary');
        Route::view('/tim', $v . '.team')->name('team');
        Route::view('/persyaratan', $v . '.requirements')->name('requirements');
        Route::view('/testimoni', $v . '.testimonials')->name('testimonials');
        Route::view('/chatbot', $v . '.chatbot')->name('chatbot');
    });


// ------------------------------------------------------------------------------------------------------------------------------------------------------

Route::prefix('webia/template/transportation-logistics/delivery/logistics-company-emerald-express')->group(function () {
    $view = 'website-bisnis.template.transportation&logistics.delivery.logistics-company-emerald-express.';
    $site = require config_path('template/transportation&logistics/delivery/logistics-company-emerald-express/logistics-company.php');

    Route::get('/', fn() => view($view . 'index', ['site' => $site]))->name('webia.template.logistics-company-emerald-express.home');
});

Route::prefix('webia/template/transportation-logistics/moving/logistics-company-navy-hearth')->group(function () {
    $view = 'website-bisnis.template.transportation&logistics.moving.logistics-company-navy-hearth.';
    $site = require config_path('template/transportation&logistics/moving/logistics-company-navy-hearth/logistics-company.php');

    Route::get('/', fn() => view($view . 'index', ['site' => $site]))->name('webia.template.logistics-company-navy-hearth.home');
});

Route::prefix('webia/template/transportation-logistics/luxury/logistics-company-rose-atelier')->group(function () {
    $view = 'website-bisnis.template.transportation&logistics.luxury.logistics-company-rose-atelier.';
    $site = require config_path('template/transportation&logistics/luxury/logistics-company-rose-atelier/logistics-company.php');

    Route::get('/', fn() => view($view . 'index', ['site' => $site]))->name('webia.template.logistics-company-rose-atelier.home');
});

// ------------------------------------------------------------------------------------------------------------------//

Route::prefix('webia/template')->group(function () {
    Route::view(
        '/personal-trainer-jelly-pop',
        'website-bisnis.templates.sports-fitness.personal-trainer.jelly-pop.personal-trainer-jelly-pop'
    )->name('webia.template.personal-trainer.jelly-pop');

    Route::view(
        '/personal-trainer-jelly-pop/detail',
        'website-bisnis.templates.sports-fitness.personal-trainer.jelly-pop.personal-trainer-detail-jelly-pop'
    )->name('webia.template.personal-trainer.jelly-pop.detail');
});

Route::prefix('webia/template')->group(function () {
    Route::view(
        '/pilates-studio-strawberry-fizz',
        'website-bisnis.templates.sports-fitness.pilates-studio.strawberry-fizz.pilates-strawberry-fizz'
    )->name('webia.template.pilates-studio.strawberry-fizz');

    Route::view(
        '/pilates-studio-strawberry-fizz/classes',
        'website-bisnis.templates.sports-fitness.pilates-studio.strawberry-fizz.pilates-classes-strawberry-fizz'
    )->name('webia.template.pilates-studio.strawberry-fizz.classes');

    Route::view(
        '/pilates-studio-strawberry-fizz/class-detail',
        'website-bisnis.templates.sports-fitness.pilates-studio.strawberry-fizz.pilates-class-detail-strawberry-fizz'
    )->name('webia.template.pilates-studio.strawberry-fizz.detail');
});

// interior-design template
Route::prefix('webia/template')->group(function () {
    Route::view(
        '/interior-design-studio-artistic-terracotta',
        'website-bisnis.templates.interior-architecture.interior-design-studio.artistic-terracotta.artistic-terracotta'
    )->name('webia.template.interior-design-studio.artistic-terracotta');
});

Route::prefix('webia/template')->group(function () {
    Route::view(
        '/aethel-moss-architectural-studio',
        'website-bisnis.templates.interior-architecture.architecture-building-design.aethel-moss.aethel-moss'
    )->name('webia.template.aethel-moss-architectural-studio');
});

Route::prefix('webia/template')->group(function () {
    Route::view(
        '/pebble-sprouts-baby-kids',
        'website-bisnis.templates.retail.baby-kids-products.pebble-sprouts.pebble-sprouts'
    )->name('webia.template.pebble-sprouts-baby-kids');
});

Route::prefix('webia/template')->group(function () {
    Route::view(
        '/petit-wonder-candy-cloud',
        'website-bisnis.templates.retail.baby-kids-products.petit-wonder-candy-cloud'
    )->name('webia.template.retail.petit-wonder-candy-cloud');

    Route::view(
        '/aurora-petit-yellow-sunshine',
        'website-bisnis.templates.retail.baby-kids-products.aurora-petit-yellow-sunshine'
    )->name('webia.template.retail.aurora-petit-yellow-sunshine');
});

Route::prefix('webia/template')->group(function () {
    Route::view(
        '/vibesnatch-fashion-store',
        'website-bisnis.templates.retail.fashion-clothing-store.vibesnatch.vibesnatch'
    )->name('webia.template.vibesnatch-fashion-store');
});

Route::prefix('webia/template')->group(function () {
    Route::view(
        '/aria-thorne-author-writer',
        'website-bisnis.templates.personal-brand.author-writer.aria-thorne.aria-thorne'
    )->name('webia.template.aria-thorne-author-writer');
});

Route::prefix('webia/template')->group(function () {
    Route::view(
        '/arya-sanjaya-ruby-editorial',
        'website-bisnis.templates.personal-brand.author-writer.arya-sanjaya-ruby-editorial'
    )->name('webia.template.personal-brand.arya-sanjaya-ruby-editorial');

    Route::view(
        '/arya-sanjaya-plum-velvet',
        'website-bisnis.templates.personal-brand.author-writer.arya-sanjaya-plum-velvet'
    )->name('webia.template.personal-brand.arya-sanjaya-plum-velvet');
});

Route::view(
    'webia/template/fnb/restaurant/little-corner',
    'website-bisnis.templates.fnb.little-corner'
)
    ->name('webia.templates.little-corner');
Route::view(
    'webia/template/beauty/bold-pastel-beauty',
    'website-bisnis.templates.beauty.bold-pastel-beauty'
)
    ->name('webia.templates.bold-pastel-beauty');

Route::view(
    'webia/template/beauty/icy-blue-tech',
    'website-bisnis.templates.beauty.icy-blue-tech'
)->name('webia.templates.icy-blue-tech');

$viewBase = 'website-bisnis.templates.beauty.ruby-luxe';

Route::prefix('templates/ruby-luxe')->name('ruby-luxe.')->group(function () use ($viewBase) {
    Route::view('/', $viewBase . '.home')->name('home');

    Route::view('/treatments', $viewBase . '.treatments.index')
        ->name('treatments.index');

    Route::view('/treatments/{slug}', $viewBase . '.treatments.show')
        ->name('treatments.show');

    Route::view('/products', $viewBase . '.products.index')
        ->name('products.index');

    Route::view('/products/{slug}', $viewBase . '.products.show')
        ->name('products.show');

    Route::view('/cart', $viewBase . '.products.cart')
        ->name('cart');

    Route::view('/booking', $viewBase . '.booking.create')
        ->name('booking.create');

    Route::view('/booking/confirmation', $viewBase . '.booking.confirmation')
        ->name('booking.confirmation');

    Route::view('/journal', $viewBase . '.journal.index')
        ->name('journal.index');

    Route::view('/journal/{slug}', $viewBase . '.journal.show')
        ->name('journal.show');

    Route::view('/about', $viewBase . '.pages.about')->name('about');
    Route::view('/team', $viewBase . '.pages.team')->name('team');
    Route::view('/contact', $viewBase . '.pages.contact')->name('contact');
    Route::view('/faq', $viewBase . '.pages.faq')->name('faq');

    Route::prefix('account')->name('account.')->group(function () use ($viewBase) {
        Route::view('/', $viewBase . '.account.dashboard')->name('dashboard');
        Route::view('/bookings', $viewBase . '.account.bookings')->name('bookings');
        Route::view('/orders', $viewBase . '.account.orders')->name('orders');
    });

    Route::prefix('admin')->name('admin.')->group(function () use ($viewBase) {
        Route::view('/', $viewBase . '.admin.dashboard')->name('dashboard');

        Route::view('/treatments', $viewBase . '.admin.treatments.index')
            ->name('treatments.index');

        Route::view('/products', $viewBase . '.admin.products.index')
            ->name('products.index');

        Route::view('/bookings', $viewBase . '.admin.bookings.index')
            ->name('bookings.index');

        Route::view('/orders', $viewBase . '.admin.orders.index')
            ->name('orders.index');

        Route::view('/articles', $viewBase . '.admin.articles.index')
            ->name('articles.index');
    });

    Route::get('/login', function () {
        return view('website-bisnis.templates.beauty.ruby-luxe.login');
    });

    Route::get('/register', function () {
        return view('website-bisnis.templates.beauty.ruby-luxe.register');
    })->name('ruby-luxe.register');

    Route::post('/register', [RubyRegisterController::class, 'store'])
        ->name('register.submit');
});

// Route::view(
//     'webia/template/property/coral-haven',
//     'website-bisnis.template.property.perumahan.coral-haven'
// )->name('webia.templates.coral-haven');
// Route::view('/template/salon-modern-sage', 'website-bisnis.templates.salon-modern-sage')
//     ->name('template.salon-modern-sage');
// Route::view(
//     '/template/salon-classic-warm-neutral',
//     'website-bisnis.templates.salon-classic-warm-neutral'
// )->name('template.salon-classic-warm-neutral');

// Route::view(
//     '/template/salon-elegant-soft-pink',
//     'website-bisnis.templates.salon-elegant-soft-pink'
// )->name('template.salon-elegant-soft-pink');

Route::view(
    'webia/template/property/coral-haven',
    'website-bisnis.template.property.perumahan.coral-haven'
)->name('webia.templates.coral-haven');

// WEBIA — Indra Automotive templates.
Route::view(
    '/webia/template/tidal-detail-artistic-automotive',
    'website-bisnis.templates.automotive.artistic'
)->name('webia.template.automotive.tidal-detail-artistic');

Route::view(
    '/webia/template/noir-atelier-luxury-automotive',
    'website-bisnis.templates.automotive.luxury'
)->name('webia.template.automotive.noir-atelier-luxury');

Route::view(
    '/webia/template/form-auto-care-minimal-automotive',
    'website-bisnis.templates.automotive.minimal'
)->name('webia.template.automotive.form-auto-care-minimal');

// WEBIA — Indra Wedding & Fitness templates.
Route::view(
    '/webia/template/wedding-event/catering-wedding-cake/solenne-sunshine',
    'website-bisnis.templates.wedding-event.Catering-Wedding-Cake.solenne-sunshine.solenne-sunshine'
)->name('webia.template.wedding-event.solenne-sunshine');

Route::view(
    '/webia/template/sports-fitness/personal-trainer/northline-blue',
    'website-bisnis.templates.sports-fitness.personal-trainer.northline-blue.northline-blue'
)->name('webia.template.sports-fitness.northline-blue');

Route::view(
    '/webia/template/sports-fitness/personal-trainer/cyber-neon',
    'website-bisnis.templates.sports-fitness.personal-trainer.cyber-neon.cyber-neon'
)->name('webia.template.sports-fitness.cyber-neon');

Route::prefix('webia/template')->group(function () {
    Route::view(
        '/revolt-impact-social-organization',
        'website-bisnis.templates.nonprofit-community.social-organization.revolt-impact.revolt-impact'
    )->name('webia.template.revolt-impact-social-organization');
    Route::view(
        '/lentera-nusantara-volunteer-group',
        'website-bisnis.templates.nonprofit-community.volunteer-group.lentera-nusantara.lentera-nusantara'
    )->name('webia.template.lentera-nusantara-volunteer-group');
    Route::view(
        '/relakita-volunteer-warm-sunrise',
        'website-bisnis.templates.nonprofit-community.relakita-volunteer-warm-sunrise'
    )->name('webia.template.nonprofit-community.relakita-volunteer-warm-sunrise');
    Route::view(
        '/kolektif-aksi-kita-volunteer-midnight-navy',
        'website-bisnis.templates.nonprofit-community.kolektif-aksi-kita-volunteer-midnight-navy'
    )->name('webia.template.nonprofit-community.kolektif-aksi-kita-volunteer-midnight-navy');
    Route::view(
        '/ironpulse-gym-fitness-center',
        'website-bisnis.templates.sports-fitness.gym-fitness-center.ironpulse.ironpulse'
    )->name('webia.template.ironpulse-gym-fitness-center');
    Route::view(
        '/candy-cloud-ugc-content-creator-studio',
        'website-bisnis.templates.photography-creative.ugc-content-creator-studio.candy-cloud-studio.candy-cloud-studio'
    )->name('webia.template.candy-cloud-ugc-content-creator-studio');
    Route::view(
        '/cocoexpress-delivery-service',
        'website-bisnis.templates.transportation-logistics.delivery-service.cocoexpress.cocoexpress'
    )->name('webia.template.cocoexpress-delivery-service');
    Route::view(
        '/reloko-moving-company',
        'website-bisnis.templates.transportation-logistics.moving-company.reloko.reloko'
    )->name('webia.template.reloko-moving-company');
    Route::view(
        '/sakuratech-hardware-computer-networking',
        'website-bisnis.templates.technology.hardware-computer-networking.sakuratech.sakuratech'
    )->name('webia.template.sakuratech-hardware-computer-networking');
    Route::view(
        '/sakurabit-hardware-computer-networking',
        'website-bisnis.templates.technology.hardware-computer-networking.sakurabit.sakurabit'
    )->name('webia.template.sakurabit-hardware-computer-networking');
    Route::view(
        '/cyberwave-hardware-computer-networking',
        'website-bisnis.templates.technology.hardware-computer-networking.cyberwave.cyberwave'
    )->name('webia.template.cyberwave-hardware-computer-networking');
    Route::view(
        '/aetherion-digital-hardware-universe',
        'website-bisnis.templates.technology.hardware-computer-networking.aetherion.aetherion'
    )->name('webia.template.aetherion-digital-hardware-universe');
    Route::view(
        '/baitul-safar-umrah-haji',
        'website-bisnis.templates.travel-tourism.umrah-haji.baitul-safar.baitul-safar'
    )->name('webia.template.baitul-safar-umrah-haji');
    Route::view(
        '/wildtrail-adventure-outdoor',
        'website-bisnis.templates.travel-tourism.adventure-outdoor-tour.wildtrail.wildtrail'
    )->name('webia.template.wildtrail-adventure-outdoor');
    Route::view(
        '/verba-translation-interpreter',
        'website-bisnis.templates.professional-service.translation-interpreter.verba.verba'
    )->name('webia.template.verba-translation-interpreter');
    Route::view(
        '/vanguard-lawyer',
        'website-bisnis.templates.professional-service.lawyer.vanguard.vanguard'
    )->name('webia.template.vanguard-lawyer');
});
