<!doctype html>
<html lang="id" class="swiftly-nojs">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', $site['brand']['name'].' — '.$site['brand']['tagline'])</title>
    <meta name="description" content="{{ $site['brand']['description'] }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset($site['assets']['css']) }}">
    <script>document.documentElement.className = 'swiftly-js';</script>
</head>
<body>
    <header class="swift-header" data-header>
        <div class="swift-container swift-header__inner">
            <a class="swift-brand" href="#top" aria-label="{{ $site['brand']['name'] }} home"><span class="swift-brand__mark">↗</span><span>{{ $site['brand']['name'] }}</span></a>
            <button class="swift-menu" type="button" data-menu aria-expanded="false"><span></span><span></span><span></span><b class="sr-only">Buka menu</b></button>
            <nav class="swift-nav" data-nav aria-label="Navigasi utama">
                <a href="#services">Services</a><a href="#how-it-works">How it works</a><a href="#proof">Why Swiftly</a><a href="#quote" class="swift-nav__cta">Get a quote <span>↗</span></a>
            </nav>
        </div>
    </header>
    <main id="top">@yield('content')</main>
    <footer class="swift-footer"><div class="swift-container swift-footer__grid"><div><a class="swift-brand swift-brand--light" href="#top"><span class="swift-brand__mark">↗</span><span>{{ $site['brand']['name'] }}</span></a><p>Fast hands. Clear updates.<br>Better delivery days.</p></div><div><strong>Explore</strong><a href="#services">Services</a><a href="#track">Track a parcel</a><a href="#quote">Business shipping</a></div><div><strong>Talk to us</strong><a href="mailto:hello@swiftly.example">hello@swiftly.example</a><a href="tel:+622155558888">+62 21 5555 8888</a><span>Jakarta · Indonesia</span></div></div><div class="swift-container swift-footer__bottom"><span>© 2026 Design By Webia</span><span>Privacy · Terms</span></div></footer>
    <script src="{{ asset($site['assets']['js']) }}" defer></script>
</body>
</html>
