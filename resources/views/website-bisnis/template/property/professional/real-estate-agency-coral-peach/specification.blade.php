@extends('website-bisnis.template.property.professional.real-estate-agency-coral-peach.layouts.app')

@section('title', 'Spesifikasi Properti — '.$site['brand']['name'])
@section('meta_description', 'Spesifikasi lengkap properti Coral Homes: luas tanah, luas bangunan, kamar, sertifikat, listrik, dan fasilitas.')
@section('body_class', 'page-specification')

@section('content')
  @php
    $unit = collect($site['properties'])->firstWhere('slug', request('unit'));
    $specs = $site['specs'];
    if ($unit) {
        $over = ['Luas Tanah' => $unit['land'].' m²', 'Luas Bangunan' => $unit['building'].' m²', 'Kamar Tidur' => (string) $unit['beds'], 'Kamar Mandi' => (string) $unit['baths']];
        foreach ($specs as &$sp) { if (isset($over[$sp['label']])) { $sp['value'] = $over[$sp['label']]; } }
        unset($sp);
    }
    $img = $site['assets']['img'];
  @endphp

  @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.partials.page-header', ['image' => $site['page_images']['specification'], 'crumb' => 'Spesifikasi', 'title' => $unit ? $unit['name'] : 'Spesifikasi Properti', 'subtitle' => $unit ? $unit['location'].' · Rp '.number_format($unit['price'], 0, ',', '.') : 'Informasi lengkap mengenai properti ini'])

  <div class="container section">
    @if ($unit)
      <div class="unit-banner panel">
        <img src="{{ asset($img.'/'.$unit['image']) }}" alt="{{ $unit['name'] }}" width="465" height="294" loading="lazy" decoding="async">
        <div>
          <span class="tag">{{ $unit['status'] }}</span>
          <h2>{{ $unit['name'] }}</h2>
          <p>{{ $unit['location'] }}</p>
          <p class="unit-banner__price">Rp {{ number_format($unit['price'], 0, ',', '.') }}</p>
          <a class="btn btn--ghost btn--sm" href="{{ route('coral-peach.price') }}">Lihat detail harga</a>
        </div>
      </div>
    @endif

    <div class="panel">
      <header class="panel__head"><div><h2 class="panel__title">Spesifikasi Utama</h2><p class="panel__sub">Ringkasan ukuran, legalitas, dan utilitas</p></div></header>
      <ul class="spec-grid spec-grid--page">
        @foreach ($specs as $sp)
          <li class="spec-item">
            <span class="spec-item__icon"><svg class="icon" aria-hidden="true"><use href="#i-{{ $sp['icon'] }}"/></svg></span>
            <span class="spec-item__text"><small>{{ $sp['label'] }}</small><strong>{{ $sp['value'] }}</strong></span>
          </li>
        @endforeach
      </ul>
    </div>

    <div class="spec-groups">
      @foreach ($site['spec_groups'] as $g)
        <section class="panel spec-group reveal">
          <h2 class="spec-group__title"><span class="spec-item__icon"><svg class="icon" aria-hidden="true"><use href="#i-{{ $g['icon'] }}"/></svg></span>{{ $g['title'] }}</h2>
          <ul class="check-list">
            @foreach ($g['items'] as $it)<li><svg class="icon" aria-hidden="true"><use href="#i-check"/></svg>{{ $it }}</li>@endforeach
          </ul>
        </section>
      @endforeach
    </div>
  </div>

  @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.sections.cta-band', ['ctaTitle' => 'Tertarik dengan spesifikasi ini?', 'ctaText' => 'Jadwalkan kunjungan untuk melihat langsung kualitas bangunan dan lingkungannya.'])
@endsection
