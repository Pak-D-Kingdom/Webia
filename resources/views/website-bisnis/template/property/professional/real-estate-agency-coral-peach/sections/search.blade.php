{{-- Form pencarian cepat → mengarahkan ke halaman Property dengan query string (filter dijalankan di sisi klien). --}}
@php $s = $site['search']; @endphp
<div class="container search-wrap">
  <form class="search-bar" action="{{ route('coral-peach.property') }}" method="get" data-search-form role="search" aria-label="Cari properti">
    <div class="search-field">
      <span class="search-field__icon"><svg class="icon" aria-hidden="true"><use href="#i-pin"/></svg></span>
      <div class="search-field__body">
        <label for="s-location">Lokasi</label>
        <div class="select"><select id="s-location" name="location"><option value="">Pilih lokasi</option>@foreach ($s['locations'] as $o)<option value="{{ $o['value'] }}">{{ $o['label'] }}</option>@endforeach</select><svg class="icon" aria-hidden="true"><use href="#i-chevron-down"/></svg></div>
      </div>
    </div>
    <div class="search-field">
      <span class="search-field__icon"><svg class="icon" aria-hidden="true"><use href="#i-home"/></svg></span>
      <div class="search-field__body">
        <label for="s-type">Tipe Properti</label>
        <div class="select"><select id="s-type" name="type"><option value="">Semua tipe</option>@foreach ($s['types'] as $o)<option value="{{ $o['value'] }}">{{ $o['label'] }}</option>@endforeach</select><svg class="icon" aria-hidden="true"><use href="#i-chevron-down"/></svg></div>
      </div>
    </div>
    <div class="search-field">
      <span class="search-field__icon"><svg class="icon" aria-hidden="true"><use href="#i-tag"/></svg></span>
      <div class="search-field__body">
        <label for="s-price">Harga</label>
        <div class="select"><select id="s-price" name="price"><option value="">Semua harga</option>@foreach ($s['prices'] as $o)<option value="{{ $o['value'] }}">{{ $o['label'] }}</option>@endforeach</select><svg class="icon" aria-hidden="true"><use href="#i-chevron-down"/></svg></div>
      </div>
    </div>
    <div class="search-field">
      <span class="search-field__icon"><svg class="icon" aria-hidden="true"><use href="#i-area"/></svg></span>
      <div class="search-field__body">
        <label for="s-area">Luas Bangunan</label>
        <div class="select"><select id="s-area" name="area"><option value="">Semua luas</option>@foreach ($s['areas'] as $o)<option value="{{ $o['value'] }}">{{ $o['label'] }}</option>@endforeach</select><svg class="icon" aria-hidden="true"><use href="#i-chevron-down"/></svg></div>
      </div>
    </div>
    <button class="btn btn--primary btn--lg search-bar__btn" type="submit"><svg class="icon" aria-hidden="true"><use href="#i-search"/></svg> Cari Properti</button>
  </form>
</div>
