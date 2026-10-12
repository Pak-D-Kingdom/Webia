
<?php

use Illuminate\Support\Facades\Route;

// D-KREASI — Homepage utama
Route::get('/', function () {
    return view('home.index');
})->name('home');
