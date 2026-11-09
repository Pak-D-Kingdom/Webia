@extends('website-bisnis.template.wedding-event.creative.event-organizer-purple-dream.layouts.app')

@php($eo = config('template.wedding-event.creative.event-organizer-purple-dream.event-organizer') ?: require config_path('template/wedding-event/creative/event-organizer-purple-dream/event-organizer.php'))

@section('title', 'FAQ AI')
@section('description', 'FAQ dan AI chatbot Eventora seputar layanan event, harga paket, dan proses pemesanan.')

@section('content')
    @include($eo['view'].'partials.page-hero', ['title' => 'FAQ & AI Chatbot', 'crumb' => 'FAQ AI', 'text' => 'Tanyakan seputar layanan, paket, harga, dan proses pemesanan event kepada asisten AI kami.'])
    @include($eo['view'].'sections.faq-full')
@endsection
