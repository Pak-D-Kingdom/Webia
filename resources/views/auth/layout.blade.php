<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | WEBIA</title>
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/account.css') }}">
</head>
<body class="account-body">
    <a class="skip-link" href="#main-content">Lewati ke konten</a>
    <header class="account-header">
        <a class="account-brand" href="{{ route('home') }}" aria-label="WEBIA, kembali ke beranda">
            <span aria-hidden="true">W</span>
            <strong>WEBIA</strong>
        </a>
        @yield('header-action')
    </header>

    <main id="main-content" class="account-main">
        @yield('content')
    </main>
</body>
</html>
