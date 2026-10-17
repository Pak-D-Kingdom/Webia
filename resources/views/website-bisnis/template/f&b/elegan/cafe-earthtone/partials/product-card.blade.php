{{-- Parameter: $item (name, price, category, image, desc, featured). Opsional: $detail (true = varian halaman Menu), $catLabel --}}
<li class="lm-product {{ ! empty($detail) ? 'lm-product--detail' : '' }}" data-category="{{ $item['category'] ?? '' }}">
    <figure class="lm-media">
        <img src="{{ $img($item['image']) }}" alt="{{ $item['name'] }}" loading="lazy" width="423" height="225">
        @if (! empty($detail))
            @if (! empty($catLabel)) <span class="lm-product__tag">{{ $catLabel }}</span> @endif
            @if (! empty($item['featured']))
                <span class="lm-product__fav"><svg class="i" aria-hidden="true"><use href="#i-star"/></svg>Favorit</span>
            @endif
        @endif
    </figure>
    <div class="lm-product__body">
        <h3>{{ $item['name'] }}</h3>
        @if (! empty($detail) && ! empty($item['desc']))
            <p class="lm-product__desc">{{ $item['desc'] }}</p>
        @endif
        <p class="lm-product__price">{{ $rp($item['price']) }}</p>
    </div>
</li>
