@php
    $pr   = $t['price'];
    $now  = $property['price'] ?? $pr['start'];
    $old  = $property['price_old'] ?? null;
    $disc = $property['discount'] ?? null;
@endphp
<section class="panel price" id="price" aria-labelledby="h-price">
    <svg class="deco price__deco" aria-hidden="true"><use href="#i-branch"/></svg>
    <h2 id="h-price" class="panel__title">Price</h2>
    <p class="panel__sub">{{ $pr['sub'] }}</p>

    <p class="price__now">{{ $now }}</p>
    @if ($old)
        <p class="price__was"><s>{{ $old }}</s>@if ($disc)<span class="pill">{{ $disc }}</span>@endif</p>
    @endif

    <ul class="checks">
        @foreach ($pr['benefits'] as $b)
            <li><svg class="i" aria-hidden="true"><use href="#i-check"/></svg>{{ $b }}</li>
        @endforeach
    </ul>
</section>
