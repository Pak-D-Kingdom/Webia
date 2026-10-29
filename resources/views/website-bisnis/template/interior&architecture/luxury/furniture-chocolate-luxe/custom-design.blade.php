@extends('website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.layouts.app')

@section('title', 'Custom Design Options')

@section('content')
    @php
        $f = $furniture;
        $v = 'website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.sections';
    @endphp

    @include($v . '.page-header', [
        'pageTitle' => $f['custom_design']['title'],
        'pageText'  => $f['custom_design']['text'],
        'pageImage' => $f['paths']['images'] . '/custom-sketch.jpg',
        'pageCrumb' => 'Custom Design Options',
    ])

    @include($v . '.custom-design-detail')
@endsection
