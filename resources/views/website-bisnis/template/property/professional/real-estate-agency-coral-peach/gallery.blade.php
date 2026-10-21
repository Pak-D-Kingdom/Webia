@extends('website-bisnis.template.property.professional.real-estate-agency-coral-peach.layouts.app')

@section('title', 'Gallery — '.$site['brand']['name'])
@section('meta_description', 'Galeri foto eksterior, interior, dan fasilitas properti Coral Homes.')
@section('body_class', 'page-gallery')

@section('content')
  @php $g = $site['gallery']; $img = $site['assets']['img']; @endphp
  @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.partials.page-header', ['image' => $site['page_images']['gallery'], 'crumb' => 'Gallery', 'title' => 'Galeri Properti', 'subtitle' => 'Lihat keindahan setiap sudut properti kami'])

  <div class="container section">
    <div class="chips-row" role="group" aria-label="Filter kategori galeri">
      @foreach ($g['categories'] as $cat)
        <button class="chip {{ $loop->first ? 'is-active' : '' }}" type="button" data-gallery-filter="{{ $cat['value'] }}" aria-pressed="{{ $loop->first ? 'true' : 'false' }}">{{ $cat['label'] }}</button>
      @endforeach
    </div>

    <div class="g-grid" data-gallery-grid>
      @foreach ($g['items'] as $it)
        <a class="g-grid__item reveal" href="{{ asset($img.'/'.$it['file']) }}" data-cat="{{ $it['cat'] }}" data-lightbox="gallery-page" data-caption="{{ $it['alt'] }}">
          <img src="{{ asset($img.'/'.$it['file']) }}" alt="{{ $it['alt'] }}" loading="lazy" width="855" height="666">
          <span class="g-grid__cap">{{ $it['alt'] }}</span>
        </a>
      @endforeach
    </div>
  </div>

  @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.sections.cta-band')
@endsection
