@php
    $ns  = 'website-bisnis.template.e-learning.modern.e-learning-ocean-blue';
    $e   = config('template.e-learning.modern.e-learning-ocean-blue.e-learning');
    $img = fn ($f) => asset($e['assets']['img'].$f);
@endphp
@extends($ns.'.layouts.app')

@section('title', 'Pricing — E-learna')
@section('page', 'pricing')

@section('content')
    @include($ns.'.partials.page-header', ['key' => 'pricing'])
    @include($ns.'.sections.pricing', ['mode' => 'full'])
@endsection
