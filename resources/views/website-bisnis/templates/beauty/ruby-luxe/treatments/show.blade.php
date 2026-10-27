
@extends('website-bisnis.templates.beauty.ruby-luxe.layouts.app')

@php
    $slug = request()->route('slug');
    $treatmentName = ucwords(str_replace('-', ' ', $slug ?? 'signature-facial'));
@endphp

@section('title', $treatmentName . ' | Ruby Luxe')

@section('content')
<section class="section">
    <div class="container detail-grid">
        <div class="detail-image">
            <img src="https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?auto=format&fit=crop&w=1000&q=85"
                 alt="{{ $treatmentName }}">
        </div>
        <div class="detail-content">
            <span class="eyebrow">RUBY LUXE TREATMENT</span>
            <h1>{{ $treatmentName }}</h1>
            <p>
                Every treatment begins with understanding your individual
                needs. Our team can help you explore suitable options
                during a consultation.
            </p>

            <div class="detail-facts">
                <div><span>Duration</span><strong>To be confirmed</strong></div>
                <div><span>Price</span><strong>Contact our team</strong></div>
                <div><span>Availability</span><strong>By appointment</strong></div>
            </div>

            <a class="button button-primary"
               href="{{ url('/templates/ruby-luxe/booking?treatment=' . ($slug ?? 'signature-facial')) }}">
                Book This Treatment ↗
            </a>
            <p class="disclaimer">
                Treatment details and prices are sample content and should
                be confirmed by the clinic.
            </p>
        </div>
    </div>
</section>
@endsection
