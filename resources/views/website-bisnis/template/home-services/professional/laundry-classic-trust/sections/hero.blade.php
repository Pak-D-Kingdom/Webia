<section class="hero" aria-labelledby="hero-title">
    <img class="hero__leaf" src="{{ $img('hero-leaf-left.jpg') }}" alt="" aria-hidden="true">
    <img class="hero__photo" src="{{ $img('hero-photo.jpg') }}" alt="Mesin cuci dan keranjang handuk bersih" fetchpriority="high">
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
    </div>
    <p class="hero__script" aria-hidden="true">{{ $c['hero']['script'] }} <span>&#9825;</span></p>
    <aside class="hero__panel">
        <img src="{{ $img('hero-panel.jpg') }}" alt="" aria-hidden="true">
        <p>{{ $c['hero']['quote'] }}</p>
        <svg viewBox="0 0 200 20" aria-hidden="true"><path d="M2 15c46-10 100-12 190-5m0 0-8-3m8 3-7 5" fill="none" stroke="#e3eef6" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </aside>
</section>
