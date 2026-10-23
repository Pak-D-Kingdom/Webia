@extends('website-bisnis.template.e-learning.futuristic.e-learning-dark-mode.layouts.app')
@php($e = config('template.e-learning.futuristic.e-learning-dark-mode.e-learning'))
@php($v = $e['view'])

@section('title', 'Registration')
@section('page', 'registration')

@section('content')
    @include($v.'.partials.page-head', ['title' => 'Registrasi', 'text' => 'Daftar sekarang dan mulai perjalanan belajarmu bersama NovaLearn.', 'crumb' => 'Registration'])

    <div class="nl-container nl-inner">
        @include($v.'.sections.registration', ['full' => true])
    </div>
@endsection
