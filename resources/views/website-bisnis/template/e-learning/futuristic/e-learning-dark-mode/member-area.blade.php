@extends('website-bisnis.template.e-learning.futuristic.e-learning-dark-mode.layouts.app')
@php($e = config('template.e-learning.futuristic.e-learning-dark-mode.e-learning'))
@php($v = $e['view'])

@section('title', 'Member Area')
@section('page', 'member-area')

@section('content')
    @include($v.'.partials.page-head', ['title' => 'Member Area', 'text' => 'Akses materi kursus, progres, sertifikat, dan fitur eksklusif lainnya.', 'crumb' => 'Member Area'])

    <div class="nl-container nl-inner">
        @include($v.'.sections.member-area', ['full' => true])
    </div>
@endsection
