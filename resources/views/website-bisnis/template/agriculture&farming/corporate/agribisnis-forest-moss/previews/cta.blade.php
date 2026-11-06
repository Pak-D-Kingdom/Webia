<article class="cta-card">
    <div class="cta-card__copy">
        <h2>{{ $cfg['cta']['title'] }}<br>{{ $cfg['cta']['title2'] }}</h2>
        <p>{{ $cfg['cta']['text'] }}</p>
        <a class="btn btn--white btn--pill" href="{{ route('agribisnis.penawaran') }}">
            <span>{{ $cfg['cta']['btn'] }}</span><svg class="ic" aria-hidden="true"><use href="#i-arrow"/></svg>
        </a>
    </div>
    <div class="cta-card__img" aria-hidden="true">
        <img src="{{ asset($cfg['img']['petani']) }}" alt="" loading="lazy" width="624" height="531">
    </div>
</article>
