@php
    $active = 'catalog';
    $cfg = config('template.retail.organic.skincare-sage-green.skincare');
@endphp
@extends($cfg['view'] . 'layouts.app')

@section('title', 'Katalog Produk — PureGlow')
@section('description', 'Katalog lengkap produk skincare, makeup, hair care, body care, dan fragrance PureGlow.')

@section('content')
    @include($cfg['view'] . 'partials.page-head', [
        'eyebrow' => 'Katalog Produk',
        'title'   => 'Katalog Produk',
        'text'    => 'Temukan perawatan alami yang cocok untuk kulitmu. Filter berdasarkan kategori, cari nama produk, atau urutkan sesuai kebutuhan.',
    ])
    @include($cfg['view'] . 'sections.catalog', ['full' => true])
@endsection
