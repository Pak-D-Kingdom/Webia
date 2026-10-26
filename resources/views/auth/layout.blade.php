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
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/auth.css') }}">
@elseif ($isAdmin)
    <style>
        @layer theme, base, legacy, components, utilities;
        @import url('{{ asset('css/website-bisnis/account.css') }}') layer(legacy);
    </style>
    @vite('resources/css/admin.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
    <script src="{{ asset('js/website-bisnis/admin-dashboard.js') }}" defer></script>
    <script src="{{ asset('js/website-bisnis/admin-navigation.js') }}" defer></script>
@else
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,400,0,0&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/account.css') }}">
    <script src="{{ asset('js/website-bisnis/account.js') }}" defer></script>
@endif
</head>
@if ($isAuthPage)
<body style="margin:0;font-family:'Plus Jakarta Sans',system-ui,sans-serif;">
    @yield('content')
</body>
@elseif ($isAdmin)
<body class="bg-background font-body-md text-on-surface antialiased">
    <a class="sr-only focus:not-sr-only" href="#main-content">Lewati ke konten</a>
    <aside class="fixed left-0 top-0 z-50 flex h-screen w-60 -translate-x-full select-none flex-col justify-between border-r border-surface-container bg-surface-container-lowest shadow-[8px_0_30px_rgba(26,20,107,0.04)] transition-transform duration-200 md:translate-x-0" data-admin-sidebar id="admin-sidebar">
        <div class="flex flex-col">
            <div class="flex h-16 items-center justify-between px-space-md md:justify-start">
                <a class="flex items-center gap-space-sm rounded-xl transition-opacity hover:opacity-80" href="{{ route('admin.dashboard') }}">
                    <div class="grid h-9 w-9 flex-shrink-0 place-items-center rounded-xl bg-primary text-white font-headline-sm font-black shadow-sm">W</div>
                    <div class="flex flex-col">
                        <div class="flex items-center gap-space-xs">
                            <span class="font-headline-sm text-headline-sm text-primary font-bold tracking-tight">WEBIA</span>
                            <span class="rounded bg-primary-container px-space-xs py-0.5 font-caption text-caption text-on-primary-container">ADMIN</span>
                        </div>
                        <span class="font-caption text-caption text-on-surface-variant">Template Marketplace</span>
                    </div>
                </a>
                <button aria-label="Tutup navigasi" class="p-space-xs text-on-surface-variant md:hidden" data-sidebar-close type="button">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <nav class="flex flex-col gap-1.5 px-space-sm pt-space-lg" aria-label="Navigasi admin">
                <span class="mb-space-xs px-space-sm font-caption text-caption uppercase tracking-[0.12em] text-outline">Menu utama</span>
                <a class="group flex min-h-11 items-center justify-between rounded-xl px-space-sm py-2 transition-all hover:bg-surface-container-low {{ request()->routeIs('admin.dashboard') ? 'bg-primary-fixed font-semibold text-primary shadow-sm' : 'text-on-surface-variant hover:text-on-surface' }}" href="{{ route('admin.dashboard') }}" @if (request()->routeIs('admin.dashboard')) aria-current="page" @endif>
                    <div class="flex items-center gap-space-sm">
                        <span class="material-symbols-outlined grid h-8 w-8 place-items-center rounded-lg text-lg transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-surface-container-lowest text-primary' : 'bg-surface-container-low text-primary group-hover:bg-surface-container' }}">grid_view</span>
                        <span class="font-label-lg text-label-lg">Dashboard</span>
                    </div>
                </a>
                <a class="group flex min-h-11 items-center justify-between rounded-xl px-space-sm py-2 transition-all hover:bg-surface-container-low {{ request()->routeIs('admin.orders.*') ? 'bg-primary-fixed font-semibold text-primary shadow-sm' : 'text-on-surface-variant hover:text-on-surface' }}" href="{{ route('admin.orders.index') }}" @if (request()->routeIs('admin.orders.*')) aria-current="page" @endif>
                    <div class="flex items-center gap-space-sm">
                        <span class="material-symbols-outlined grid h-8 w-8 place-items-center rounded-lg text-lg transition-colors {{ request()->routeIs('admin.orders.*') ? 'bg-surface-container-lowest text-primary' : 'bg-surface-container-low text-primary group-hover:bg-surface-container' }}">shopping_bag</span>
                        <span class="font-label-lg text-label-lg">Pesanan</span>
                    </div>
                    @if ($verificationBadge = \App\Models\WebiaOrder::where('status', 'payment_uploaded')->count())
                        <span class="rounded-full bg-secondary-container px-space-xs py-0.5 font-label-sm text-label-sm text-secondary">{{ $verificationBadge }} Baru</span>
                    @endif
                </a>
                <a class="group flex min-h-11 items-center justify-between rounded-xl px-space-sm py-2 transition-all hover:bg-surface-container-low {{ request()->routeIs('admin.packages.*') ? 'bg-primary-fixed font-semibold text-primary shadow-sm' : 'text-on-surface-variant hover:text-on-surface' }}" href="{{ route('admin.packages.index') }}" @if (request()->routeIs('admin.packages.*')) aria-current="page" @endif>
                    <div class="flex items-center gap-space-sm">
                        <span class="material-symbols-outlined grid h-8 w-8 place-items-center rounded-lg text-lg transition-colors {{ request()->routeIs('admin.packages.*') ? 'bg-surface-container-lowest text-primary' : 'bg-surface-container-low text-primary group-hover:bg-surface-container' }}">inventory_2</span>
                        <span class="font-label-lg text-label-lg">Paket</span>
                    </div>
                </a>
                <a class="group flex min-h-11 items-center justify-between rounded-xl px-space-sm py-2 transition-all hover:bg-surface-container-low {{ request()->routeIs('admin.addons.*') ? 'bg-primary-fixed font-semibold text-primary shadow-sm' : 'text-on-surface-variant hover:text-on-surface' }}" href="{{ route('admin.addons.index') }}" @if (request()->routeIs('admin.addons.*')) aria-current="page" @endif>
                    <div class="flex items-center gap-space-sm">
                        <span class="material-symbols-outlined grid h-8 w-8 place-items-center rounded-lg text-lg transition-colors {{ request()->routeIs('admin.addons.*') ? 'bg-surface-container-lowest text-primary' : 'bg-surface-container-low text-primary group-hover:bg-surface-container' }}">extension</span>
                        <span class="font-label-lg text-label-lg">Add-on</span>
                    </div>
                </a>
            </nav>
        </div>
        <div class="flex flex-col gap-space-sm border-t border-surface-container p-space-sm">
            <div class="flex items-center justify-between rounded-xl bg-surface-container-low p-space-sm">
                <div class="flex min-w-0 items-center gap-space-sm overflow-hidden">
                    <div class="relative flex-shrink-0">
                        <div class="grid h-9 w-9 place-items-center rounded-full bg-surface-container-lowest font-label-md font-bold text-primary shadow-sm">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                        <span class="absolute bottom-0 right-0 h-2 w-2 rounded-full bg-secondary ring-2 ring-surface-container-lowest"></span>
                    </div>
                    <div class="flex min-w-0 flex-col">
                        <span class="truncate font-label-md text-label-md text-on-surface">{{ auth()->user()->name }}</span>
                        <span class="font-caption text-caption uppercase tracking-wider text-on-surface-variant">Administrator</span>
                    </div>
                </div>
                <span class="material-symbols-outlined text-base text-outline">expand_more</span>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="flex min-h-11 w-full items-center gap-space-sm rounded-xl px-space-sm py-space-sm font-label-md text-label-md text-error transition-all hover:bg-error-container hover:text-on-error-container" type="submit">
                    <span class="material-symbols-outlined grid h-8 w-8 place-items-center rounded-lg bg-error-container text-lg">logout</span>
                    Keluar
                </button>
            </form>
        </div>
    </aside>
    <div class="pointer-events-none fixed inset-0 z-40 bg-inverse-surface/40 opacity-0 transition-opacity md:hidden" data-sidebar-scrim style="display:none"></div>
    <div class="min-h-screen flex flex-col md:pl-60">
        <header class="fixed left-60 right-0 top-0 z-40 flex h-16 items-center justify-between border-b border-surface-container/70 bg-surface-container-lowest/90 px-margin-md shadow-[0_6px_24px_rgba(26,20,107,0.035)] backdrop-blur-md max-md:left-0">
            <div class="flex min-w-0 items-center gap-space-sm text-on-surface-variant">
                <button aria-label="Buka navigasi" aria-controls="admin-sidebar" aria-expanded="false" class="grid h-10 w-10 flex-shrink-0 place-items-center rounded-xl text-on-surface-variant transition-colors hover:bg-surface-container-low md:hidden" data-sidebar-toggle type="button">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <div class="flex min-w-0 items-center gap-space-sm">
                    <span class="font-caption text-caption uppercase tracking-[0.12em] text-outline max-sm:hidden">Admin</span>
                    <span class="text-xs text-outline max-sm:hidden">/</span>
                    <span class="truncate font-label-lg text-label-lg font-semibold text-on-surface" id="admin-page-title">@yield('title')</span>
                </div>
            </div>
            <div class="flex items-center gap-space-sm">
                <div class="relative hidden items-center sm:flex">
                    <span class="material-symbols-outlined pointer-events-none absolute left-3.5 text-lg text-outline">search</span>
                    <input aria-keyshortcuts="Control+K Meta+K" class="h-10 w-56 rounded-full border border-transparent bg-surface-container pl-10 pr-16 font-body-sm text-body-sm text-on-surface transition-all placeholder:text-outline hover:bg-surface-container-high focus:border-primary/20 focus:bg-surface-container-lowest focus:outline-none focus:ring-2 focus:ring-primary/20 lg:w-80" placeholder="Cari pesanan, invoice, atau pelanggan..." type="search" id="adminTopbarSearch" />
                    <kbd aria-hidden="true" class="pointer-events-none absolute right-2.5 rounded-lg bg-surface-container-lowest px-2 py-1 font-caption text-caption text-on-surface-variant shadow-sm">Ctrl K</kbd>
                </div>
                <div class="flex items-center gap-1 max-lg:hidden">
                    <button aria-label="Bantuan" class="grid h-10 w-10 place-items-center rounded-full text-on-surface-variant transition-colors hover:bg-surface-container-low hover:text-primary" data-toast="Pusat bantuan belum tersedia" type="button">
                        <span class="material-symbols-outlined text-xl">help</span>
                    </button>
                    <button aria-label="Notifikasi" class="relative grid h-10 w-10 place-items-center rounded-full text-on-surface-variant transition-colors hover:bg-surface-container-low hover:text-primary" data-toast="Belum ada notifikasi baru" type="button">
                        <span class="material-symbols-outlined text-xl">notifications</span>
                        <span aria-hidden="true" class="absolute right-2 top-2 h-1.5 w-1.5 rounded-full bg-secondary ring-2 ring-surface-container-lowest"></span>
                    </button>
                </div>
                <div class="mx-space-xs h-5 w-px bg-surface-container max-md:hidden"></div>
                <div class="flex items-center px-1.5 py-1" aria-label="Akun {{ auth()->user()->name }}">
                    <span class="grid h-9 w-9 place-items-center rounded-full bg-primary-fixed font-label-md font-bold text-primary ring-1 ring-primary/10">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                </div>
            </div>
        </header>
        <main aria-labelledby="admin-page-title" class="relative w-full flex-1 px-margin-md py-margin-md pt-16 transition-opacity" id="main-content" tabindex="-1">
            <div class="flex w-full flex-col">
                @yield('content')
            </div>
        </main>
    </div>
    <div class="fixed bottom-6 right-6 z-50 hidden items-center gap-2 rounded-xl bg-primary px-4 py-2.5 font-body-sm text-body-sm text-on-primary shadow-xl" id="toastNotification">
        <span class="material-symbols-outlined text-lg text-secondary-fixed" id="toastIcon">check_circle</span>
        <span id="toastMessage">Operasi berhasil dijalankan</span>
    </div>
@else
<body class="account-body {{ auth()->check() ? 'customer-body' : 'guest-body' }}">
    <a class="skip-link" href="#main-content">Lewati ke konten</a>
    <header class="account-header customer-header">
        @guest
            <a class="back-home" href="{{ route('home') }}" aria-label="Kembali ke beranda"><span aria-hidden="true">â†</span> Kembali ke Beranda</a>
        @endguest
        <a class="account-brand" href="{{ auth()->check() ? route('dashboard') : route('home') }}">
            <span aria-hidden="true">W</span>
            <strong>WEBIA</strong>
            <span class="sr-only">{{ auth()->check() ? ' dashboard customer' : ' kembali ke beranda' }}</span>
        </a>
        @auth
            <nav class="customer-nav" aria-label="Navigasi akun">
                <a href="{{ route('dashboard') }}" @if (request()->routeIs('dashboard')) aria-current="page" @endif>Dashboard</a>
                <a href="{{ route('orders.index') }}" @if (request()->routeIs('orders.*')) aria-current="page" @endif>Pesanan saya</a>
            </nav>
            <div class="customer-account">
                <span class="account-avatar" aria-hidden="true">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</span>
                <strong>{{ auth()->user()->name }}</strong>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Keluar</button>
                </form>
            </div>
        @else
            <div class="header-actions">@yield('header-action')</div>
        @endauth
    </header>
    <main id="main-content" class="account-main">
        @yield('content')
    </main>
    <footer class="account-footer"><strong>WEBIA</strong><span>&copy; {{ now()->year }} WEBIA Indonesia. Solusi digital untuk UMKM.</span></footer>
@endif
</body>
</html>
