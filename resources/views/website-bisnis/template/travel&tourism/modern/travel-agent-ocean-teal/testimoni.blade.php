@extends($ns . '.layouts.app')

@section('title', 'Testimoni Pelanggan – ' . $ta['brand']['name'])

@section('content')
    @include($ns . '.partials.page-hero', [
        'title' => 'Testimoni Pelanggan',
        'lead'  => 'Kesan dari traveler yang sudah merasakan pengalaman bersama kami.',
        'image' => 'dest-swiss.jpg',
    ])
    @include($ns . '.sections.testimonials', ['mode' => 'page'])
@endsection
