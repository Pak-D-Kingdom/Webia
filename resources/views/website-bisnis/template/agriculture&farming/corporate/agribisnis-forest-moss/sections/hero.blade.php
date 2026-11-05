<section class="hero" id="beranda" style="--hero-img: url('{{ asset($cfg['img']['hero']) }}')">
    <div class="hero__bg" aria-hidden="true"></div>
    <img class="hero__leaf hero__leaf--1" src="{{ asset($cfg['img']['leaf']) }}" alt="" aria-hidden="true">
    <img class="hero__leaf hero__leaf--2" src="{{ asset($cfg['img']['leaf']) }}" alt="" aria-hidden="true">
    <img class="hero__leaf hero__leaf--3" src="{{ asset($cfg['img']['leaf']) }}" alt="" aria-hidden="true">
    <div class="container hero__in">
        <div class="hero__copy">
            <p class="hero__eyebrow">{{ $cfg['hero']['eyebrow'] }}</p>
            <h1 class="hero__title">
                <span>{{ $cfg['hero']['title'] }}</span>
                <em>{{ $cfg['hero']['title_accent'] }}</em>
            </h1>
            <p class="hero__text">{{ $cfg['hero']['text'] }}</p>
            <div class="hero__cta">
                <a class="btn btn--lime btn--pill" href="{{ route('agribisnis.katalog') }}">
                    <span>{{ $cfg['hero']['btn1'] }}</span><svg class="ic" aria-hidden="true"><use href="#i-arrow"/></svg>
                </a>
                <a class="btn btn--ghost btn--pill" href="{{ route('agribisnis.inquiry') }}"><span>{{ $cfg['hero']['btn2'] }}</span></a>
            </div>
        </div>

        <div class="hero__side">
            <p class="hero__script">{{ $cfg['hero']['script'] }}</p>
            <ul class="hero__cards">
                @foreach($cfg['hero']['cards'] as $card)
                    <li>
                        <span class="hero__cardic"><svg class="ic" aria-hidden="true"><use href="#i-{{ $card['icon'] }}"/></svg></span>
                        <span class="hero__cardtx"><b>{{ $card['title'] }}</b><small>{{ $card['sub'] }}</small></span>
                        <svg class="ic ic--xs hero__cardgo" aria-hidden="true"><use href="#i-right"/></svg>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
