{{-- Halaman Kebijakan --}}
@extends($tpl . '.layouts.app')
@php $c = config($cfg); @endphp

@section('title', 'Kebijakan — ' . $c['brand']['name'])

@section('content')
    @include($tpl . '.partials.page-head', ['title' => 'Kebijakan', 'text' => 'Kebijakan privasi, syarat & ketentuan, serta aturan pembatalan RoseGlow Clinic.'])
    @include($tpl . '.sections.policy', ['full' => true])
@endsection
