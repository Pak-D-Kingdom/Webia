
@extends('website-bisnis.templates.beauty.ruby-luxe.layouts.app')

@section('title', 'Our Story | Ruby Luxe')

@section('content')
<section class="page-hero">
    <div class="container">
        <span class="eyebrow">THE STORY BEHIND THE RITUAL</span>
        <h1>Beauty with <em>intention.</em></h1>
        <p>Discover the philosophy behind Ruby Luxe Organic Beauty.</p>
    </div>
</section>

<section class="section">
    <div class="container story-grid">
        <div class="story-image">
            <img src="https://images.unsplash.com/photo-1608248543803-ba4f8c70ae0b?auto=format&fit=crop&w=1000&q=85"
                 alt="Produk perawatan kulit Ruby Luxe">
        </div>
        <div class="story-content">
            <span class="eyebrow">OUR PHILOSOPHY</span>
            <h2>Thoughtful care.<br><em>Natural inspiration.</em></h2>
            <p>
                Ruby Luxe is a concept for personalized beauty care
                inspired by the thoughtful use of skincare products,
                professional guidance, and everyday self-care rituals.
            </p>
            <p>
                Our goal is to help every guest explore a routine
                that feels appropriate for their individual needs.
            </p>
            <a href="{{ url('/templates/ruby-luxe/treatments') }}"
               class="button button-primary">Explore Treatments ↗</a>
        </div>
    </div>
</section>
@endsection
