{{-- Footer + kredit WEBIA by D-KREASI --}}
<footer class="footer">
    <div class="container footer__grid">
        <div class="footer__brand" id="tentang-kami">
            <a class="brand brand--light" href="{{ $route('home') }}" aria-label="{{ $c['brand']['name'] }} — Beranda">
                <svg class="brand__mark" viewBox="0 0 48 48" aria-hidden="true"><use href="#logo-mark"/></svg>
                <span class="brand__text">
                    <strong>{{ $c['brand']['upper'] }}</strong>
                    <small>{{ $c['brand']['tagline'] }}</small>
                </span>
            </a>
            <p>{{ $c['footer']['about'] }}</p>
        </div>

        <nav class="footer__col" aria-label="Navigasi footer">
            <h3>Navigasi</h3>
            <ul>
                @foreach ($c['footer']['nav'] as $l)
                    <li><a href="{{ $route($l['route']) }}">{{ $l['label'] }}</a></li>
                @endforeach
            </ul>
        </nav>

        <nav class="footer__col" aria-label="Informasi">
            <h3>Informasi</h3>
            <ul>
                @foreach ($c['footer']['info'] as $l)
                    @php
                        if (isset($l['route'])) {
                            $href = $route($l['route']);
                        } elseif (isset($l['wa'])) {
                            $href = 'https://wa.me/' . $c['contact']['whatsapp'] . '?text=' . rawurlencode($l['wa']);
                        } else {
                            $href = $l['href'];
                        }
                    @endphp
                    <li><a href="{{ $href }}" @if (isset($l['wa'])) target="_blank" rel="noopener" @endif>{{ $l['label'] }}</a></li>
                @endforeach
            </ul>
        </nav>

        <nav class="footer__col" aria-label="Layanan populer">
            <h3>Layanan Populer</h3>
            <ul>
                @foreach ($c['footer']['popular'] as $l)
                    <li><a href="{{ $route($l['route']) }}#{{ $l['hash'] }}">{{ $l['label'] }}</a></li>
                @endforeach
            </ul>
        </nav>

        <div class="footer__col">
            <h3>Ikuti Kami</h3>
            <ul class="social">
                @foreach ($c['footer']['social'] as $s)
                    <li>
                        <a href="{{ $s['href'] }}" aria-label="{{ $s['name'] }}" rel="noopener">
                            <svg class="ic ic--fill" aria-hidden="true"><use href="#{{ $s['icon'] }}"/></svg>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="footer__col footer__contact" id="kontak">
            <h3>Hubungi Kami</h3>
            <ul>
                <li><svg class="ic" aria-hidden="true"><use href="#i-phone"/></svg><a href="{{ $c['contact']['phone_href'] }}">{{ $c['contact']['phone'] }}</a></li>
                <li><svg class="ic" aria-hidden="true"><use href="#i-mail"/></svg><a href="mailto:{{ $c['contact']['email'] }}">{{ $c['contact']['email'] }}</a></li>
            </ul>
        </div>

        <div class="footer__col footer__address">
            <ul>
                <li><svg class="ic" aria-hidden="true"><use href="#i-pin"/></svg><span>{{ $c['contact']['address'] }}</span></li>
            </ul>
        </div>
    </div>

    <div class="footer__bar">
        <div class="container footer__bar-in">
            <p>{{ $c['footer']['copyright'] }}</p>
            <ul>
                @foreach ($c['footer']['legal'] as $t)
                    <li><a href="#" data-noop>{{ $t }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="footer__credit">
        <p>{{ $c['footer']['credit'] }}</p>
    </div>
</footer>
