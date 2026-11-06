@extends($ns.'layouts.app')

@section('title', 'About Us — '.$t['brand']['name'])

@section('content')
    @include($ns.'partials.page-header', ['title' => 'About Us', 'desc' => 'Mengenal GreenEstate lebih dekat'])

    <div class="container page">
        @include($ns.'sections.about', ['preview' => false])
        <div class="photo-row">
            @foreach (array_slice($t['gallery']['items'], 0, 3) as $g)
                @include($ns.'sections.photo', ['image' => $g['image'], 'caption' => $g['alt']])
            @endforeach
        </div>
    </div>

    @include($ns.'sections.cta')
@endsection
