@extends('website-bisnis.template.e-learning.playful-colorful.e-learning-pastel-mix.layouts.app')
@php
    $t ??= config('template.e-learning.playful-colorful.e-learning-pastel-mix.e-learning');
    $rp  = $t['route_prefix']; $v = $t['view']; $img = asset($t['assets']['images']).'/';
@endphp

@section('title', 'Registration')
@section('page', 'registration')

@section('content')
    @include($v.'.partials.page-header', ['heading' => 'Registration', 'sub' => 'Daftar sekarang dan dapatkan akses ke semua kursus premium kami.', 'art' => 'cta-girl.jpg', 'artClass' => 'is-photo'])

    <div class="container page-body">
        @include($v.'.sections.registration', ['full' => true])
    </div>
@endsection
