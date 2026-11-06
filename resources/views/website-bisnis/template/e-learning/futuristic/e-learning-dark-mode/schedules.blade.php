@extends('website-bisnis.template.e-learning.futuristic.e-learning-dark-mode.layouts.app')
@php($e = config('template.e-learning.futuristic.e-learning-dark-mode.e-learning'))
@php($v = $e['view'])

@section('title', 'Schedules')
@section('page', 'schedules')

@section('content')
    @include($v.'.partials.page-head', ['title' => 'Jadwal Kelas', 'text' => 'Lihat kelas online yang berlangsung hari ini, minggu ini, dan yang akan datang.', 'crumb' => 'Schedules'])

    <div class="nl-container nl-inner">
        @include($v.'.sections.schedules', ['full' => true])
    </div>
@endsection
