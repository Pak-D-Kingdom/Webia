@extends($ns.'layouts.app')

@section('title', $property['name'].' — '.$t['brand']['name'])

@section('content')
    @php
        $loc = [
            'address' => $property['address'],
            'embed'   => $property['maps_embed'],
            'url'     => 'https://www.google.com/maps/search/?api=1&query='.rawurlencode($property['address']),
        ];
    @endphp

    @include($ns.'partials.page-header', [
        'title'       => $property['name'],
        'desc'        => $property['city'],
        'parent'      => ['label' => 'Property Listing', 'url' => $r('properties')],
        'headerImage' => $property['image'],
    ])

    <div class="container page detail">
        <div class="detail__main">
            @include($ns.'sections.gallery', ['preview' => false, 'titled' => true, 'items' => $property['gallery']])
            @include($ns.'sections.specification')
            @include($ns.'sections.location', ['loc' => $loc])
        </div>

        <aside class="detail__side" aria-label="Harga dan booking">
            @include($ns.'sections.price')
            @include($ns.'sections.booking', ['preview' => false, 'stack' => true])
        </aside>
    </div>

    @include($ns.'sections.cta')
@endsection
