{{-- Halaman RESERVASI — form reservasi meja --}}
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

@section('title', $cafe['booking']['title'].' | '.$cafe['brand']['title'])

@section('content')
    @include("$v.partials.page-header", ['title' => $cafe['booking']['title'], 'text' => $cafe['booking']['text'], 'current' => 'Reservasi'])

    <section class="lm-section lm-reserve" aria-label="Form reservasi">
        <div class="lm-container lm-reserve__grid">
            <div class="lm-reserve__main">
                @include("$v.sections.reservation-form")
            </div>
            <aside class="lm-reserve__side" aria-label="Informasi reservasi">
                @include("$v.sections.reservation-info")
                @include("$v.sections.hours")
            </aside>
        </div>
    </section>

    @include("$v.sections.features")
@endsection
