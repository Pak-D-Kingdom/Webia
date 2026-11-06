@php
    $ns  = 'website-bisnis.template.e-learning.modern.e-learning-ocean-blue';
    $e   = config('template.e-learning.modern.e-learning-ocean-blue.e-learning');
    $img = fn ($f) => asset($e['assets']['img'].$f);
@endphp
@extends($ns.'.layouts.app')

@section('title', 'Schedules — E-learna')
@section('page', 'schedules')

@section('content')
    @include($ns.'.partials.page-header', ['key' => 'schedules'])
    @include($ns.'.sections.schedules', ['mode' => 'full'])
@endsection
