<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\WebiaAddonController;
use App\Http\Controllers\Admin\WebiaOrderController as AdminWebiaOrderController;
use App\Http\Controllers\Admin\WebiaPackageController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CustomerSiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\RubyRegisterController;
use App\Http\Controllers\WebiaOrderController;
use App\Http\Controllers\WebsiteBisnis\TemplateCollectionController;
use Illuminate\Support\Facades\Route;

// WEBIA — Homepage utama
Route::view('/', 'website-bisnis.index')->name('home');
Route::redirect('/webia', '/');

// Webhook & callback Midtrans — diluar middleware auth (dipanggil server Midtrans / redirect publik).
Route::post('/payments/midtrans/notify', [MidtransController::class, 'notify'])->middleware('throttle:60,1')->name('payments.midtrans.notify');
Route::get('/payments/midtrans/callback', [MidtransController::class, 'callback'])->middleware('throttle:30,1')->name('payments.midtrans.callback');
Route::get('/s/{order:site_slug}/{page?}', CustomerSiteController::class)
    ->whereIn('page', ['menu', 'reservasi'])
    ->name('sites.show');

Route::middleware('guest')->group(function (): void {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('throttle:6,1');
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('throttle:6,1');
});

Route::middleware('auth')->group(function (): void {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
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
    '/webia/template/education/preschool-daycare-jeli-kecil',
    'website-bisnis.template.education.preschool-daycare-jeli-kecil.index'
)->name('webia.template.education.jeli-kecil');

Route::view(
    '/webia/template/healthcare/psychology/ruang-tenang',
    'website-bisnis.template.healthcare.psychology.ruang-tenang.index'
)->name('webia.template.healthcare.psychology.ruang-tenang');

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

        return view("$v.$page", ['v' => $v, 'path' => $path, 'pageUrl' => fn (string $name = 'home', string $hash = '') => route("webia.fnb.minimalis.{$name}").$hash]);
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

$vintage = fn (string $page) => fn () => view(
    "website-bisnis.template.f&b.vintage.cafe-earthtone.{$page}",
    ['cafe' => config('template.f&b.vintage.cafe-earthtone.cafe')]
);

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

        Route::view('/', $ns.'.index')->name('home');
        Route::view('/tentang-kami', $ns.'.tentang-kami')->name('about');
        Route::view('/portofolio', $ns.'.portofolio')->name('portfolio');
    });

Route::prefix('webia/template/company/classic/company-profile-warm-neutral')
    ->name('company-profile-warm-neutral.')
    ->group(function () {
        $ns = 'website-bisnis.template.company.classic.company-profile-warm-neutral';

        Route::view('/', $ns.'.index')->name('home');
        Route::view('/tentang-kami', $ns.'.tentang-kami')->name('about');
        Route::view('/portofolio', $ns.'.portofolio')->name('portfolio');
    });

Route::prefix('webia/template/property/luxury/real-estate-agency-emerald-green')
    ->name('website-bisnis.template.property.luxury.real-estate-agency-emerald-green.')
    ->group(function () {
        $view = 'website-bisnis.template.property.luxury.real-estate-agency-emerald-green';

        Route::view('/',                $view . '.index')->name('index');
        Route::view('/property',        $view . '.property')->name('property');
        Route::view('/property/{slug}', $view . '.property-detail')->name('property.show');
        Route::view('/about',           $view . '.about')->name('about');
        Route::view('/gallery',         $view . '.gallery')->name('gallery');
        Route::view('/booking',         $view . '.booking')->name('booking');
        Route::view('/blog',            $view . '.blog')->name('blog');
        Route::view('/blog/{post}',     $view . '.blog-detail')->name('blog.show');
        Route::view('/contact',         $view . '.contact')->name('contact');
    });

