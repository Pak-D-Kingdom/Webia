@php
    $active = 'price';
    $cfg ??= config('template.retail.organic.skincare-sage-green.skincare');
@endphp
@extends($cfg['view'] . 'layouts.app')

@section('title', str_replace('PureGlow', $cfg['brand']['name'], 'Daftar Harga — PureGlow'))
@section('description', str_replace('PureGlow', $cfg['brand']['name'], 'Daftar harga produk PureGlow lengkap dengan harga promo dan persentase hemat.'))

@section('content')
    @include($cfg['view'] . 'partials.page-head', [
        'eyebrow' => 'Harga Transparan',
        'title'   => 'Daftar Harga',
        'text'    => 'Bandingkan harga normal dan harga promo semua produk '.$cfg['brand']['name'].' dalam satu tempat.',
    ])
    @include($cfg['view'] . 'sections.price', ['full' => true])
@endsection
