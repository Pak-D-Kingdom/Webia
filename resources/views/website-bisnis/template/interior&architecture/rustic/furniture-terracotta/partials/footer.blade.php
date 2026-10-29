<footer class="rf-footer">
    <div class="rf-container rf-footer__grid">
        <div class="rf-footer__brand">
            <a class="rf-logo rf-logo--light" href="{{ $r('index') }}" aria-label="{{ $f['meta']['name'] }}">
                <span class="rf-logo__mark">{!! $icon('logo') !!}</span>
                <span class="rf-logo__text"><strong>{{ $f['meta']['name'] }}</strong><small>{{ $f['meta']['tagline'] }}</small></span>
            </a>
            <p>{{ $f['footer']['about'] }}</p>
        </div>

        @foreach ($f['footer']['columns'] as $col)
            <nav class="rf-footer__col" aria-label="{{ $col['title'] }}">
                <h2>{{ $col['title'] }}</h2>
                <ul>
                    @foreach ($col['links'] as $link)
                        <li><a href="{{ $r($link['route']) }}">{{ $link['label'] }}</a></li>
                    @endforeach
                </ul>
            </nav>
        @endforeach

        <div class="rf-footer__col rf-footer__social">
            <h2>Ikuti Kami</h2>
            <ul class="rf-social">
                @foreach ($f['footer']['social'] as $s)
                    <li><a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" target="_blank" rel="noopener">{!! $icon($s['icon']) !!}</a></li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="rf-footer__bottom">
        <div class="rf-container">
            <p class="rf-credit">{{ $f['footer']['credit'] }}</p>
        </div>
    </div>
</footer>
