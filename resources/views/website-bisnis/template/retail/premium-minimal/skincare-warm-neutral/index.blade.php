@extends($ns . '.layouts.app')

@section('title', $skin['name'] . ' — ' . $skin['tagline'])

@section('content')
    @include($ns . '.sections.hero')
    @include($ns . '.sections.category-bar')

    <div class="container home-grid">
        <aside class="home-grid__left">
            @include($ns . '.sections.sidebar')
        </aside>

        <div class="home-grid__main">
            @include($ns . '.sections.catalog-preview')
        </div>

        <aside class="home-grid__right">
            @include($ns . '.sections.side-banner')
            @include($ns . '.sections.ai-faq')
        </aside>
    </div>

    @include($ns . '.sections.price-preview')
    @include($ns . '.sections.stock-preview')
    @include($ns . '.sections.inquiry-preview')
    @include($ns . '.sections.cart-preview')
@endsection
