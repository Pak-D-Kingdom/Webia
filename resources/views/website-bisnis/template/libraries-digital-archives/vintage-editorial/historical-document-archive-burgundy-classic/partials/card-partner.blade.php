<div class="hda-card hda-reveal" style="--i:{{ $loop->index }}">
    <span class="hda-crest"><img src="{{ $ha($pt['image']) }}" alt="" loading="lazy" width="480" height="360"></span>
    <span class="hda-card__body"><strong class="hda-card__title" style="font-family:var(--serif)">{{ $pt['name'] }}</strong><span class="hda-tag hda-tag--gold">{{ $pt['role'] }}</span><span class="hda-card__text">{{ $pt['desc'] }}</span></span>
</div>
