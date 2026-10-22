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
    @php($m = $cafe['menu'])
    <section class="lm-menu lm-menu--page" aria-label="Daftar menu">
        {{-- Kategori hanya ada di halaman ini (tidak di beranda). Data: cafe.php → menu.categories --}}
        <div class="lm-tabsbar">
            <div class="lm-container">
                <div class="lm-tabs lm-tabs--center" role="group" aria-label="Kategori menu">
                    <button class="lm-tab is-active" type="button" data-filter="all" aria-pressed="true">Semua <small>{{ count($m['items']) }}</small></button>
                    @foreach ($m['categories'] as $key => $cat)
                        @php($n = count(array_filter($m['items'], fn ($i) => $i['category'] === $key)))
                        <button class="lm-tab" type="button" data-filter="{{ $key }}" aria-pressed="false">{{ $cat['label'] }} <small>{{ $n }}</small></button>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="lm-container lm-menu__groups">
            @foreach ($m['categories'] as $key => $cat)
                @php($rows = array_values(array_filter($m['items'], fn ($i) => $i['category'] === $key)))
                @if (count($rows) > 0)
                    <section class="lm-menu-group" id="menu-{{ $key }}" data-group="{{ $key }}" aria-labelledby="grup-{{ $key }}">
                        <header class="lm-menu-group__head">
                            <div class="lm-orn" aria-hidden="true"><svg class="i"><use href="#i-leaf"/></svg></div>
                            <p class="lm-eyebrow">{{ $cat['label'] }} &middot; {{ count($rows) }} Menu</p>
                            <h2 class="lm-title" id="grup-{{ $key }}">{{ $cat['title'] }}</h2>
                            <p class="lm-lead">{{ $cat['text'] }}</p>
                        </header>
                        <ul class="lm-products lm-products--all lm-products--detail">
                            @foreach ($rows as $item)
                                @include("$v.partials.product-card", ['item' => $item, 'detail' => true, 'catLabel' => $cat['label']])
                            @endforeach
                        </ul>
                    </section>
                @endif
            @endforeach
        </div>
    </section>

    {{-- Promo (banner) dan ajakan reservasi --}}
    <section class="lm-menu-promo" aria-label="Promo">
        <div class="lm-container">
            @include("$v.sections.promo-banner")
        </div>
    </section>

    @include("$v.sections.cta-reservasi")
@endsection
