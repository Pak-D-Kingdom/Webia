@php
    $cfg ??= config('template.retail.organic.skincare-sage-green.skincare');
    $img = asset($cfg['assets']['img']);
@endphp
<section class="page-head">
    <svg class="deco deco--page-l" aria-hidden="true"><use href="#i-branch"/></svg>
    <svg class="deco deco--page-r" aria-hidden="true"><use href="#i-branch"/></svg>
    <div class="container page-head__inner">
        <nav class="crumbs" aria-label="Breadcrumb">
            <a href="{{ route($cfg['route'] . 'home') }}">Beranda</a>
            <span aria-hidden="true">/</span>
            <span aria-current="page">{{ $title }}</span>
        </nav>
        <p class="eyebrow">{{ $eyebrow }}</p>
        <h1>{{ $title }}</h1>
        <p class="page-head__text">{{ $text }}</p>
    </div>
</section>
