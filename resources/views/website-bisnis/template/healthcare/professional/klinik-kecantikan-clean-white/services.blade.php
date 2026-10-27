@php
    $v      = 'website-bisnis.template.healthcare.professional.klinik-kecantikan-clean-white.';
    $clinic = config('template.healthcare.professional.klinik-kecantikan-clean-white.klinik-kecantikan');
    $img    = fn (string $file) => asset($clinic['paths']['images'] . '/' . $file);
@endphp
@extends($v . 'layouts.app')

@section('title', 'Layanan Perawatan — ' . $clinic['brand']['name'])

@section('content')
    @include($v . 'partials.page-hero', [
        'crumb' => 'Layanan',
        'title' => 'Layanan Perawatan',
        'text'  => 'Perawatan kulit dan aesthetic dengan standar keamanan tinggi, ditangani tim profesional.',
        'image' => 'hero-skin.jpg',
        'alt'   => 'Kulit sehat bercahaya',
    ])
    @include($v . 'sections.services', ['full' => true])
@endsection
