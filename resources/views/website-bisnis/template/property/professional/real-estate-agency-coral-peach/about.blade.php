@extends('website-bisnis.template.property.professional.real-estate-agency-coral-peach.layouts.app')

@section('title', 'About Us — '.$site['brand']['name'])
@section('meta_description', 'Kenali Coral Homes: agensi properti residensial modern dengan legalitas jelas, kualitas terbaik, dan layanan personal.')
@section('body_class', 'page-about')

@section('content')
  @php $a = $site['about']; $img = $site['assets']['img']; @endphp
  @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.partials.page-header', ['image' => $site['page_images']['about'], 'crumb' => 'About Us', 'title' => $a['title'], 'subtitle' => $a['subtitle']])

  <div class="container section">
    <div class="about-intro panel">
      <div class="about-intro__media"><img src="{{ asset($img.'/'.$a['image']) }}" alt="Fasad rumah modern Coral Homes" width="1680" height="699" loading="lazy"></div>
      <div class="about-intro__body">
        <p class="eyebrow">TENTANG KAMI</p>
        <h2 class="panel__title panel__title--lg">Hunian modern untuk kehidupan yang lebih baik</h2>
        @foreach ($a['text'] as $t)<p>{{ $t }}</p>@endforeach
      </div>
    </div>

    <ul class="stats">
      @foreach ($a['stats'] as $st)
        <li class="stat reveal"><strong>{{ $st['value'] }}</strong><span>{{ $st['label'] }}</span></li>
      @endforeach
    </ul>

    <div class="schemes">
      @foreach ($a['values'] as $v)
        <article class="panel scheme reveal">
          <span class="spec-item__icon"><svg class="icon" aria-hidden="true"><use href="#i-{{ $v['icon'] }}"/></svg></span>
          <h3>{{ $v['title'] }}</h3>
          <p>{{ $v['text'] }}</p>
        </article>
      @endforeach
    </div>
  </div>

  @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.sections.cta-band')
@endsection
