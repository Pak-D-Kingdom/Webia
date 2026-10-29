@php $c = $cfg['contact']; @endphp
<footer class="fm-footer">
    <div class="fm-container">
        <div class="fm-footer__grid">
            <div class="fm-footer__brand">
                <a class="fm-brand fm-brand--light" href="{{ $route('home') }}">
                    <svg class="fm-brand__logo" viewBox="0 0 40 40" aria-hidden="true">
                        <path d="M4 19 20 6l16 13" /><path d="M8 17v17h24V17" /><path d="M15 34V23h10v11M15 28.500h10M20 23v11" />
                    </svg>
                    <span class="fm-brand__txt"><strong>{{ $cfg['brand']['name'] }}</strong><small>{{ $cfg['brand']['tagline'] }}</small></span>
                </a>
                <ul class="fm-footer__contact">
                    <li><svg class="fm-i" aria-hidden="true"><use href="#i-pin"/></svg>{{ $c['address'] }}</li>
                    <li><svg class="fm-i" aria-hidden="true"><use href="#i-clock"/></svg>{{ $c['hours'] }}</li>
                    <li><svg class="fm-i" aria-hidden="true"><use href="#i-mail"/></svg><a href="mailto:{{ $c['email'] }}">{{ $c['email'] }}</a></li>
                </ul>
            </div>

            @foreach ($cfg['footer_cols'] as $heading => $links)
                <nav class="fm-footer__col" aria-label="{{ $heading }}">
                    <h2 class="fm-footer__h">{{ $heading }}</h2>
                    <ul>
                        @foreach ($links as $l)
                            <li><a href="{{ $route($l[1]) }}">{{ $l[0] }}</a></li>
                        @endforeach
                    </ul>
                </nav>
            @endforeach

            <div class="fm-footer__col">
                <h2 class="fm-footer__h">Ikuti Kami</h2>
                <ul class="fm-social">
                    @foreach ($cfg['social'] as $s)
                        <li><a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" target="_blank" rel="noopener"><svg class="fm-i" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg></a></li>
                    @endforeach
                </ul>
            </div>

            <div class="fm-footer__col fm-footer__news">
                <h2 class="fm-footer__h">Dapatkan update terbaru</h2>
                <form class="fm-news" data-fm-news novalidate>
                    <label class="fm-sr" for="fm-news-email">Email Anda</label>
                    <input id="fm-news-email" type="email" name="email" placeholder="Masukkan email Anda" autocomplete="email" required>
                    <button type="submit" aria-label="Kirim"><svg class="fm-i" aria-hidden="true"><use href="#i-send"/></svg></button>
                </form>
                <p class="fm-news__msg" data-fm-news-msg role="status" aria-live="polite"></p>
            </div>
        </div>

        <div class="fm-footer__bottom">
            <p>{{ $cfg['credit'] }}</p>
        </div>
    </div>
</footer>
