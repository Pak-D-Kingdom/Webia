<section class="eo-pagehero">
    <div class="eo-pagehero__bg" aria-hidden="true">
        <img src="{{ asset($eo['assets']['img']) }}/hero-inner.jpg" alt="" width="1800" height="700">
        <span class="eo-pagehero__shade"></span>
    </div>
    <img class="eo-pagehero__flora" src="{{ asset($eo['assets']['img']) }}/flora-hero.svg" alt="" aria-hidden="true">
    <div class="eo-container eo-pagehero__inner">
        <nav class="eo-crumb" aria-label="Breadcrumb">
            <a href="{{ url($eo['base']) }}">Beranda</a><span aria-hidden="true">/</span><span aria-current="page">{{ $crumb }}</span>
        </nav>
        <h1 class="eo-pagehero__title">{{ $title }}</h1>
        <p class="eo-pagehero__text">{{ $text }}</p>
    </div>
    <svg class="eo-hero__wave" viewBox="0 0 1440 60" preserveAspectRatio="none" aria-hidden="true"><path d="M0 60V34C220 6 420 54 720 32s560-34 720-6v34Z"/></svg>
</section>
