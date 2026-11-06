{{-- Footer: brand, navigasi, kontak, sosial, aplikasi, kredit WEBIA --}}
<footer class="cg-footer">
    <svg class="cg-footer__branch cg-footer__branch--l" aria-hidden="true"><use href="#ic-branch"/></svg>
    <svg class="cg-footer__branch cg-footer__branch--r" aria-hidden="true"><use href="#ic-branch"/></svg>

    <div class="cg-container cg-footer__grid">
        <div class="cg-footer__brand">
            <a class="cg-logo cg-logo--light" href="{{ route('glow.home') }}" aria-label="{{ $c['brand']['name'] }} — beranda">
                <svg class="cg-logo__mark" aria-hidden="true"><use href="#ic-logo"/></svg>
                <span class="cg-logo__text">
                    <strong>{{ $c['brand']['name'] }}</strong>
                    <small>{{ $c['brand']['tagline'] }}</small>
                </span>
            </a>
            <p class="cg-footer__about">{{ $c['brand']['description'] }}</p>
        </div>

        <nav class="cg-footer__col" aria-label="Navigasi footer">
            <h2 class="cg-footer__title">Navigasi</h2>
            <ul class="cg-footer__links cg-footer__links--2col">
                @foreach ($c['nav'] as $item)
                    <li>
                        <a href="{{ route($item['route']) }}{{ isset($item['anchor']) ? '#' . $item['anchor'] : '' }}">{{ $item['label'] }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <div class="cg-footer__col">
            <h2 class="cg-footer__title">Kontak Kami</h2>
            <ul class="cg-footer__contact">
                <li><i class="bi bi-geo-alt-fill" aria-hidden="true"></i><span>{{ $c['contact']['address'] }}</span></li>
                <li><i class="bi bi-telephone-fill" aria-hidden="true"></i><a href="tel:{{ $c['contact']['phone_raw'] }}">{{ $c['contact']['phone'] }}</a></li>
                <li><i class="bi bi-envelope-fill" aria-hidden="true"></i><a href="mailto:{{ $c['contact']['email'] }}">{{ $c['contact']['email'] }}</a></li>
            </ul>
        </div>

        <div class="cg-footer__col">
            <h2 class="cg-footer__title">Ikuti Kami</h2>
            <div class="cg-footer__social">
                @foreach ($c['social'] as $s)
                    <a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" rel="noopener"><i class="bi {{ $s['icon'] }}" aria-hidden="true"></i></a>
                @endforeach
                <a href="https://wa.me/{{ $c['contact']['whatsapp'] }}" aria-label="WhatsApp" rel="noopener" target="_blank"><i class="bi bi-whatsapp" aria-hidden="true"></i></a>
            </div>
        </div>

        <div class="cg-footer__col">
            <h2 class="cg-footer__title">Download Our App</h2>
            <div class="cg-footer__apps">
                @foreach ($c['footer']['app'] as $app)
                    <a class="cg-store" href="{{ $app['url'] }}" rel="noopener">
                        <i class="bi {{ $app['icon'] }}" aria-hidden="true"></i>
                        <span><small>{{ $app['small'] }}</small>{{ $app['label'] }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="cg-footer__bar">
        <div class="cg-container cg-footer__bar-inner">
            <p class="cg-footer__credit">{{ $c['footer']['credit'] }}</p>
            <ul class="cg-footer__legal">
                <li><a href="{{ route('glow.policy') }}#privasi">Privacy Policy</a></li>
                <li><a href="{{ route('glow.policy') }}#syarat">Terms &amp; Conditions</a></li>
            </ul>
        </div>
    </div>
</footer>
