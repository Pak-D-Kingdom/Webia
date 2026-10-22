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
<<<<<<< HEAD
            @include($ns.'sections.booking', ['preview' => false])
=======
>>>>>>> webia/nabiila-fe
        </div>

        <aside class="detail__side" aria-label="Harga dan booking">
            @include($ns.'sections.price')
<<<<<<< HEAD
            <a class="btn btn--primary btn--block" href="#booking">Jadwalkan Viewing <svg class="i" aria-hidden="true"><use href="#i-calendar"/></svg></a>
=======
            @include($ns.'sections.booking', ['preview' => false, 'stack' => true])
>>>>>>> webia/nabiila-fe
        </aside>
    </div>

    @include($ns.'sections.cta')
@endsection
