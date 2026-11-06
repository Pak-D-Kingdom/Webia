<footer class="cp-foot">
    <div class="cp-wrap cp-foot__in">
        <div>
            <a class="cp-brand" href="{{ $home }}">
                @include("$v.partials.logo")
                <span><b>{{ strtoupper($c['brand']['name']) }}</b><small>{{ $c['brand']['tagline'] }}</small></span>
            </a>
        </div>
        <div>
            <h3>Quick Links</h3>
            <ul class="cp-foot__links">
                @foreach ($c['footer_links'] as $n)
                    <li><a href="{{ $link($n) }}">{{ $n['t'] }}</a></li>
                @endforeach
            </ul>
        </div>
        <div>
            <h3>Kontak Kami</h3>
            <ul class="cp-foot__ct">
                <li>{{ $ic('phone') }}{{ $c['topbar']['phone'] }}</li>
                <li>{{ $ic('mail') }}{{ $c['topbar']['email'] }}</li>
                <li>{{ $ic('pin') }}{{ $c['topbar']['address'] }}</li>
            </ul>
        </div>
        <div>
            <h3>Ikuti Kami</h3>
            <div class="cp-foot__soc">
                @foreach ($c['social'] as $s)
                    <a class="cp-soc" href="{{ $s['u'] }}" aria-label="{{ $s['n'] }}" target="_blank" rel="noopener">{{ $s['k'] }}</a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="cp-foot__credit"><div class="cp-wrap">{{ $c['credit'] }}</div></div>
</footer>
