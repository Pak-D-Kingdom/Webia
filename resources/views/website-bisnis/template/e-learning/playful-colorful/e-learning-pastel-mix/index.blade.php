@extends('website-bisnis.template.e-learning.playful-colorful.e-learning-pastel-mix.layouts.app')
@php
    $t ??= config('template.e-learning.playful-colorful.e-learning-pastel-mix.e-learning');
    $rp  = $t['route_prefix']; $v = $t['view']; $img = asset($t['assets']['images']).'/';
@endphp

@section('page', 'home')

@section('content')
    @include($v.'.sections.hero')

    <div class="container home">
        {{-- Baris 1: Programs | Schedules | Teachers --}}
        <div class="home__row home__row--top">
            @include($v.'.sections.programs')
            @include($v.'.sections.schedules')
            @include($v.'.sections.teachers')
        </div>

        {{-- Baris 2: Registration | Pricing | Course Content | Member Area | AI FAQ --}}
        <div class="home__row home__row--bottom">
            @include($v.'.sections.registration')
            @include($v.'.sections.pricing')
            @include($v.'.sections.course-content')
            @include($v.'.sections.member-area')
            @include($v.'.sections.ai-faq')
        </div>
    </div>
@endsection
