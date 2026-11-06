{{-- Header halaman dalam (Menu / Reservasi). Param: $title, $text --}}
<header class="kl-pagehead">
    <img class="kl-pagehead__sketch" src="{{ $img('house-sketch.png') }}" alt="" aria-hidden="true" width="344" height="536">
    <div class="kl-pagehead__inner">
        <nav class="kl-crumb" aria-label="Breadcrumb">
            <a href="{{ route($cafe['routes']['home']) }}">Beranda</a>
            <span aria-hidden="true">/</span>
            <span aria-current="page">{{ $title }}</span>
        </nav>
        <h1 class="kl-pagehead__title">{{ $title }}</h1>
        <p class="kl-pagehead__text">{{ $text }}</p>
    </div>
    <img class="kl-pagehead__stamp" src="{{ $img('stamp.png') }}" alt="" aria-hidden="true" width="212" height="220">
</header>
