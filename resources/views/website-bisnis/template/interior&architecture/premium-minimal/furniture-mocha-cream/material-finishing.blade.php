@php
    $ns    = 'website-bisnis.template.interior&architecture.premium-minimal.furniture-mocha-cream';
    $cfg   = config('template.interior&architecture.premium-minimal.furniture-mocha-cream.furniture');
    $route = fn ($n, $p = []) => route($cfg['route_prefix'].$n, $p);
    $img   = fn ($f) => asset($cfg['assets']['img'].'/'.$f);
@endphp
@extends($ns.'.layouts.app')

@section('title', 'Material & Finishing')
@section('body-class', 'fm-page-material')

@section('content')
    @include($ns.'.partials.page-header', [
        'eyebrow' => $cfg['materials']['eyebrow'] ?? 'WOODENLANE',
        'title'   => $cfg['materials']['title'],
        'text'    => $cfg['materials']['text'],
    ])
    @include($ns.'.sections.materials')
@endsection
