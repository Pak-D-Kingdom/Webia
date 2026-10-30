<article class="lw-card lw-card--time">
    <header class="lw-card__head">
        <h2 class="lw-card__title">{{ $c['turnaround']['title'] }}</h2>
        <p>{{ $c['turnaround']['sub'] }}</p>
    </header>
    <img class="lw-time-art" src="{{ $img($c['img']['clock']) }}" alt="" loading="lazy" width="300" height="160">
    <ul class="lw-time-list">
        @foreach ($c['turnaround']['items'] as $t)
            <li><svg class="lw-i"><use href="#i-{{ $t['icon'] }}"/></svg><span>{{ $t['name'] }}</span><b>{{ $t['time'] }}</b></li>
        @endforeach
    </ul>
    <a class="lw-link" href="{{ $r('estimasi') }}">Lihat Detail <svg class="lw-i"><use href="#i-arrow"/></svg></a>
</article>
