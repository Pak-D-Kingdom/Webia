@extends($ns.'layouts.app')

@section('title', 'Gallery — '.$t['brand']['name'])

@section('content')
    @include($ns.'partials.page-header', ['title' => 'Gallery', 'desc' => 'Lihat keindahan properti lebih dekat'])

    <div class="container page">
        @include($ns.'sections.gallery', ['preview' => false])
    </div>

    @include($ns.'sections.cta')
@endsection
