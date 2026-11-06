@extends($ns . '.layouts.app')

@section('title', 'Daftar Harga - Belleza')
@section('page', 'price')

@section('content')
    @include($ns . '.partials.page-hero', ['title' => 'Daftar Harga', 'lead' => 'Bandingkan harga normal, harga Belleza, dan hemat tiap produk.'])

    <div class="container stack stack--page">
        @include($ns . '.sections.price', ['full' => true])
    </div>
@endsection
