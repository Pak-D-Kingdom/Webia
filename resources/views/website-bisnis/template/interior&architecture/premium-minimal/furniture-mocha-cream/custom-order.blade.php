@php
    $ns    = 'website-bisnis.template.interior&architecture.premium-minimal.furniture-mocha-cream';
    $cfg   = config('template.interior&architecture.premium-minimal.furniture-mocha-cream.furniture');
    $route = fn ($n, $p = []) => route($cfg['route_prefix'].$n, $p);
    $img   = fn ($f) => asset($cfg['assets']['img'].'/'.$f);
@endphp
@extends($ns.'.layouts.app')

@section('title', 'Custom Order Form')
@section('body-class', 'fm-page-order')

@section('content')
    @include($ns.'.partials.page-header', [
        'eyebrow' => $cfg['custom_order']['eyebrow'] ?? 'WOODENLANE',
        'title'   => $cfg['custom_order']['title'],
        'text'    => $cfg['custom_order']['text'],
    ])
    @include($ns.'.sections.custom-order')
@endsection
