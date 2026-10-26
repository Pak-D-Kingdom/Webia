<section class="page-head">
    <img class="page-head__leaf" src="{{ asset($skin['img'] . '/hero-leaf.jpg') }}" alt="" aria-hidden="true">
    <div class="container page-head__in">
        <nav class="crumb" aria-label="Breadcrumb">
            <a href="{{ route('skincare-warm-neutral.home') }}">Beranda</a><i class="bi bi-chevron-right"></i><span aria-current="page">{{ $title }}</span>
        </nav>
        <h1 class="page-head__title">{{ $title }}</h1>
        <p class="page-head__text">{{ $text }}</p>
    </div>
</section>
