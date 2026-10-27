@extends($ns . '.layouts.app')

@section('title', 'Toko Online - Belleza')
@section('page', 'shop')

@section('content')
    @include($ns . '.partials.page-hero', ['title' => 'Toko Online', 'lead' => 'Belanja produk Belleza dan checkout praktis lewat WhatsApp.'])

    <div class="container stack stack--page">
        @include($ns . '.sections.ecommerce', ['full' => true])
    </div>
@endsection
