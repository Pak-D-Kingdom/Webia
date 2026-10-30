@extends('website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.layouts.app')

@section('title', 'Furniture Catalog')

@section('content')
    @php
        $f = $furniture;
        $v = 'website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.sections';
    @endphp

    @include($v . '.page-header', [
        'pageTitle' => $f['catalog']['title'],
        'pageText'  => $f['catalog']['text'],
        'pageImage' => $f['paths']['images'] . '/catalog-side.jpg',
        'pageCrumb' => 'Furniture Catalog',
    ])

    @include($v . '.catalog-list')
@endsection
