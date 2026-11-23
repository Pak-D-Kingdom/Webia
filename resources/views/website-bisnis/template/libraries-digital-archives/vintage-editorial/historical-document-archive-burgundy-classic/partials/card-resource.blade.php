<div class="hda-cardwrap hda-reveal" style="--i:{{ $loop->index }}" data-filter-item data-text="{{ $rs['title'] }} {{ $rs['desc'] }} {{ $rs['kind'] }}" data-level="{{ $rs['level'] }}">
    <a class="hda-card" href="{{ $hu('resource', $rs['slug']) }}">
        <span class="hda-card__img"><img src="{{ $ha($rs['image']) }}" alt="" loading="lazy" width="800" height="600"></span>
        <span class="hda-card__body">
            <span class="hda-meta"><span class="hda-tag">{{ $rs['kind'] }}</span><span class="hda-tag hda-tag--gold">{{ $rs['level'] }}</span></span>
            <strong class="hda-card__title" style="font-family:var(--serif)">{{ $rs['title'] }}</strong>
            <span class="hda-card__text">{{ $rs['desc'] }}</span>
            <span class="hda-card__foot"><span>Open resource</span><svg class="hda-icon"><use href="#i-arrow"/></svg></span>
        </span>
    </a>
</div>
