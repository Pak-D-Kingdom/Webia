@extends('website-bisnis.template.wedding-event.creative.event-organizer-purple-dream.layouts.app')

@php($eo = config('template.wedding-event.creative.event-organizer-purple-dream.event-organizer') ?: require config_path('template/wedding-event/creative/event-organizer-purple-dream/event-organizer.php'))

@section('title', 'Klien Kami')
@section('description', 'Klien Eventora dari berbagai industri: teknologi, perbankan, otomotif, dan consumer goods.')

@section('content')
    @include($eo['view'].'partials.page-hero', ['title' => 'Trusted by Our Clients', 'crumb' => 'Klien Kami', 'text' => 'Brand dan perusahaan yang telah mempercayakan acaranya kepada Eventora.'])
    @include($eo['view'].'sections.clients-full')
    @include($eo['view'].'partials.cta-band', ['heading' => 'Siap merancang acara impian Anda?', 'sub' => 'Ceritakan kebutuhan Anda dan dapatkan penawaran terbaik dari tim Eventora.', 'path' => '/penawaran', 'label' => 'Minta Penawaran'])
@endsection
