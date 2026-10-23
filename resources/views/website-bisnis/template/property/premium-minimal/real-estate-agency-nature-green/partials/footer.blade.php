<footer class="footer">
    <div class="container container--nav footer__main">
        <a class="brand brand--light" href="{{ $r('home') }}" aria-label="{{ $t['brand']['name'] }} — beranda">
            <span class="brand__mark"><svg class="i" aria-hidden="true"><use href="#i-leaf"/></svg></span>
            <span class="brand__txt"><strong>GREENESTATE</strong><small>{{ $t['brand']['tagline'] }}</small></span>
        </a>

        <nav class="footer__nav" aria-label="Footer">
            <a href="{{ $r('home') }}">Home</a>
            <a href="{{ $r('properties') }}">Properties</a>
            <a href="{{ $r('about') }}">About Us</a>
            <a href="{{ $r('gallery') }}">Gallery</a>
            <a href="{{ $r('contact') }}#location">Location</a>
            <a href="{{ $r('contact') }}">Contact</a>
        </nav>

        <div class="footer__follow">
            <span>Follow Us</span>
            <ul class="socials">
                @foreach ($t['socials'] as $s)
                    <li><a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" target="_blank" rel="noopener"><svg class="i" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg></a></li>
                @endforeach
            </ul>
        </div>

        <p class="footer__copy">© 2026 {{ $t['brand']['name'] }}. All rights reserved.</p>
    </div>

    <div class="footer__credit">
        <div class="container container--nav"><p>© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.</p></div>
    </div>
</footer>
