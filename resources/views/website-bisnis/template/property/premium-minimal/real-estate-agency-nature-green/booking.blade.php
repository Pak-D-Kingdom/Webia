@extends($ns.'layouts.app')

@section('title', 'Booking / Viewing — '.$t['brand']['name'])

@section('content')
    @include($ns.'partials.page-header', ['title' => 'Booking / Viewing', 'desc' => 'Jadwalkan kunjungan properti Anda dalam empat langkah singkat'])

    <div class="container page detail">
        @include($ns.'sections.booking', ['preview' => false])
<<<<<<< HEAD
        <aside class="detail__side" aria-label="Informasi viewing">
            @include($ns.'sections.booking-info')
=======
        <aside class="page-split__side">
            @include($ns.'sections.photo', ['image' => $t['gallery']['items'][1]['image'], 'caption' => $t['gallery']['items'][1]['alt']])
            @include($ns.'sections.price-start')
            @include($ns.'sections.inquiry')
>>>>>>> webia/nabiila-fe
        </aside>
    </div>
@endsection
