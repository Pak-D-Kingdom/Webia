@php
    $active = 'stock';
    $cfg ??= config('template.retail.organic.skincare-sage-green.skincare');
@endphp
@extends($cfg['view'] . 'layouts.app')

@section('title', str_replace('PureGlow', $cfg['brand']['name'], 'Ketersediaan Stok — PureGlow'))
@section('description', str_replace('PureGlow', $cfg['brand']['name'], 'Cek ketersediaan stok produk PureGlow sebelum memesan.'))

@section('content')
    @include($cfg['view'] . 'partials.page-head', [
        'eyebrow' => 'Stock / Availability',
        'title'   => 'Ketersediaan Stok',
        'text'    => 'Pantau produk yang tersedia, terbatas, atau sedang habis. Minta dikabari saat produk kembali ready.',
    ])
    @include($cfg['view'] . 'sections.stock', ['full' => true])
@endsection
