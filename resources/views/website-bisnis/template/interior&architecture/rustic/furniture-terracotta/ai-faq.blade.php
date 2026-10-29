@extends('website-bisnis.template.interior&architecture.rustic.furniture-terracotta.layouts.app')
@php
    $f    = config('template.interior&architecture.rustic.furniture-terracotta.furniture');
    $v    = 'website-bisnis.template.interior&architecture.rustic.furniture-terracotta';
    $r    = fn ($n) => route($f['route_prefix'] . $n);
    $img  = fn ($n) => asset($f['assets']['img'] . '/' . $n);
    $icon = fn ($n, $c = '') => view($v . '.partials.icon', ['name' => $n, 'class' => $c])->render();
    $wa   = 'https://wa.me/' . $f['contact']['whatsapp'] . '?text=' . rawurlencode($f['contact']['whatsapp_greeting']);
@endphp
@section('title', 'AI Chatbot — FAQ Produk & Custom')
@section('page', 'ai-faq')
@section('content')
    @include($v . '.partials.page-header', ['title' => 'AI Chatbot — FAQ Produk & Custom', 'eyebrow' => 'AI FAQ', 'lead' => "Jawaban cepat seputar produk, material, dan desain custom. Masih ragu? Tanya Rudi."])
    @include($v . '.sections.ai-faq')
@endsection
