@php
    $v      = 'website-bisnis.template.healthcare.professional.klinik-kecantikan-clean-white.';
    $clinic = config('template.healthcare.professional.klinik-kecantikan-clean-white.klinik-kecantikan');
    $img    = fn (string $file) => asset($clinic['paths']['images'] . '/' . $file);
@endphp
@extends($v . 'layouts.app')

@section('title', 'Dokter & Staff — ' . $clinic['brand']['name'])

@section('content')
    @include($v . 'partials.page-hero', [
        'crumb' => 'Dokter & Staff',
        'title' => 'Dokter & Staff',
        'text'  => 'Kenali dokter spesialis dan tim terlatih yang siap mendampingi perawatan Anda.',
        'gallery' => ['doctor-1.jpg', 'doctor-2.jpg', 'doctor-3.jpg', 'doctor-4.jpg'],
        'alt'   => '',
    ])
    @include($v . 'sections.doctors', ['full' => true])
@endsection
