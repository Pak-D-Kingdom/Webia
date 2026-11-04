<article class="card card--moq" id="moq">
    <header class="card__head">
        <h2 class="card__title"><a href="{{ route('agribisnis.moq') }}">{{ $cfg['moq']['title'] }}</a></h2>
        <p class="card__sub">{{ $cfg['moq']['sub'] }}</p>
    </header>
    <ul class="tiles tiles--4">
        @foreach($cfg['moq']['items'] as $m)
            <li class="tile">
                <svg class="ic ic--tile" aria-hidden="true"><use href="#i-{{ $m['icon'] }}"/></svg>
                <b>{{ $m['name'] }}</b>
                <small>{{ $m['value'] }}</small>
            </li>
        @endforeach
    </ul>
</article>
