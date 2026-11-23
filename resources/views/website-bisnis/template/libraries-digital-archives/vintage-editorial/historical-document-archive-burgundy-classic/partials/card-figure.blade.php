<div class="hda-cardwrap hda-reveal" style="--i:{{ $loop->index }}" data-filter-item data-text="{{ $fg['title'] }} {{ $fg['role'] }} {{ $fg['place'] }}">
    <a class="hda-card" href="{{ $hu('figure', $fg['slug']) }}">
        <span class="hda-portrait"><img src="{{ $ha($fg['image']) }}" alt="" loading="lazy" width="600" height="780"></span>
        <span class="hda-card__body">
            <strong class="hda-card__title" style="font-family:var(--serif)">{{ $fg['title'] }}</strong>
            <span class="hda-tag hda-tag--gold">{{ $fg['life'] }}</span>
            <span class="hda-card__text">{{ $fg['role'] }} · {{ $fg['place'] }}</span>
        </span>
    </a>
</div>
