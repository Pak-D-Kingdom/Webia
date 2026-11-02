{{-- Halaman Booking Appointment --}}
@extends($tpl . '.layouts.app')
@php $c = config($cfg); @endphp

@section('title', 'Booking Appointment — ' . $c['brand']['name'])

@section('content')
    @include($tpl . '.partials.page-head', ['title' => 'Booking Appointment', 'text' => 'Konsultasikan kebutuhan perawatan Anda bersama tim dokter kami.'])
    @include($tpl . '.sections.booking', ['full' => true])
@endsection
