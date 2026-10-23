{{-- ===================== PAGE HEADER (halaman dalam) ===================== --}}
@php $isDetail = $detail ?? false; @endphp
<section class="rea-pagehead" aria-labelledby="page-title">
    <div class="rea-container">
        <nav class="rea-crumbs" aria-label="Breadcrumb">
            <a href="{{ $route('index', '#top') }}">Home</a>
            <span aria-hidden="true">/</span>
            @if ($isDetail)
                <a href="{{ $route('property') }}">{{ $pages['property']['title'] }}</a>
                <span aria-hidden="true">/</span>
                <span aria-current="page">{{ $property['place_name'] }}</span>
            @else
                <span aria-current="page">{{ $pages[$page]['label'] }}</span>
            @endif
        </nav>
        @if ($isDetail)
            <h1 id="page-title">{{ $property['title'] }}</h1>
            <p>{{ $property['place'] }} · {{ $property['price_cur'] }} {{ $property['price'] }} {{ $property['price_note'] }}</p>
        @else
            <h1 id="page-title">{{ $pages[$page]['title'] }}</h1>
            <p>{{ $pages[$page]['subtitle'] }}</p>
        @endif
    </div>
</section>
