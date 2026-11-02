@extends($ns . '.layouts.app')

@section('title', 'Booking Inquiry – ' . $ta['brand']['name'])

@section('content')
    @include($ns . '.partials.page-hero', [
        'title' => 'Booking Inquiry',
        'lead'  => 'Kirim pertanyaan atau permintaan booking Anda, tim kami siap membantu.',
        'image' => 'dest-bali.jpg',
    ])
    @include($ns . '.sections.inquiry', ['mode' => 'page'])
@endsection
