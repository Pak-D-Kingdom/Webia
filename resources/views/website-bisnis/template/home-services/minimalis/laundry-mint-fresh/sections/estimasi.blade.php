<article class="lw-card lw-card--time">
    <header class="lw-card__head">
        <h2 class="lw-card__title"><a href="{{ $r('estimasi') }}">{{ $c['turnaround']['title'] }}</a></h2>
        <p>{{ $c['turnaround']['sub'] }}</p>
    </header>
    <img class="lw-time-art" src="{{ $img($c['img']['clock']) }}" alt="" loading="lazy" width="366" height="174">
    <ul class="lw-time-list">
        @foreach ($c['turnaround']['items'] as $t)
            <li><svg class="lw-i"><use href="#i-{{ $t['icon'] }}"/></svg><span>{{ $t['name'] }}</span><b>{{ $t['time'] }}</b></li>
        @endforeach
    </ul>
</article>
