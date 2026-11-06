@extends($ns . '.layouts.app')

@section('title', 'Inquiry - Belleza')
@section('page', 'inquiry')

@section('content')
    @include($ns . '.partials.page-hero', ['title' => 'Inquiry', 'lead' => 'Kirim pertanyaan produk, stok, harga, atau kerja sama langsung ke WhatsApp kami.'])

    <div class="container stack stack--page">
        @include($ns . '.sections.inquiry', ['full' => true])
    </div>
@endsection
