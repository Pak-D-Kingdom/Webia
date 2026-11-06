@php
    $active = 'shop';
    $cfg = config('template.retail.organic.skincare-sage-green.skincare');
@endphp
@extends($cfg['view'] . 'layouts.app')

@section('title', 'Belanja Online — PureGlow')
@section('description', 'Belanja produk PureGlow secara online. Checkout cepat lewat WhatsApp.')

@section('content')
    @include($cfg['view'] . 'partials.page-head', [
        'eyebrow' => 'E-commerce',
        'title'   => 'Belanja Online',
        'text'    => 'Masukkan produk favoritmu ke keranjang, lalu selesaikan pesanan dengan mudah lewat WhatsApp.',
    ])
    @include($cfg['view'] . 'sections.shop', ['full' => true])
@endsection
