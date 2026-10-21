@extends('website-bisnis.template.property.professional.real-estate-agency-coral-peach.layouts.app')

@section('title', 'Harga — '.$site['brand']['name'])
@section('meta_description', 'Daftar harga properti Coral Homes mulai Rp 1,65 miliar dengan skema Cash Keras, Cash Bertahap, dan KPR bank.')
@section('body_class', 'page-price')

@section('content')
  @php $pr = $site['price']; $min = collect($site['properties'])->min('price'); $img = $site['assets']['img']; @endphp
  @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.partials.page-header', ['image' => $site['page_images']['price'], 'crumb' => 'Harga', 'title' => 'Harga & Skema Pembayaran', 'subtitle' => 'Harga terjangkau, kompetitif, dan transparan'])

  <div class="container section">
    <div class="price-hero">
      <div class="price-card price-card--lg">
        <p class="price-card__label">{{ $pr['label'] }}</p>
        <p class="price-card__value">Rp {{ number_format($min, 0, '.', ',') }}</p>
        <span class="price-card__pill">{{ $pr['badge'] }}</span>
        <svg class="price-card__art" viewBox="0 0 120 90" fill="none" stroke="#fff" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M10 46 60 8l50 38"/><path d="M20 40v42h80V40"/><path d="M48 82V58h24v24"/><path d="M84 20V10h10v20"/><path d="M28 56h12v12H28zM80 56h12v12H80z" opacity=".6"/><path d="M2 82h116" opacity=".6"/></svg>
      </div>
      <div class="panel price-note">
        <h2 class="panel__title">Sudah termasuk</h2>
        <ul class="check-list">
          <li><svg class="icon" aria-hidden="true"><use href="#i-check"/></svg>Sertifikat SHM atas nama pembeli</li>
          <li><svg class="icon" aria-hidden="true"><use href="#i-check"/></svg>Instalasi listrik 2200 VA & air bersih</li>
          <li><svg class="icon" aria-hidden="true"><use href="#i-check"/></svg>Carport untuk 2 mobil</li>
          <li><svg class="icon" aria-hidden="true"><use href="#i-check"/></svg>Garansi bangunan & layanan after-sales</li>
        </ul>
      </div>
    </div>

    <section class="panel" aria-labelledby="pl-title">
      <header class="panel__head"><div><h2 class="panel__title" id="pl-title">Daftar Harga Unit</h2><p class="panel__sub">Harga dapat berubah sewaktu-waktu tanpa pemberitahuan</p></div></header>
      <div class="table-wrap">
        <table class="price-table">
          <thead><tr><th scope="col">Properti</th><th scope="col">Lokasi</th><th scope="col">KT / KM</th><th scope="col">LT / LB</th><th scope="col">Harga</th><th scope="col"><span class="sr-only">Aksi</span></th></tr></thead>
          <tbody>
            @foreach ($site['properties'] as $p)
              <tr>
                <th scope="row" data-label="Properti"><img src="{{ asset($img.'/'.$p['image']) }}" alt="" width="64" height="42" loading="lazy"><span>{{ $p['name'] }}</span></th>
                <td data-label="Lokasi">{{ $p['location'] }}</td>
                <td data-label="KT / KM">{{ $p['beds'] }} / {{ $p['baths'] }}</td>
                <td data-label="LT / LB">{{ $p['land'] }} / {{ $p['building'] }} m²</td>
                <td data-label="Harga" class="price-table__price">Rp {{ number_format($p['price'], 0, ',', '.') }}</td>
                <td><a class="btn btn--primary btn--sm" href="{{ route('coral-peach.specification') }}?unit={{ $p['slug'] }}">Detail</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </section>

    <div class="schemes">
      @foreach ($pr['schemes'] as $sc)
        <article class="panel scheme reveal">
          <span class="spec-item__icon"><svg class="icon" aria-hidden="true"><use href="#i-{{ $sc['icon'] }}"/></svg></span>
          <h3>{{ $sc['title'] }}</h3>
          <p>{{ $sc['text'] }}</p>
        </article>
      @endforeach
    </div>
  </div>

  @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.sections.cta-band', ['ctaTitle' => 'Ingin simulasi pembayaran?', 'ctaText' => 'Tim kami siap membantu menghitung skema terbaik sesuai kemampuan Anda.'])
@endsection
