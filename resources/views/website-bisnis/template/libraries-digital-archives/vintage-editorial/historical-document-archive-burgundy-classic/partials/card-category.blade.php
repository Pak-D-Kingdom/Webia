<a class="hda-card hda-reveal" style="--i:{{ $loop->index }}" href="{{ $hu('category', $cat['slug']) }}">
    <span class="hda-card__img hda-card__img--contain"><img src="{{ $ha($cat['image']) }}" alt="" loading="lazy" width="320" height="240"></span>
    <span class="hda-card__body">
        <strong class="hda-card__title" style="font-family:var(--serif)">{{ $cat['title'] }}</strong>
        <span class="hda-card__text">{{ $cat['short'] }}</span>
        <span class="hda-card__foot"><span>{{ $cat['count'] }} records</span><svg class="hda-icon"><use href="#i-arrow"/></svg></span>
    </span>
</a>
