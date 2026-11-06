@php
    $ns  = $cafe['paths']['views'];
    $img = fn (string $file) => asset($cafe['paths']['img'] . '/' . $file);
@endphp
@extends("$ns.layouts.app")

@section('title', $cafe['reservation']['page_title'] . ' — ' . $cafe['brand']['name'])
@section('page', 'reservasi')

@section('content')
    @include("$ns.partials.page-header", ['title' => $cafe['reservation']['page_title'], 'text' => $cafe['reservation']['page_text']])

    <div class="kl-container">
        <div class="kl-reserve-grid">
            @include("$ns.sections.reservation-form")

            <div class="kl-reserve-aside">
                @include("$ns.sections.opening-hours")
                @include("$ns.sections.location")
            </div>
        </div>

    </div>
@endsection
