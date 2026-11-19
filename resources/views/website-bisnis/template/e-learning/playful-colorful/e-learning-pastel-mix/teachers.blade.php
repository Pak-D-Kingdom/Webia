@extends('website-bisnis.template.e-learning.playful-colorful.e-learning-pastel-mix.layouts.app')
@php
    $t ??= config('template.e-learning.playful-colorful.e-learning-pastel-mix.e-learning');
    $rp  = $t['route_prefix']; $v = $t['view']; $img = asset($t['assets']['images']).'/';
    $r = $r ?? fn (string $name, array $parameters = []) => route($name, $parameters);
    $isActive = $isActive ?? fn (string $name) => request()->routeIs($name);
    $customerSite = ($t['customer_site'] ?? false) === true;
@endphp

@section('title', 'Teachers')
@section('page', 'teachers')

@section('content')
    @include($v.'.partials.page-header', ['heading' => 'Teachers', 'sub' => 'Belajar langsung bersama mentor profesional berpengalaman.'])

    <div class="container page-body">
        @include($v.'.sections.teachers', ['full' => true])
    </div>
@endsection
