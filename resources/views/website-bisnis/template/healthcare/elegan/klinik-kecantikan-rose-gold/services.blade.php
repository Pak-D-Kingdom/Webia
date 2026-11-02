{{-- Halaman Layanan --}}
@extends($tpl . '.layouts.app')
@php $c = config($cfg); @endphp

@section('title', 'Layanan — ' . $c['brand']['name'])

@section('content')
    @include($tpl . '.partials.page-head', ['title' => 'Layanan', 'text' => 'Perawatan kulit dan kecantikan dengan teknologi terkini, ditangani oleh dokter ahli.'])
    @include($tpl . '.sections.services', ['full' => true])
@endsection
