@extends('website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.layouts.app')

@section('title', 'Product Dimensions')

@section('content')
    @php
        $f = $furniture;
        $v = 'website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.sections';
    @endphp

    @include($v . '.page-header', [
        'pageTitle' => $f['dimensions']['title'],
        'pageText'  => $f['dimensions']['text'],
        'pageImage' => $f['paths']['images'] . '/footer-room.jpg',
        'pageCrumb' => 'Product Dimensions',
    ])

    @include($v . '.dimensions-detail')
@endsection
