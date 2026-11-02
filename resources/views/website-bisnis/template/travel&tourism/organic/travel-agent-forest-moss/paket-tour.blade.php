@extends($ns . '.layouts.app')
@section('title', 'Paket Tour')
@section('page', 'paket-tour')
@section('content')
    @include($ns . '.partials.page-header', ['title' => 'Paket Tour', 'subtitle' => 'Pilih paket tour terbaik dengan itinerary yang sudah dirancang khusus untuk pengalaman tak terlupakan.'])
    @include($ns . '.sections.packages')
@endsection
