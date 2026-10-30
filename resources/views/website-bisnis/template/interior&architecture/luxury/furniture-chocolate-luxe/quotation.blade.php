@extends('website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.layouts.app')

@section('title', 'Quotation Request')

@section('content')
    @php
        $f = $furniture;
        $v = 'website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.sections';
    @endphp

    @include($v . '.page-header', [
        'pageTitle' => $f['quotation']['title'],
        'pageText'  => $f['quotation']['text'],
        'pageImage' => $f['paths']['images'] . '/hero-living.jpg',
        'pageCrumb' => 'Quotation Request',
    ])

    @include($v . '.quotation-form')
@endsection
