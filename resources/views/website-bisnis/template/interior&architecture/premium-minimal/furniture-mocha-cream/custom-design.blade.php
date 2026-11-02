@php
    $ns    = 'website-bisnis.template.interior&architecture.premium-minimal.furniture-mocha-cream';
    $cfg   = config('template.interior&architecture.premium-minimal.furniture-mocha-cream.furniture');
    $route = fn ($n, $p = []) => route($cfg['route_prefix'].$n, $p);
    $img   = fn ($f) => asset($cfg['assets']['img'].'/'.$f);
@endphp
@extends($ns.'.layouts.app')

@section('title', 'Custom Design Options')
@section('body-class', 'fm-page-custom')

@section('content')
    @include($ns.'.partials.page-header', [
        'eyebrow' => $cfg['custom_design']['eyebrow'] ?? 'WOODENLANE',
        'title'   => $cfg['custom_design']['title'],
        'text'    => $cfg['custom_design']['text'],
    ])
    @include($ns.'.sections.custom-design')
@endsection
