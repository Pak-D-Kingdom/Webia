<article class="card card--coverage" id="distribusi">
    <header class="card__head">
        <h2 class="card__title"><a href="{{ route('agribisnis.distribusi') }}">{{ $cfg['coverage']['title'] }}</a></h2>
        <p class="card__sub">{{ $cfg['coverage']['sub'] }}</p>
    </header>
    <a class="coverage__map" href="{{ route('agribisnis.distribusi') }}" aria-label="Lihat jangkauan distribusi">
        <img src="{{ asset($cfg['img']['peta']) }}" alt="Peta jangkauan distribusi dunia" loading="lazy" width="600" height="250">
    </a>
    <p class="coverage__regions">
        @foreach($cfg['coverage']['regions'] as $r)<span>{{ $r }}</span>@endforeach
    </p>
</article>
