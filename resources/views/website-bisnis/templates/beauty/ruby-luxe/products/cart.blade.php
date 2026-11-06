
@extends('website-bisnis.templates.beauty.ruby-luxe.layouts.app')

@section('title', 'Shopping Cart | Ruby Luxe')

@section('content')
<section class="page-hero">
    <div class="container">
        <span class="eyebrow">YOUR SELECTION</span>
        <h1>Shopping <em>Cart.</em></h1>
        <p>Review your skincare selection before proceeding.</p>
    </div>
</section>

<section class="section">
    <div class="container cart-panel">
        <div>
            <h2>Your cart</h2>
            <p>
                This is the cart interface placeholder. Connect it to your
                session or database cart to display actual products and totals.
            </p>
        </div>
        <a href="{{ url('/templates/ruby-luxe/products') }}"
           class="button button-dark">Continue Shopping</a>
    </div>
</section>
@endsection
