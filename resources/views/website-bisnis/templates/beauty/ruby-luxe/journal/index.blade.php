
@extends('website-bisnis.templates.beauty.ruby-luxe.layouts.app')

@section('title', 'Beauty Journal | Ruby Luxe')

@section('content')
<section class="page-hero">
    <div class="container">
        <span class="eyebrow">NOTES ON SKIN & SELF-CARE</span>
        <h1>The Beauty <em>Journal.</em></h1>
        <p>Thoughtful reads for your everyday skincare journey.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="card-grid">
            @php
                $articles = [
                    ['Building a Simple Skincare Routine','SKINCARE BASICS','A practical starting point for understanding your daily skincare steps.','skincare-routine'],
                    ['Understanding Botanical Ingredients','INGREDIENTS','Learn how to read product ingredient information more thoughtfully.','botanical-ingredients'],
                    ['Preparing for Your First Facial','TREATMENT GUIDE','What to discuss with your skincare professional before a treatment.','first-facial'],
                ];
            @endphp

            @foreach ($articles as $article)
                <article class="beauty-card">
                    <div class="journal-placeholder"><span>R.</span></div>
                    <div class="card-body">
                        <span class="card-category">{{ $article[1] }}</span>
                        <h3>{{ $article[0] }}</h3>
                        <p>{{ $article[2] }}</p>
                        <a class="text-link"
                           href="{{ url('/templates/ruby-luxe/journal/' . $article[3]) }}">
                            Read Article ↗
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endsection
