@php
    $ns    = 'website-bisnis.template.interior&architecture.premium-minimal.furniture-mocha-cream';
    $cfg   = config('template.interior&architecture.premium-minimal.furniture-mocha-cream.furniture');
    $route = fn ($n, $p = []) => route($cfg['route_prefix'].$n, $p);
    $img   = fn ($f) => asset($cfg['assets']['img'].'/'.$f);
@endphp
@extends($ns.'.layouts.app')

@section('title', 'AI Chatbot')
@section('body-class', 'fm-page-ai')

@section('content')
    @include($ns.'.partials.page-header', [
        'eyebrow' => 'PRODUCT & CUSTOMIZATION FAQ',
        'title'   => 'AI Chatbot',
        'text'    => $cfg['ai']['text'],
    ])
    @include($ns.'.sections.ai-chatbot')
@endsection
