<div class="hda-cardwrap hda-reveal" style="--i:{{ $loop->index }}" data-filter-item data-text="{{ $st['title'] }} {{ $st['excerpt'] }} {{ $st['cat'] }}" data-title="{{ $st['title'] }}">
    <a class="hda-card" href="{{ $hu('story', $st['slug']) }}">
        <span class="hda-card__img"><img src="{{ $ha($st['image']) }}" alt="" loading="lazy" width="800" height="600"></span>
        <span class="hda-card__body">
            <span class="hda-tag">{{ $st['cat'] }}</span>
            <strong class="hda-card__title" style="font-family:var(--serif)">{{ $st['title'] }}</strong>
            <span class="hda-card__text">{{ $st['excerpt'] }}</span>
            <span class="hda-card__foot"><span>{{ $st['author'] }} · {{ $st['read'] }}</span><svg class="hda-icon"><use href="#i-arrow"/></svg></span>
        </span>
    </a>
</div>
