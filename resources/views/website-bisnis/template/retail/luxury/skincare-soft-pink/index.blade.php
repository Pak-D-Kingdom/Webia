@extends($ns . '.layouts.app')

@section('title', 'Belleza - Timeless Beauty for a Brighter You')
@section('page', 'home')

@section('content')
    @include($ns . '.sections.hero')
    @include($ns . '.sections.categories')

    <div class="container home-main">
        @include($ns . '.sections.promo-side')
        @include($ns . '.sections.catalog')
        @include($ns . '.sections.ai-faq')
    </div>

    @include($ns . '.sections.services')

    <div class="container stack">
        @include($ns . '.sections.price')
        @include($ns . '.sections.stock')
        @include($ns . '.sections.inquiry')
        @include($ns . '.sections.ecommerce')
    </div>
@endsection
