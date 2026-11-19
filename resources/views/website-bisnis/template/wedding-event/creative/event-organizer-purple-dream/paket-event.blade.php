@extends('website-bisnis.template.wedding-event.creative.event-organizer-purple-dream.layouts.app')

@php($eo = config('template.wedding-event.creative.event-organizer-purple-dream.event-organizer') ?: require config_path('template/wedding-event/creative/event-organizer-purple-dream/event-organizer.php'))

@section('title', 'Paket Event')
@section('description', 'Paket event private dan corporate Eventora: Basic, Premium, dan Exclusive.')

@section('content')
    @include($eo['view'].'partials.page-hero', ['title' => 'Corporate & Private Event Packages', 'crumb' => 'Paket Event', 'text' => 'Pilihan paket lengkap untuk acara private maupun corporate, dari Basic hingga Exclusive.'])
    @include($eo['view'].'sections.packages-full')
    @include($eo['view'].'partials.cta-band', ['heading' => 'Siap merancang acara impian Anda?', 'sub' => 'Ceritakan kebutuhan Anda dan dapatkan penawaran terbaik dari tim Eventora.', 'path' => '/penawaran', 'label' => 'Minta Penawaran'])
@endsection
