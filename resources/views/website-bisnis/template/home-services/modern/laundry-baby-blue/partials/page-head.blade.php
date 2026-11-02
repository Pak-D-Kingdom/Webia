{{-- @include('...partials.page-head', ['title' => '...', 'text' => '...']) --}}
<section class="lb-pagehead">
    <img class="lb-pagehead__art" src="{{ asset($laundry['assets']['img'] . '/hero-scene.webp') }}" alt="" aria-hidden="true" width="948" height="265" decoding="async">
    <span class="lb-bubble lb-bubble--a" aria-hidden="true"></span><span class="lb-bubble lb-bubble--b" aria-hidden="true"></span>
    <div class="lb-container lb-pagehead__inner">
        <nav class="lb-crumb" aria-label="Breadcrumb">
            <a href="{{ route('webia.laundry-baby-blue.home') }}">Beranda</a><span aria-hidden="true">/</span><span aria-current="page">{{ $title }}</span>
        </nav>
        <h1 class="lb-pagehead__title">{{ $title }}</h1>
        <p class="lb-pagehead__text">{{ $text }}</p>
    </div>
</section>
