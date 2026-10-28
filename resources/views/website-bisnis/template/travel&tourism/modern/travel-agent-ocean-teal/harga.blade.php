@extends($ns . '.layouts.app')

@section('title', 'Harga Paket – ' . $ta['brand']['name'])

@section('content')
    @include($ns . '.partials.page-hero', [
        'title' => 'Harga Paket',
        'lead'  => 'Pilih paket sesuai budget dan kebutuhan Anda.',
        'image' => 'dest-maldives.jpg',
    ])
    @include($ns . '.sections.prices', ['mode' => 'page'])
@endsection
