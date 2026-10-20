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
Route::post('/payments/midtrans/notify', [MidtransController::class, 'notify'])->name('payments.midtrans.notify');
Route::get('/payments/midtrans/callback', [MidtransController::class, 'callback'])->name('payments.midtrans.callback');

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
    Route::get('/payments/midtrans/simulate/{payment}', [MidtransController::class, 'simulateShow'])->name('payments.midtrans.simulate');
    Route::post('/payments/midtrans/simulate/{payment}', [MidtransController::class, 'simulatePay'])->name('payments.midtrans.simulate.pay');
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

// WEBIA — Template Nail Art Professional Soft Pink
// URL lama dipertahankan agar konsisten; view mengikuti struktur folder baru.
Route::view(
    '/webia/template/nail-art-professional-soft-pink',
    'website-bisnis.templates.beauty.nailart.nailart-professional-softpink'
)->name('webia.template.beauty.nailart.professional-softpink');

// WEBIA Template 02 — Nail Art Minimalist Sage Green
Route::view(
    '/webia/template/nail-art-minimalist-sage-green',
    'website-bisnis.templates.beauty.nailart.nailart-minimalist-sagegreen'
)->name('webia.template.beauty.nailart.minimalist-sagegreen');

// WEBIA Template 03 — Luxury Yellow Sunshine
Route::view(
    '/webia/template/nail-art-luxury-yellow-sunshine',
    'website-bisnis.templates.beauty.nailart.nailart-luxury-yellowsunshine'
)->name('webia.template.beauty.nailart.luxury-yellowsunshine');
