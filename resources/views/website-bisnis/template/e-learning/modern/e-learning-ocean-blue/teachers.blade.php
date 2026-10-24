@php
    $ns  = 'website-bisnis.template.e-learning.modern.e-learning-ocean-blue';
    $e   = config('template.e-learning.modern.e-learning-ocean-blue.e-learning');
    $img = fn ($f) => asset($e['assets']['img'].$f);
@endphp
@extends($ns.'.layouts.app')

@section('title', 'Teachers — E-learna')
@section('page', 'teachers')

@section('content')
    @include($ns.'.partials.page-header', ['key' => 'teachers'])
    @include($ns.'.sections.teachers', ['mode' => 'full'])
@endsection
