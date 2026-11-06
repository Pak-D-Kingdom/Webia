@extends($ns . '.layouts.app')

@section('title', 'Katalog Produk - Belleza')
@section('page', 'catalog')

@section('content')
    @include($ns . '.partials.page-hero', ['title' => 'Katalog Produk', 'lead' => 'Jelajahi seluruh koleksi skincare dan beauty premium Belleza.'])

    <div class="container stack stack--page">
        @include($ns . '.sections.catalog', ['full' => true])
    </div>
@endsection
