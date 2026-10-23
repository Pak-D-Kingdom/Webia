@extends($ns.'layouts.app')

@section('title', 'Booking / Viewing — '.$t['brand']['name'])

@section('content')
    @include($ns.'partials.page-header', ['title' => 'Booking / Viewing', 'desc' => 'Jadwalkan kunjungan properti Anda dalam empat langkah singkat'])

    <div class="container page detail">
        @include($ns.'sections.booking', ['preview' => false])
        <aside class="detail__side" aria-label="Informasi viewing">
            @include($ns.'sections.booking-info')
        </aside>
    </div>
@endsection
