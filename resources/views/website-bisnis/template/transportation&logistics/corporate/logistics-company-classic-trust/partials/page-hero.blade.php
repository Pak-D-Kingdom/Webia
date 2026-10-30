{{-- Header halaman dalam. Parameter: $pageKey --}}
@php $pg = $c['pages'][$pageKey]; @endphp
<section class="page-hero" style="--hero-pos: {{ $pg['pos'] }}">
    <img class="page-hero__bg" src="{{ $img('hero-bg.jpg') }}" alt="" width="3072" height="526">
    <div class="page-hero__shade" aria-hidden="true"></div>
    <div class="container container--nav page-hero__in">
        <nav class="crumbs" aria-label="Breadcrumb">
            <a href="{{ $route('home') }}">Beranda</a>
            <svg class="ic ic--xs" aria-hidden="true"><use href="#i-chevron-right"/></svg>
            <span aria-current="page">{{ $pg['title'] }}</span>
        </nav>
        <h1 class="page-hero__title">{{ $pg['title'] }}</h1>
        <p class="page-hero__text">{{ $pg['text'] }}</p>
    </div>
</section>
