<!doctype html>
<html lang="id" class="atelier-nojs">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', $site['brand']['name'].' — '.$site['brand']['tagline'])</title>
    <meta name="description" content="{{ $site['brand']['description'] }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:ital,wght@0,500;0,600;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset($site['assets']['css']) }}">
    <script>document.documentElement.className = 'atelier-js';</script>
</head>
<body>
    <header class="atelier-header" data-header>
        <div class="atelier-container atelier-header__inner">
            <a class="atelier-brand" href="#top" aria-label="Atelier Move home">
                <span class="atelier-brand__seal">A</span>
                <span class="atelier-brand__words"><strong>Atelier Move</strong><small>PRIVATE MOVING CONCIERGE</small></span>
            </a>
            <button class="atelier-menu" type="button" data-menu aria-expanded="false" aria-controls="atelier-navigation">
                <span></span><span></span><span></span><b class="sr-only">Buka menu</b>
            </button>
            <nav class="atelier-nav" id="atelier-navigation" data-nav aria-label="Navigasi utama">
                <a href="#services">Services</a>
                <a href="#method">Our method</a>
                <a href="#contact" class="atelier-nav__cta">Request a consultation <span>↗</span></a>
            </nav>
        </div>
    </header>
    <main id="top">@yield('content')</main>
    <footer class="atelier-footer">
        <div class="atelier-container atelier-footer__grid">
            <div>
                <a class="atelier-brand atelier-brand--footer" href="#top">
                    <span class="atelier-brand__seal">A</span>
                    <span class="atelier-brand__words"><strong>Atelier Move</strong><small>PRIVATE MOVING CONCIERGE</small></span>
                </a>
                <p class="atelier-footer__motto">Moving, considered.</p>
            </div>
            <div>
                <span class="atelier-footer__label">Visit the studio</span>
                <span>Jl. Kemang Raya 18<br>Jakarta Selatan 12730</span>
            </div>
            <div>
                <span class="atelier-footer__label">Concierge desk</span>
                <a href="mailto:hello@ateliermove.example">hello@ateliermove.example</a>
                <a href="tel:+622155501987">+62 21 5550 1987</a>
            </div>
        </div>
        <div class="atelier-container atelier-footer__bottom">
            <span>© 2026 Design By Webia</span>
            <span>Instagram · Privacy · Terms</span>
        </div>
    </footer>
    <script src="{{ asset($site['assets']['js']) }}" defer></script>
</body>
</html>
