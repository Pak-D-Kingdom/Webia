<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | WEBIA</title>
@php
    $isAuthPage = request()->routeIs('login', 'register');
    $isAdmin = auth()->check() && request()->routeIs('admin.*');
@endphp
@if ($isAuthPage)
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/auth.css') }}?v={{ filemtime(public_path('css/website-bisnis/auth.css')) }}">
@elseif ($isAdmin)
    <style>
        @layer theme, base, legacy, components, utilities;
        @import url('{{ asset('css/website-bisnis/account.css') }}?v={{ filemtime(public_path('css/website-bisnis/account.css')) }}') layer(legacy);
    </style>
    @vite('resources/css/admin.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,400,0,0&display=block" rel="stylesheet">
    <script src="{{ asset('js/website-bisnis/admin-dashboard.js') }}?v={{ filemtime(public_path('js/website-bisnis/admin-dashboard.js')) }}" defer></script>
    <script src="{{ asset('js/website-bisnis/admin-navigation.js') }}?v={{ filemtime(public_path('js/website-bisnis/admin-navigation.js')) }}" defer></script>
@else
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,400,0,0&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/account.css') }}?v={{ filemtime(public_path('css/website-bisnis/account.css')) }}">
    <script src="{{ asset('js/website-bisnis/account.js') }}?v={{ filemtime(public_path('js/website-bisnis/account.js')) }}" defer></script>
@endif
</head>
@if ($isAuthPage)
<body style="margin:0;font-family:'Plus Jakarta Sans',system-ui,sans-serif;">
    @yield('content')
</body>
@elseif ($isAdmin)
<body class="bg-background font-body-md text-on-surface antialiased">
    <a class="sr-only focus:not-sr-only" href="#main-content">Lewati ke konten</a>
    <aside class="fixed left-0 top-0 z-50 flex h-screen w-64 -translate-x-full select-none flex-col justify-between bg-primary shadow-sm transition-transform duration-200 md:translate-x-0" data-admin-sidebar id="admin-sidebar">
        <div class="flex flex-col overflow-hidden">
            <div class="flex h-16 items-center justify-between border-b border-white/10 px-space-md md:justify-start">
                <a class="flex items-center gap-2.5 rounded-xl transition-opacity hover:opacity-80" href="{{ route('admin.dashboard') }}">
                    <div class="grid h-9 w-9 flex-shrink-0 place-items-center rounded-xl border border-white/20 bg-gradient-to-br from-primary-container to-tertiary-container shadow-inner">
                        <span aria-hidden="true" class="material-symbols-outlined text-secondary-fixed">dashboard</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-headline-sm text-headline-sm font-bold tracking-tight text-on-primary">WEBIA Admin</span>
                        <span class="font-caption text-caption uppercase tracking-wider text-primary-fixed-dim/70">Template Marketplace</span>
                    </div>
                </a>
                <button aria-label="Tutup navigasi" class="p-space-xs text-primary-fixed-dim/70 hover:text-on-primary md:hidden" data-sidebar-close type="button">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <nav aria-label="Navigasi admin" class="flex-1 space-y-4 overflow-y-auto px-space-sm py-space-md">
                <div>
                    <div class="px-space-sm pb-1 font-caption text-caption uppercase tracking-wider text-primary-fixed-dim/50">Utama</div>
                    <div class="space-y-0.5">
                        <a class="flex min-h-11 items-center gap-space-sm rounded-lg border-l-4 px-space-sm py-2 font-label-md text-label-md transition-colors {{ request()->routeIs('admin.dashboard') ? 'border-secondary-fixed bg-surface-container-lowest/10 text-on-primary' : 'border-transparent text-primary-fixed-dim/70 hover:bg-surface-container-lowest/5 hover:text-on-primary' }}" href="{{ route('admin.dashboard') }}" @if (request()->routeIs('admin.dashboard')) aria-current="page" @endif>
                            <span aria-hidden="true" class="material-symbols-outlined {{ request()->routeIs('admin.dashboard') ? 'text-secondary-fixed' : '' }}">grid_view</span>
                            Dashboard
                        </a>
                        <a class="flex min-h-11 items-center justify-between rounded-lg border-l-4 px-space-sm py-2 font-label-md text-label-md transition-colors {{ request()->routeIs('admin.orders.*') ? 'border-secondary-fixed bg-surface-container-lowest/10 text-on-primary' : 'border-transparent text-primary-fixed-dim/70 hover:bg-surface-container-lowest/5 hover:text-on-primary' }}" href="{{ route('admin.orders.index') }}" @if (request()->routeIs('admin.orders.*')) aria-current="page" @endif>
                            <span class="flex min-w-0 items-center gap-space-sm">
                                <span aria-hidden="true" class="material-symbols-outlined">shopping_bag</span>
                                <span class="truncate">Pesanan</span>
                            </span>
                            @if ($verificationBadge = \App\Models\WebiaOrder::where('status', 'payment_uploaded')->count())
                                <span class="rounded border border-secondary-fixed/30 bg-secondary-fixed/20 px-1.5 py-0.5 text-[10px] font-bold text-secondary-fixed">{{ $verificationBadge }} Baru</span>
                            @endif
                        </a>
                    </div>
                </div>
                <div>
                    <div class="px-space-sm pb-1 font-caption text-caption uppercase tracking-wider text-primary-fixed-dim/50">Katalog produk</div>
                    <div class="space-y-0.5">
                        <a class="flex min-h-11 items-center gap-space-sm rounded-lg border-l-4 px-space-sm py-2 font-label-md text-label-md transition-colors {{ request()->routeIs('admin.packages.*') ? 'border-secondary-fixed bg-surface-container-lowest/10 text-on-primary' : 'border-transparent text-primary-fixed-dim/70 hover:bg-surface-container-lowest/5 hover:text-on-primary' }}" href="{{ route('admin.packages.index') }}" @if (request()->routeIs('admin.packages.*')) aria-current="page" @endif>
                            <span aria-hidden="true" class="material-symbols-outlined">inventory_2</span>
                            Paket
                        </a>
                        <a class="flex min-h-11 items-center gap-space-sm rounded-lg border-l-4 px-space-sm py-2 font-label-md text-label-md transition-colors {{ request()->routeIs('admin.addons.*') ? 'border-secondary-fixed bg-surface-container-lowest/10 text-on-primary' : 'border-transparent text-primary-fixed-dim/70 hover:bg-surface-container-lowest/5 hover:text-on-primary' }}" href="{{ route('admin.addons.index') }}" @if (request()->routeIs('admin.addons.*')) aria-current="page" @endif>
                            <span aria-hidden="true" class="material-symbols-outlined">extension</span>
                            Add-on
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="flex flex-col border-t border-white/10 p-space-sm">
            <div class="flex items-center justify-between rounded-lg border border-white/5 bg-surface-container-lowest/5 p-2 transition-colors hover:bg-surface-container-lowest/10">
                <div class="flex min-w-0 items-center gap-2.5 overflow-hidden">
                    <div class="grid h-9 w-9 flex-shrink-0 place-items-center rounded-full border border-secondary-fixed/50 bg-surface-container-lowest/10 font-label-sm text-label-sm font-bold text-on-primary">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                    <div class="flex min-w-0 flex-col">
                        <span class="truncate font-label-sm text-label-sm font-bold text-on-primary">{{ auth()->user()->name }}</span>
                        <span class="font-caption text-caption uppercase tracking-wider text-primary-fixed-dim/70">Administrator</span>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button aria-label="Keluar" class="rounded p-1 text-primary-fixed-dim/70 transition-colors hover:bg-rose-500/20 hover:text-rose-300" title="Keluar" type="submit">
                        <span aria-hidden="true" class="material-symbols-outlined text-[18px]">logout</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>
    <div class="pointer-events-none fixed inset-0 z-40 bg-inverse-surface/40 opacity-0 transition-opacity md:hidden" data-sidebar-scrim style="display:none"></div>
    <div class="min-h-screen flex flex-col md:pl-64">
        <header class="fixed left-64 right-0 top-0 z-40 flex h-14 items-center justify-between border-b border-surface-container-high bg-surface-container-lowest/90 px-margin-md shadow-sm backdrop-blur-md max-md:left-0">
            <div class="flex min-w-0 items-center gap-6 text-on-surface-variant">
                <button aria-label="Buka navigasi" aria-controls="admin-sidebar" aria-expanded="false" class="grid h-10 w-10 flex-shrink-0 place-items-center rounded-lg text-on-surface-variant transition-colors hover:bg-surface-container-high md:hidden" data-sidebar-toggle type="button">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <nav aria-label="Breadcrumb" class="hidden min-w-0 items-center gap-1.5 sm:flex">
                    <a aria-label="Kembali ke Dashboard" class="flex items-center" href="{{ route('admin.dashboard') }}">
                        <span aria-hidden="true" class="material-symbols-outlined text-[18px] leading-none text-outline transition-colors hover:text-primary">home</span>
                    </a>
                    <span class="text-xs text-outline-variant">/</span>
                    <span class="truncate font-label-md text-label-md font-semibold leading-none text-primary" id="admin-page-title">@yield('title')</span>
                </nav>
                <span class="truncate font-label-md text-label-md font-semibold leading-none text-primary sm:hidden" id="admin-page-title-mobile">@yield('title')</span>
            </div>
            <div class="flex items-center gap-3">
                <div class="relative hidden items-center lg:flex">
                    <span class="material-symbols-outlined pointer-events-none absolute left-2.5 text-[18px] text-outline">search</span>
                    <input aria-keyshortcuts="Control+K Meta+K" class="h-9 w-80 rounded-lg border border-outline-variant bg-surface pl-8 pr-12 font-body-sm text-body-sm text-on-surface transition-all placeholder:text-outline/70 focus:border-primary-container focus:outline-none focus:ring-1 focus:ring-primary-container" placeholder="Cari pesanan, invoice, atau pelanggan..." type="search" id="adminTopbarSearch" />
                    <kbd aria-hidden="true" class="pointer-events-none absolute right-2 rounded border border-outline-variant bg-surface-container px-1.5 py-0.5 font-caption text-caption font-bold text-on-surface-variant shadow-sm">Ctrl K</kbd>
                </div>
                <div class="flex items-center gap-1">
                    <button aria-label="Bantuan" class="grid h-10 w-10 place-items-center rounded-lg text-on-surface-variant transition-colors hover:bg-surface-container-high hover:text-primary" data-toast="Pusat bantuan belum tersedia" type="button">
                        <span class="material-symbols-outlined text-xl">help</span>
                    </button>
                    <button aria-label="Dokumentasi" class="hidden h-10 w-10 place-items-center rounded-lg text-on-surface-variant transition-colors hover:bg-surface-container-high hover:text-primary lg:grid" data-toast="Dokumentasi API belum tersedia" type="button">
                        <span class="material-symbols-outlined text-xl">description</span>
                    </button>
                    <button aria-label="Notifikasi" class="grid h-10 w-10 place-items-center rounded-lg text-on-surface-variant transition-colors hover:bg-surface-container-high hover:text-primary" data-toast="Belum ada notifikasi baru" type="button">
                        <span class="material-symbols-outlined text-xl">notifications</span>
                    </button>
                </div>
                <div class="mx-space-xs h-5 w-px bg-surface-container-high max-md:hidden"></div>
                <div class="flex items-center px-1.5 py-1" aria-label="Akun {{ auth()->user()->name }}">
                    <span class="grid h-9 w-9 place-items-center rounded-full border border-outline-variant bg-primary-fixed font-label-md text-label-md font-bold text-primary transition-colors hover:border-primary">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                </div>
            </div>
        </header>
        <main aria-labelledby="admin-page-title" class="relative w-full flex-1 px-margin-md py-margin-md pt-14 transition-opacity" id="main-content" tabindex="-1">
            <div class="flex w-full flex-col">
                @yield('content')
            </div>
        </main>
    </div>
    <div aria-hidden="true" class="fixed inset-0 z-[60] hidden items-center justify-center p-4 md:p-8" data-order-modal>
        <div class="fixed inset-0 bg-inverse-surface/50" data-order-modal-scrim></div>
        <div aria-labelledby="orderModalTitle" aria-modal="true" class="relative flex max-h-[90vh] w-full max-w-5xl flex-col overflow-hidden rounded-xl bg-background shadow-xl" role="dialog">
            <div class="flex items-center justify-between border-b border-surface-container bg-surface-container-lowest px-margin-md py-space-sm">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-xl text-primary">receipt_long</span>
                    <span class="font-label-md text-label-md font-bold text-on-surface" id="orderModalTitle">Detail Pesanan</span>
                </div>
                <button aria-label="Tutup detail pesanan" class="grid h-8 w-8 place-items-center rounded-lg bg-surface-container text-on-surface-variant transition-colors hover:bg-error-container hover:text-on-error-container" data-order-modal-close type="button">
                    <span class="material-symbols-outlined text-base">close</span>
                </button>
            </div>
            <div class="overflow-y-auto px-margin-md py-4" id="orderModalBody"></div>
        </div>
    </div>
    <div class="fixed bottom-6 right-6 z-[70] hidden items-center gap-2 rounded-xl bg-primary px-4 py-2.5 font-body-sm text-body-sm text-on-primary shadow-xl" id="toastNotification">
        <span class="material-symbols-outlined text-lg text-secondary-fixed" id="toastIcon">check_circle</span>
        <span id="toastMessage">Operasi berhasil dijalankan</span>
    </div>
@else
<body class="account-body {{ auth()->check() ? 'customer-body' : 'guest-body' }}">
    <a class="skip-link" href="#main-content">Lewati ke konten</a>
    @auth
        <aside class="customer-sidebar" id="customer-sidebar" aria-label="Navigasi portal konsumen">
            <div class="customer-sidebar-head">
                <a class="account-brand customer-brand" href="{{ route('dashboard') }}">
                    <span aria-hidden="true">W</span>
                    <span class="customer-brand-copy">
                        <strong>WEBIA</strong>
                        <span>Portal Konsumen</span>
                    </span>
                </a>
                <button aria-label="Tutup navigasi" class="customer-sidebar-close" data-sidebar-close type="button">
                    <span aria-hidden="true" class="material-symbols-outlined">close</span>
                </button>
            </div>
            <div class="customer-sidebar-body">
                <p class="customer-sidebar-label">Utama</p>
                <nav class="customer-sidebar-nav" aria-label="Navigasi portal">
                <a href="{{ route('dashboard') }}" @if (request()->routeIs('dashboard')) aria-current="page" @endif>
                    <span aria-hidden="true" class="material-symbols-outlined">grid_view</span> Dashboard
                </a>
                <a href="{{ route('orders.index') }}" @if (request()->routeIs('orders.*')) aria-current="page" @endif>
                    <span aria-hidden="true" class="material-symbols-outlined">shopping_bag</span> Pesanan Saya
                </a>
                <a href="{{ route('collections') }}" @if (request()->routeIs('collections')) aria-current="page" @endif>
                    <span aria-hidden="true" class="material-symbols-outlined">web</span> Pilih Template
                </a>
                </nav>
            </div>
            <div class="customer-sidebar-foot">
                <div class="customer-sidebar-account">
                    <span class="account-avatar" aria-hidden="true">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</span>
                    <div class="customer-sidebar-identity">
                        <strong>{{ auth()->user()->name }}</strong>
                        <span>Konsumen</span>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="customer-logout-btn" type="submit">
                        <span aria-hidden="true" class="material-symbols-outlined">logout</span> Keluar
                    </button>
                </form>
            </div>
        </aside>
        <div class="customer-scrim" data-sidebar-scrim></div>
        <div class="customer-shell">
            <header class="customer-topbar">
                <div class="customer-topbar-left">
                    <button aria-label="Buka navigasi" aria-controls="customer-sidebar" aria-expanded="false" class="customer-sidebar-toggle" data-sidebar-toggle type="button">
                        <span aria-hidden="true" class="material-symbols-outlined">menu</span>
                    </button>
                    <a class="customer-topbar-brand" href="{{ route('dashboard') }}">
                        <span aria-hidden="true">W</span>
                        <strong>WEBIA</strong>
                    </a>
                    <nav aria-label="Breadcrumb" class="customer-breadcrumb">
                        <a href="{{ route('dashboard') }}"><span aria-hidden="true" class="material-symbols-outlined">home</span><span class="sr-only">Kembali ke Dashboard</span></a>
                        <span aria-hidden="true" class="customer-breadcrumb-sep">/</span>
                        <span class="customer-breadcrumb-page">@yield('title')</span>
                    </nav>
                </div>
                <div class="customer-topbar-account">
                    <div class="customer-topbar-identity">
                        <strong>{{ auth()->user()->name }}</strong>
                        <span>Konsumen</span>
                    </div>
                    <span class="account-avatar" aria-hidden="true">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</span>
                </div>
            </header>
            <main id="main-content" class="account-main customer-main">
                @yield('content')
            </main>
            <footer class="account-footer customer-footer"><strong>WEBIA</strong><span>&copy; {{ now()->year }} WEBIA Indonesia. Solusi digital untuk UMKM.</span></footer>
        </div>
    @endauth
    @guest
        <header class="account-header customer-header">
            <a class="back-home" href="{{ route('home') }}" aria-label="Kembali ke beranda"><span aria-hidden="true">&larr;</span> Kembali ke Beranda</a>
            <a class="account-brand" href="{{ route('home') }}">
                <span aria-hidden="true">W</span>
                <strong>WEBIA</strong>
                <span class="sr-only"> kembali ke beranda</span>
            </a>
            <div class="header-actions">@yield('header-action')</div>
        </header>
        <main id="main-content" class="account-main">
            @yield('content')
        </main>
        <footer class="account-footer"><strong>WEBIA</strong><span>&copy; {{ now()->year }} WEBIA Indonesia. Solusi digital untuk UMKM.</span></footer>
    @endguest
@endif
</body>
</html>
