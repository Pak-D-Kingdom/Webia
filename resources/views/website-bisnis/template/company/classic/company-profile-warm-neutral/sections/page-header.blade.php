{{-- HEADER HALAMAN (Tentang Kami, Portofolio): judul, subjudul, breadcrumb, foto gedung --}}
<section class="cp-hero cp-hero--page" aria-labelledby="cp-page-title">
    <svg class="cp-hero__leaf" width="240" height="340" aria-hidden="true" focusable="false"><use href="#cp-branch"></use></svg>

    <div class="cp-container cp-hero__inner">
        <div class="cp-hero__content">
            <nav aria-label="Breadcrumb">
                <ol class="cp-crumbs">
                    <li><a href="{{ $page('beranda') }}">Beranda</a></li>
                    <li aria-current="page">{{ $pageHeader['title'] }}</li>
                </ol>
            </nav>
            <h1 class="cp-hero__title" id="cp-page-title">{{ $pageHeader['title'] }}</h1>
            <p class="cp-hero__lead">{{ $pageHeader['subtitle'] }}</p>
        </div>
    </div>

    <div class="cp-hero__media" aria-hidden="true">
        <img src="{{ $img('hero.jpg') }}" alt="" width="1872" height="488" fetchpriority="high">
    </div>
</section>
