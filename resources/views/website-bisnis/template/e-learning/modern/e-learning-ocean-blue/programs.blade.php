@php
    $ns  = 'website-bisnis.template.e-learning.modern.e-learning-ocean-blue';
    $e   = config('template.e-learning.modern.e-learning-ocean-blue.e-learning');
    $img = fn ($f) => asset($e['assets']['img'].$f);
@endphp
@extends($ns.'.layouts.app')

@section('title', 'Programs — E-learna')
@section('page', 'programs')

@section('content')
    @include($ns.'.partials.page-header', ['key' => 'programs'])
    @include($ns.'.sections.programs', ['mode' => 'full'])
@endsection
