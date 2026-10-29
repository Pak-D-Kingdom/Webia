@php
    $ns    = 'website-bisnis.template.interior&architecture.premium-minimal.furniture-mocha-cream';
    $cfg   = config('template.interior&architecture.premium-minimal.furniture-mocha-cream.furniture');
    $route = fn ($n, $p = []) => route($cfg['route_prefix'].$n, $p);
    $img   = fn ($f) => asset($cfg['assets']['img'].'/'.$f);
@endphp
@extends($ns.'.layouts.app')

@section('title', 'Production Lead Time')
@section('body-class', 'fm-page-lead')

@section('content')
    @include($ns.'.partials.page-header', [
        'eyebrow' => $cfg['lead_time']['eyebrow'] ?? 'WOODENLANE',
        'title'   => $cfg['lead_time']['title'],
        'text'    => $cfg['lead_time']['text'],
    ])
    @include($ns.'.sections.lead-time')
@endsection
