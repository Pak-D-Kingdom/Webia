@extends($ns.'layouts.app')

@section('title', 'Price — '.$t['brand']['name'])

@section('content')
    @include($ns.'partials.page-header', ['title' => 'Price', 'desc' => $t['price']['sub']])

    <div class="container page page-split">
        @include($ns.'sections.price', ['preview' => false])
        <aside class="page-split__side">
            @include($ns.'sections.booking', ['preview' => true])
            @include($ns.'sections.inquiry')
        </aside>
    </div>

    @include($ns.'sections.cta')
@endsection
