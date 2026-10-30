@php
    $rp = $site['route_prefix'];
    $f  = $site['footer'];
    $c  = $site['contact'];
    $svc = array_slice($site['services']['items'], 0, 4);
@endphp
<footer class="lc-footer">
    <svg class="lc-footer__globe" viewBox="0 0 220 220" aria-hidden="true" focusable="false">
        <defs>
            <radialGradient id="lc-globe-g" cx="35%" cy="30%" r="80%">
                <stop offset="0" stop-color="#1b5aa6" stop-opacity=".75"/>
                <stop offset="1" stop-color="#031b35" stop-opacity="0"/>
            </radialGradient>
        </defs>
        <circle cx="110" cy="110" r="104" fill="url(#lc-globe-g)"/>
        <circle cx="110" cy="110" r="104" fill="none" stroke="#2f8fe0" stroke-opacity=".35"/>
        <ellipse cx="110" cy="110" rx="104" ry="38" fill="none" stroke="#2f8fe0" stroke-opacity=".28" transform="rotate(-28 110 110)"/>
        <ellipse cx="110" cy="110" rx="58" ry="104" fill="none" stroke="#2f8fe0" stroke-opacity=".22"/>
        <circle cx="168" cy="150" r="3.2" fill="#67c4ee"/>
        <circle cx="168" cy="150" r="9" fill="#67c4ee" fill-opacity=".25"/>
    </svg>

    <div class="lc-wrap lc-footer__grid">
        <div class="lc-footer__brand">
            <a class="lc-brand" href="{{ route($rp . 'home') }}" aria-label="{{ $site['brand']['name'] }} — beranda">
                <svg class="lc-brand__mark" aria-hidden="true" focusable="false"><use href="#lc-logo"></use></svg>
                <span class="lc-brand__text">
                    <strong>{{ strtoupper($site['brand']['name']) }}</strong>
                    <small>{{ $site['brand']['tagline'] }}</small>
                </span>
            </a>
            <p class="lc-footer__about">{{ $f['about'] }}</p>
        </div>

        <nav class="lc-footer__col" aria-label="Navigasi footer">
            <h2 class="lc-footer__h">Navigasi</h2>
            <ul>
                @foreach ($f['nav'] as $l)
                    <li><a href="{{ route($rp . $l[0]) }}">{{ $l[1] }}</a></li>
                @endforeach
            </ul>
        </nav>

        <nav class="lc-footer__col" aria-label="Informasi">
            <h2 class="lc-footer__h">Informasi</h2>
            <ul>
                @foreach ($f['info'] as $l)
                    <li><a href="{{ route($rp . $l[0]) }}">{{ $l[1] }}</a></li>
                @endforeach
            </ul>
        </nav>

        <nav class="lc-footer__col" aria-label="Layanan kami">
            <h2 class="lc-footer__h">Layanan Kami</h2>
            <ul>
                @foreach ($svc as $s)
                    <li><a href="{{ route($rp . 'services') }}">{{ $s['title'] }}</a></li>
                @endforeach
            </ul>
        </nav>

        <div class="lc-footer__col lc-footer__col--follow">
            <h2 class="lc-footer__h lc-footer__h--lg">Ikuti Kami</h2>
            <ul class="lc-social">
                @foreach ($f['social'] as $s)
                    <li><a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" rel="noopener">
                        <svg class="lc-ico" aria-hidden="true"><use href="#lc-i-{{ $s['icon'] }}"></use></svg>
                    </a></li>
                @endforeach
            </ul>
        </div>

        <div class="lc-footer__col lc-footer__col--contact">
            <h2 class="lc-footer__h">Hubungi Kami</h2>
            <ul class="lc-footer__contact">
                <li><svg class="lc-ico" aria-hidden="true"><use href="#lc-i-phone"></use></svg><a href="tel:{{ $c['phone_href'] }}">{{ $c['phone'] }}</a></li>
                <li><svg class="lc-ico" aria-hidden="true"><use href="#lc-i-mail"></use></svg><a href="mailto:{{ $c['email'] }}">{{ $c['email'] }}</a></li>
                <li><svg class="lc-ico" aria-hidden="true"><use href="#lc-i-pin"></use></svg><span>{{ $c['address'] }}</span></li>
            </ul>
        </div>
    </div>

    <div class="lc-footer__bar">
        <div class="lc-wrap">
            <p class="lc-footer__credit">{{ $f['credit'] }}</p>
        </div>
    </div>
</footer>
