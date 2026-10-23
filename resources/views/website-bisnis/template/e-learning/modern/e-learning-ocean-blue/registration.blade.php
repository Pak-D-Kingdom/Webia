@php
    $ns  = 'website-bisnis.template.e-learning.modern.e-learning-ocean-blue';
    $e   = config('template.e-learning.modern.e-learning-ocean-blue.e-learning');
    $img = fn ($f) => asset($e['assets']['img'].$f);
@endphp
@extends($ns.'.layouts.app')

@section('title', 'Registration — E-learna')
@section('page', 'registration')

@section('content')
    @include($ns.'.partials.page-header', ['key' => 'registration'])
    @include($ns.'.sections.registration', ['mode' => 'full'])
@endsection
