@extends($ns . '.layouts.app')
@section('title', 'Harga Paket')
@section('page', 'harga')
@section('content')
    @include($ns . '.partials.page-header', ['title' => 'Harga Paket', 'subtitle' => 'Harga transparan dan sudah termasuk semua fasilitas terbaik.'])
    @include($ns . '.sections.prices')
@endsection
