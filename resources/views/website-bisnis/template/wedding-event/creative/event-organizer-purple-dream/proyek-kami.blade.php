@extends('website-bisnis.template.wedding-event.creative.event-organizer-purple-dream.layouts.app')

@php($eo = config('template.wedding-event.creative.event-organizer-purple-dream.event-organizer') ?: require config_path('template/wedding-event/creative/event-organizer-purple-dream/event-organizer.php'))

@section('title', 'Proyek Kami')
@section('description', 'Proyek sebelumnya Eventora: wedding, gala dinner, konser, konferensi, ekspo, dan festival.')

@section('content')
    @include($eo['view'].'partials.page-hero', ['title' => 'Past Projects', 'crumb' => 'Proyek Kami', 'text' => 'Proyek berkesan yang pernah kami wujudkan bersama klien dari berbagai industri.'])
    @include($eo['view'].'sections.projects-full')
    @include($eo['view'].'partials.cta-band', ['heading' => 'Siap merancang acara impian Anda?', 'sub' => 'Ceritakan kebutuhan Anda dan dapatkan penawaran terbaik dari tim Eventora.', 'path' => '/penawaran', 'label' => 'Minta Penawaran'])
@endsection
