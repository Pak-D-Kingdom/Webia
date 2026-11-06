@extends($ns.'layouts.app')

@section('title', 'Property Listing — '.$t['brand']['name'])

@section('content')
    @include($ns.'partials.page-header', ['title' => 'Property Listing', 'desc' => 'Temukan properti terbaik sesuai kebutuhan Anda'])

    @php
        $q = trim((string) request('q'));
        $list = $t['properties'];
        if ($q !== '') {
            $list = array_values(array_filter($list, fn ($p) => stripos($p['name'].' '.$p['city'], $q) !== false));
        }
    @endphp

    <div class="container page">
        @if ($q !== '')
            <p class="result-note">{{ count($list) }} hasil untuk “{{ $q }}”. <a href="{{ $r('properties') }}">Reset pencarian</a></p>
        @endif
        @include($ns.'sections.properties', ['items' => $list, 'preview' => false])
    </div>

    @include($ns.'sections.cta')
@endsection
