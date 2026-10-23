@extends('website-bisnis.template.e-learning.playful-colorful.e-learning-pastel-mix.layouts.app')
@php
    $t ??= config('template.e-learning.playful-colorful.e-learning-pastel-mix.e-learning');
    $rp  = $t['route_prefix']; $v = $t['view']; $img = asset($t['assets']['images']).'/';
@endphp

@section('title', 'Pricing')
@section('page', 'pricing')

@section('content')
    @include($v.'.partials.page-header', ['heading' => 'Pricing', 'sub' => 'Pilih paket sesuai dengan kebutuhanmu.'])

    <div class="container page-body">
        @include($v.'.sections.pricing', ['full' => true])
    </div>
@endsection
