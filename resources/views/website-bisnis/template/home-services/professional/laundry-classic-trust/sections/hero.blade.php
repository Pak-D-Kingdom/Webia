<section class="hero" aria-labelledby="hero-title">
    <img class="hero__bg" src="{{ $img('hero-laundry.svg') }}" alt="Mesin cuci dan keranjang handuk bersih" fetchpriority="high">
    <img class="hero__leaf" src="{{ $img('leaf.svg') }}" alt="" aria-hidden="true">
    <div class="lw-wrap hero__in">
        <div class="hero__copy">
            <p class="hero__eyebrow">{{ $c['hero']['eyebrow'] }}</p>
            <h1 id="hero-title">{{ $c['hero']['title'] }}</h1>
            <p class="hero__text">{{ $c['hero']['text'] }}</p>
            <ul class="hero__badges">
                @foreach ($c['hero']['badges'] as $b)
                    <li><span><svg class="ic"><use href="#i-{{ $b['icon'] }}"/></svg></span>{{ $b['text'] }}</li>
                @endforeach
            </ul>
            <a class="btn btn--navy" href="{{ $url('contact') }}">Pesan Sekarang <svg class="ic"><use href="#i-arrow"/></svg></a>
        </div>
        <p class="hero__script" aria-hidden="true">{{ $c['hero']['script'] }} <span>&#9825;</span></p>
    </div>
    <aside class="hero__quote">
        <img src="{{ $img('leaf.svg') }}" alt="" aria-hidden="true">
        <p>{{ $c['hero']['quote'] }}</p>
        <svg viewBox="0 0 200 20" aria-hidden="true"><path d="M2 14c40-8 90-10 190-4" fill="none" stroke="#cfe0ef" stroke-width="2" stroke-linecap="round"/></svg>
    </aside>
</section>
