@extends('website-bisnis.template.transportation&logistics.corporate.logistics-company-classic-trust.layouts.app')

@section('title', 'Nusa AI — FAQ Pengiriman & Logistik')
@section('body_class', 'page-ai')

@section('content')
@php
    $vb = 'website-bisnis.template.transportation&logistics.corporate.logistics-company-classic-trust.';
    $c = config('template.transportation&logistics.corporate.logistics-company-classic-trust.logistics-company');
    $img = fn ($f) => asset($c['assets']['images'] . $f);
    $route = fn ($n) => route($c['route_prefix'] . $n);
@endphp

@include($vb . 'partials.page-hero', ['pageKey' => 'ai-chatbot'])

<section class="section">
    <div class="container ai-layout">
        <div class="ai-layout__chat">
            @include($vb . 'partials.chat-window', ['chatClosable' => false])
        </div>
        <div class="ai-layout__faq">
            <h2 class="card__title">Pertanyaan yang sering diajukan</h2>
            <p class="card__sub">Pilih pertanyaan atau tanyakan langsung kepada Nusa AI.</p>
            <div class="faq">
                @foreach ($c['chatbot']['faqs'] as $f)
                    <details class="faq__item">
                        <summary>{{ $f['q'] }}<svg class="ic" aria-hidden="true"><use href="#i-plus"/></svg></summary>
                        <div class="faq__a">
                            <p>{{ $f['a'] }}</p>
                            @foreach ($f['actions'] as $ac)
                                <a class="link-arrow" href="{{ $route($ac['route']) }}">{{ $ac['label'] }}<svg class="ic ic--xs" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
                            @endforeach
                        </div>
                    </details>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
