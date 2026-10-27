
@extends('website-bisnis.templates.beauty.ruby-luxe.layouts.app')

@section('title', 'Treatments | Ruby Luxe')

@section('content')
<section class="page-hero">
    <div class="container">
        <span class="eyebrow">PERSONALIZED BEAUTY CARE</span>
        <h1>Our <em>Treatments.</em></h1>
        <p>Explore thoughtful treatments designed around individual skincare needs.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="catalog-toolbar">
            <input type="search" id="catalogSearch"
                   placeholder="Search treatments..." aria-label="Cari treatment">

            <select id="catalogFilter" aria-label="Filter kategori">
                <option value="all">All Treatments</option>
                <option value="facial">Facial Care</option>
                <option value="advanced">Advanced Care</option>
                <option value="botanical">Botanical Care</option>
            </select>
        </div>

        @php
            $items = [
                ['Signature Facial','facial','A personalized facial ritual for everyday skin care.','signature-facial','photo-1570172619644-dfd03ed5d881'],
                ['Skin Renewal','advanced','A treatment plan tailored to your skin consultation.','skin-renewal','photo-1540555700478-4be289fbecef'],
                ['Botanical Ritual','botanical','A relaxing ritual inspired by botanical ingredients.','botanical-ritual','photo-1600334129128-685c5582fd35'],
                ['Deep Cleansing Facial','facial','A focused cleansing treatment based on skin needs.','deep-cleansing-facial','photo-1616394584738-fc6e612e71b9'],
                ['Personal Skin Consultation','advanced','Discuss your routine and treatment options with our team.','skin-consultation','photo-1556229010-6c3f2c9ca5f8'],
                ['Hydration Ritual','botanical','A skincare ritual focused on hydration and comfort.','hydration-ritual','photo-1608248543803-ba4f8c70ae0b'],
            ];
        @endphp

        <div class="card-grid" id="treatmentGrid">
            @foreach ($items as $item)
                <article class="beauty-card catalog-item"
                         data-category="{{ $item[1] }}"
                         data-search="{{ strtolower($item[0] . ' ' . $item[2]) }}">
                    <a class="card-image"
                       href="{{ url('/templates/ruby-luxe/treatments/' . $item[3]) }}">
                        <img src="https://images.unsplash.com/{{ $item[4] }}?auto=format&fit=crop&w=800&q=80"
                             alt="{{ $item[0] }}" loading="lazy">
                    </a>
                    <div class="card-body">
                        <span class="card-category">{{ strtoupper($item[1]) }} CARE</span>
                        <h3>{{ $item[0] }}</h3>
                        <p>{{ $item[2] }}</p>
                        <a class="text-link"
                           href="{{ url('/templates/ruby-luxe/treatments/' . $item[3]) }}">
                            View Details ↗
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
        <p class="empty-state" id="catalogEmpty" hidden>No treatments found.</p>
    </div>
</section>
@endsection
