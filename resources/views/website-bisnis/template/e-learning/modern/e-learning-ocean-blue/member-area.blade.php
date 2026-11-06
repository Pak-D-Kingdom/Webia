@php
    $ns  = 'website-bisnis.template.e-learning.modern.e-learning-ocean-blue';
    $e   = config('template.e-learning.modern.e-learning-ocean-blue.e-learning');
    $img = fn ($f) => asset($e['assets']['img'].$f);
@endphp
@extends($ns.'.layouts.app')

@section('title', 'Member Area — E-learna')
@section('page', 'member-area')

@section('content')
    @include($ns.'.partials.page-header', ['key' => 'member-area', 'art' => 'mascot-head.png'])
    @include($ns.'.sections.member-area', ['mode' => 'full'])
@endsection
