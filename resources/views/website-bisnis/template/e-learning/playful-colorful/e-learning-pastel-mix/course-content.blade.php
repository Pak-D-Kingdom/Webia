@extends('website-bisnis.template.e-learning.playful-colorful.e-learning-pastel-mix.layouts.app')
@php
    $t ??= config('template.e-learning.playful-colorful.e-learning-pastel-mix.e-learning');
    $rp  = $t['route_prefix']; $v = $t['view']; $img = asset($t['assets']['images']).'/';
@endphp

@section('title', 'Course Content')
@section('page', 'course-content')

@section('content')
    @include($v.'.partials.page-header', ['heading' => 'Course Content', 'sub' => 'Pantau progres dan lanjutkan materi belajarmu.'])

    <div class="container page-body">
        @include($v.'.sections.course-content', ['full' => true])
    </div>
@endsection
