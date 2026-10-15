{{--
    The Lumière Café & Kitchen — Template F&B · Elegan · Cafe Earthtone
    Halaman satu layar (one-page). Seluruh data ada di:
    config/template/f&b/elegan/cafe-earthtone/cafe.php
--}}
@php
    $v    = 'website-bisnis.template.f&b.elegan.cafe-earthtone';
    $cafe = config('template.f&b.elegan.cafe-earthtone.cafe');
    $img  = fn (string $file) => asset($cafe['assets']['images'].$file);
    $rp   = fn (int $n) => 'Rp '.number_format($n, 0, ',', '.');
    $wa   = fn (string $text = '') => 'https://wa.me/'.$cafe['contact']['whatsapp'].($text !== '' ? '?text='.rawurlencode($text) : '');
@endphp

@extends("$v.layouts.app")

@section('content')
    @include("$v.sections.hero")
    @include("$v.sections.features")
    @include("$v.sections.menu")

    <section class="lm-info" aria-label="Informasi kafe">
        <div class="lm-container lm-info__grid">
            @include("$v.sections.about")
            @include("$v.sections.hours")
            @include("$v.sections.location")
            @include("$v.sections.booking")
            @include("$v.sections.whatsapp")
        </div>
    </section>

    <section class="lm-lower" aria-label="Promo dan pertanyaan umum">
        <div class="lm-container lm-lower__grid">
            @include("$v.sections.promo-banner")
            @include("$v.sections.faq")
        </div>
    </section>
@endsection
