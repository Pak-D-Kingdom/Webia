@php
    $ns    = 'website-bisnis.template.interior&architecture.premium-minimal.furniture-mocha-cream';
    $cfg   = config('template.interior&architecture.premium-minimal.furniture-mocha-cream.furniture');
    $route = fn ($n, $p = []) => route($cfg['route_prefix'].$n, $p);
    $img   = fn ($f) => asset($cfg['assets']['img'].'/'.$f);
@endphp
@extends($ns.'.layouts.app')

@section('title', 'Project Gallery')
@section('body-class', 'fm-page-gallery')

@section('content')
    @include($ns.'.partials.page-header', [
        'eyebrow' => $cfg['gallery']['eyebrow'] ?? 'WOODENLANE',
        'title'   => $cfg['gallery']['title'],
        'text'    => $cfg['gallery']['text'],
    ])
    @include($ns.'.sections.gallery')
@endsection
