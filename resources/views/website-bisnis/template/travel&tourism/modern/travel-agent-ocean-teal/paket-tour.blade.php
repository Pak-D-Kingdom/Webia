@extends($ns . '.layouts.app')

@section('title', 'Paket Tour Unggulan – ' . $ta['brand']['name'])

@section('content')
    @include($ns . '.partials.page-hero', [
        'title' => 'Paket Tour Unggulan',
        'lead'  => 'Pilihan paket tour terbaik dengan harga bersaing dan fasilitas lengkap.',
        'image' => 'pkg-labuan-bajo.jpg',
    ])
    @include($ns . '.sections.packages', ['mode' => 'page'])
@endsection
