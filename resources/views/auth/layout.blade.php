<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | WEBIA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/account.css') }}">
</head>
@php
    $isAdmin = auth()->check() && request()->routeIs('admin.*');
@endphp
<body class="account-body {{ $isAdmin ? 'admin-body' : '' }}">
    <a class="skip-link" href="#main-content">Lewati ke konten</a>

    @if ($isAdmin)
        <div class="admin-shell">
            <aside class="admin-sidebar" aria-label="Navigasi admin">
                <a class="account-brand account-brand-inverse" href="{{ route('admin.dashboard') }}" aria-label="WEBIA panel admin">
                    <span aria-hidden="true">W</span>
                    <strong>WEBIA</strong>
                </a>
                <p class="sidebar-label">Panel admin</p>
                <nav class="sidebar-nav">
                    <a href="{{ route('admin.dashboard') }}" @if (request()->routeIs('admin.dashboard')) aria-current="page" @endif>Ringkasan</a>
                    <a href="{{ route('admin.orders.index') }}" @if (request()->routeIs('admin.orders.*')) aria-current="page" @endif>Pesanan</a>
                    <a href="{{ route('admin.packages.index') }}" @if (request()->routeIs('admin.packages.*')) aria-current="page" @endif>Paket</a>
                    <a href="{{ route('admin.addons.index') }}" @if (request()->routeIs('admin.addons.*')) aria-current="page" @endif>Add-on</a>
                </nav>
                <div class="sidebar-account">
                    <span>{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Keluar</button>
                    </form>
                </div>
            </aside>

            <div class="admin-workspace">
                <header class="account-header admin-topbar">
                    <a class="account-brand admin-mobile-brand" href="{{ route('admin.dashboard') }}" aria-label="WEBIA panel admin">
                        <span aria-hidden="true">W</span>
                        <strong>WEBIA</strong>
                    </a>
                    <p class="admin-context"><strong>Panel admin</strong><span>{{ auth()->user()->name }}</span></p>
                    <nav class="admin-mobile-nav" aria-label="Navigasi admin seluler">
                        <a href="{{ route('admin.dashboard') }}" @if (request()->routeIs('admin.dashboard')) aria-current="page" @endif>Ringkasan</a>
                        <a href="{{ route('admin.orders.index') }}" @if (request()->routeIs('admin.orders.*')) aria-current="page" @endif>Pesanan</a>
                        <a href="{{ route('admin.packages.index') }}" @if (request()->routeIs('admin.packages.*')) aria-current="page" @endif>Paket</a>
                        <a href="{{ route('admin.addons.index') }}" @if (request()->routeIs('admin.addons.*')) aria-current="page" @endif>Add-on</a>
                    </nav>
                    <div class="header-actions">@yield('header-action')</div>
                </header>
                <main id="main-content" class="account-main admin-main">
                    @yield('content')
                </main>
            </div>
        </div>
    @else
        <header class="account-header">
            <a class="account-brand" href="{{ route('home') }}" aria-label="WEBIA kembali ke beranda">
                <span aria-hidden="true">W</span>
                <strong>WEBIA</strong>
            </a>
            @auth
                <nav class="customer-nav" aria-label="Navigasi akun">
                    <a href="{{ route('dashboard') }}" @if (request()->routeIs('dashboard')) aria-current="page" @endif>Dashboard</a>
                    <a href="{{ route('orders.index') }}" @if (request()->routeIs('orders.*')) aria-current="page" @endif>Pesanan</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Keluar</button>
                    </form>
                </nav>
            @else
                <div class="header-actions">@yield('header-action')</div>
            @endauth
        </header>

        <main id="main-content" class="account-main">
            @yield('content')
        </main>
    @endif
</body>
</html>
