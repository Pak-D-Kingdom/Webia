@extends($ns.'layouts.app')

@section('content')
    @include($ns.'sections.hero')

    <div class="container home">
        <div class="home__main">
            <div class="home__row home__row--a">
                @include($ns.'sections.properties', ['preview' => true, 'limit' => 3])
                @include($ns.'sections.gallery', ['preview' => true])
            </div>
            <div class="home__row home__row--b">
                @include($ns.'sections.specification', ['preview' => true])
                @include($ns.'sections.location')
                @include($ns.'sections.price', ['preview' => true])
            </div>
        </div>

        <aside class="home__side" aria-label="Harga, booking dan inquiry">
            @include($ns.'sections.price-start')
            @include($ns.'sections.booking', ['preview' => true])
            @include($ns.'sections.inquiry')
        </aside>
    </div>

    <div class="container home__extra">
        @include($ns.'sections.about', ['preview' => true])
        @include($ns.'sections.blog', ['preview' => true, 'limit' => 3])
    </div>

    @include($ns.'sections.cta')
@endsection
