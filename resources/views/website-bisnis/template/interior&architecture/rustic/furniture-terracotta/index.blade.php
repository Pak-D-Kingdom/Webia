@extends('website-bisnis.template.interior&architecture.rustic.furniture-terracotta.layouts.app')
@php
    $f    = config('template.interior&architecture.rustic.furniture-terracotta.furniture');
    $v    = 'website-bisnis.template.interior&architecture.rustic.furniture-terracotta';
    $r    = fn ($n) => route($f['route_prefix'] . $n);
    $img  = fn ($n) => asset($f['assets']['img'] . '/' . $n);
    $icon = fn ($n, $c = '') => view($v . '.partials.icon', ['name' => $n, 'class' => $c])->render();
    $wa   = 'https://wa.me/' . $f['contact']['whatsapp'] . '?text=' . rawurlencode($f['contact']['whatsapp_greeting']);
@endphp
@section('title', 'Beranda')
@section('page', 'home')
@section('description', $f['meta']['description'])
@section('content')
    @include($v . '.sections.hero')

    <section class="rf-section rf-home">
        <div class="rf-container">
            @include($v . '.sections.previews.catalog')

            <div class="rf-bento">
                <div class="rf-bento__a">@include($v . '.sections.previews.custom-design')</div>
                <div class="rf-bento__b">@include($v . '.sections.previews.materials')</div>
                <div class="rf-bento__c">@include($v . '.sections.previews.dimensions')</div>
                <div class="rf-bento__chat">@include($v . '.sections.previews.ai-faq')</div>
                <div class="rf-bento__d">@include($v . '.sections.previews.gallery')</div>
                <div class="rf-bento__e">
                    <div class="rf-minis">
                        @include($v . '.sections.previews.order-form')
                        @include($v . '.sections.previews.lead-time')
                        @include($v . '.sections.previews.quotation')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
