@php
    $ns    = 'website-bisnis.template.interior&architecture.premium-minimal.furniture-mocha-cream';
    $cfg   = config('template.interior&architecture.premium-minimal.furniture-mocha-cream.furniture');
    $route = fn ($n, $p = []) => route($cfg['route_prefix'].$n, $p);
    $img   = fn ($f) => asset($cfg['assets']['img'].'/'.$f);
@endphp
@extends($ns.'.layouts.app')

@section('title', 'Product Dimensions')
@section('body-class', 'fm-page-dims')

@section('content')
    @include($ns.'.partials.page-header', [
        'eyebrow' => $cfg['dimensions']['eyebrow'] ?? 'WOODENLANE',
        'title'   => $cfg['dimensions']['title'],
        'text'    => $cfg['dimensions']['text'],
    ])
    @include($ns.'.sections.dimensions')
@endsection
