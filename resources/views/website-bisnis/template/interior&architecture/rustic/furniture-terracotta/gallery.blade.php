@extends('website-bisnis.template.interior&architecture.rustic.furniture-terracotta.layouts.app')
@php
    $f    = config('template.interior&architecture.rustic.furniture-terracotta.furniture');
    $v    = 'website-bisnis.template.interior&architecture.rustic.furniture-terracotta';
    $r    = fn ($n) => route($f['route_prefix'] . $n);
    $img  = fn ($n) => asset($f['assets']['img'] . '/' . $n);
    $icon = fn ($n, $c = '') => view($v . '.partials.icon', ['name' => $n, 'class' => $c])->render();
    $wa   = 'https://wa.me/' . $f['contact']['whatsapp'] . '?text=' . rawurlencode($f['contact']['whatsapp_greeting']);
@endphp
@section('title', 'Project Gallery')
@section('page', 'gallery')
@section('content')
    @include($v . '.partials.page-header', ['title' => 'Project Gallery', 'eyebrow' => 'Galeri', 'lead' => "Karya kami di berbagai rumah, kantor, kafe, dan ruang luar."])
    @include($v . '.sections.gallery')
@endsection
