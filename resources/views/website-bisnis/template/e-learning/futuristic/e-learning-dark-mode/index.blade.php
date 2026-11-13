@php
    $e = $e ?? config('template.e-learning.futuristic.e-learning-dark-mode.e-learning');
    $v = $e['view'];
    $r = $r ?? fn (string $name, array $parameters = []) => route($name, $parameters);
    $isActive = $isActive ?? fn (string $name) => request()->routeIs($name);
    $customerSite = ($e['customer_site'] ?? false) === true;
@endphp
@extends($v.'.layouts.app')

@section('title', 'Home')
@section('page', 'home')

@section('content')
    @include($v.'.sections.hero')

    <div class="nl-container nl-home">
        {{-- Baris 1: Program Unggulan (lebar penuh, 4 kartu sejajar) --}}
        @include($v.'.sections.programs')

        {{-- Baris 2: Jadwal Kelas + Teacher Terbaik (tinggi sama) --}}
        <div class="nl-row nl-row--duo">
            @include($v.'.sections.schedules')
            @include($v.'.sections.teachers')
        </div>

        {{-- Baris 3: Upgrade Karier + Harga Paket --}}
        <div class="nl-row nl-row--offer">
            @include($v.'.sections.registration')
            @include($v.'.sections.pricing')
        </div>

        {{-- Baris 4: Course Content + Member Area --}}
        <div class="nl-row nl-row--learn">
            @include($v.'.sections.course-content')
            @include($v.'.sections.member-area')
        </div>
    </div>
@endsection
