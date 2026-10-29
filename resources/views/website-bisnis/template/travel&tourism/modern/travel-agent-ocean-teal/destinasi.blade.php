@extends($ns . '.layouts.app')

@section('title', 'Destinasi Populer – ' . $ta['brand']['name'])

@section('content')
    @include($ns . '.partials.page-hero', [
        'title' => 'Destinasi Populer',
        'lead'  => 'Jelajahi keindahan alam, budaya, dan destinasi eksotis di berbagai belahan dunia.',
        'image' => 'dest-labuan-bajo.jpg',
    ])
    @include($ns . '.sections.destinations', ['mode' => 'page'])
@endsection
