@extends('website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.layouts.app')

@section('title', 'Project Gallery')

@section('content')
    @php
        $f = $furniture;
        $v = 'website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.sections';
    @endphp

    @include($v . '.page-header', [
        'pageTitle' => $f['gallery']['title'],
        'pageText'  => $f['gallery']['text'],
        'pageImage' => $f['paths']['images'] . '/gal-2.jpg',
        'pageCrumb' => 'Project Gallery',
    ])

    @include($v . '.gallery-detail')
@endsection
