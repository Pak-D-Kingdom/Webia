@extends('website-bisnis.template.wedding-event.creative.event-organizer-purple-dream.layouts.app')

@php($eo = config('template.wedding-event.creative.event-organizer-purple-dream.event-organizer') ?: require config_path('template/wedding-event/creative/event-organizer-purple-dream/event-organizer.php'))

@section('title', 'Portofolio')
@section('description', 'Portofolio acara Eventora: wedding, corporate, concert, exhibition, festival, dan seminar.')

@section('content')
    @include($eo['view'].'partials.page-hero', ['title' => 'Event Portfolio', 'crumb' => 'Portofolio', 'text' => 'Karya terbaik kami di berbagai acara. Gunakan filter untuk melihat kategori yang Anda minati.'])
    @include($eo['view'].'sections.portfolio-full')
    @include($eo['view'].'partials.cta-band', ['heading' => 'Siap merancang acara impian Anda?', 'sub' => 'Ceritakan kebutuhan Anda dan dapatkan penawaran terbaik dari tim Eventora.', 'path' => '/penawaran', 'label' => 'Minta Penawaran'])
@endsection
