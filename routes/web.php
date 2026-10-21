
<?php

use Illuminate\Support\Facades\Route;

// D-KREASI — Homepage utama
Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::view('/webia', 'website-bisnis.index')
    ->name('webia.index');

Route::view('/webia/koleksi', 'website-bisnis.collections.index')
    ->name('webia.collections');


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

Route::view(
    'webia/template/property/luxury/real-estate-agency-emerald-green',
    'website-bisnis.template.property.luxury.real-estate-agency-emerald-green.index'
)->name('website-bisnis.template.property.luxury.real-estate-agency-emerald-green');

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
            'r'      => fn (string $route) => route($name . $route),
            'img'    => fn (string $file)  => asset(config($cfg . '.assets.images') . '/' . $file),
        ]);

        Route::get('/',              fn () => $page('index', 'home'))->name('home');
        Route::get('/properties',    fn () => $page('properties', 'properties'))->name('properties');
        Route::get('/specification', fn () => $page('specification', 'specification'))->name('specification');
        Route::get('/price',         fn () => $page('price', 'price'))->name('price');
        Route::get('/about-us',      fn () => $page('about', 'about'))->name('about');
        Route::get('/gallery',       fn () => $page('gallery', 'gallery'))->name('gallery');
        Route::get('/booking',       fn () => $page('booking', 'booking'))->name('booking');
        Route::get('/blog',          fn () => $page('blog', 'blog'))->name('blog');
    });
