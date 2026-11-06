<footer class="footer">
    <span class="footer__glow" aria-hidden="true"></span>
    <img class="footer__leaf footer__leaf--l" src="{{ asset($cfg['img']['leaf']) }}" alt="" aria-hidden="true">
    <img class="footer__leaf footer__leaf--r" src="{{ asset($cfg['img']['leaf']) }}" alt="" aria-hidden="true">

    <div class="container footer__main">
        <div class="footer__brand">
            <a class="brand brand--light" href="{{ route('agribisnis.home') }}" aria-label="{{ $cfg['site']['name'] }}">
                <img class="brand__mark" src="{{ asset($cfg['img']['logo_white']) }}" alt="" width="44" height="44">
                <span class="brand__txt">
                    <strong>GREEN HARVEST</strong>
                    <small>{{ $cfg['site']['tagline'] }}</small>
                </span>
            </a>
            <p>{{ $cfg['footer']['about'] }}</p>
            <p class="footer__follow">{{ $cfg['footer']['follow'] }}</p>
            <ul class="social">
                @foreach($cfg['footer']['social'] as $s)
                    <li><a href="#" data-noop aria-label="{{ $s[1] }}" title="{{ $s[1] }}"><svg class="ic" aria-hidden="true"><use href="#i-{{ $s[0] }}"/></svg></a></li>
                @endforeach
            </ul>
        </div>

        @foreach($cfg['footer']['cols'] as $col)
            <nav class="footer__col" aria-label="{{ $col['title'] }}">
                <h3 @if(!empty($col['accent'])) class="is-accent" @endif>{{ $col['title'] }}</h3>
                <ul>
                    @foreach($col['links'] as $link)
                        <li><a href="{{ route($link[1]) }}">{{ $link[0] }}</a></li>
                    @endforeach
                </ul>
            </nav>
        @endforeach

        <div class="footer__col footer__contact">
            <h3>Hubungi Kami</h3>
            <ul class="clist">
                <li>
                    <span class="clist__ic"><svg class="ic" aria-hidden="true"><use href="#i-phone"/></svg></span>
                    <span class="clist__tx"><small>{{ $cfg['footer']['contact'][0][1] }}</small><a href="tel:+{{ $cfg['site']['phone_raw'] }}">{{ $cfg['site']['phone'] }}</a></span>
                </li>
                <li>
                    <span class="clist__ic"><svg class="ic" aria-hidden="true"><use href="#i-mail"/></svg></span>
                    <span class="clist__tx"><small>{{ $cfg['footer']['contact'][1][1] }}</small><a href="mailto:{{ $cfg['site']['email'] }}">{{ $cfg['site']['email'] }}</a></span>
                </li>
                <li>
                    <span class="clist__ic"><svg class="ic" aria-hidden="true"><use href="#i-pin"/></svg></span>
                    <span class="clist__tx"><small>{{ $cfg['footer']['contact'][2][1] }}</small><span>{{ $cfg['site']['address'] }}</span></span>
                </li>
            </ul>
        </div>
    </div>

    <div class="footer__bar">
        <div class="container footer__bar-in">
            <p class="footer__credit">{{ $cfg['footer']['credit'] }}</p>
            <ul class="footer__legal">
                @foreach($cfg['footer']['legal'] as $l)
                    <li><a href="#" data-noop>{{ $l }}</a></li>
                @endforeach
            </ul>
            <button class="to-top" type="button" data-to-top aria-label="Kembali ke atas">
                <span>Ke atas</span>
                <svg class="ic" aria-hidden="true"><use href="#i-up"/></svg>
            </button>
        </div>
    </div>
</footer>
