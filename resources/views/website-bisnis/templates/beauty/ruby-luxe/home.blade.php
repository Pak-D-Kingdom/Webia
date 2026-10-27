
@extends('website-bisnis.templates.beauty.ruby-luxe.layouts.app')

@section('title', 'Ruby Luxe | Organic Beauty & Skincare')
@section('meta_description', 'Explore organic-inspired skincare, personalized beauty treatments, and appointment booking at Ruby Luxe.')

@section('content')
<section class="ruby-hero">
    <div class="container hero-grid">
        <div class="hero-content">
            <span class="eyebrow">
                <span class="eyebrow-line"></span>
                THE ART OF NATURAL BEAUTY
            </span>

            <h1>
                Beauty in<br>
                <em>every ritual.</em>
            </h1>

            <p>
                Discover a more thoughtful approach to skincare,
                where nature-inspired rituals meet personalized beauty care.
            </p>

            <div class="hero-actions">
                <a href="{{ url('/templates/ruby-luxe/treatments') }}"
                   class="button button-primary">
                    Explore Treatments <span>↗</span>
                </a>

                <a href="{{ url('/templates/ruby-luxe/about') }}"
                   class="text-link">
                    Discover Our Story
                </a>
            </div>

            <div class="hero-note">
                <span>✦</span>
                Thoughtful care. Your natural radiance.
            </div>
        </div>

        <div class="hero-visual">
            <img
                src="https://images.unsplash.com/photo-1608248543803-ba4f8c70ae0b?auto=format&fit=crop&w=1000&q=85"
                alt="Produk skincare dalam suasana elegan">

            <div class="hero-image-label">
                <small>THE RUBY LUXE EDIT</small>
                <strong>Your moment of care.</strong>
            </div>

            <span class="hero-decoration">R.</span>
        </div>
    </div>
</section>

<section class="benefit-strip">
    <div class="container benefit-grid">
        <div><span>01</span><p>Personalized Care</p></div>
        <div><span>02</span><p>Thoughtful Ingredients</p></div>
        <div><span>03</span><p>Professional Guidance</p></div>
        <div><span>04</span><p>Beauty Rituals</p></div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-heading">
            <div>
                <span class="eyebrow">A RITUAL FOR EVERY YOU</span>
                <h2>Discover your<br><em>beauty ritual.</em></h2>
            </div>

            <a href="{{ url('/templates/ruby-luxe/treatments') }}"
               class="text-link">View All Treatments ↗</a>
        </div>

        <div class="card-grid">
            @php
                $treatments = [
                    [
                        'name' => 'Signature Facial',
                        'category' => 'FACIAL CARE',
                        'description' => 'A thoughtful facial ritual tailored to your skin needs.',
                        'image' => 'photo-1570172619644-dfd03ed5d881',
                        'slug' => 'signature-facial'
                    ],
                    [
                        'name' => 'Skin Renewal',
                        'category' => 'ADVANCED CARE',
                        'description' => 'Personalized care for a refreshed-looking complexion.',
                        'image' => 'photo-1540555700478-4be289fbecef',
                        'slug' => 'skin-renewal'
                    ],
                    [
                        'name' => 'Botanical Ritual',
                        'category' => 'ORGANIC INSPIRED',
                        'description' => 'A calming treatment inspired by botanical ingredients.',
                        'image' => 'photo-1600334129128-685c5582fd35',
                        'slug' => 'botanical-ritual'
                    ],
                ];
            @endphp

            @foreach ($treatments as $treatment)
                <article class="beauty-card">
                    <a href="{{ url('/templates/ruby-luxe/treatments/' . $treatment['slug']) }}"
                       class="card-image">
                        <img
                            src="https://images.unsplash.com/{{ $treatment['image'] }}?auto=format&fit=crop&w=800&q=80"
                            alt="{{ $treatment['name'] }}">
                        <span class="image-arrow">↗</span>
                    </a>

                    <div class="card-body">
                        <span class="card-category">{{ $treatment['category'] }}</span>
                        <h3>{{ $treatment['name'] }}</h3>
                        <p>{{ $treatment['description'] }}</p>
                        <a href="{{ url('/templates/ruby-luxe/treatments/' . $treatment['slug']) }}"
                           class="text-link">Explore Treatment ↗</a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="story-section">
    <div class="container story-grid">
        <div class="story-image">
            <img
                src="https://images.unsplash.com/photo-1611930022073-b7a4ba5fcccd?auto=format&fit=crop&w=1000&q=85"
                alt="Produk perawatan kulit dan bahan alami">
        </div>

        <div class="story-content">
            <span class="eyebrow">OUR BEAUTY PHILOSOPHY</span>
            <h2>Nature inspires.<br><em>Care transforms.</em></h2>
            <p>
                We believe beauty begins with understanding your own skin.
                Our approach combines thoughtful skincare choices,
                professional guidance, and rituals made for you.
            </p>

            <a href="{{ url('/templates/ruby-luxe/about') }}"
               class="button button-dark">Read Our Story ↗</a>
        </div>
    </div>
</section>

<section class="section products-preview">
    <div class="container">
        <div class="section-heading">
            <div>
                <span class="eyebrow">YOUR DAILY ESSENTIALS</span>
                <h2>Care beyond<br><em>the treatment room.</em></h2>
            </div>

            <a href="{{ url('/templates/ruby-luxe/products') }}"
               class="text-link">Explore Skincare ↗</a>
        </div>

        <div class="product-feature">
            <div class="product-feature-copy">
                <span class="eyebrow">THE SKINCARE EDIT</span>
                <h3>Your routine.<br>Your <em>own rhythm.</em></h3>
                <p>
                    Explore skincare essentials and learn how to build
                    a routine that fits your individual needs.
                </p>
                <a href="{{ url('/templates/ruby-luxe/products') }}"
                   class="button button-primary">Shop the Collection ↗</a>
            </div>

            <div class="product-feature-image">
                <img
                    src="https://images.unsplash.com/photo-1608248543803-ba4f8c70ae0b?auto=format&fit=crop&w=900&q=85"
                    alt="Koleksi produk skincare">
            </div>
        </div>
    </div>
</section>

<section class="booking-banner">
    <div class="container booking-banner-inner">
        <div>
            <span class="eyebrow">YOUR NEXT CHAPTER STARTS HERE</span>
            <h2>A little time<br><em>just for you.</em></h2>
            <p>Book a consultation and discover a ritual that fits your needs.</p>
        </div>

        <a href="{{ url('/templates/ruby-luxe/booking') }}"
           class="button button-light">Book Your Appointment ↗</a>
    </div>
</section>
@endsection
