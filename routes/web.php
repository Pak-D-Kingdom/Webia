<?php

use Illuminate\Support\Facades\Route;

// WEBIA — Homepage utama
Route::view('/', 'website-bisnis.index')->name('home');

Route::view('/koleksi', 'website-bisnis.collections.index')->name('collections');

// Kompatibilitas URL lama (/webia*) — redirect permanen, query string dipertahankan.
Route::get('/webia', fn () => redirect()->route('home', [], 301));
Route::get('/webia/koleksi', fn () => redirect()->route('collections', request()->query(), 301));
