@extends($ns.'layouts.app')

@section('title', 'Contact — '.$t['brand']['name'])

@section('content')
    @include($ns.'partials.page-header', ['title' => 'Contact', 'desc' => 'Hubungi kami atau kunjungi lokasi kami'])

    <div class="container page contact">
        @include($ns.'sections.location')
        @include($ns.'sections.inquiry')
    </div>

    @include($ns.'sections.cta')
@endsection
