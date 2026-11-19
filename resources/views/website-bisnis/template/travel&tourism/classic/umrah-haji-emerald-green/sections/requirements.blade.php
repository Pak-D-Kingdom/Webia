<section class="uh-card uh-rq" aria-labelledby="uh-rq-title">
    <header class="uh-card__head">
        <h2 id="uh-rq-title" class="uh-card__title">{{ $uh['requirements']['title'] }}</h2>
        <a class="uh-card__link" href="{{ $url('requirements') }}"><span>Lihat Detail</span><svg class="uh-i" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
        <p class="uh-card__sub">{{ $uh['requirements']['text'] }}</p>
    </header>
    <ul class="uh-rq__list">
        @foreach ($uh['requirements']['items'] as $r)
            <li>
                <span class="uh-checkdot" aria-hidden="true"><svg class="uh-i"><use href="#i-check"/></svg></span>
                <span>{{ $r['label'] }}</span>
            </li>
        @endforeach
    </ul>
</section>
