<a class="hda-card hda-reveal" style="--i:{{ $loop->index }}" href="{{ $hu('period', $pd['slug']) }}">
    <span class="hda-card__img hda-card__img--contain" style="aspect-ratio:600/300"><img src="{{ $ha($pd['image']) }}" alt="" loading="lazy" width="600" height="260"></span>
    <span class="hda-card__body">
        <span class="hda-tag hda-tag--gold">{{ $pd['range'] }}</span>
        <strong class="hda-card__title" style="font-family:var(--serif)">{{ $pd['title'] }}</strong>
        <span class="hda-card__text">{{ $pd['desc'] }}</span>
        <span class="hda-card__foot"><span>Open period guide</span><svg class="hda-icon"><use href="#i-arrow"/></svg></span>
    </span>
</a>
