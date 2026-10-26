<footer class="gl-footer">
    <svg class="gl-footer__lotus gl-footer__lotus--l" aria-hidden="true"><use href="#gl-i-lotus"/></svg>
    <svg class="gl-footer__lotus gl-footer__lotus--r" aria-hidden="true"><use href="#gl-i-lotus"/></svg>

    <div class="gl-container gl-footer__grid">
        <div class="gl-footer__brand">
            <a class="gl-brand" href="{{ route('klinik-kecantikan.home') }}" aria-label="{{ $clinic['brand']['name'] }}">
                <svg class="gl-brand__logo" aria-hidden="true"><use href="#gl-i-lotus"/></svg>
                <span class="gl-brand__text">
                    <strong>{{ $clinic['brand']['name'] }}</strong>
                    <small>{{ $clinic['brand']['tagline'] }}</small>
                </span>
            </a>
            <p>{{ $clinic['brand']['slogan'] }}</p>
        </div>

        @foreach ($clinic['footer_nav'] as $heading => $links)
            <nav class="gl-footer__col" aria-label="{{ $heading }}">
                <h2 class="gl-footer__title">{{ $heading }}</h2>
                <ul>
                    @foreach ($links as $l)
                        <li><a href="{{ route($l['route']) . ($l['hash'] ? '#' . $l['hash'] : '') }}">{{ $l['label'] }}</a></li>
                    @endforeach
                </ul>
            </nav>
        @endforeach

        <div class="gl-footer__col">
            <h2 class="gl-footer__title">Kontak Kami</h2>
            <ul class="gl-footer__contact">
                <li><svg class="gl-ic" aria-hidden="true"><use href="#gl-i-phone"/></svg><a href="tel:{{ preg_replace('/\s+/', '', $clinic['contact']['phone']) }}">{{ $clinic['contact']['phone'] }}</a></li>
                <li><svg class="gl-ic" aria-hidden="true"><use href="#gl-i-mail"/></svg><a href="mailto:{{ $clinic['contact']['email'] }}">{{ $clinic['contact']['email'] }}</a></li>
                <li><svg class="gl-ic" aria-hidden="true"><use href="#gl-i-map-pin"/></svg><span>{{ $clinic['contact']['address'] }}</span></li>
            </ul>
        </div>

        <div class="gl-footer__col">
            <h2 class="gl-footer__title">Ikuti Kami</h2>
            <ul class="gl-footer__social">
                @foreach ($clinic['social'] as $s)
                    <li>
                        <a href="{{ $s['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $s['label'] }}">
                            <svg class="gl-ic" aria-hidden="true"><use href="#gl-i-{{ $s['icon'] }}"/></svg>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="gl-container">
        <div class="gl-footer__bar">
            <p>© 2026 {{ $clinic['brand']['name'] }}. Semua hak dilindungi.</p>
            <a class="gl-footer__top" href="#top" data-gl-top>Kembali ke atas
                <svg class="gl-ic" aria-hidden="true"><use href="#gl-i-chevron-up"/></svg>
            </a>
        </div>
        <p class="gl-footer__credit">© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.</p>
    </div>
</footer>
