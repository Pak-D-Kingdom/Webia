@extends($ns.'layouts.app')

@section('title', 'Blog — '.$t['brand']['name'])

@section('content')
    @include($ns.'partials.page-header', ['title' => 'Blog', 'desc' => 'Tips dan wawasan seputar properti'])

    <div class="container page">
        @include($ns.'sections.blog', ['preview' => false])
    </div>

    @include($ns.'sections.cta')
@endsection
