@extends('website-bisnis.template.e-learning.futuristic.e-learning-dark-mode.layouts.app')
@php($e = config('template.e-learning.futuristic.e-learning-dark-mode.e-learning'))
@php($v = $e['view'])

@section('title', 'Teachers')
@section('page', 'teachers')

@section('content')
    @include($v.'.partials.page-head', ['title' => 'Teacher Terbaik', 'text' => 'Belajar langsung dari pengajar profesional dan berpengalaman.', 'crumb' => 'Teachers'])

    <div class="nl-container nl-inner">
        @include($v.'.sections.teachers', ['full' => true])
    </div>
@endsection
