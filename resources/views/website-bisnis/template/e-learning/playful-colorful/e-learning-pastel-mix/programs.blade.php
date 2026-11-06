@extends('website-bisnis.template.e-learning.playful-colorful.e-learning-pastel-mix.layouts.app')
@php
    $t ??= config('template.e-learning.playful-colorful.e-learning-pastel-mix.e-learning');
    $rp  = $t['route_prefix']; $v = $t['view']; $img = asset($t['assets']['images']).'/';
@endphp

@section('title', 'Programs')
@section('page', 'programs')

@section('content')
    @include($v.'.partials.page-header', ['heading' => 'Programs', 'sub' => 'Pilih program terbaik untuk mengembangkan skill kamu.'])

    <div class="container page-body">
        @include($v.'.sections.programs', ['full' => true])
    </div>
@endsection
