{{-- Beranda: hero + preview Services, Doctors, Schedule, Location, Appointment, FAQ, Policy --}}
@extends($v . '.layouts.app')

@section('active', 'home')

@section('content')
    @include($v . '.sections.hero')

    <div class="cg-container cg-home">
        {{-- Layanan --}}
        @include($v . '.sections.services', ['full' => false])

        {{-- Baris utama: dokter | jadwal | lokasi | booking --}}
        <div class="cg-row cg-row--main">
            @include($v . '.sections.doctors', ['full' => false])
            @include($v . '.sections.schedule', ['full' => false])
            @include($v . '.sections.location')
            @include($v . '.sections.appointment', ['full' => false])
        </div>

        {{-- Baris info: banner | FAQ | kebijakan | banner --}}
        <div class="cg-row cg-row--info">
            @include($v . '.sections.banner', ['side' => 'left'])
            @include($v . '.sections.faq', ['full' => false])
            @include($v . '.sections.policy', ['full' => false])
            @include($v . '.sections.banner', ['side' => 'right'])
        </div>
    </div>
@endsection
