
@extends('website-bisnis.templates.beauty.ruby-luxe.layouts.app')

@php
    $slug = request()->route('slug');
    $productName = ucwords(str_replace('-', ' ', $slug ?? 'botanical-cleanser'));
@endphp

@section('title', $productName . ' | Ruby Luxe')

@section('content')
<section class="section">
    <div class="container detail-grid">
        <div class="detail-image">
            <img src="https://images.unsplash.com/photo-1608248543803-ba4f8c70ae0b?auto=format&fit=crop&w=1000&q=85"
                 alt="{{ $productName }}">
        </div>

        <div class="detail-content">
            <span class="eyebrow">THE SKINCARE EDIT</span>
            <h1>{{ $productName }}</h1>
            <p>
                Discover the product and its ingredients, directions for use,
                and suitability for your skincare routine.
            </p>

            <div class="detail-facts">
                <div><span>Price</span><strong>Price to be configured</strong></div>
                <div><span>Availability</span><strong>Check with our team</strong></div>
            </div>

            <form action="{{ url('/templates/ruby-luxe/cart') }}" method="GET">
                <input type="hidden" name="product" value="{{ $slug }}">
                <label for="quantity">Quantity</label>
                <input id="quantity" class="quantity-input" type="number"
                       name="quantity" value="1" min="1" max="99">
                <button type="submit" class="button button-primary">
                    Add to Cart ↗
                </button>
            </form>

            <p class="disclaimer">
                Demo product page. A real cart requires persistent cart storage,
                product pricing, stock validation, and checkout logic.
            </p>
        </div>
    </div>
</section>
@endsection
