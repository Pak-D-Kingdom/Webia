<article class="item" data-cat="{{ $m['cat'] }}" data-name="{{ strtolower($m['name']) }}">
    <div class="thumb">
        @if ($m['img'])
            <img src="{{ asset("images/$path/" . $m['img']) }}" alt="{{ $m['name'] }}" loading="lazy">
        @else
            <span class="thumb__emoji" aria-hidden="true">{{ $m['icon'] }}</span>
        @endif
    </div>
    <div class="item__body">
        <div class="item__row">
            <h3>{{ $m['name'] }}</h3>
            <button class="fav" aria-pressed="false" aria-label="Favorit: {{ $m['name'] }}"><svg class="i" aria-hidden="true"><use href="#i-heart"/></svg></button>
        </div>
        @if (!empty($full)) <p class="desc">{{ $m['desc'] }}</p> @endif
        <div class="item__row item__foot">
            <p class="price">Rp {{ number_format($m['price'], 0, ',', '.') }}</p>
        </div>
    </div>
</article>
