@extends('website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.layouts.app')

@section('title', 'Materials & Finishes')

@section('content')
    @php
        $f = $furniture;
        $v = 'website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.sections';
    @endphp

    @include($v . '.page-header', [
        'pageTitle' => $f['materials']['title'],
        'pageText'  => $f['materials']['text'],
        'pageImage' => $f['paths']['images'] . '/materials.jpg',
        'pageCrumb' => 'Materials & Finishes',
    ])

    @include($v . '.materials-detail')
@endsection
