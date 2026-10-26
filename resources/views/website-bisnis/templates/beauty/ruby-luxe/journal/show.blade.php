
@extends('website-bisnis.templates.beauty.ruby-luxe.layouts.app')

@php
    $slug = request()->route('slug');
    $articleTitle = ucwords(str_replace('-', ' ', $slug ?? 'skincare-routine'));
@endphp

@section('title', $articleTitle . ' | Ruby Luxe Journal')

@section('content')
<article class="section">
    <div class="container article-container">
        <a href="{{ url('/templates/ruby-luxe/journal') }}" class="text-link">
            ← Back to Journal
        </a>

        <span class="eyebrow">RUBY LUXE JOURNAL</span>
        <h1>{{ $articleTitle }}</h1>
        <p class="article-lead">
            A thoughtful guide to learning more about skincare and
            building a routine that fits your individual needs.
        </p>

        <div class="article-cover"><span>RUBY LUXE · BEAUTY JOURNAL</span></div>

        <div class="article-body">
            <h2>Start with understanding your skin</h2>
            <p>
                Skincare needs vary from person to person. Consider your
                current routine, skin sensitivities, and personal goals
                before introducing new products or treatments.
            </p>

            <h2>Choose products thoughtfully</h2>
            <p>
                Read product labels, follow directions, and consult a
                qualified professional if you have questions about
                ingredients or treatment suitability.
            </p>

            <h2>Build a consistent routine</h2>
            <p>
                Introduce products gradually and monitor how your skin
                responds. Individual results can vary.
            </p>
        </div>

        <a href="{{ url('/templates/ruby-luxe/booking') }}"
           class="button button-primary">Talk to Our Team ↗</a>
    </div>
</article>
@endsection
