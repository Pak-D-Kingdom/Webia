@php
    $ns    = 'website-bisnis.template.interior&architecture.premium-minimal.furniture-mocha-cream';
    $cfg   = config('template.interior&architecture.premium-minimal.furniture-mocha-cream.furniture');
    $route = fn ($n, $p = []) => route($cfg['route_prefix'].$n, $p);
    $img   = fn ($f) => asset($cfg['assets']['img'].'/'.$f);
@endphp
@extends($ns.'.layouts.app')

@section('title', 'Beranda')
@section('body-class', 'fm-page-home')

@section('content')
    {{-- Hero banner + strip keunggulan --}}
    @include($ns.'.sections.hero', ['preview' => true])

    {{-- Preview semua section (grid bento mengikuti desain UI) --}}
    <section class="fm-home" aria-label="Ringkasan layanan {{ $cfg['brand']['name'] }}">
        <div class="fm-container">
            <div class="fm-bento">
                @include($ns.'.sections.catalog',       ['preview' => true])
                @include($ns.'.sections.custom-design', ['preview' => true])
                @include($ns.'.sections.materials',     ['preview' => true])
                @include($ns.'.sections.dimensions',    ['preview' => true])
                @include($ns.'.sections.gallery',       ['preview' => true])
                @include($ns.'.sections.ai-chatbot',    ['preview' => true])
                <div class="fm-bento__trio">
                    @include($ns.'.sections.custom-order', ['preview' => true])
                    @include($ns.'.sections.lead-time',    ['preview' => true])
                    @include($ns.'.sections.quotation',    ['preview' => true])
                </div>
            </div>
        </div>
    </section>
@endsection
