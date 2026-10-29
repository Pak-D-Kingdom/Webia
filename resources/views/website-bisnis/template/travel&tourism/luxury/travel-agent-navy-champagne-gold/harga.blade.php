@extends($ns . '.layouts.app')

@section('title', 'Harga — GrandJourney')

@section('content')
    @include($ns . '.partials.page-header', ['title' => 'Harga', 'subtitle' => 'Harga transparan, sudah termasuk fasilitas terbaik di setiap paket.'])
    @include($ns . '.sections.prices', ['mode' => 'full'])
@endsection
