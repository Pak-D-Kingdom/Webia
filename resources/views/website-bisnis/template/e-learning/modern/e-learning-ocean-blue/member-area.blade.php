@php
    $ns  = 'website-bisnis.template.e-learning.modern.e-learning-ocean-blue';
    $e   = $e ?? config('template.e-learning.modern.e-learning-ocean-blue.e-learning');
    $img = $img ?? fn ($f) => asset($e['assets']['img'].$f);
    $r = $r ?? fn (string $name, array $parameters = []) => route($name, $parameters);
    $isActive = $isActive ?? fn (string $name) => request()->routeIs($name);
    $customerSite = ($e['customer_site'] ?? false) === true;
@endphp
@extends($ns.'.layouts.app')

@section('title', 'Member Area — '.$e['brand']['name'])
@section('page', 'member-area')

@section('content')
    @include($ns.'.partials.page-header', ['key' => 'member-area', 'art' => 'mascot-head.png'])
    @include($ns.'.sections.member-area', ['mode' => 'full'])
@endsection
