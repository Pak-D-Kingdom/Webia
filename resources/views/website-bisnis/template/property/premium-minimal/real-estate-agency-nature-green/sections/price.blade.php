@php $pr = $t['price']; $isPreview = !empty($preview); @endphp
<section class="panel price" id="price" aria-labelledby="h-price">
    <svg class="deco price__deco" aria-hidden="true"><use href="#i-branch"/></svg>

    @if ($isPreview)
        <h2 id="h-price" class="panel__title">Price</h2>
        <p class="panel__sub">{{ $pr['sub'] }}</p>
    @else
        <h2 id="h-price" class="sr-only">Harga properti</h2>
    @endif

    <p class="price__now">{{ $pr['now'] }}</p>
    <p class="price__was"><s>{{ $pr['old'] }}</s><span class="pill">{{ $pr['discount'] }}</span></p>

    <ul class="checks">
        @foreach ($pr['benefits'] as $b)
            <li><svg class="i" aria-hidden="true"><use href="#i-check"/></svg>{{ $b }}</li>
        @endforeach
    </ul>

    @if ($isPreview)
        <a class="link-all link-all--foot" href="{{ $r('price') }}">Lihat Detail Harga <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
    @else
        <h3 class="price__list-title">Daftar harga properti</h3>
        <ul class="price-list">
            @foreach ($t['properties'] as $p)
                <li><span><b>{{ $p['name'] }}</b><small>{{ $p['city'] }}</small></span><strong>{{ $p['price'] }}</strong></li>
            @endforeach
        </ul>
    @endif
</section>
