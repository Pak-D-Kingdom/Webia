{{-- Dipakai halaman dalam. Variabel: $bannerTitle, $bannerText, $bannerImg (opsional) --}}
<section class="page-banner">
    <img class="page-banner__bg" src="{{ $img }}/{{ $bannerImg ?? 'banner-bg.jpg' }}" alt="" aria-hidden="true">
    <div class="page-banner__veil" aria-hidden="true"></div>
    <div class="page-banner__inner">
        <nav class="crumbs" aria-label="Breadcrumb">
            <a href="{{ $u['home'] }}">Beranda</a>
            <svg class="ico"><use href="#i-chev-right"></use></svg>
            <span aria-current="page">{{ $bannerTitle }}</span>
        </nav>
        <h1>{{ $bannerTitle }}</h1>
        <p>{{ $bannerText }}</p>
    </div>
</section>
