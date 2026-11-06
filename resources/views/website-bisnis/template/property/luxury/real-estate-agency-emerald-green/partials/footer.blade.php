{{-- ===================== FOOTER ===================== --}}
<footer class="rea-footer">
    <div class="rea-container rea-footer__grid">
        <a class="rea-brand rea-brand--light" href="{{ $route('index', '#top') }}" aria-label="{{ $site['name'] }} - home">
            <svg class="rea-brand__logo" aria-hidden="true" focusable="false"><use href="#i-logo"></use></svg>
            <span class="rea-brand__text">
                <span class="rea-brand__name">{{ strtoupper($site['name']) }}</span>
                <span class="rea-brand__tag">{{ strtoupper($site['tagline']) }}</span>
            </span>
        </a>

        <nav class="rea-footer__nav" aria-label="Footer navigation">
            <ul>
                @foreach ($footerNav as $item)
                    <li><a href="{{ $route($item['page'], $item['hash']) }}">{{ $item['label'] }}</a></li>
                @endforeach
            </ul>
        </nav>

        <div class="rea-footer__col">
            <h2>Contact Us</h2>
            <ul class="rea-footer__contact">
                <li>{{ $icon('phone') }}<a href="tel:{{ preg_replace('/[^+\d]/', '', $site['phone']) }}">{{ $site['phone'] }}</a></li>
                <li>{{ $icon('mail') }}<a href="mailto:{{ $site['email'] }}">{{ $site['email'] }}</a></li>
                <li>{{ $icon('pin') }}<span>{{ $site['address'] }}</span></li>
            </ul>
        </div>

        <div class="rea-footer__col">
            <h2>Follow Us</h2>
            <ul class="rea-social rea-social--footer">
                @foreach ($site['social'] as $s)
                    <li><a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" rel="noopener">{{ $icon($s['icon']) }}</a></li>
                @endforeach
            </ul>
        </div>

        <p class="rea-footer__copy">© {{ date('Y') }} {{ $site['name'] }}. All rights reserved.</p>
    </div>

    <div class="rea-footer__credit">
        <div class="rea-container">
            <p>© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.</p>
        </div>
    </div>
</footer>
