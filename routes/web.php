
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

