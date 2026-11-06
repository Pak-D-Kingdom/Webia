@php
    $v      = 'website-bisnis.template.healthcare.professional.klinik-kecantikan-clean-white.';
    $clinic = config('template.healthcare.professional.klinik-kecantikan-clean-white.klinik-kecantikan');
    $img    = fn (string $file) => asset($clinic['paths']['images'] . '/' . $file);
@endphp
@extends($v . 'layouts.app')

@section('title', 'Booking Appointment — ' . $clinic['brand']['name'])

@section('content')
    @include($v . 'partials.page-hero', [
        'crumb' => 'Appointment',
        'title' => 'Booking Appointment',
        'text'  => 'Jadwalkan konsultasi atau perawatan Anda. Tim kami akan mengonfirmasi melalui WhatsApp.',
        'image' => 'hero-skin.jpg',
        'alt'   => 'Kulit sehat bercahaya',
    ])
    @include($v . 'sections.appointment', ['full' => true])
@endsection
