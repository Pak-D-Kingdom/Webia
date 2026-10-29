@extends('website-bisnis.template.interior&architecture.rustic.furniture-terracotta.layouts.app')
@php
    $f    = config('template.interior&architecture.rustic.furniture-terracotta.furniture');
    $v    = 'website-bisnis.template.interior&architecture.rustic.furniture-terracotta';
    $r    = fn ($n) => route($f['route_prefix'] . $n);
    $img  = fn ($n) => asset($f['assets']['img'] . '/' . $n);
    $icon = fn ($n, $c = '') => view($v . '.partials.icon', ['name' => $n, 'class' => $c])->render();
    $wa   = 'https://wa.me/' . $f['contact']['whatsapp'] . '?text=' . rawurlencode($f['contact']['whatsapp_greeting']);
@endphp
@section('title', 'Materials & Finishes')
@section('page', 'materials')
@section('content')
    @include($v . '.partials.page-header', ['title' => 'Materials & Finishes', 'eyebrow' => 'Material & Finishing', 'lead' => "Kenali karakter setiap kayu dan finishing agar furniture Anda awet dan sesuai selera."])
    @include($v . '.sections.materials')
@endsection
