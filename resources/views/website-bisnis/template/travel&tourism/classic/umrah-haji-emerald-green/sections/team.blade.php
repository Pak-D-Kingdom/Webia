<section class="uh-card uh-tm" aria-labelledby="uh-tm-title">
    <header class="uh-card__head">
        <h2 id="uh-tm-title" class="uh-card__title">{{ $uh['guides']['title'] }}</h2>
        <a class="uh-card__link" href="{{ $url('team') }}"><span>Lihat Semua</span><svg class="uh-i" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
        <p class="uh-card__sub">{{ $uh['guides']['text'] }}</p>
    </header>
    <ul class="uh-tm__grid">
        @foreach ($uh['guides']['items'] as $g)
            <li>
                <a class="uh-tm__item" href="{{ $url('team') }}">
                    <span class="uh-tm__photo"><img src="{{ $img($g['image']) }}" alt="Foto {{ $g['name'] }}" width="80" height="80" loading="lazy"></span>
                    <span class="uh-tm__name">{{ $g['name'] }}</span>
                    <span class="uh-tm__role">{{ $g['role'] }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</section>
