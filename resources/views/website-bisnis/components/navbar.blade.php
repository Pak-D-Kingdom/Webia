<header class="webia-header">
    <nav class="webia-navbar" aria-label="Navigasi utama">
        <a href="{{ route('home') }}" class="webia-brand" aria-label="WEBIA — Beranda">

            <span class="webia-brand-mark">W</span>

            <span class="webia-brand-text">
                <strong>WEBIA</strong>
                <small>by D-KREASI</small>
            </span>
        </a>

        <button type="button" class="webia-menu-toggle" aria-label="Buka menu navigasi" aria-expanded="false"
            aria-controls="webia-navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <div class="webia-navigation" id="webia-navigation">

            <a href="{{ route('home') }}">
                Beranda
            </a>

            <a href="{{ route('home') }}#kategori-website">
                Kategori
            </a>

            <a href="{{ route('webia.collections') }}">
                Galeri Template
            </a>

            <a href="{{ route('home') }}#keunggulan-website">
                Keunggulan
            </a>

            <a href="{{ route('home') }}#paket-website">
                Paket Website
            </a>

            <a href="{{ route('home') }}#faq-website">
                FAQ
            </a>

            {{-- <a href="{{ route('home') }}#konsultasi-website"
       class="webia-nav-cta">
        Konsultasi
    </a> --}}
            <button type="button" class="webia-nav-cta" id="webia-nav-consult">
                Konsultasi
            </button>

            <a href="{{ auth()->check() ? route('dashboard') : route('login') }}">
                {{ auth()->check() ? 'Dashboard' : 'Masuk' }}
            </a>

            <a href="#" class="webia-homebase-link">
                ← D-KREASI
            </a>

        </div>

    </nav>
</header>
