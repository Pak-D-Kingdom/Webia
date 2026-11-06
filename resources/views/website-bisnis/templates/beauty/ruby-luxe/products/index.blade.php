
@extends('website-bisnis.templates.beauty.ruby-luxe.layouts.app')

@section('title', 'Organic Skincare Shop | Ruby Luxe')

@section('content')
<section class="page-hero">
    <div class="container">
        <span class="eyebrow">THE DAILY SKINCARE EDIT</span>
        <h1>Shop <em>Skincare.</em></h1>
        <p>Explore skincare essentials for your everyday routine.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="catalog-toolbar">
            <input type="search" id="catalogSearch"
                   placeholder="Search products..." aria-label="Cari produk">
            <select id="catalogFilter" aria-label="Filter kategori produk">
                <option value="all">All Products</option>
                <option value="cleanser">Cleanser</option>
                <option value="serum">Serum</option>
                <option value="moisturizer">Moisturizer</option>
            </select>
        </div>

        @php
            $products = [
                ['Botanical Cleanser','cleanser','A gentle daily cleansing essential.','botanical-cleanser','photo-1608248543803-ba4f8c70ae0b'],
                ['Radiance Serum','serum','A serum to complement your skincare routine.','radiance-serum','photo-1601049541289-9b1b7bbbfe19'],
                ['Daily Moisturizer','moisturizer','A daily moisturizer for a comfortable skin feel.','daily-moisturizer','photo-1556229010-6c3f2c9ca5f8'],
            ];
        @endphp

        <div class="card-grid" id="productGrid">
            @foreach ($products as $product)
                <article class="beauty-card catalog-item"
                         data-category="{{ $product[1] }}"
                         data-search="{{ strtolower($product[0] . ' ' . $product[2]) }}">
                    <a class="card-image"
                       href="{{ url('/templates/ruby-luxe/products/' . $product[3]) }}">
                        <img src="https://images.unsplash.com/{{ $product[4] }}?auto=format&fit=crop&w=800&q=80"
                             alt="{{ $product[0] }}" loading="lazy">
                    </a>
                    <div class="card-body">
                        <span class="card-category">{{ strtoupper($product[1]) }}</span>
                        <h3>{{ $product[0] }}</h3>
                        <p>{{ $product[2] }}</p>
                        <a class="text-link"
                           href="{{ url('/templates/ruby-luxe/products/' . $product[3]) }}">
                            View Product ↗
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
        <p class="empty-state" id="catalogEmpty" hidden>No products found.</p>
    </div>
</section>
@endsection
