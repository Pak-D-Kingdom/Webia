{{-- Parameter: $item (name, price, image) --}}
<li class="lm-product">
    <figure class="lm-media">
        <img src="{{ $img($item['image']) }}" alt="{{ $item['name'] }}" loading="lazy" width="423" height="225">
    </figure>
    <div class="lm-product__body">
        <h3>{{ $item['name'] }}</h3>
        <p>{{ $rp($item['price']) }}</p>
    </div>
</li>