Route::prefix('webia/template/property/premium-minimal/real-estate-agency-nature-green')
    ->name('property.premium-minimal.nature-green.')
    ->group(function () {
        $name = 'property.premium-minimal.nature-green.';
        $ns = 'website-bisnis.template.property.premium-minimal.real-estate-agency-nature-green.';
        $cfg = 'template.property.premium-minimal.real-estate-agency-nature-green.real-estate-agency';

        // Satu pintu render: semua halaman mendapat data & helper yang sama.
        $page = fn (string $view, string $active) => view($ns.$view, [
            'ns' => $ns,
            'active' => $active,
            't' => config($cfg),
            'r' => fn (string $route, array $params = []) => route($name.$route, $params),
            'img' => fn (string $file) => asset(config($cfg.'.assets.images').'/'.$file),
        ]);

        Route::get('/', fn () => $page('index', 'home'))->name('home');
        Route::get('/properties', fn () => $page('properties', 'properties'))->name('properties');
        $page = fn (string $view, string $active) => view($ns.$view, [
            'ns' => $ns,
            'active' => $active,
            't' => config($cfg),
            'r' => fn (string $route, array $params = []) => route($name.$route, $params),
            'img' => fn (string $file) => asset(config($cfg.'.assets.images').'/'.$file),
        ]);

        Route::get('/', fn () => $page('index', 'home'))->name('home');
        Route::get('/properties', fn () => $page('properties', 'properties'))->name('properties');
        Route::get('/properties/{slug}', function (string $slug) use ($page, $cfg) {
            $property = collect(config($cfg.'.properties'))->firstWhere('slug', $slug);
            abort_if($property === null, 404);

            return $page('property', 'properties')->with('property', $property);
        })->name('property');
        Route::get('/about-us', fn () => $page('about', 'about'))->name('about');
        Route::get('/gallery', fn () => $page('gallery', 'gallery'))->name('gallery');
        Route::get('/booking', fn () => $page('booking', 'booking'))->name('booking');
        Route::get('/blog', fn () => $page('blog', 'blog'))->name('blog');
        Route::get('/about-us', fn () => $page('about', 'about'))->name('about');
        Route::get('/gallery', fn () => $page('gallery', 'gallery'))->name('gallery');
        Route::get('/booking', fn () => $page('booking', 'booking'))->name('booking');
        Route::get('/blog', fn () => $page('blog', 'blog'))->name('blog');
        Route::get('/blog/{slug}', function (string $slug) use ($page, $cfg) {
            $post = collect(config($cfg.'.blog'))->firstWhere('slug', $slug);
            abort_if($post === null, 404);

            return $page('article', 'blog')->with('post', $post);
        })->name('blog.show');
        Route::get('/contact', fn () => $page('contact', 'contact'))->name('contact');
        Route::get('/contact', fn () => $page('contact', 'contact'))->name('contact');
    });

