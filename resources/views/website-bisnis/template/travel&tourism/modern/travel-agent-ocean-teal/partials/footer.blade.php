@php $c = $ta['contact']; @endphp
<footer class="ta-footer">
    <div class="ta-footer__wave" aria-hidden="true">
        <svg viewBox="0 0 1440 60" preserveAspectRatio="none"><path d="M0 30c120 24 240 24 360 6s240-30 360-24 240 30 360 30 240-18 360-30V60H0Z" fill="currentColor"/></svg>
    </div>
    <div class="ta-container ta-footer__grid">
        <div class="ta-footer__brand">
            <a class="ta-logo ta-logo--light" href="{{ $routes['index'] }}" aria-label="{{ $ta['brand']['name'] }}">
                @include($ns . '.partials.logo')
            </a>
            <p>{{ $ta['brand']['about'] }}</p>
            <ul class="ta-footer__social" aria-label="Media sosial">
                @foreach ($ta['social'] as $s)
                    <li><a href="{{ $s['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $s['label'] }}">{{ $icon($s['icon']) }}</a></li>
                @endforeach
            </ul>
        </div>

        <nav class="ta-footer__col" aria-label="Menu footer">
            <h2>Jelajahi</h2>
            <ul>
                @foreach ($ta['nav'] as $key => $label)
                    <li><a href="{{ $routes[$key] }}">{{ $label }}</a></li>
                @endforeach
                <li><a href="{{ $routes['inquiry'] }}">Inquiry</a></li>
                <li><a href="{{ $routes['ai-chat'] }}">AI Chat</a></li>
            </ul>
        </nav>

        <div class="ta-footer__col">
            <h2>Hubungi Kami</h2>
            <ul class="ta-footer__contact">
                <li>{{ $icon('pin') }}<span>{{ $c['address'] }}</span></li>
                <li>{{ $icon('phone') }}<a href="tel:{{ $c['tel'] }}">{{ $c['phone'] }}</a></li>
                <li>{{ $icon('mail') }}<a href="mailto:{{ $c['email'] }}">{{ $c['email'] }}</a></li>
                <li>{{ $icon('clock') }}<span>{{ $c['hours'] }}</span></li>
            </ul>
        </div>
    </div>

    <div class="ta-footer__bottom">
        <div class="ta-container">
            <p>{{ $ta['brand']['credit'] }}</p>
        </div>
    </div>
</footer>
