@extends('website-bisnis.template.wedding-event.creative.event-organizer-purple-dream.layouts.app')

@php($eo = config('template.wedding-event.creative.event-organizer-purple-dream.event-organizer') ?: require config_path('template/wedding-event/creative/event-organizer-purple-dream/event-organizer.php'))

@section('title', 'Minta Penawaran')
@section('description', 'Minta penawaran acara Eventora: isi kebutuhan acara dan kirim melalui WhatsApp.')

@section('content')
    @include($eo['view'].'partials.page-hero', ['title' => 'Request a Quotation', 'crumb' => 'Minta Penawaran', 'text' => 'Dapatkan penawaran terbaik untuk acara Anda. Tim kami akan merespons maksimal 1x24 jam kerja.'])
    @include($eo['view'].'sections.quotation-full')
@endsection
