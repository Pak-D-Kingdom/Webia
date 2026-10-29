@extends($ns . '.layouts.app')

@section('title', 'Galeri Foto – ' . $ta['brand']['name'])

@section('content')
    @include($ns . '.partials.page-hero', [
        'title' => 'Galeri Foto',
        'lead'  => 'Lihat momen indah dari perjalanan kami.',
        'image' => 'gallery-1.jpg',
    ])
    @include($ns . '.sections.gallery', ['mode' => 'page'])
@endsection
