@extends('website-bisnis.template.interior&architecture.rustic.furniture-terracotta.layouts.app')
@php
    $f    = config('template.interior&architecture.rustic.furniture-terracotta.furniture');
    $v    = 'website-bisnis.template.interior&architecture.rustic.furniture-terracotta';
    $r    = fn ($n) => route($f['route_prefix'] . $n);
    $img  = fn ($n) => asset($f['assets']['img'] . '/' . $n);
    $icon = fn ($n, $c = '') => view($v . '.partials.icon', ['name' => $n, 'class' => $c])->render();
    $wa   = 'https://wa.me/' . $f['contact']['whatsapp'] . '?text=' . rawurlencode($f['contact']['whatsapp_greeting']);
@endphp
@section('title', 'Quotation Request')
@section('page', 'quotation')
@section('content')
    @include($v . '.partials.page-header', ['title' => 'Quotation Request', 'eyebrow' => 'Penawaran', 'lead' => "Kirim daftar produk dan kebutuhan Anda untuk mendapatkan penawaran harga."])
    @include($v . '.sections.quotation')
@endsection
