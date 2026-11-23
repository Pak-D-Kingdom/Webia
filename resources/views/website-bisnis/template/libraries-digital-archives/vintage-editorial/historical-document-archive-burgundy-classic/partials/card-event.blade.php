<div class="hda-reveal" style="--i:{{ $loop->index }}" data-filter-item data-text="{{ $ev['title'] }} {{ $ev['desc'] }} {{ $ev['date'] }}">
    <a class="hda-event" href="{{ $hu('event', $ev['slug']) }}">
        <span class="hda-event__img"><img src="{{ $ha($ev['image']) }}" alt="" loading="lazy" width="800" height="600"></span>
        <span><span class="hda-event__date">{{ $ev['date'] }}</span><h3>{{ $ev['title'] }}</h3><span class="hda-card__text" style="display:block;margin-top:2px">{{ $ev['desc'] }}</span></span>
    </a>
</div>
