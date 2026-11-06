@extends($ns . '.layouts.app')

@section('title', 'Stok & Ketersediaan - Belleza')
@section('page', 'stock')

@section('content')
    @include($ns . '.partials.page-hero', ['title' => 'Stok & Ketersediaan', 'lead' => 'Pantau sisa stok produk agar pesanan Anda tidak kehabisan.'])

    <div class="container stack stack--page">
        @include($ns . '.sections.stock', ['full' => true])
    </div>
@endsection
