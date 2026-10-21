@extends($ns.'layouts.app')

@section('title', 'Spesifikasi Properti — '.$t['brand']['name'])

@section('content')
    @include($ns.'partials.page-header', ['title' => 'Spesifikasi Properti', 'desc' => 'Detail lengkap properti Anda'])

    <div class="container page page-split">
        @include($ns.'sections.specification', ['preview' => false])
        <aside class="page-split__side">
            @include($ns.'sections.price-start')
            @include($ns.'sections.booking', ['preview' => true])
        </aside>
    </div>

    @include($ns.'sections.cta')
@endsection
