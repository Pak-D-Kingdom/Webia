{{-- Halaman Jadwal --}}
@extends($tpl . '.layouts.app')
@php $c = config($cfg); @endphp

@section('title', 'Jadwal — ' . $c['brand']['name'])

@section('content')
    @include($tpl . '.partials.page-head', ['title' => 'Jadwal', 'text' => 'Lihat jadwal praktik klinik dan ketersediaan dokter, lalu pilih waktu yang sesuai.'])
    @include($tpl . '.sections.schedule', ['full' => true])
@endsection
