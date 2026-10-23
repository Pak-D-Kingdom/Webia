<?php

use App\Http\Controllers\Admin\WebiaAddonController;
use App\Http\Controllers\Admin\WebiaOrderController as AdminWebiaOrderController;
use App\Http\Controllers\Admin\WebiaPackageController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\WebiaOrderController;
use App\Http\Controllers\WebsiteBisnis\TemplateCollectionController;
use Illuminate\Support\Facades\Route;

// WEBIA — Homepage utama
Route::view('/', 'website-bisnis.index')->name('home');

// Webhook & callback Midtrans — diluar middleware auth (dipanggil server Midtrans / redirect publik).
Route::post('/payments/midtrans/notify', [MidtransController::class, 'notify'])->middleware('throttle:60,1')->name('payments.midtrans.notify');
Route::get('/payments/midtrans/callback', [MidtransController::class, 'callback'])->middleware('throttle:30,1')->name('payments.midtrans.callback');

Route::middleware('guest')->group(function (): void {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('throttle:6,1');
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('throttle:6,1');
});

Route::middleware('auth')->group(function (): void {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/orders', [WebiaOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [WebiaOrderController::class, 'create'])->name('orders.create');
    Route::post('/orders', [WebiaOrderController::class, 'store'])->middleware('throttle:10,1')->name('orders.store');
    Route::get('/orders/{order}', [WebiaOrderController::class, 'show'])->name('orders.show');
    Route::post('/orders/{order}/receipt', [WebiaOrderController::class, 'uploadReceipt'])->middleware('throttle:5,1')->name('orders.receipt');
    Route::post('/orders/{order}/pay', [WebiaOrderController::class, 'pay'])->middleware('throttle:6,1')->name('orders.pay');
    Route::post('/orders/{order}/pay/check', [WebiaOrderController::class, 'checkStatus'])->middleware('throttle:10,1')->name('orders.pay.check');
    Route::get('/payments/midtrans/simulate/{payment}', [MidtransController::class, 'simulateShow'])->middleware('throttle:10,1')->name('payments.midtrans.simulate');
    Route::post('/payments/midtrans/simulate/{payment}', [MidtransController::class, 'simulatePay'])->middleware('throttle:10,1')->name('payments.midtrans.simulate.pay');
    Route::post('/orders/{order}/business', [WebiaOrderController::class, 'saveBusinessData'])->middleware('throttle:10,1')->name('orders.business');

    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function (): void {
        Route::view('/', 'admin.dashboard')->name('dashboard');
        Route::resource('packages', WebiaPackageController::class)->except('show');
        Route::resource('addons', WebiaAddonController::class)->except('show');
        Route::get('orders', [AdminWebiaOrderController::class, 'index'])->name('orders.index');
        Route::get('orders/{order}', [AdminWebiaOrderController::class, 'show'])->name('orders.show');
        Route::get('orders/{order}/receipt', [AdminWebiaOrderController::class, 'receipt'])->name('orders.receipt');
        Route::post('orders/{order}/verify', [AdminWebiaOrderController::class, 'verify'])->name('orders.verify');
        Route::post('orders/{order}/progress', [AdminWebiaOrderController::class, 'progress'])->name('orders.progress');
    });
});

// Route::view('/webia/koleksi', 'website-bisnis.collections.index')
//     ->name('webia.collections');

Route::get(
    '/webia/koleksi',
    [TemplateCollectionController::class, 'index']
)->name('collections');

Route::view(
    '/webia/template/aurumco-catering',
    'website-bisnis.templates.fnb.aurumco-catering'
)->name('webia.template.aurumco-catering');

Route::view(
    '/webia/template/vallaco-catering',
    'website-bisnis.templates.fnb.vallaco-catering'
)->name('webia.template.vallaco-catering');
    '/webia/template/fnb-bakery-playful-colorful',
    'website-bisnis.templates.fnb.bakery.bakery-playful-colorful'
)->name('webia.template.fnb.bakery.playful.colorful');

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
