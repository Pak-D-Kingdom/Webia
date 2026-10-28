@extends('website-bisnis.template.interior&architecture.rustic.furniture-terracotta.layouts.app')
@php
    $f    = config('template.interior&architecture.rustic.furniture-terracotta.furniture');
    $v    = 'website-bisnis.template.interior&architecture.rustic.furniture-terracotta';
    $r    = fn ($n) => route($f['route_prefix'] . $n);
    $img  = fn ($n) => asset($f['assets']['img'] . '/' . $n);
    $icon = fn ($n, $c = '') => view($v . '.partials.icon', ['name' => $n, 'class' => $c])->render();
    $wa   = 'https://wa.me/' . $f['contact']['whatsapp'] . '?text=' . rawurlencode($f['contact']['whatsapp_greeting']);
@endphp
@section('title', 'Custom Design Options')
@section('page', 'custom-design')
@section('content')
    @include($v . '.partials.page-header', ['title' => 'Custom Design Options', 'eyebrow' => 'Custom Design', 'lead' => "Rancang furniture sesuai kebutuhan: pilih model, ukuran, material, dan finishing dalam beberapa langkah."])
    @include($v . '.sections.custom-design')
@endsection
