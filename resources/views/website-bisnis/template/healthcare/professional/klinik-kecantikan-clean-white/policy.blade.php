@php
    $v      = 'website-bisnis.template.healthcare.professional.klinik-kecantikan-clean-white.';
    $clinic = config('template.healthcare.professional.klinik-kecantikan-clean-white.klinik-kecantikan');
    $img    = fn (string $file) => asset($clinic['paths']['images'] . '/' . $file);
@endphp
@extends($v . 'layouts.app')

@section('title', 'Kebijakan & Ketentuan — ' . $clinic['brand']['name'])

@section('content')
    @include($v . 'partials.page-hero', [
        'crumb' => 'Kebijakan',
        'title' => 'Kebijakan & Ketentuan',
        'text'  => 'Privasi data, syarat layanan, pembatalan jadwal, dan standar keselamatan klinik.',
        'image' => 'clinic-building.jpg',
        'alt'   => 'Gedung klinik GlowAesthetics',
    ])
    @include($v . 'sections.policy', ['full' => true])
@endsection
