@extends('website-bisnis.template.wedding-event.creative.event-organizer-purple-dream.layouts.app')

@php($eo = config('template.wedding-event.creative.event-organizer-purple-dream.event-organizer') ?: require config_path('template/wedding-event/creative/event-organizer-purple-dream/event-organizer.php'))

@section('title', 'Layanan')
@section('description', 'Layanan event organizer Eventora: wedding, corporate, festival, konser, pameran, dan seminar.')

@section('content')
    @include($eo['view'].'partials.page-hero', ['title' => 'Event Services', 'crumb' => 'Layanan', 'text' => 'Enam layanan acara dengan konsep kreatif, produksi profesional, dan pendampingan penuh.'])
    @include($eo['view'].'sections.services-full')
    @include($eo['view'].'partials.cta-band', ['heading' => 'Siap merancang acara impian Anda?', 'sub' => 'Ceritakan kebutuhan Anda dan dapatkan penawaran terbaik dari tim Eventora.', 'path' => '/penawaran', 'label' => 'Minta Penawaran'])
@endsection
