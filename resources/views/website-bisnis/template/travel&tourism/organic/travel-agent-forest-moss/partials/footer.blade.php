<footer class="ta-footer">
    <img class="ta-footer__leaf ta-footer__leaf--l" src="{{ $img('footer-leaf-left.png') }}" alt="" loading="lazy" aria-hidden="true">
    <img class="ta-footer__leaf ta-footer__leaf--r" src="{{ $img('footer-leaf-right.png') }}" alt="" loading="lazy" aria-hidden="true">

    <div class="ta-container ta-footer__in">
        <a class="ta-brand ta-brand--light" href="{{ $r('index') }}">
            <svg class="ta-brand__mark" aria-hidden="true"><use href="#ta-logo"/></svg>
            <span class="ta-brand__text">
                <strong>{{ $cfg['brand']['name'] }}</strong>
                <small>{{ $cfg['brand']['tagline'] }}</small>
            </span>
        </a>

        <nav class="ta-footer__nav" aria-label="Navigasi footer">
            @foreach ($cfg['nav'] as $item)
                <a href="{{ $r($item['route']) }}">{{ $item['label'] }}</a>
            @endforeach
        </nav>

        <ul class="ta-social ta-social--footer" aria-label="Media sosial">
            @foreach ($cfg['social'] as $s)
                <li><a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" rel="noopener"><svg class="ta-i {{ $s['icon'] === 'tiktok' ? 'ta-i--fill' : '' }}" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg></a></li>
            @endforeach
        </ul>
    </div>

    <div class="ta-footer__credit">
        <p>© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.</p>
    </div>
</footer>
