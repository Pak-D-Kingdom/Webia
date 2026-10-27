@php
    $v      = 'website-bisnis.template.healthcare.professional.klinik-kecantikan-clean-white.';
    $clinic = config('template.healthcare.professional.klinik-kecantikan-clean-white.klinik-kecantikan');
    $img    = fn (string $file) => asset($clinic['paths']['images'] . '/' . $file);
@endphp
@extends($v . 'layouts.app')

@section('title', 'Jadwal Praktik — ' . $clinic['brand']['name'])

@section('content')
    @include($v . 'partials.page-hero', [
        'crumb' => 'Jadwal',
        'title' => 'Jadwal Praktik',
        'text'  => 'Lihat jadwal dokter dan pilih waktu yang sesuai dengan Anda.',
        'image' => 'clinic-building.jpg',
        'alt'   => 'Gedung klinik GlowAesthetics',
    ])
    <section class="gl-section" aria-label="Jadwal dokter">
        <div class="gl-container">
            @include($v . 'sections.schedule', ['full' => true])
        </div>
    </section>
@endsection
