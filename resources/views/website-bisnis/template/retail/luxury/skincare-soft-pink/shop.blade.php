@extends($ns . '.layouts.app')

@section('title', 'Toko Online - '.$cfg['brand']['name'])
@section('page', 'shop')

@section('content')
    @include($ns . '.partials.page-hero', ['title' => 'Toko Online', 'lead' => 'Belanja produk '.$cfg['brand']['name'].' dan checkout praktis lewat WhatsApp.'])

    <div class="container stack stack--page">
        @include($ns . '.sections.ecommerce', ['full' => true])
    </div>
@endsection
