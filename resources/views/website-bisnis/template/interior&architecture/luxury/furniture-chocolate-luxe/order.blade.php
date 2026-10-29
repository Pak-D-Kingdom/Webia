@extends('website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.layouts.app')

@section('title', 'Custom Order Form')

@section('content')
    @php
        $f = $furniture;
        $v = 'website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.sections';
    @endphp

    @include($v . '.page-header', [
        'pageTitle' => $f['order']['title'],
        'pageText'  => $f['order']['text'],
        'pageImage' => $f['paths']['images'] . '/order-bg.jpg',
        'pageCrumb' => 'Custom Order Form',
    ])

    @include($v . '.order-form')
@endsection
