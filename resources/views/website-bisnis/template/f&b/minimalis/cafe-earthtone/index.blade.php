@extends("$v.layouts.app")

@section('content')
    @include("$v.sections.hero")
    @include("$v.sections.features")

    {{-- Baris 1: preview menu (ukuran tetap) + AI FAQ ringkas --}}
    <div class="container row row--top">
        @include("$v.sections.menu")
        @include("$v.sections.faq")
    </div>

    {{-- Baris 2: promo selebar halaman --}}
    <div class="container row">
        @include("$v.sections.promo")
    </div>

    <div class="container row">
        @include("$v.sections.services")
    </div>

    <div class="container row row--info">
        @include("$v.sections.location", ['wide' => true])
    </div>
@endsection
