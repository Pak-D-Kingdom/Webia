<article class="card card--harvest" id="panen">
    <header class="card__head">
        <h2 class="card__title">{{ $cfg['harvest']['title'] }}</h2>
        <p class="card__sub">{{ $cfg['harvest']['sub'] }}</p>
    </header>
    <div class="harvest">
        <a class="harvest__photo" href="{{ route('agribisnis.panen') }}" aria-label="Lihat informasi panen">
            <img src="{{ asset($cfg['img']['ladang']) }}" alt="Hamparan padi siap panen" loading="lazy" width="585" height="432">
        </a>
        <ul class="harvest__list">
            @foreach($cfg['harvest']['items'] as $h)
                <li>
                    <span class="harvest__ic"><svg class="ic" aria-hidden="true"><use href="#i-{{ $h['icon'] }}"/></svg></span>
                    <span class="harvest__tx"><b>{{ $h['name'] }}</b><small>{{ $h['season'] }}</small></span>
                    <span class="badge">{{ $h['status'] }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</article>
