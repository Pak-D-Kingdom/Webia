@php
    $ns  = $cafe['paths']['views'];
    $img = fn (string $file) => asset($cafe['paths']['img'] . '/' . $file);
@endphp
@extends("$ns.layouts.app")

@section('page', 'home')

@section('content')
    @include("$ns.sections.hero")
    @include("$ns.sections.features")

    <div class="kl-container">
        <div class="kl-stack">@include("$ns.sections.services")</div>
        <div class="kl-stack">@include("$ns.sections.menu-preview")</div>
        <div class="kl-stack">@include("$ns.sections.promo")</div>

        <div class="kl-info">
            @include("$ns.sections.opening-hours")
            @include("$ns.sections.location")
        </div>

        @include("$ns.sections.ai-faq")
    </div>
@endsection
