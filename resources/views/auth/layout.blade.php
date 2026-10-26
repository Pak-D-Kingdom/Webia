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
    <aside class="fixed left-0 top-0 flex h-screen w-60 -translate-x-full select-none flex-col justify-between bg-surface-container-lowest shadow-[0_1px_8px_rgba(0,0,0,0.04)] z-50 transition-transform duration-200 md:translate-x-0" data-admin-sidebar id="admin-sidebar">
        <div class="flex flex-col">
            <div class="flex h-16 items-center justify-between border-b border-surface-container px-space-md md:justify-start">
                <a class="flex items-center gap-space-sm" href="{{ route('admin.dashboard') }}">
                    <div class="grid h-8 w-8 flex-shrink-0 place-items-center rounded bg-secondary text-white font-headline-sm font-black">W</div>
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
            <nav class="flex flex-col gap-1 px-space-sm pt-space-md" aria-label="Navigasi admin">
                <a class="flex items-center justify-between rounded-lg px-space-sm py-space-sm transition-all hover:bg-surface-container-low hover:text-on-surface {{ request()->routeIs('admin.dashboard') ? 'border-l-4 border-secondary bg-surface-container-low font-bold text-primary' : 'text-on-surface-variant' }}" href="{{ route('admin.dashboard') }}" @if (request()->routeIs('admin.dashboard')) aria-current="page" @endif>
                    <div class="flex items-center gap-space-sm">
                        <span class="material-symbols-outlined text-xl {{ request()->routeIs('admin.dashboard') ? '' : 'text-primary' }}">grid_view</span>
                        <span class="font-label-lg text-label-lg">Dashboard</span>
                    </div>
                </a>
                <a class="flex items-center justify-between rounded-lg px-space-sm py-space-sm transition-all hover:bg-surface-container-low hover:text-on-surface {{ request()->routeIs('admin.orders.*') ? 'border-l-4 border-secondary bg-surface-container-low font-bold text-primary' : 'text-on-surface-variant' }}" href="{{ route('admin.orders.index') }}" @if (request()->routeIs('admin.orders.*')) aria-current="page" @endif>
                    <div class="flex items-center gap-space-sm">
                        <span class="material-symbols-outlined text-xl {{ request()->routeIs('admin.orders.*') ? '' : 'text-primary' }}">shopping_bag</span>
                        <span class="font-label-lg text-label-lg">Pesanan</span>
                    </div>
                    @if ($verificationBadge = \App\Models\WebiaOrder::where('status', 'payment_uploaded')->count())
                        <span class="rounded-full bg-secondary-container px-space-xs py-0.5 font-label-sm text-label-sm text-secondary">{{ $verificationBadge }} Baru</span>
                    @endif
                </a>
                <a class="flex items-center justify-between rounded-lg px-space-sm py-space-sm transition-all hover:bg-surface-container-low hover:text-on-surface {{ request()->routeIs('admin.packages.*') ? 'border-l-4 border-secondary bg-surface-container-low font-bold text-primary' : 'text-on-surface-variant' }}" href="{{ route('admin.packages.index') }}" @if (request()->routeIs('admin.packages.*')) aria-current="page" @endif>
                    <div class="flex items-center gap-space-sm">
                        <span class="material-symbols-outlined text-xl {{ request()->routeIs('admin.packages.*') ? '' : 'text-primary' }}">inventory_2</span>
                        <span class="font-label-lg text-label-lg">Paket</span>
                    </div>
                </a>
                <a class="flex items-center justify-between rounded-lg px-space-sm py-space-sm transition-all hover:bg-surface-container-low hover:text-on-surface {{ request()->routeIs('admin.addons.*') ? 'border-l-4 border-secondary bg-surface-container-low font-bold text-primary' : 'text-on-surface-variant' }}" href="{{ route('admin.addons.index') }}" @if (request()->routeIs('admin.addons.*')) aria-current="page" @endif>
                    <div class="flex items-center gap-space-sm">
                        <span class="material-symbols-outlined text-xl {{ request()->routeIs('admin.addons.*') ? '' : 'text-primary' }}">extension</span>
                        <span class="font-label-lg text-label-lg">Add-on</span>
                    </div>
                </a>
            </nav>
        </div>
        <div class="flex flex-col gap-space-xs border-t border-surface-container p-space-sm">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="flex w-full items-center gap-space-sm rounded-lg px-space-sm py-space-sm font-label-md text-label-md text-error transition-all hover:bg-error-container hover:text-on-error-container" type="submit">
                    <span class="material-symbols-outlined text-xl">logout</span>
                    Keluar
                </button>
            </form>
            <div class="mt-space-xs flex items-center justify-between rounded-lg bg-surface-container-low p-space-sm">
                <div class="flex min-w-0 items-center gap-space-sm overflow-hidden">
                    <div class="relative flex-shrink-0">
                        <div class="grid h-8 w-8 place-items-center rounded-full bg-surface-container font-label-md font-bold text-primary">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                        <span class="absolute bottom-0 right-0 h-2 w-2 rounded-full bg-secondary ring-2 ring-surface-container-lowest"></span>
                    </div>
                    <div class="flex min-w-0 flex-col">
                        <span class="truncate font-label-md text-label-md text-on-surface">{{ auth()->user()->name }}</span>
                        <span class="font-caption text-caption uppercase tracking-wider text-on-surface-variant">Administrator</span>
                    </div>
                </div>
                <span class="material-symbols-outlined text-base text-outline">unfold_more</span>
            </div>
        </div>
    </aside>
    <div class="pointer-events-none fixed inset-0 z-40 bg-inverse-surface/40 opacity-0 transition-opacity md:hidden" data-sidebar-scrim style="display:none"></div>
    <div class="min-h-screen flex flex-col md:pl-60">
        <header class="fixed left-60 right-0 top-0 z-40 flex h-16 items-center justify-between border-b border-surface-container bg-surface-container-lowest/90 px-margin-md shadow-[0_1px_8px_rgba(0,0,0,0.04)] backdrop-blur-md max-md:left-0">
            <div class="flex items-center gap-space-sm text-on-surface-variant">
                <button aria-label="Buka navigasi" aria-controls="admin-sidebar" aria-expanded="false" class="rounded-lg p-space-xs text-on-surface-variant hover:bg-surface-container-low md:hidden" data-sidebar-toggle type="button">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <span class="font-label-md text-label-md">Admin</span>
                <span class="text-xs text-outline">/</span>
                <span class="font-label-lg text-label-lg font-semibold text-on-surface" id="admin-page-title">@yield('title')</span>
            </div>
            <div class="flex items-center gap-space-md">
                <div class="relative flex items-center">
                    <span class="material-symbols-outlined absolute left-space-sm text-lg text-outline">search</span>
                    <input class="h-9 w-64 rounded-lg border border-surface-container bg-surface-container-low pl-9 pr-14 font-body-sm text-body-sm text-on-surface transition-all placeholder:text-outline focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary lg:w-80" placeholder="Cari pesanan, invoice, atau pelanggan..." type="text" id="adminTopbarSearch" />
                    <kbd class="absolute right-space-sm rounded border border-outline-variant bg-surface-container-lowest px-1.5 py-0.5 font-caption text-caption text-on-surface-variant shadow-sm">âŒ˜K</kbd>
                </div>
                <div class="flex items-center gap-space-xs max-lg:hidden">
                    <button aria-label="Bantuan" class="rounded-lg p-space-xs text-on-surface-variant transition-all hover:bg-surface-container-low hover:text-primary" data-toast="Pusat bantuan belum tersedia" type="button">
                        <span class="material-symbols-outlined text-xl">help</span>
                    </button>
                    <button aria-label="Notifikasi" class="relative rounded-lg p-space-xs text-on-surface-variant transition-all hover:bg-surface-container-low hover:text-primary" data-toast="Belum ada notifikasi baru" type="button">
                        <span class="material-symbols-outlined text-xl">notifications</span>
                    </button>
                </div>
                <div class="mx-space-xs h-5 w-px bg-surface-container max-md:hidden"></div>
                <div class="flex cursor-pointer items-center gap-space-sm">
                    <span class="grid h-8 w-8 place-items-center rounded-full bg-surface-container font-label-md font-bold text-primary ring-1 ring-surface-container">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                    <span class="material-symbols-outlined text-base text-outline max-sm:hidden">expand_more</span>
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
