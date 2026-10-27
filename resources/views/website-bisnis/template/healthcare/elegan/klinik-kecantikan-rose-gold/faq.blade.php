{{-- Halaman FAQ --}}
@extends($tpl . '.layouts.app')
@php $c = config($cfg); @endphp

@section('title', 'FAQ — ' . $c['brand']['name'])

@section('content')
    @include($tpl . '.partials.page-head', ['title' => 'FAQ', 'text' => 'Jawaban untuk pertanyaan yang sering diajukan seputar perawatan, booking, dan pembayaran.'])
    @include($tpl . '.sections.faq', ['full' => true])
@endsection
