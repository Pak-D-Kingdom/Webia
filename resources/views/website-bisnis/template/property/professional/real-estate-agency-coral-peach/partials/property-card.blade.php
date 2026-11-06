{{-- Kartu properti. Variabel: $p (data properti). Atribut data-* dipakai filter/urut JS. --}}
@php $img = $site['assets']['img']; @endphp
<article class="p-card reveal"
         data-property
         data-name="{{ strtolower($p['name']) }}"
         data-city="{{ $p['city'] }}"
         data-type="{{ $p['type'] }}"
         data-price="{{ $p['price'] }}"
         data-building="{{ $p['building'] }}">
  <div class="p-card__media">
    <img src="{{ asset($img.'/'.$p['image']) }}" alt="{{ $p['name'] }}, {{ $p['location'] }}" loading="lazy" width="465" height="294">
    <span class="p-card__badge">{{ $p['status'] }}</span>
    <button class="p-card__fav" type="button" data-fav="{{ $p['slug'] }}" aria-pressed="false" aria-label="Simpan {{ $p['name'] }} ke favorit"><svg class="icon" aria-hidden="true"><use href="#i-heart"/></svg></button>
  </div>
  <div class="p-card__body">
    <h3 class="p-card__title">{{ $p['name'] }}</h3>
    <p class="p-card__loc"><svg class="icon" aria-hidden="true"><use href="#i-pin"/></svg>{{ $p['location'] }}</p>
    <ul class="p-card__meta" aria-label="Spesifikasi singkat">
      <li title="Kamar tidur"><svg class="icon" aria-hidden="true"><use href="#i-bed"/></svg>{{ $p['beds'] }}</li>
      <li title="Kamar mandi"><svg class="icon" aria-hidden="true"><use href="#i-bath"/></svg>{{ $p['baths'] }}</li>
      <li title="Luas tanah"><svg class="icon" aria-hidden="true"><use href="#i-area"/></svg>{{ $p['land'] }} m²</li>
    </ul>
    <p class="p-card__price">Rp {{ number_format($p['price'], 0, ',', '.') }}</p>
    <a class="btn btn--primary btn--sm" href="{{ route('coral-peach.specification') }}?unit={{ $p['slug'] }}">Detail <svg class="icon" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
  </div>
</article>
