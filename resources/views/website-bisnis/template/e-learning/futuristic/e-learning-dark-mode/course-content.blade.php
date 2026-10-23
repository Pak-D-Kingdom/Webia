@extends('website-bisnis.template.e-learning.futuristic.e-learning-dark-mode.layouts.app')
@php($e = config('template.e-learning.futuristic.e-learning-dark-mode.e-learning'))
@php($v = $e['view'])

@section('title', 'Course Content')
@section('page', 'course-content')

@section('content')
    @include($v.'.partials.page-head', ['title' => 'Course Content', 'text' => 'Pelajari materi kursus secara berurutan dan pantau progres belajarmu.', 'crumb' => 'Course Content'])

    <div class="nl-container nl-inner">
        @include($v.'.sections.course-content', ['full' => true])
    </div>
@endsection
