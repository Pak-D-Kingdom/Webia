@php
    $themeKey = $themeKey ?? $theme ?? 'artistic';
    $theme = config("automotive.themes.{$themeKey}", config('automotive.themes.artistic'));
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $theme['name'] }} — Auto Detailing</title>
    <meta name="description" content="{{ $theme['intro'] }} Layanan auto detailing, paint correction, ceramic coating, dan car care.">
    <meta name="theme-color" content="{{ $themeKey === 'artistic' ? '#075985' : ($themeKey === 'luxury' ? '#111315' : '#0d0d0c') }}">
    <link rel="stylesheet" href="{{ asset('css/website-bisnis/templates/automotive/automotive.css') }}">
</head>
<body class="automotive-page {{ $theme['class'] }}" data-theme="{{ $themeKey }}">
    <header class="auto-header">
        <a class="auto-brand" href="#top" aria-label="{{ $theme['name'] }} beranda">
            <span class="brand-mark">{{ $theme['logo_mark'] }}</span>
            <span><strong>{{ $theme['name'] }}</strong><small>{{ $theme['label'] }}</small></span>
        </a>
        <nav class="auto-nav" id="auto-nav" aria-label="Navigasi utama">
            <a href="#services">Services</a><a href="#packages">Packages</a><a href="#work">Our work</a><a href="#contact">Contact</a>
        </nav>
        <a class="auto-header-cta" href="#contact">Book a detail <span>↗</span></a>
        <button class="auto-menu" type="button" aria-label="Buka menu" aria-expanded="false" aria-controls="auto-nav">☰</button>
    </header>

    <main id="top">
        <section class="auto-hero">
            <div class="hero-copy">
                <p class="eyebrow"><span></span>{{ $theme['eyebrow'] }}</p>
                <h1>{{ $theme['title'] }}</h1>
                <p class="hero-intro">{{ $theme['intro'] }}</p>
                <div class="hero-actions"><a class="button button-primary" href="#contact">Reserve your slot <span>↗</span></a><a class="text-link" href="#services">Explore services <span>↓</span></a></div>
                <div class="hero-proof"><span>✦ {{ $theme['accent_label'] }}</span><span>•</span><span>{{ $theme['phone'] }}</span></div>
            </div>
            <div class="hero-visual">
                <div class="hero-image-wrap"><img src="{{ asset('images/website-bisnis/' . $theme['hero_image']) }}" alt="Ilustrasi layanan auto detailing profesional" fetchpriority="high"></div>
                <div class="hero-stamp"><span>CAR CARE</span><strong>01</strong><small>DETAIL<br>BETTER</small></div>
                <div class="hero-caption">{{ $theme['accent_label'] }} <span>／</span> DETAILING STUDIO</div>
            </div>
        </section>

        <section class="auto-intro section-pad" aria-labelledby="intro-title">
            <div class="section-kicker">01 / THE APPROACH</div>
            <div class="intro-grid"><h2 id="intro-title">A clean car is good.<br><em>A cared-for car is different.</em></h2><div><p>We combine trained hands, considered products, and a repeatable process to make every surface feel right again.</p><a class="text-link" href="#contact">Meet the studio <span>↗</span></a></div></div>
            <div class="stat-row">@foreach ($theme['stats'] as $stat)<div class="stat-item"><strong>{{ $stat['value'] }}</strong><span>{{ $stat['label'] }}</span></div>@endforeach</div>
        </section>

        <section class="auto-services section-pad" id="services" aria-labelledby="services-title">
            <div class="section-head"><div><div class="section-kicker">02 / SERVICES</div><h2 id="services-title">Care, made <em>precise.</em></h2></div><p>Choose the level of care that fits your car, your schedule, and the road ahead.</p></div>
            <div class="service-list">@foreach ($theme['services'] as $service)<article class="service-row"><span class="service-number">{{ $service['number'] }}</span><h3>{{ $service['name'] }}</h3><p>{{ $service['desc'] }}</p><strong>{{ $service['price'] }}</strong><a href="#contact" aria-label="Tanya {{ $service['name'] }}">↗</a></article>@endforeach</div>
        </section>

        <section class="auto-work section-pad" id="work" aria-labelledby="work-title">
            <div class="section-head"><div><div class="section-kicker">03 / SELECTED WORK</div><h2 id="work-title">The finish <em>speaks.</em></h2></div><p>From the first rinse to the final inspection, every result is built on attention.</p></div>
            <div class="work-grid">@foreach ($theme['portfolio'] as $work)<figure class="work-card"><img src="{{ asset('images/website-bisnis/' . $work['image']) }}" alt="{{ $work['title'] }}" loading="lazy"><figcaption><span>{{ $work['label'] }}</span><strong>{{ $work['title'] }}</strong></figcaption></figure>@endforeach</div>
        </section>

        <section class="auto-packages section-pad" id="packages" aria-labelledby="packages-title">
            <div class="section-head"><div><div class="section-kicker">04 / PACKAGES</div><h2 id="packages-title">Pick your <em>standard.</em></h2></div><p>Clear packages, transparent starting prices. Final quote follows vehicle condition and size.</p></div>
            <div class="package-grid">@foreach ($theme['packages'] as $index => $package)<article class="package-card {{ $index === 1 ? 'is-featured' : '' }}"><div class="package-top"><span>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span><span>{{ $package['note'] }}</span></div><h3>{{ $package['name'] }}</h3><div class="package-price"><small>from</small><strong>{{ $package['price'] }}</strong></div><ul>@foreach ($package['items'] as $item)<li>{{ $item }}</li>@endforeach</ul><a href="#contact">Get a quote <span>↗</span></a></article>@endforeach</div>
        </section>

        <section class="auto-quote section-pad" id="contact" aria-labelledby="quote-title">
            <div class="quote-copy"><div class="section-kicker">05 / YOUR NEXT DETAIL</div><h2 id="quote-title">Let’s make it <em>look right.</em></h2><p>Tell us what you drive and what you need. This demo form validates your details locally; it does not submit to a backend yet.</p><div class="quote-contact"><a href="https://wa.me/6281234567890" target="_blank" rel="noreferrer">WhatsApp us <span>↗</span></a><span>or</span><a href="https://maps.google.com/?q=Jakarta" target="_blank" rel="noreferrer">Open Google Maps <span>↗</span></a></div></div>
            <form class="quote-form" id="auto-quote-form" novalidate><label>Nama<input name="name" required autocomplete="name" placeholder="Nama lengkap"></label><label>Email<input name="email" type="email" required autocomplete="email" placeholder="nama@email.com"></label><label>Kendaraan<input name="vehicle" required placeholder="Contoh: Toyota GR Yaris 2023"></label><label>Layanan<select name="service" required><option value="">Pilih layanan</option>@foreach ($theme['services'] as $service)<option>{{ $service['name'] }}</option>@endforeach<option>Belum yakin — konsultasi</option></select></label><label class="full">Pesan (opsional)<textarea name="message" rows="3" placeholder="Ceritakan kebutuhan kendaraan Anda"></textarea></label><div class="form-bottom"><button class="button button-primary" type="submit">Request a quote <span>↗</span></button><p class="form-status" role="status" aria-live="polite"></p></div></form>
        </section>
    </main>

    <footer class="auto-footer"><a class="auto-brand" href="#top"><span class="brand-mark">{{ $theme['logo_mark'] }}</span><span><strong>{{ $theme['name'] }}</strong><small>{{ $theme['label'] }}</small></span></a><p>Made for the road ahead. © {{ date('Y') }} {{ $theme['name'] }}.</p><a href="#top" class="back-top">Back to top ↑</a></footer>
    <script src="{{ asset('js/website-bisnis/templates/automotive/automotive.js') }}" defer></script>
</body>
</html>
