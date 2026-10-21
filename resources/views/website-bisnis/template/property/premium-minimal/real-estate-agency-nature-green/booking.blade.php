@extends($ns.'layouts.app')

@section('title', 'Booking / Viewing — '.$t['brand']['name'])

@section('content')
    @include($ns.'partials.page-header', ['title' => 'Booking / Viewing', 'desc' => 'Jadwalkan kunjungan properti Anda'])

    <div class="container page page-split">
        @include($ns.'sections.booking', ['preview' => false])
        <aside class="page-split__side">
            @include($ns.'sections.price-start')
            @include($ns.'sections.inquiry')
        </aside>
    </div>
@endsection
