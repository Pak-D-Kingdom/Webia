<div class="hda-cardwrap hda-reveal" style="--i:{{ $loop->index }}">
    <a class="hda-card" href="{{ $hu('exhibition', $ex['slug']) }}">
        <span class="hda-card__img"><img src="{{ $ha($ex['image']) }}" alt="" loading="lazy" width="800" height="600"></span>
        <span class="hda-card__body">
            <span class="hda-tag {{ $ex['status'] == 'On now' ? 'hda-tag--green' : 'hda-tag--gold' }}">{{ $ex['status'] }}</span>
            <strong class="hda-card__title" style="font-family:var(--serif)">{{ $ex['title'] }}</strong>
            <span class="hda-meta"><span><svg class="hda-icon"><use href="#i-calendar"/></svg>{{ $ex['dates'] }}</span></span>
            <span class="hda-card__text">{{ $ex['desc'] }}</span>
        </span>
    </a>
</div>
