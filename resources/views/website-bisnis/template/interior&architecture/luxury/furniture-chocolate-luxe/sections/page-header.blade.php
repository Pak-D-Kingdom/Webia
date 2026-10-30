{{-- Header halaman dalam. Variabel: $pageTitle, $pageText, $pageImage, $pageCrumb --}}
@php
    $f = $furniture;
    $a = fn ($path) => asset($path);
    $r = fn ($key) => route($f['routes'][$key]);
@endphp
<section class="lf-pagehead" style="background-image:url('{{ $a($pageImage) }}')">
    <div class="lf-pagehead__shade" aria-hidden="true"></div>
    <div class="lf-container lf-pagehead__inner">
        <nav class="lf-crumb" aria-label="Breadcrumb">
            <a href="{{ $r('home') }}">Beranda</a>
            <svg class="ic"><use href="#i-right"/></svg>
            <span aria-current="page">{{ $pageCrumb }}</span>
        </nav>
        <h1 class="lf-pagehead__title">{{ $pageTitle }}</h1>
        <p class="lf-pagehead__text">{{ $pageText }}</p>
    </div>
</section>
