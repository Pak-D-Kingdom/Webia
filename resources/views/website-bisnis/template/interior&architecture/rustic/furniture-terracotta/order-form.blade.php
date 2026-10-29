@extends('website-bisnis.template.interior&architecture.rustic.furniture-terracotta.layouts.app')
@php
    $f    = config('template.interior&architecture.rustic.furniture-terracotta.furniture');
    $v    = 'website-bisnis.template.interior&architecture.rustic.furniture-terracotta';
    $r    = fn ($n) => route($f['route_prefix'] . $n);
    $img  = fn ($n) => asset($f['assets']['img'] . '/' . $n);
    $icon = fn ($n, $c = '') => view($v . '.partials.icon', ['name' => $n, 'class' => $c])->render();
    $wa   = 'https://wa.me/' . $f['contact']['whatsapp'] . '?text=' . rawurlencode($f['contact']['whatsapp_greeting']);
@endphp
@section('title', 'Custom Order Form')
@section('page', 'order-form')
@section('content')
    @include($v . '.partials.page-header', ['title' => 'Custom Order Form', 'eyebrow' => 'Custom Order', 'lead' => "Isi detail pesanan custom Anda. Tim kami akan menghubungi lewat WhatsApp."])
    @include($v . '.sections.order-form')
@endsection
