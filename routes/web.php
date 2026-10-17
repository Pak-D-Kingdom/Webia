
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

// Route::view(
//     '/template/company/elegan/company-profile-terracotta',
//     'website-bisnis.template.company.elegan.company-profile-terracotta.index'
// )->name('template.company.elegan.company-profile-terracotta');
Route::view('/webia/template/company/elegan/company-profile-terracotta',
    'website-bisnis.template.company.elegan.company-profile-terracotta.index');