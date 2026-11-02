{{-- Beranda: hero + preview Layanan, Dokter, Jadwal, Lokasi, Appointment, FAQ, Kebijakan --}}
@extends($tpl . '.layouts.app')
@php $c = config($cfg); @endphp

@section('content')
    @include($tpl . '.sections.hero')
    @include($tpl . '.sections.services', ['full' => false])

    <div class="rg-container rg-row rg-row--duo">
        @include($tpl . '.sections.doctors', ['full' => false])
        @include($tpl . '.sections.schedule', ['full' => false])
    </div>

    <div class="rg-container rg-row rg-row--trio">
        @include($tpl . '.sections.location')
        @include($tpl . '.sections.booking', ['full' => false])
        @include($tpl . '.sections.faq', ['full' => false])
    </div>

    @include($tpl . '.sections.policy', ['full' => false])
@endsection
