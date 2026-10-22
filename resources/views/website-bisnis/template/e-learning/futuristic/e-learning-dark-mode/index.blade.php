@extends('website-bisnis.template.e-learning.futuristic.e-learning-dark-mode.layouts.app')
@php($e = config('template.e-learning.futuristic.e-learning-dark-mode.e-learning'))
@php($v = $e['view'])

@section('title', 'Home')
@section('page', 'home')

@section('content')
    @include($v.'.sections.hero')

    <div class="nl-container nl-home">
        <div class="nl-row nl-row--main">
            @include($v.'.sections.programs')
            @include($v.'.sections.schedules')
            @include($v.'.sections.teachers')
        </div>

        <div class="nl-row nl-row--feature">
            @include($v.'.sections.registration')
            @include($v.'.sections.pricing')
            @include($v.'.sections.course-content')
            @include($v.'.sections.member-area')
        </div>
    </div>
@endsection
