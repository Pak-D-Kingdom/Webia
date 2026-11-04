<!doctype html>
<html lang="id" class="hearth-nojs">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', $site['brand']['name'].' — '.$site['brand']['tagline'])</title>
    <meta name="description" content="{{ $site['brand']['description'] }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Source+Sans+3:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset($site['assets']['css']) }}">
    <script>document.documentElement.className = 'hearth-js';</script>
</head>
<body>
    <div class="hearth-ribbon">Complimentary in-home estimates · Serving Greater Jakarta and beyond</div>
    <header class="hearth-header" data-header>
        <div class="hearth-container hearth-header__inner"><a class="hearth-brand" href="#top"><span>H</span><strong>{{ $site['brand']['name'] }}</strong><small>EST. 1987 · MOVING CO.</small></a><button class="hearth-menu" type="button" data-menu aria-expanded="false"><span></span><span></span><span></span><b class="sr-only">Buka menu</b></button><nav class="hearth-nav" data-nav aria-label="Navigasi utama"><a href="#services">Services</a><a href="#process">Our process</a><a href="#story">Our story</a><a href="#faq">FAQ</a><a class="hearth-nav__cta" href="#quote">Get a free quote</a></nav></div>
    </header>
    <main id="top">@yield('content')</main>
    <footer class="hearth-footer"><div class="hearth-container hearth-footer__top"><div class="hearth-brand hearth-brand--footer"><span>H</span><strong>{{ $site['brand']['name'] }}</strong><small>EST. 1987 · MOVING CO.</small></div><p>Thoughtful moves for the places<br>that matter most.</p><a class="hearth-footer__phone" href="tel:+6221555501987">+62 21 5550 1987 <small>Speak with a moving advisor →</small></a></div><div class="hearth-container hearth-footer__bottom"><span>© 2026 Design By Webia &amp; Haul Moving Co.</span><span>Licensed · Insured · Family operated</span><span>Privacy · Accessibility</span></div></footer>
    <script src="{{ asset($site['assets']['js']) }}" defer></script>
</body>
</html>
