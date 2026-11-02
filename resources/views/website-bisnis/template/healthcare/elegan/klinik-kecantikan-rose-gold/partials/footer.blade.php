{{-- Footer: brand, navigasi, informasi, kontak, sosial + kredit WEBIA --}}
<footer class="rg-footer" id="rgFooter">
    <img class="rg-footer__deco rg-footer__deco--l" src="{{ asset($c['images_dir'] . '/deco-bl.jpg') }}" alt="" loading="lazy" aria-hidden="true">
    <img class="rg-footer__deco rg-footer__deco--r" src="{{ asset($c['images_dir'] . '/deco-br.jpg') }}" alt="" loading="lazy" aria-hidden="true">

    <div class="rg-container rg-footer__grid">
        <div class="rg-footer__brand">
            <a class="rg-brand" href="{{ route($rp . 'index') }}">
                @include($tpl . '.partials.logo')
                <span class="rg-brand__text">
                    <strong>{{ $c['brand']['name'] }}</strong>
                    <small>{{ $c['brand']['tagline'] }}</small>
                </span>
            </a>
        </div>

        <nav class="rg-footer__col" aria-label="Navigasi footer">
            <h2 class="rg-footer__h">Navigasi</h2>
            <ul>
                @foreach ($c['footer']['nav'] as $l)
                    <li><a href="{{ route($rp . $l['route']) }}">{{ $l['label'] }}</a></li>
                @endforeach
            </ul>
        </nav>

        <nav class="rg-footer__col" aria-label="Informasi">
            <h2 class="rg-footer__h">Informasi</h2>
            <ul>
                @foreach ($c['footer']['info'] as $l)
                    <li><a href="{{ route($rp . $l['route']) }}{{ isset($l['hash']) ? '#' . $l['hash'] : '' }}">{{ $l['label'] }}</a></li>
                @endforeach
            </ul>
        </nav>

        <div class="rg-footer__col">
            <h2 class="rg-footer__h">Kontak Kami</h2>
            <ul class="rg-footer__contact">
                <li><i class="bi bi-telephone" aria-hidden="true"></i><a href="tel:{{ preg_replace('/\s+/', '', $c['contact']['phone']) }}">{{ $c['contact']['phone'] }}</a></li>
                <li><i class="bi bi-envelope" aria-hidden="true"></i><a href="mailto:{{ $c['contact']['email'] }}">{{ $c['contact']['email'] }}</a></li>
                <li><i class="bi bi-geo-alt" aria-hidden="true"></i><span>{{ $c['contact']['address'] }}</span></li>
            </ul>
        </div>

        <div class="rg-footer__col">
            <h2 class="rg-footer__h">Ikuti Kami</h2>
            <ul class="rg-footer__social">
                @foreach ($c['socials'] as $s)
                    <li><a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}"><i class="bi {{ $s['icon'] }}" aria-hidden="true"></i></a></li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="rg-footer__bar">
        <div class="rg-container rg-footer__barinner">
            <p>{{ $c['footer']['credit'] }}</p>
            <p>{{ $c['brand']['slogan'] }} <i class="bi bi-heart" aria-hidden="true"></i></p>
        </div>
    </div>
</footer>
