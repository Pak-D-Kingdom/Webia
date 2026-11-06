@php $b = $z['brand']; $f = $z['footer']; @endphp
<footer class="ot-footer">
    <div class="ot-container ot-footer__main">
        <a class="ot-brand ot-brand--light" href="{{ $url('home') }}" aria-label="{{ $b['name'] }}">
            <img src="{{ $img($b['logo_dark']) }}" alt="" width="36" height="40">
            <span class="ot-brand__text"><strong>{{ strtoupper($b['name']) }}</strong><small>{{ $b['tagline'] }}</small></span>
        </a>
        <nav class="ot-footer__nav" aria-label="Menu footer">
            <ul>
                @foreach ($z['footer_nav'] as $n)
                    <li><a href="{{ $url($n['route'], $n['anchor']) }}">{{ $n['label'] }}</a></li>
                @endforeach
            </ul>
        </nav>
        <div class="ot-footer__end">
            <ul class="ot-social">
                @foreach ($z['socials'] as $s)
                    <li><a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" target="_blank" rel="noopener"><svg class="ot-ic" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg></a></li>
                @endforeach
                <li><a href="mailto:{{ $z['topbar']['email'] }}" aria-label="Email"><svg class="ot-ic" aria-hidden="true"><use href="#i-mail"/></svg></a></li>
            </ul>
            <p>{{ $f['copyright'] }}</p>
        </div>
    </div>
    <div class="ot-footer__credit">
        <div class="ot-container"><p>{{ $f['credit'] }}</p></div>
    </div>
</footer>
