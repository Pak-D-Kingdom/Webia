@extends('website-bisnis.template.interior&architecture.rustic.furniture-terracotta.layouts.app')
@php
    $f    = config('template.interior&architecture.rustic.furniture-terracotta.furniture');
    $v    = 'website-bisnis.template.interior&architecture.rustic.furniture-terracotta';
    $r    = fn ($n) => route($f['route_prefix'] . $n);
    $img  = fn ($n) => asset($f['assets']['img'] . '/' . $n);
    $icon = fn ($n, $c = '') => view($v . '.partials.icon', ['name' => $n, 'class' => $c])->render();
    $wa   = 'https://wa.me/' . $f['contact']['whatsapp'] . '?text=' . rawurlencode($f['contact']['whatsapp_greeting']);
@endphp
@section('title', 'Furniture Catalog')
@section('page', 'catalog')
@section('content')
    @include($v . '.partials.page-header', ['title' => 'Furniture Catalog', 'eyebrow' => 'Katalog', 'lead' => "Jelajahi koleksi furniture kayu untuk setiap ruangan, lalu simpan favorit atau tambahkan ke daftar penawaran."])
    @include($v . '.sections.catalog')
@endsection
