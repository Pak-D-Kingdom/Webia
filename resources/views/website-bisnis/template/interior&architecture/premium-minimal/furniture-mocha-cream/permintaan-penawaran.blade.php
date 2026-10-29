@php
    $ns    = 'website-bisnis.template.interior&architecture.premium-minimal.furniture-mocha-cream';
    $cfg   = config('template.interior&architecture.premium-minimal.furniture-mocha-cream.furniture');
    $route = fn ($n, $p = []) => route($cfg['route_prefix'].$n, $p);
    $img   = fn ($f) => asset($cfg['assets']['img'].'/'.$f);
@endphp
@extends($ns.'.layouts.app')

@section('title', 'Quotation Request')
@section('body-class', 'fm-page-quote')

@section('content')
    @include($ns.'.partials.page-header', [
        'eyebrow' => $cfg['quotation']['eyebrow'] ?? 'WOODENLANE',
        'title'   => $cfg['quotation']['title'],
        'text'    => $cfg['quotation']['text'],
    ])
    @include($ns.'.sections.quotation')
@endsection
