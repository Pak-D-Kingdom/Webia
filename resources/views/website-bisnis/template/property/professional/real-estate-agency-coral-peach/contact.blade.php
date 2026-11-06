@extends('website-bisnis.template.property.professional.real-estate-agency-coral-peach.layouts.app')

@section('title', 'Contact — '.$site['brand']['name'])
@section('meta_description', 'Hubungi Coral Homes: ajukan pertanyaan melalui form inquiry dan temukan lokasi kantor kami di Surabaya.')
@section('body_class', 'page-contact')

@section('content')
  @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.partials.page-header', ['image' => $site['page_images']['contact'], 'crumb' => 'Contact', 'title' => 'Hubungi Kami', 'subtitle' => 'Ajukan pertanyaan atau kunjungi kantor kami. Tim Coral Homes siap membantu Anda.'])

  <div class="container section contact-layout">
    @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.sections.inquiry')
    @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.sections.location', ['stack' => true])
  </div>
@endsection
