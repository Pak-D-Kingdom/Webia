<footer class="uh-footer">
    <div class="uh-footer__main">
        <div class="uh-container uh-footer__grid">
            <div class="uh-footer__brand">
                <a class="uh-brand uh-brand--light" href="{{ $url('home') }}" aria-label="{{ $uh['brand']['name'] }} — Beranda">
                    <img class="uh-brand__logo" src="{{ $img('logo-emblem-gelap.jpg') }}" width="48" height="52" alt="">
                    <span class="uh-brand__text">
                        <span class="uh-brand__name">{{ $uh['brand']['name'] }}</span>
                        <span class="uh-brand__tag">{{ $uh['brand']['tagline'] }}</span>
                    </span>
                </a>
            </div>

            <nav class="uh-footer__col uh-footer__col--nav" aria-label="Navigasi footer">
                <h2 class="uh-footer__title">Navigasi</h2>
                <div class="uh-footer__links2">
                    <ul>
                        @foreach ($uh['footer']['nav_a'] as $l)
                            <li><a href="{{ $url($l[0]) }}">{{ $l[1] }}</a></li>
                        @endforeach
                    </ul>
                    <ul>
                        @foreach ($uh['footer']['nav_b'] as $l)
                            <li><a href="{{ $url($l[0]) }}">{{ $l[1] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </nav>

            <div class="uh-footer__col uh-footer__col--info">
                <h2 class="uh-footer__title">Informasi</h2>
                <ul>
                    @foreach ($uh['footer']['info'] as $l)
                        <li><a href="{{ $url($l[0]) }}">{{ $l[1] }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="uh-footer__col uh-footer__col--contact">
                <h2 class="uh-footer__title">Kontak Kami</h2>
                <ul>
                    <li>
                        <svg class="uh-i" aria-hidden="true"><use href="#i-phone"/></svg>
                        <a href="{{ $wa($uh['hero']['wa_consult']) }}" target="_blank" rel="noopener noreferrer">{{ $uh['brand']['phone_display'] }}</a>
                    </li>
                    <li>
                        <svg class="uh-i" aria-hidden="true"><use href="#i-mail"/></svg>
                        <a href="mailto:{{ $uh['brand']['email'] }}">{{ $uh['brand']['email'] }}</a>
                    </li>
                    <li>
                        <svg class="uh-i" aria-hidden="true"><use href="#i-pin"/></svg>
                        <span>{{ $uh['brand']['address'] }}</span>
                    </li>
                </ul>
            </div>

            <ul class="uh-footer__social" aria-label="Media sosial">
                @foreach ($uh['social'] as $s)
                    <li>
                        <a href="{{ $s['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $s['name'] }}">
                            <svg class="uh-i" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg>
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="uh-footer__art" aria-hidden="true">
                <p class="uh-footer__calli">{{ $uh['footer']['calligraphy'] }}</p>
                <img class="uh-footer__camel" src="{{ $img('maskot-unta.png') }}" alt="" loading="lazy" width="228" height="248">
            </div>
        </div>
    </div>

    <div class="uh-footer__bar">
        <div class="uh-container uh-footer__bar-inner">
            <p class="uh-footer__credit">{{ $uh['brand']['credit'] }}</p>
            <ul class="uh-footer__legal">
                <li><a href="{{ $url('requirements') }}">Persyaratan Pendaftaran</a></li>
                <li><a href="{{ $url('chatbot') }}">FAQ</a></li>
            </ul>
        </div>
    </div>
</footer>
