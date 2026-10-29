{{-- Hero halaman dalam. Param: title, lead, image --}}
<section class="ta-pagehero">
    <img class="ta-pagehero__img" src="{{ $img($image) }}" alt="" role="presentation">
    <div class="ta-container ta-pagehero__in">
        <nav class="ta-crumb" aria-label="Breadcrumb">
            <a href="{{ $routes['index'] }}">Beranda</a>{{ $icon('right') }}<span aria-current="page">{{ $title }}</span>
        </nav>
        <h1 class="ta-pagehero__title">{{ $title }}</h1>
        <p class="ta-pagehero__lead">{{ $lead }}</p>
    </div>
    <svg class="ta-wave" viewBox="0 0 1440 70" preserveAspectRatio="none" aria-hidden="true"><path d="M0 38c140 30 280 30 420 8S700 8 860 14s300 40 580 6V70H0Z" fill="currentColor"/></svg>
</section>
