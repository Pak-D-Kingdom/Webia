@php
    $v      = 'website-bisnis.template.healthcare.professional.klinik-kecantikan-clean-white.';
    $clinic = config('template.healthcare.professional.klinik-kecantikan-clean-white.klinik-kecantikan');
    $img    = fn (string $file) => asset($clinic['paths']['images'] . '/' . $file);
@endphp
@extends($v . 'layouts.app')

@section('title', $clinic['brand']['name'] . ' — ' . $clinic['brand']['tagline'])

@section('content')
    @include($v . 'sections.hero')
    @include($v . 'sections.services', ['full' => false])
    @include($v . 'sections.doctors', ['full' => false])

    {{-- Jadwal + Lokasi berdampingan (sesuai desain UI) --}}
    <section class="gl-section gl-section--tight" aria-label="Jadwal dan lokasi">
        <div class="gl-container gl-duo">
            @include($v . 'sections.schedule', ['full' => false])
            @include($v . 'sections.location')
        </div>
    </section>

    @include($v . 'sections.appointment', ['full' => false])
    @include($v . 'sections.policy', ['full' => false])
@endsection
