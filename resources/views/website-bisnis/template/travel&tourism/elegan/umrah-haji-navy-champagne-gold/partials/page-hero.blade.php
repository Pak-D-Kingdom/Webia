<section class="uh-pagehero">
    <div class="uh-pagehero__bg"><img src="{{ $img($bg ?? 'hero.svg') }}" alt="" loading="eager"></div>
    <div class="uh-container uh-pagehero__in">
        <nav class="uh-crumbs" aria-label="Breadcrumb">
            <a href="{{ $r('home') }}">Beranda</a><svg class="uh-ico" aria-hidden="true"><use href="#i-chev"/></svg><span>{{ $title }}</span>
        </nav>
        <p class="uh-eyebrow">{{ $eyebrow }}</p>
        <h1 class="uh-pagehero__title">{{ $title }}</h1>
        <p class="uh-pagehero__desc">{{ $desc }}</p>
    </div>
    <div class="uh-hero__curve"></div>
</section>
