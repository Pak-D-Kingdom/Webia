<article class="card card--specs" id="spesifikasi">
    <header class="card__head">
        <h2 class="card__title"><a href="{{ route('agribisnis.spesifikasi') }}">{{ $cfg['specs']['title'] }}</a></h2>
        <p class="card__sub">{{ $cfg['specs']['sub'] }}</p>
    </header>
    <ul class="tiles tiles--4">
        @foreach($cfg['specs']['items'] as $s)
            <li class="tile">
                <svg class="ic ic--tile" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg>
                <b>{{ $s['label'] }}</b>
                <small>{{ $s['value'] }}</small>
            </li>
        @endforeach
    </ul>
</article>
