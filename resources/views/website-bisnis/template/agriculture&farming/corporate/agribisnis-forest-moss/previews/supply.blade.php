<article class="card card--supply" id="kapasitas">
    <header class="card__head">
        <h2 class="card__title"><a href="{{ route('agribisnis.kapasitas') }}">{{ $cfg['supply']['title'] }}</a></h2>
        <p class="card__sub">{{ $cfg['supply']['sub'] }}</p>
    </header>
    <div class="supply">
        <span class="supply__ic" aria-hidden="true">
            <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linejoin="round"><path d="m32 6 14 8v16l-14 8-14-8V14zM18 30l-14 8v16l14 8 14-8V38zM46 30l14 8v16l-14 8-14-8V38z" opacity=".9"/><path d="m18 14 14 8 14-8M32 22v16M4 38l14 8 14-8M32 38l14 8 14-8" opacity=".55"/></svg>
        </span>
        <p class="supply__val"><strong>{{ $cfg['supply']['value'] }}</strong><span>{{ $cfg['supply']['unit'] }}</span></p>
    </div>
    <a class="btn btn--dark btn--sm btn--pill" href="{{ route('agribisnis.kapasitas') }}"><span>{{ $cfg['supply']['btn'] }}</span><svg class="ic" aria-hidden="true"><use href="#i-arrow"/></svg></a>
</article>
