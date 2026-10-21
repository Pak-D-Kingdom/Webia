@extends('website-bisnis.template.property.professional.real-estate-agency-coral-peach.layouts.app')

@section('title', $site['meta']['title'])
@section('body_class', 'page-home')

@section('content')
  @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.sections.hero')
  @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.sections.search')

  <div class="container home-grid">
    <div class="hg hg--props">   @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.sections.property-preview') </div>
    <div class="hg hg--gallery"> @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.sections.gallery-preview') </div>
    <div class="hg hg--side">
      @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.sections.price-card')
      @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.sections.inquiry')
      @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.sections.ai-faq')
    </div>
    <div class="hg hg--lower">
      @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.sections.location')
      @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.sections.booking-preview')
    </div>
  </div>

  <div class="container home-extra">
    @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.sections.about-preview')
    @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.sections.blog-preview')
  </div>
@endsection
