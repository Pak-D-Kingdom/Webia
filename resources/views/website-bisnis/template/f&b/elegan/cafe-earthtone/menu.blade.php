{{-- Halaman MENU — daftar lengkap menu --}}
@php
    $v    = 'website-bisnis.template.f&b.elegan.cafe-earthtone';
    $cafe = config('template.f&b.elegan.cafe-earthtone.cafe');
    $img  = fn (string $file) => asset($cafe['assets']['images'].$file);
    $rp   = fn (int $n) => 'Rp '.number_format($n, 0, ',', '.');
    $wa   = fn (string $text = '') => 'https://wa.me/'.$cafe['contact']['whatsapp'].($text !== '' ? '?text='.rawurlencode($text) : '');
    // URL halaman: pakai route bila sudah terdaftar, kalau belum jatuh ke anchor biasa
    $url  = fn (string $page, string $anchor = '') => \Illuminate\Support\Facades\Route::has($cafe['route_prefix'].$page)
        ? route($cafe['route_prefix'].$page).$anchor
        : ($anchor !== '' ? $anchor : '#');
@endphp

@extends("$v.layouts.app")

@section('title', $cafe['menu']['title'].' | '.$cafe['brand']['title'])

@section('content')
    @include("$v.partials.page-header", ['title' => $cafe['menu']['title'], 'text' => $cafe['menu']['text'], 'current' => 'Menu'])

    <section class="lm-section lm-menu" aria-label="Daftar menu">
        <div class="lm-container">
            <ul class="lm-products lm-products--all">
                @foreach ($cafe['menu']['items'] as $item)
                    @include("$v.partials.product-card", ['item' => $item])
                @endforeach
            </ul>
        </div>
    </section>
@endsection
