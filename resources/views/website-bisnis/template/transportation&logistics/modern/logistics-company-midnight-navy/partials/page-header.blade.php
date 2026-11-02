@php $rp = $site['route_prefix']; @endphp
<section class="lc-pagehead" style="--lc-pagehead-img: url('{{ asset($site['paths']['images'] . 'hero-bg.jpg') }}')">
    <div class="lc-wrap lc-pagehead__in">
        <nav class="lc-crumb" aria-label="Breadcrumb">
            <a href="{{ route($rp . 'home') }}">Beranda</a>
            <svg class="lc-ico" aria-hidden="true"><use href="#lc-i-chev-r"></use></svg>
            <span aria-current="page">{{ $title }}</span>
        </nav>
        <h1 class="lc-pagehead__title">{{ $title }}</h1>
        <p class="lc-pagehead__sub">{{ $subtitle }}</p>
    </div>
</section>
