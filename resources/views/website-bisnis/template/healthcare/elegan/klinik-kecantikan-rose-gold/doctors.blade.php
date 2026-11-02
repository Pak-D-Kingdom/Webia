{{-- Halaman Dokter & Staff --}}
@extends($tpl . '.layouts.app')
@php $c = config($cfg); @endphp

@section('title', 'Dokter & Staff — ' . $c['brand']['name'])

@section('content')
    @include($tpl . '.partials.page-head', ['title' => 'Dokter & Staff', 'text' => 'Didukung oleh dokter spesialis dan tim terlatih yang siap memberikan pelayanan terbaik untuk Anda.'])
    @include($tpl . '.sections.doctors', ['full' => true])
@endsection
