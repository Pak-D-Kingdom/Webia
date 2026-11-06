@extends('website-bisnis.template.property.professional.real-estate-agency-coral-peach.layouts.app')

@section('title', 'Property — '.$site['brand']['name'])
@section('meta_description', 'Daftar properti pilihan Coral Homes di Surabaya, Sidoarjo, Malang dan Batu. Filter berdasarkan lokasi, tipe, harga, dan luas bangunan.')
@section('body_class', 'page-property')

@section('content')
  @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.partials.page-header', ['image' => $site['page_images']['property'], 'crumb' => 'Property', 'title' => 'Property Listing', 'subtitle' => 'Temukan berbagai pilihan properti terbaik untuk Anda'])

  @php $s = $site['search']; @endphp
  <div class="container section">
    <form class="filter panel" data-filter-form action="{{ route('coral-peach.property') }}" method="get" role="search" aria-label="Filter properti">
      <div class="filter__field filter__field--grow">
        <label for="f-q">Cari</label>
        <input id="f-q" type="search" name="q" placeholder="Nama properti atau lokasi" autocomplete="off">
      </div>
      <div class="filter__field"><label for="f-location">Lokasi</label>
        <div class="select"><select id="f-location" name="location"><option value="">Semua lokasi</option>@foreach ($s['locations'] as $o)<option value="{{ $o['value'] }}">{{ $o['label'] }}</option>@endforeach</select><svg class="icon" aria-hidden="true"><use href="#i-chevron-down"/></svg></div></div>
      <div class="filter__field"><label for="f-type">Tipe</label>
        <div class="select"><select id="f-type" name="type"><option value="">Semua tipe</option>@foreach ($s['types'] as $o)<option value="{{ $o['value'] }}">{{ $o['label'] }}</option>@endforeach</select><svg class="icon" aria-hidden="true"><use href="#i-chevron-down"/></svg></div></div>
      <div class="filter__field"><label for="f-price">Harga</label>
        <div class="select"><select id="f-price" name="price"><option value="">Semua harga</option>@foreach ($s['prices'] as $o)<option value="{{ $o['value'] }}">{{ $o['label'] }}</option>@endforeach</select><svg class="icon" aria-hidden="true"><use href="#i-chevron-down"/></svg></div></div>
      <div class="filter__field"><label for="f-area">Luas Bangunan</label>
        <div class="select"><select id="f-area" name="area"><option value="">Semua luas</option>@foreach ($s['areas'] as $o)<option value="{{ $o['value'] }}">{{ $o['label'] }}</option>@endforeach</select><svg class="icon" aria-hidden="true"><use href="#i-chevron-down"/></svg></div></div>
      <div class="filter__field"><label for="f-sort">Urutkan</label>
        <div class="select"><select id="f-sort" name="sort"><option value="">Terbaru</option><option value="price-asc">Harga terendah</option><option value="price-desc">Harga tertinggi</option><option value="name">Nama A–Z</option></select><svg class="icon" aria-hidden="true"><use href="#i-chevron-down"/></svg></div></div>
      <div class="filter__actions">
        <button class="btn btn--primary" type="submit"><svg class="icon" aria-hidden="true"><use href="#i-search"/></svg> Cari</button>
        <button class="btn btn--ghost" type="button" data-filter-reset>Reset</button>
      </div>
    </form>

    <p class="result-count" data-result-count role="status" aria-live="polite">Menampilkan {{ count($site['properties']) }} properti</p>

    <div class="p-grid p-grid--page" data-property-grid>
      @foreach ($site['properties'] as $p)
        @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.partials.property-card', ['p' => $p])
      @endforeach
    </div>

    <div class="empty" data-empty hidden>
      <svg class="icon" aria-hidden="true"><use href="#i-search"/></svg>
      <h2>Properti tidak ditemukan</h2>
      <p>Coba ubah atau reset filter pencarian Anda.</p>
      <button class="btn btn--primary btn--sm" type="button" data-filter-reset>Reset Filter</button>
    </div>
  </div>

  @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.sections.cta-band')
@endsection
