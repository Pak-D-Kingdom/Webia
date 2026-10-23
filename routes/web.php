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
Route::redirect('/webia', '/');

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
Route::view(
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
        $v    = str_replace('/', '.', $path);

        config(['cafe' => config('template.f&b.minimalis.cafe-earthtone.cafe')]);
        return view("$v.$page", ['v' => $v, 'path' => $path]);
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
        $v    = str_replace('/', '.', $path);

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

        Route::view('/',               $view . '.index')->name('index');          // Beranda (preview semua halaman)
        Route::view('/property',       $view . '.property')->name('property');    // Property listing
        Route::view('/specification',  $view . '.specification')->name('specification');
        Route::view('/price',          $view . '.price')->name('price');
        Route::view('/about',          $view . '.about')->name('about');          // About us
        Route::view('/gallery',        $view . '.gallery')->name('gallery');
        Route::view('/booking',        $view . '.booking')->name('booking');      // Booking / viewing
        Route::view('/blog',           $view . '.blog')->name('blog');
    });

Route::prefix('webia/template/property/premium-minimal/real-estate-agency-nature-green')
    ->name('property.premium-minimal.nature-green.')
    ->group(function () {
        $name = 'property.premium-minimal.nature-green.';
        $ns   = 'website-bisnis.template.property.premium-minimal.real-estate-agency-nature-green.';
        $cfg  = 'template.property.premium-minimal.real-estate-agency-nature-green.real-estate-agency';

        // Satu pintu render: semua halaman mendapat data & helper yang sama.
        $page = fn (string $view, string $active) => view($ns . $view, [
            'ns'     => $ns,
            'active' => $active,
            't'      => config($cfg),
            'r'      => fn (string $route, array $params = []) => route($name . $route, $params),
            'img'    => fn (string $file) => asset(config($cfg . '.assets.images') . '/' . $file),
        ]);

        Route::get('/',           fn () => $page('index', 'home'))->name('home');
        Route::get('/properties', fn () => $page('properties', 'properties'))->name('properties');
        Route::get('/properties/{slug}', function (string $slug) use ($page, $cfg) {
            $property = collect(config($cfg . '.properties'))->firstWhere('slug', $slug);
            abort_if($property === null, 404);

            return $page('property', 'properties')->with('property', $property);
        })->name('property');
        Route::get('/about-us',   fn () => $page('about', 'about'))->name('about');
        Route::get('/gallery',    fn () => $page('gallery', 'gallery'))->name('gallery');
        Route::get('/booking',    fn () => $page('booking', 'booking'))->name('booking');
        Route::get('/blog',       fn () => $page('blog', 'blog'))->name('blog');
        Route::get('/blog/{slug}', function (string $slug) use ($page, $cfg) {
            $post = collect(config($cfg . '.blog'))->firstWhere('slug', $slug);
            abort_if($post === null, 404);

            return $page('article', 'blog')->with('post', $post);
        })->name('blog.show');
        Route::get('/contact',    fn () => $page('contact', 'contact'))->name('contact');
    });

Route::prefix('webia/template/property/professional/real-estate-agency-coral-peach')
    ->name('coral-peach.')
    ->group(function () {
        $view = 'website-bisnis.template.property.professional.real-estate-agency-coral-peach';
        $site = fn () => config('template.property.professional.real-estate-agency-coral-peach.real-estate-agency');

        Route::get('/',              fn () => view("$view.index",         ['site' => $site()]))->name('home');
        Route::get('/property',      fn () => view("$view.property",      ['site' => $site()]))->name('property');
        Route::get('/specification', fn () => view("$view.specification", ['site' => $site()]))->name('specification');
        Route::get('/price',         fn () => view("$view.price",         ['site' => $site()]))->name('price');
        Route::get('/about-us',      fn () => view("$view.about",         ['site' => $site()]))->name('about');
        Route::get('/gallery',       fn () => view("$view.gallery",       ['site' => $site()]))->name('gallery');
        Route::get('/booking',       fn () => view("$view.booking",       ['site' => $site()]))->name('booking');
        Route::get('/blog',          fn () => view("$view.blog",          ['site' => $site()]))->name('blog');
        Route::get('/blog/{slug}', function (string $slug) use ($view, $site) {
            $data = $site();
            $post = collect($data['blog']['posts'])->firstWhere('slug', $slug);
            abort_if(! $post, 404);

            return view("$view.blog-show", ['site' => $data, 'post' => $post]);
        })->name('blog.show');
        Route::get('/contact',       fn () => view("$view.contact",       ['site' => $site()]))->name('contact');
    });

$elNs = 'website-bisnis.template.e-learning.modern.e-learning-ocean-blue';

Route::prefix('webia/template/e-learning/modern/e-learning-ocean-blue')
    ->name('elearning.')
    ->group(function () use ($elNs) {
        Route::view('/',                "{$elNs}.index")->name('home');
        Route::view('/programs',        "{$elNs}.programs")->name('programs');
        Route::view('/schedules',       "{$elNs}.schedules")->name('schedules');
        Route::view('/teachers',        "{$elNs}.teachers")->name('teachers');
        Route::view('/pricing',         "{$elNs}.pricing")->name('pricing');
        Route::view('/registration',    "{$elNs}.registration")->name('registration');
        Route::view('/course-content',  "{$elNs}.course-content")->name('course-content');
        Route::view('/member-area',     "{$elNs}.member-area")->name('member-area');
    });

$elNs   = 'website-bisnis.template.e-learning.playful-colorful.e-learning-pastel-mix';
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
