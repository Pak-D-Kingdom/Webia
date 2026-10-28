{{-- Parameter: $title, $subtitle, $crumb (opsional) --}}
<section class="ta-pagehero" style="--ta-hero-img:url('{{ $img('hero.jpg') }}')">
    <div class="ta-pagehero__media" aria-hidden="true"></div>
    <svg class="ta-sprig ta-pagehero__sprig" aria-hidden="true"><use href="#ta-sprig"/></svg>
    <div class="ta-container ta-pagehero__in">
        <nav class="ta-crumb" aria-label="Breadcrumb">
            <a href="{{ $r('index') }}">Beranda</a>
            <svg class="ta-i" aria-hidden="true"><use href="#i-chev-right"/></svg>
            <span aria-current="page">{{ $crumb ?? $title }}</span>
        </nav>
        <h1 class="ta-pagehero__title">{{ $title }}</h1>
        <p class="ta-pagehero__text">{{ $subtitle }}</p>
    </div>
</section>
