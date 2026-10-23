<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | WEBIA</title>
@php
    $isAuthPage = request()->routeIs('login', 'register');
@endphp
@if ($isAuthPage)
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/auth.css') }}">
@else
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/account.css') }}">
    <script src="{{ asset('js/website-bisnis/account.js') }}" defer></script>
@endif
</head>
@if ($isAuthPage)
<body style="margin:0;font-family:'Plus Jakarta Sans',system-ui,sans-serif;">
    @yield('content')
</body>
@else
@php
    $isAdmin = auth()->check() && request()->routeIs('admin.*');
    $bodyClass = $isAdmin ? 'admin-body' : (auth()->check() ? 'customer-body' : 'guest-body');
@endphp
<body class="account-body {{ $bodyClass }}">
    <a class="skip-link" href="#main-content">Lewati ke konten</a>

    @if ($isAdmin)
        <div class="admin-shell">
            <aside class="admin-sidebar" id="admin-sidebar" aria-label="Navigasi admin">
                <div class="sidebar-brand-row">
                    <a class="account-brand account-brand-admin" href="{{ route('admin.dashboard') }}">
                        <span aria-hidden="true">W</span>
                        <span class="brand-copy"><strong>WEBIA</strong><small>Portal administrasi</small></span>
                    </a>
                    <button class="sidebar-close" type="button" data-sidebar-close aria-label="Tutup navigasi">×</button>
                </div>
                <p class="sidebar-label">Ringkasan</p>
                <nav class="sidebar-nav">
                    <a href="{{ route('admin.dashboard') }}" @if (request()->routeIs('admin.dashboard')) aria-current="page" @endif><span aria-hidden="true">⌂</span>Ringkasan</a>
                </nav>
                <p class="sidebar-label">Operasional</p>
                <nav class="sidebar-nav">
                    <a href="{{ route('admin.orders.index') }}" @if (request()->routeIs('admin.orders.*')) aria-current="page" @endif><span aria-hidden="true">▣</span>Pesanan</a>
                </nav>
                <p class="sidebar-label">Master data</p>
                <nav class="sidebar-nav">
                    <a href="{{ route('admin.packages.index') }}" @if (request()->routeIs('admin.packages.*')) aria-current="page" @endif><span aria-hidden="true">◇</span>Paket layanan</a>
                    <a href="{{ route('admin.addons.index') }}" @if (request()->routeIs('admin.addons.*')) aria-current="page" @endif><span aria-hidden="true">✚</span>Add-on</a>
                </nav>
                <div class="sidebar-account">
                    <span class="account-avatar" aria-hidden="true">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</span>
                    <span class="sidebar-account-name"><strong>{{ auth()->user()->name }}</strong><small>Admin WEBIA</small></span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Keluar</button>
                    </form>
                </div>
            </aside>
            <button class="sidebar-scrim" type="button" data-sidebar-close aria-label="Tutup navigasi"></button>

            <div class="admin-workspace">
                <header class="account-header admin-topbar">
                    <button class="sidebar-toggle" type="button" data-sidebar-toggle aria-controls="admin-sidebar" aria-expanded="false">Menu</button>
                    <p class="admin-context"><span>Portal Admin</span><b>/</b><strong>@yield('title')</strong></p>
                    <div class="admin-topbar-account">
                        <span class="account-avatar" aria-hidden="true">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</span>
                        <strong>{{ auth()->user()->name }}</strong>
                    </div>
                    <div class="header-actions">@yield('header-action')</div>
                </header>
                <main id="main-content" class="account-main admin-main">
                    @yield('content')
                </main>
            </div>
        </div>
    @else
        <header class="account-header customer-header">
            @guest
                <a class="back-home" href="{{ route('home') }}" aria-label="Kembali ke beranda"><span aria-hidden="true">←</span> Kembali ke Beranda</a>
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
        <footer class="account-footer"><strong>WEBIA</strong><span>© {{ now()->year }} WEBIA Indonesia. Solusi digital untuk UMKM.</span></footer>
    @endif
</body>
@endif
</html>
