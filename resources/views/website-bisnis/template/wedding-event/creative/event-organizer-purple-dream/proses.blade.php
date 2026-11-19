@extends('website-bisnis.template.wedding-event.creative.event-organizer-purple-dream.layouts.app')

@php($eo = config('template.wedding-event.creative.event-organizer-purple-dream.event-organizer') ?: require config_path('template/wedding-event/creative/event-organizer-purple-dream/event-organizer.php'))

@section('title', 'Proses Event')
@section('description', 'Proses perencanaan event Eventora dari konsultasi kebutuhan hingga evaluasi dan laporan.')

@section('content')
    @include($eo['view'].'partials.page-hero', ['title' => 'Event Planning Process', 'crumb' => 'Proses Event', 'text' => 'Proses mudah, hasil maksimal. Lima tahap yang kami jalankan untuk setiap acara.'])
    @include($eo['view'].'sections.process-full')
    @include($eo['view'].'partials.cta-band', ['heading' => 'Siap merancang acara impian Anda?', 'sub' => 'Ceritakan kebutuhan Anda dan dapatkan penawaran terbaik dari tim Eventora.', 'path' => '/penawaran', 'label' => 'Minta Penawaran'])
@endsection
