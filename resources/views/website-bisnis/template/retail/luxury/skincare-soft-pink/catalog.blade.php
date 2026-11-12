@extends($ns . '.layouts.app')

@section('title', 'Katalog Produk - '.$cfg['brand']['name'])
@section('page', 'catalog')

@section('content')
    @include($ns . '.partials.page-hero', ['title' => 'Katalog Produk', 'lead' => 'Jelajahi seluruh koleksi skincare dan beauty premium '.$cfg['brand']['name'].'.'])

    <div class="container stack stack--page">
        @include($ns . '.sections.catalog', ['full' => true])
    </div>
@endsection
