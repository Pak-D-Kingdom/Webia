@extends('website-bisnis.template.home-services.modern.laundry-baby-blue.layouts.laundry')

@section('title', 'BlueLaundry — Pakaian Bersih, Wangi, Rapi & Terawat')

@section('content')
    @include('website-bisnis.template.home-services.modern.laundry-baby-blue.sections.hero')

    <div class="lb-container lb-dash">
        <div class="lb-dash__svc">@include('website-bisnis.template.home-services.modern.laundry-baby-blue.sections.services', ['mode' => 'preview'])</div>

        <div class="lb-dash__row lb-dash__row--4">
            @include('website-bisnis.template.home-services.modern.laundry-baby-blue.sections.prices',     ['mode' => 'preview'])
            @include('website-bisnis.template.home-services.modern.laundry-baby-blue.sections.options',    ['mode' => 'preview'])
            @include('website-bisnis.template.home-services.modern.laundry-baby-blue.sections.turnaround', ['mode' => 'preview'])
            @include('website-bisnis.template.home-services.modern.laundry-baby-blue.sections.coverage',   ['mode' => 'preview'])
        </div>

        <div class="lb-dash__row lb-dash__row--3">
            @include('website-bisnis.template.home-services.modern.laundry-baby-blue.sections.steps',   ['mode' => 'preview'])
            @include('website-bisnis.template.home-services.modern.laundry-baby-blue.sections.hours',   ['mode' => 'preview'])
            @include('website-bisnis.template.home-services.modern.laundry-baby-blue.sections.inquiry', ['mode' => 'preview'])
        </div>

        <aside class="lb-dash__ai" aria-label="AI Laundry Assistant">
            @include('website-bisnis.template.home-services.modern.laundry-baby-blue.sections.chatbot', ['mode' => 'preview'])
            <div class="lb-dash__deco" aria-hidden="true">
                <span class="lb-bubble lb-bubble--d1"></span><span class="lb-bubble lb-bubble--d2"></span><span class="lb-bubble lb-bubble--d3"></span>
                <img src="{{ asset($laundry['assets']['img'] . '/basket-towels.webp') }}" alt="" width="408" height="288" loading="lazy">
            </div>
        </aside>
    </div>
@endsection
