<div class="hda-cardwrap hda-reveal" style="--i:{{ $loop->index }}" data-filter-item data-text="{{ $d['title'] }} {{ $d['author'] }} {{ $d['type'] }} {{ $d['year'] }} {{ $d['desc'] }}" data-title="{{ $d['title'] }}" data-year="{{ $d['year'] }}" data-period="{{ $d['period'] }}" data-type="{{ $d['type'] }}" data-category="{{ $hf('categories', $d['category'])['title'] }}" data-location="{{ $hf('locations', $d['location'])['title'] }}">
    <button type="button" class="hda-save" data-save="doc:{{ $d['slug'] }}" aria-pressed="false" aria-label="Save {{ $d['title'] }}"><svg class="hda-icon"><use href="#i-bookmark"/></svg></button>
    <a class="hda-card" href="{{ $hu('document', $d['slug']) }}">
        <span class="hda-card__img hda-card__img--doc"><img src="{{ $ha($d['image']) }}" alt="" loading="lazy"></span>
        <span class="hda-card__body">
            <span class="hda-tag">{{ $d['type'] }}</span>
            <strong class="hda-card__title" style="font-family:var(--serif)">{{ $d['title'] }}</strong>
            <span class="hda-meta"><span>{{ $d['year'] }}</span><span>{{ $d['author'] }}</span></span>
            <span class="hda-card__text">{{ $d['desc'] }}</span>
            <span class="hda-card__foot"><span>View Document</span><svg class="hda-icon"><use href="#i-arrow"/></svg></span>
        </span>
    </a>
</div>
