{{-- Header halaman dalam. Variabel: $title, $sub --}}
<section class="lw-pagehead">
    <img class="lw-pagehead__leaf lw-pagehead__leaf--l" src="{{ $img($c['img']['leaf_l']) }}" alt="" aria-hidden="true">
    <img class="lw-pagehead__leaf lw-pagehead__leaf--r" src="{{ $img($c['img']['leaf_r']) }}" alt="" aria-hidden="true">
    <div class="lw-container">
        <nav class="lw-crumb" aria-label="Breadcrumb">
            <a href="{{ $r('home') }}">Beranda</a><span aria-hidden="true">/</span><span aria-current="page">{{ $title }}</span>
        </nav>
        <h1 class="lw-h1">{{ $title }}</h1>
        <p class="lw-lead">{{ $sub }}</p>
    </div>
</section>
