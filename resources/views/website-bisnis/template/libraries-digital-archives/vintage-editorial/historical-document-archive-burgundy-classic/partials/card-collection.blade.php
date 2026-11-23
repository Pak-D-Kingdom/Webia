<div class="hda-cardwrap hda-reveal" style="--i:{{ $loop->index }}" data-filter-item data-text="{{ $col['title'] }} {{ $col['desc'] }} {{ $col['period'] }}" data-title="{{ $col['title'] }}" data-year="{{ $col['docs'] }}" data-location="{{ $hf('locations', $col['location'])['title'] }}">
    <a class="hda-card" href="{{ $hu('collection', $col['slug']) }}">
        <span class="hda-card__img"><img src="{{ $ha($col['image']) }}" alt="" loading="lazy" width="800" height="600"></span>
        <span class="hda-card__body">
            <span class="hda-tag hda-tag--gold">{{ $col['period'] }}</span>
            <strong class="hda-card__title" style="font-family:var(--serif)">{{ $col['title'] }}</strong>
            <span class="hda-card__text">{{ $col['desc'] }}</span>
            <span class="hda-card__foot"><span>{{ $col['docs'] }} documents · {{ $col['subs'] }} sub-collections</span><svg class="hda-icon"><use href="#i-arrow"/></svg></span>
        </span>
    </a>
</div>
