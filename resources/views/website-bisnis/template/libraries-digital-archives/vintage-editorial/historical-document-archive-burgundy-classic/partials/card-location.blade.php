<div class="hda-cardwrap hda-reveal" style="--i:{{ $loop->index }}" data-loc-card="{{ $lc['slug'] }}" data-filter-item data-text="{{ $lc['title'] }} {{ $lc['desc'] }} {{ $lc['region'] }}">
    <a class="hda-card" href="{{ $hu('location', $lc['slug']) }}">
        <span class="hda-card__img"><img src="{{ $ha($lc['image']) }}" alt="" loading="lazy" width="800" height="600"></span>
        <span class="hda-card__body">
            <span class="hda-tag hda-tag--green">{{ $lc['region'] }}</span>
            <strong class="hda-card__title" style="font-family:var(--serif)">{{ $lc['title'] }}</strong>
            <span class="hda-card__text">{{ $lc['desc'] }}</span>
            <span class="hda-card__foot"><span>{{ $lc['docs'] }} documents</span><svg class="hda-icon"><use href="#i-arrow"/></svg></span>
        </span>
    </a>
</div>
