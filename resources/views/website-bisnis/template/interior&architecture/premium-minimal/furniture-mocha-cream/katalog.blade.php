@php
    $ns    = 'website-bisnis.template.interior&architecture.premium-minimal.furniture-mocha-cream';
    $cfg   = config('template.interior&architecture.premium-minimal.furniture-mocha-cream.furniture');
    $route = fn ($n, $p = []) => route($cfg['route_prefix'].$n, $p);
    $img   = fn ($f) => asset($cfg['assets']['img'].'/'.$f);
@endphp
@extends($ns.'.layouts.app')

@section('title', 'Katalog Furniture')
@section('body-class', 'fm-page-catalog')

@section('content')
    @include($ns.'.partials.page-header', [
        'eyebrow' => $cfg['catalog']['eyebrow'] ?? 'WOODENLANE',
        'title'   => $cfg['catalog']['title'],
        'text'    => $cfg['catalog']['text'],
    ])
    @include($ns.'.sections.catalog')
@endsection
