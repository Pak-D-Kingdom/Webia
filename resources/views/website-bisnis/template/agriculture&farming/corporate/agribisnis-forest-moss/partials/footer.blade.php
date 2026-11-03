<footer class="footer">
    <img class="footer__leaf footer__leaf--l" src="{{ asset($cfg['img']['leaf']) }}" alt="" aria-hidden="true">
    <img class="footer__leaf footer__leaf--r" src="{{ asset($cfg['img']['leaf']) }}" alt="" aria-hidden="true">

    <div class="container footer__grid">
        <div class="footer__brand">
            <a class="brand brand--light" href="{{ route('agribisnis.home') }}" aria-label="{{ $cfg['site']['name'] }}">
                <img class="brand__mark" src="{{ asset($cfg['img']['logo_white']) }}" alt="" width="44" height="44">
                <span class="brand__txt">
                    <strong>GREEN HARVEST</strong>
                    <small>{{ $cfg['site']['tagline'] }}</small>
                </span>
            </a>
            <p>{{ $cfg['footer']['about'] }}</p>
        </div>

        @foreach($cfg['footer']['cols'] as $col)
            <div class="footer__col">
                <h3 @if(!empty($col['accent'])) class="is-accent" @endif>{{ $col['title'] }}</h3>
                <ul>
                    @foreach($col['links'] as $link)
                        <li><a href="{{ route($link[1]) }}">{{ $link[0] }}</a></li>
                    @endforeach
                </ul>
            </div>
        @endforeach

        <div class="footer__col footer__social">
            <h3>Ikuti Kami</h3>
            <ul class="social">
                @foreach($cfg['footer']['social'] as $s)
                    <li><a href="#" data-noop aria-label="{{ $s[1] }}"><svg class="ic" aria-hidden="true"><use href="#i-{{ $s[0] }}"/></svg></a></li>
                @endforeach
            </ul>
        </div>

        <div class="footer__col footer__contact">
            <h3>Hubungi Kami</h3>
            <ul>
                <li><svg class="ic" aria-hidden="true"><use href="#i-phone"/></svg><a href="tel:+{{ $cfg['site']['whatsapp'] }}">{{ $cfg['site']['phone'] }}</a></li>
                <li><svg class="ic" aria-hidden="true"><use href="#i-mail"/></svg><a href="mailto:{{ $cfg['site']['email'] }}">{{ $cfg['site']['email'] }}</a></li>
                <li><svg class="ic" aria-hidden="true"><use href="#i-pin"/></svg><span>{{ $cfg['site']['address'] }}</span></li>
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
        </div>
    </div>
</footer>