Route::prefix('webia/template/property/professional/real-estate-agency-coral-peach')
    ->name('coral-peach.')
    ->group(function () {
        $view = 'website-bisnis.template.property.professional.real-estate-agency-coral-peach';
        $site = fn () => config('template.property.professional.real-estate-agency-coral-peach.real-estate-agency');

        Route::get('/', fn () => view("$view.index", ['site' => $site()]))->name('home');
        Route::get('/property', fn () => view("$view.property", ['site' => $site()]))->name('property');
        Route::get('/specification', fn () => view("$view.specification", ['site' => $site()]))->name('specification');
        Route::get('/price', fn () => view("$view.price", ['site' => $site()]))->name('price');
        Route::get('/about-us', fn () => view("$view.about", ['site' => $site()]))->name('about');
        Route::get('/gallery', fn () => view("$view.gallery", ['site' => $site()]))->name('gallery');
        Route::get('/booking', fn () => view("$view.booking", ['site' => $site()]))->name('booking');
        Route::get('/blog', fn () => view("$view.blog", ['site' => $site()]))->name('blog');
        Route::get('/', fn () => view("$view.index", ['site' => $site()]))->name('home');
        Route::get('/property', fn () => view("$view.property", ['site' => $site()]))->name('property');
        Route::get('/specification', fn () => view("$view.specification", ['site' => $site()]))->name('specification');
        Route::get('/price', fn () => view("$view.price", ['site' => $site()]))->name('price');
        Route::get('/about-us', fn () => view("$view.about", ['site' => $site()]))->name('about');
        Route::get('/gallery', fn () => view("$view.gallery", ['site' => $site()]))->name('gallery');
        Route::get('/booking', fn () => view("$view.booking", ['site' => $site()]))->name('booking');
        Route::get('/blog', fn () => view("$view.blog", ['site' => $site()]))->name('blog');
        Route::get('/blog/{slug}', function (string $slug) use ($view, $site) {
            $data = $site();
            $post = collect($data['blog']['posts'])->firstWhere('slug', $slug);
            abort_if(! $post, 404);

            return view("$view.blog-show", ['site' => $data, 'post' => $post]);
        })->name('blog.show');
        Route::get('/contact', fn () => view("$view.contact", ['site' => $site()]))->name('contact');
        Route::get('/contact', fn () => view("$view.contact", ['site' => $site()]))->name('contact');
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
Route::prefix($elPath)->name($elNs.'.')->group(function () use ($elNs) {
    Route::view('/', $elNs.'.index')->name('home');
    Route::view('/programs', $elNs.'.programs')->name('programs');
    Route::view('/schedules', $elNs.'.schedules')->name('schedules');
    Route::view('/teachers', $elNs.'.teachers')->name('teachers');
    Route::view('/pricing', $elNs.'.pricing')->name('pricing');
    Route::view('/registration', $elNs.'.registration')->name('registration');
    Route::view('/course-content', $elNs.'.course-content')->name('course-content');
    Route::view('/member-area', $elNs.'.member-area')->name('member-area');
});

Route::prefix('webia/template/e-learning/futuristic/e-learning-dark-mode')
    ->name('e-learning-dark-mode.')
    ->group(function () {
        $ns = 'website-bisnis.template.e-learning.futuristic.e-learning-dark-mode';

        Route::view('/', $ns.'.index')->name('home');
        Route::view('/programs', $ns.'.programs')->name('programs');
        Route::view('/schedules', $ns.'.schedules')->name('schedules');
        Route::view('/teachers', $ns.'.teachers')->name('teachers');
        Route::view('/pricing', $ns.'.pricing')->name('pricing');
        Route::view('/registration', $ns.'.registration')->name('registration');
        Route::view('/course-content', $ns.'.course-content')->name('course-content');
        Route::view('/member-area', $ns.'.member-area')->name('member-area');
    });

Route::prefix('webia/template/healthcare/professional/klinik-kecantikan-clean-white')
    ->name('klinik-kecantikan.')
    ->group(function () {
        $view = 'website-bisnis.template.healthcare.professional.klinik-kecantikan-clean-white.';

        Route::view('/', $view.'index')->name('home');
        Route::view('/layanan', $view.'services')->name('services');
        Route::view('/dokter-staff', $view.'doctors')->name('doctors');
        Route::view('/jadwal', $view.'schedule')->name('schedule');
        Route::view('/appointment', $view.'appointment')->name('appointment');
        Route::view('/faq', $view.'faq')->name('faq');
        Route::view('/kebijakan', $view.'policy')->name('policy');
    });

Route::prefix('webia/template/healthcare/luxury/klinik-kecantikan-champagne-glow')
    ->name('glow.')
    ->group(function () {

        $view = 'website-bisnis.template.healthcare.luxury.klinik-kecantikan-champagne-glow';
        $config = 'template.healthcare.luxury.klinik-kecantikan-champagne-glow.klinik-kecantikan';

        // Helper kecil: render view + kirim data config (`$c`), prefix view (`$v`),
        // dan URL dasar gambar template (`$img`).
        $page = fn (string $name) => fn () => view("{$view}.{$name}", [
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
        $data = fn (string $page) => ['tpl' => $tpl, 'cfg' => $cfg, 'rp' => $rp, 'page' => $page];

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
        $rp = $ns.'.';                                                  // prefix nama route
        $cfg = 'template.retail.luxury.skincare-soft-pink.skincare';       // config/template/.../skincare.php

        $data = fn () => [
            'ns' => $ns,
            'rp' => $rp,
            'cfg' => config($cfg),
            'img' => asset('images/website-bisnis/template/retail/luxury/skincare-soft-pink'),
            'css' => asset('css/website-bisnis/template/retail/luxury/skincare-soft-pink/skincare.css'),
            'js' => asset('js/website-bisnis/template/retail/luxury/skincare-soft-pink/skincare.js'),
        ];

        Route::get('/', fn () => view($ns.'.index', $data()))->name('index');
        Route::get('/catalog', fn () => view($ns.'.catalog', $data()))->name('catalog');
        Route::get('/price', fn () => view($ns.'.price', $data()))->name('price');
        Route::get('/stock', fn () => view($ns.'.stock', $data()))->name('stock');
        Route::get('/inquiry', fn () => view($ns.'.inquiry', $data()))->name('inquiry');
        Route::get('/shop', fn () => view($ns.'.shop', $data()))->name('shop');
    });

$ns = 'website-bisnis.template.retail.premium-minimal.skincare-warm-neutral';
$data = [
    'ns' => $ns,
    'skin' => config('template.retail.premium-minimal.skincare-warm-neutral.skincare'),
];

Route::prefix('webia/template/retail/premium-minimal/skincare-warm-neutral')
    ->name('skincare-warm-neutral.')
    ->group(function () use ($ns, $data) {
        Route::view('/', $ns.'.index', $data)->name('home');
        Route::view('/katalog', $ns.'.katalog', $data)->name('catalog');
        Route::view('/harga', $ns.'.harga', $data)->name('price');
        Route::view('/ketersediaan', $ns.'.ketersediaan', $data)->name('stock');
        Route::view('/inquiry', $ns.'.inquiry', $data)->name('inquiry');
        Route::view('/keranjang', $ns.'.keranjang', $data)->name('cart');
    });

Route::prefix('webia/template/retail/organic/skincare-sage-green')
    ->name('skincare-sage-green.')
    ->group(function () {
        $view = 'website-bisnis.template.retail.organic.skincare-sage-green.';

        Route::view('/', $view.'index')->name('home');      // Beranda + preview semua fitur
        Route::view('/katalog', $view.'catalog')->name('catalog'); // Product catalog
        Route::view('/harga', $view.'price')->name('price');     // Price
        Route::view('/stok', $view.'stock')->name('stock');     // Stock / availability
        Route::view('/inquiry', $view.'inquiry')->name('inquiry'); // Inquiry (kirim ke WhatsApp)
        Route::view('/belanja', $view.'shop')->name('shop');       // Optional e-commerce
    });

$taNs     = 'website-bisnis.template.travel&tourism.modern.travel-agent-ocean-teal';
$taConfig = 'template.travel&tourism.modern.travel-agent-ocean-teal.travel-agent';
$taPath   = 'template/travel&tourism/modern/travel-agent-ocean-teal';
$taName   = 'template.travel-agent-ocean-teal.';

// nama route / nama view => uri
$taPages = [
    'index'      => '/',
    'destinasi'  => 'destinasi',
    'paket-tour' => 'paket-tour',
    'itinerary'  => 'itinerary',
    'harga'      => 'harga',
    'jadwal'     => 'jadwal',
    'galeri'     => 'galeri',
    'inquiry'    => 'inquiry',
    'testimoni'  => 'testimoni',
    'ai-chat'    => 'ai-chat',
];

Route::prefix('webia/template/travel-agent-ocean-teal')
    ->name($taName)
    ->group(function () use ($taNs, $taConfig, $taPath, $taName, $taPages) {

        // Data yang dikirim ke semua view template ini.
        $data = function (string $page) use ($taNs, $taConfig, $taPath, $taName, $taPages): array {
            $ta      = config($taConfig);
            $imgBase = "images/website-bisnis/{$taPath}";

            return [
                'ns'     => $taNs,
                'active' => $page,
                'ta'     => $ta,
                'assets' => [
                    'css' => asset("css/website-bisnis/{$taPath}/travel-agent.css"),
                    'js'  => asset("js/website-bisnis/{$taPath}/travel-agent.js"),
                ],
                'routes' => collect($taPages)
                    ->map(fn ($uri, $name) => route($taName . $name))
                    ->all(),
                // helper tampilan
                'img'  => fn (string $file) => asset("{$imgBase}/{$file}"),
                'rp'   => fn (int|float $n) => 'Rp ' . number_format($n, 0, ',', '.'),
                'icon' => fn (string $name, string $class = '') => new \Illuminate\Support\HtmlString(
                    '<svg class="ta-ic ' . e($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" '
                    . 'stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">'
                    . ($ta['icons'][$name] ?? '') . '</svg>'
                ),
            ];
        };

        foreach ($taPages as $name => $uri) {
            Route::get($uri, fn () => view("{$taNs}.{$name}", $data($name)))->name($name);
        }
    });

Route::prefix('webia/template/travel&tourism/organic/travel-agent-forest-moss')
    ->name('webia.travel-agent-forest-moss.')
    ->group(function () {

        $ns   = 'website-bisnis.template.travel&tourism.organic.travel-agent-forest-moss';
        $path = 'website-bisnis/template/travel&tourism/organic/travel-agent-forest-moss';
        $cfg  = config('template.travel&tourism.organic.travel-agent-forest-moss.travel-agent');

        $assets = [
            'css' => asset("css/{$path}/travel-agent.css"),
            'js'  => asset("js/{$path}/travel-agent.js"),
            'img' => asset("images/{$path}"),
        ];

        // Data yang dibagikan ke semua view template ini
        $shared = [
            'ns'     => $ns,
            'cfg'    => $cfg,
            'assets' => $assets,
            'r'      => fn (string $name) => route($cfg['route_prefix'] . $name),   // helper URL
            'img'    => fn (string $file) => $assets['img'] . '/' . $file,           // helper gambar
        ];

        Route::get('/',                      fn () => view($ns . '.index', $shared))->name('index');
        Route::get('/destinasi',             fn () => view($ns . '.destinasi', $shared))->name('destinasi');
        Route::get('/paket-tour',            fn () => view($ns . '.paket-tour', $shared))->name('paket-tour');
        Route::get('/itinerary',             fn () => view($ns . '.itinerary', $shared))->name('itinerary');
        Route::get('/harga',                 fn () => view($ns . '.harga', $shared))->name('harga');
        Route::get('/jadwal-keberangkatan',  fn () => view($ns . '.jadwal-keberangkatan', $shared))->name('jadwal-keberangkatan');
        Route::get('/galeri',                fn () => view($ns . '.galeri', $shared))->name('galeri');
        Route::get('/booking-inquiry',       fn () => view($ns . '.booking-inquiry', $shared))->name('booking-inquiry');
        Route::get('/testimoni',             fn () => view($ns . '.testimoni', $shared))->name('testimoni');
        Route::get('/asisten-ai',            fn () => view($ns . '.asisten-ai', $shared))->name('asisten-ai');
    });

$ns        = 'website-bisnis.template.travel&tourism.luxury.travel-agent-navy-champagne-gold';
$tvPrefix  = 'webia/template/travel-tourism/luxury/travel-agent-navy-champagne-gold'; // ubah jika URL template berbeda
$tvPath    = 'travel&tourism/luxury/travel-agent-navy-champagne-gold';
$tvConfig  = require config_path('template/' . $tvPath . '/travel-agent.php');

Route::prefix($tvPrefix)->name('webia.template.travel-agent-navy-champagne-gold.')
    ->group(function () use ($ns, $tvPrefix, $tvPath, $tvConfig) {

        // Data bersama untuk semua halaman (view tidak perlu tahu path asset / URL)
        $data = fn (string $page) => [
            'ns'   => $ns,
            'page' => $page,
            't'    => $tvConfig,
            'css'  => asset('css/website-bisnis/template/' . $tvPath . '/travel-agent.css'),
            'js'   => asset('js/website-bisnis/template/' . $tvPath . '/travel-agent.js'),
            // helper kecil yang dipakai di Blade
            'url'  => fn (string $p = '') => url($tvPrefix . ($p !== '' ? '/' . ltrim($p, '/') : '')),
            'img'  => fn (string $f) => asset('images/website-bisnis/template/' . $tvPath . '/' . $f),
            'idr'  => fn ($n) => 'Rp ' . number_format((int) $n, 0, ',', '.'),
            'icon' => fn (string $n) => view($ns . '.partials.icon', ['name' => $n])->render(),
        ];

        Route::get('/',          fn () => view($ns . '.index',     $data('beranda')))->name('index');
        Route::get('/destinasi', fn () => view($ns . '.destinasi', $data('destinasi')))->name('destinasi');
        Route::get('/paket',     fn () => view($ns . '.paket',     $data('paket')))->name('paket');
        Route::get('/itinerary', fn () => view($ns . '.itinerary', $data('itinerary')))->name('itinerary');
        Route::get('/harga',     fn () => view($ns . '.harga',     $data('harga')))->name('harga');
        Route::get('/jadwal',    fn () => view($ns . '.jadwal',    $data('jadwal')))->name('jadwal');
        Route::get('/galeri',    fn () => view($ns . '.galeri',    $data('galeri')))->name('galeri');
        Route::get('/testimoni', fn () => view($ns . '.testimoni', $data('testimoni')))->name('testimoni');
        Route::get('/inquiry',   fn () => view($ns . '.inquiry',   $data('inquiry')))->name('inquiry');
        Route::get('/faq',       fn () => view($ns . '.faq',       $data('faq')))->name('faq');
    });

Route::prefix('webia/template/interior-architecture/rustic/furniture-terracotta')
    ->name('webia.template.furniture-terracotta.')
    ->group(function () {
        $view = 'website-bisnis.template.interior&architecture.rustic.furniture-terracotta.';

        Route::view('/',                     $view . 'index')->name('index');          // Beranda (preview semua section)
        Route::view('/hero-banner',          $view . 'hero')->name('hero');            // Hero banner
        Route::view('/katalog',              $view . 'catalog')->name('catalog');      // Furniture catalog
        Route::view('/custom-design',        $view . 'custom-design')->name('custom-design');
        Route::view('/material-finishing',   $view . 'materials')->name('materials');  // Materials & finishes
        Route::view('/dimensi-produk',       $view . 'dimensions')->name('dimensions');
        Route::view('/galeri-proyek',        $view . 'gallery')->name('gallery');      // Project gallery
        Route::view('/custom-order',         $view . 'order-form')->name('order-form');
        Route::view('/lead-time-produksi',   $view . 'lead-time')->name('lead-time');  // Production lead time
        Route::view('/permintaan-penawaran', $view . 'quotation')->name('quotation');  // Quotation request
        Route::view('/ai-faq',               $view . 'ai-faq')->name('ai-faq');        // AI chatbot FAQ
    });

Route::prefix('webia/template/interior-architecture/premium-minimal/furniture-mocha-cream')
    ->name('furniture-mocha-cream.')
    ->group(function () {
        $ns = 'website-bisnis.template.interior&architecture.premium-minimal.furniture-mocha-cream';

        Route::view('/',                       $ns.'.index')->name('home');
        Route::view('/hero-banner',            $ns.'.hero')->name('hero');
        Route::view('/katalog',                $ns.'.katalog')->name('catalog');
        Route::view('/custom-design',          $ns.'.custom-design')->name('custom-design');
        Route::view('/material-finishing',     $ns.'.material-finishing')->name('materials');
        Route::view('/ukuran-produk',          $ns.'.ukuran-produk')->name('dimensions');
        Route::view('/project-gallery',        $ns.'.project-gallery')->name('gallery');
        Route::view('/custom-order',           $ns.'.custom-order')->name('custom-order');
        Route::view('/production-lead-time',   $ns.'.production-lead-time')->name('lead-time');
        Route::view('/permintaan-penawaran',   $ns.'.permintaan-penawaran')->name('quotation');
        Route::view('/ai-chatbot',             $ns.'.ai-chatbot')->name('ai-chatbot');
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
    Route::view('/', $viewBase.'.home')->name('home');

    Route::view('/treatments', $viewBase.'.treatments.index')
        ->name('treatments.index');

    Route::view('/treatments/{slug}', $viewBase.'.treatments.show')
        ->name('treatments.show');

    Route::view('/products', $viewBase.'.products.index')
        ->name('products.index');

    Route::view('/products/{slug}', $viewBase.'.products.show')
        ->name('products.show');

    Route::view('/cart', $viewBase.'.products.cart')
        ->name('cart');

    Route::view('/booking', $viewBase.'.booking.create')
        ->name('booking.create');

    Route::view('/booking/confirmation', $viewBase.'.booking.confirmation')
        ->name('booking.confirmation');

    Route::view('/journal', $viewBase.'.journal.index')
        ->name('journal.index');

    Route::view('/journal/{slug}', $viewBase.'.journal.show')
        ->name('journal.show');

    Route::view('/about', $viewBase.'.pages.about')->name('about');
    Route::view('/team', $viewBase.'.pages.team')->name('team');
    Route::view('/contact', $viewBase.'.pages.contact')->name('contact');
    Route::view('/faq', $viewBase.'.pages.faq')->name('faq');

    Route::prefix('account')->name('account.')->group(function () use ($viewBase) {
        Route::view('/', $viewBase.'.account.dashboard')->name('dashboard');
        Route::view('/bookings', $viewBase.'.account.bookings')->name('bookings');
        Route::view('/orders', $viewBase.'.account.orders')->name('orders');
    });

    Route::prefix('admin')->name('admin.')->group(function () use ($viewBase) {
        Route::view('/', $viewBase.'.admin.dashboard')->name('dashboard');

        Route::view('/treatments', $viewBase.'.admin.treatments.index')
            ->name('treatments.index');

        Route::view('/products', $viewBase.'.admin.products.index')
            ->name('products.index');

        Route::view('/bookings', $viewBase.'.admin.bookings.index')
            ->name('bookings.index');

        Route::view('/orders', $viewBase.'.admin.orders.index')
            ->name('orders.index');

        Route::view('/articles', $viewBase.'.admin.articles.index')
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

Route::view(
    'webia/template/property/coral-haven',
    'website-bisnis.template.property.perumahan.coral-haven'
)->name('webia.templates.coral-haven');

Route::prefix('webia/template')->group(function () {
    Route::view(
        '/griya-etnik-nantara',
        'website-bisnis.templates.interior-architecture.architecture-building-design.griya-etnik-nantara.griya-etnik-nantara'
    )->name('webia.template.griya-etnik-nantara');
});