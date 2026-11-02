@php $f = $site['footer']; $c = $site['contact']; @endphp
<footer class="lg-footer">
    <div class="lg-wrap lg-footer__grid">
        <div class="lg-footer__brand">
            <a class="lg-logo lg-logo--light" href="{{ $to('home') }}" aria-label="{{ $site['brand']['name'] }}">
                <img src="{{ $img('logo-mark-light.svg') }}" width="44" height="44" alt="">
                <span class="lg-logo__txt"><strong>{{ strtoupper($site['brand']['name']) }}</strong><small>{{ $site['brand']['tagline'] }}</small></span>
            </a>
            <p>{{ $f['about'] }}</p>
        </div>

        <nav class="lg-footer__col" aria-label="Navigasi">
            <h3>Navigasi</h3>
            <ul>
                @foreach ($f['navigasi'] as $l)
                    <li><a href="{{ $to($l['route']) }}">{{ $l['label'] }}</a></li>
                @endforeach
            </ul>
        </nav>

        <nav class="lg-footer__col" aria-label="Informasi">
            <h3>Informasi</h3>
            <ul>
                @foreach ($f['informasi'] as $l)
                    <li><a href="{{ $to($l['route']) }}" @if (! $l['route']) data-soon @endif>{{ $l['label'] }}</a></li>
                @endforeach
            </ul>
        </nav>

        <nav class="lg-footer__col" aria-label="Layanan kami">
            <h3>Layanan Kami</h3>
            <ul>
                @foreach ($f['layanan'] as $l)
                    <li><a href="{{ $to('layanan') }}">{{ $l }}</a></li>
                @endforeach
            </ul>
        </nav>

        <div class="lg-footer__col">
            <h3>Ikut Kami</h3>
            <ul class="lg-social">
                @foreach ($f['social'] as $s)
                    <li><a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" @if ($s['url'] === '#') data-soon @endif><svg class="lg-ic" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"></use></svg></a></li>
                @endforeach
            </ul>
        </div>

        <div class="lg-footer__col lg-footer__contact">
            <h3>Hubungi Kami</h3>
            <ul>
                <li><svg class="lg-ic" aria-hidden="true"><use href="#i-phone"></use></svg><a href="tel:{{ $c['phone_raw'] }}">{{ $c['phone'] }}</a></li>
                <li><svg class="lg-ic" aria-hidden="true"><use href="#i-mail"></use></svg><a href="mailto:{{ $c['info_email'] }}">{{ $c['info_email'] }}</a></li>
                <li><svg class="lg-ic" aria-hidden="true"><use href="#i-pin"></use></svg><span>{{ $c['address'] }}</span></li>
            </ul>
        </div>
    </div>

    <div class="lg-footer__bar">
        <div class="lg-wrap lg-footer__bar-in">
            <p>{{ $site['brand']['credit'] }}</p>
            <ul>
                @foreach ($f['legal'] as $l)
                    <li><a href="{{ $to($l['route']) }}" @if (! $l['route']) data-soon @endif>{{ $l['label'] }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</footer>
