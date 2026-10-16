@extends("$v.layouts.app")

@section('content')
    @include("$v.sections.hero")
    @include("$v.sections.features")

    {{-- Preview menu --}}
    <div class="container row">
        @include("$v.sections.menu")
    </div>

    {{-- Promo (1 / 2 / 5 / 9 atau lebih, atur di config) --}}
    <div class="container row">
        @include("$v.sections.promo")
    </div>

    <div class="container row">
        @include("$v.sections.services")
    </div>

    {{-- Baris paling bawah: Lokasi + AI FAQ ringkas --}}
    <div class="container row row--info">
        @include("$v.sections.location", ['wide' => true])
        @include("$v.sections.faq")
    </div>
@endsection
