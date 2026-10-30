@extends('website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.layouts.app')

@section('title', 'Production Lead Time')

@section('content')
    @php
        $f = $furniture;
        $v = 'website-bisnis.template.interior&architecture.luxury.furniture-chocolate-luxe.sections';
    @endphp

    @include($v . '.page-header', [
        'pageTitle' => $f['lead_time']['title'],
        'pageText'  => $f['lead_time']['text'],
        'pageImage' => $f['paths']['images'] . '/gal-3.jpg',
        'pageCrumb' => 'Production Lead Time',
    ])

    @include($v . '.lead-time-detail')
@endsection
