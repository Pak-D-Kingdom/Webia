@extends('website-bisnis.template.interior&architecture.rustic.furniture-terracotta.layouts.app')
@php
    $f    = config('template.interior&architecture.rustic.furniture-terracotta.furniture');
    $v    = 'website-bisnis.template.interior&architecture.rustic.furniture-terracotta';
    $r    = fn ($n) => route($f['route_prefix'] . $n);
    $img  = fn ($n) => asset($f['assets']['img'] . '/' . $n);
    $icon = fn ($n, $c = '') => view($v . '.partials.icon', ['name' => $n, 'class' => $c])->render();
    $wa   = 'https://wa.me/' . $f['contact']['whatsapp'] . '?text=' . rawurlencode($f['contact']['whatsapp_greeting']);
@endphp
@section('title', 'Product Dimensions')
@section('page', 'dimensions')
@section('content')
    @include($v . '.partials.page-header', ['title' => 'Product Dimensions', 'eyebrow' => 'Dimensi Produk', 'lead' => "Lihat ukuran standar setiap produk dan panduan ergonomis sebelum memilih."])
    @include($v . '.sections.dimensions')
@endsection
