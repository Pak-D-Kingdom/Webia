@extends($ns.'layouts.app')

@section('title', 'About Us — '.$t['brand']['name'])

@section('content')
    @include($ns.'partials.page-header', ['title' => 'About Us', 'desc' => 'Mengenal GreenEstate lebih dekat'])

    <div class="container page">
        @include($ns.'sections.about', ['preview' => false])
    </div>

    @include($ns.'sections.cta')
@endsection
