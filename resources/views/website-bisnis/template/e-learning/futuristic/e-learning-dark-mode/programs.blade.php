@extends('website-bisnis.template.e-learning.futuristic.e-learning-dark-mode.layouts.app')
@php($e = config('template.e-learning.futuristic.e-learning-dark-mode.e-learning'))
@php($v = $e['view'])

@section('title', 'Programs')
@section('page', 'programs')

@section('content')
    @include($v.'.partials.page-head', ['title' => 'Program Unggulan', 'text' => 'Kursus terbaik pilihan untuk meningkatkan skill dan karier kamu.', 'crumb' => 'Programs'])

    <div class="nl-container nl-inner">
        @include($v.'.sections.programs', ['full' => true])
    </div>
@endsection
