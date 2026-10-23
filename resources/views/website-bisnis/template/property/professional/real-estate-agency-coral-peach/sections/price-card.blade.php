{{-- Kartu harga mulai (ikon rumah garis) → tautan ke halaman Price. --}}
@php $pr = $site['price']; $min = collect($site['properties'])->min('price'); @endphp
<aside class="price-card" aria-label="Harga mulai">
  <p class="price-card__label">{{ $pr['label'] }}</p>
  <p class="price-card__value">Rp {{ number_format($min, 0, '.', ',') }}</p>
  <span class="price-card__pill">{{ $pr['badge'] }}</span>
  <svg class="price-card__art" viewBox="0 0 120 90" fill="none" stroke="#fff" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    <path d="M10 46 60 8l50 38"/><path d="M20 40v42h80V40"/><path d="M48 82V58h24v24"/><path d="M84 20V10h10v20"/><path d="M28 56h12v12H28zM80 56h12v12H80z" opacity=".6"/><path d="M2 82h116" opacity=".6"/>
  </svg>
  <a class="stretched" href="{{ route('coral-peach.price') }}"><span class="sr-only">Lihat rincian harga</span></a>
</aside>
