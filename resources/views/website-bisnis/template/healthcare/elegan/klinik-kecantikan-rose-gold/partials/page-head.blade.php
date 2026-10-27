{{-- Judul halaman dalam (breadcrumb + judul + deskripsi) --}}
<section class="rg-pagehead">
    <div class="rg-container">
        <nav class="rg-crumb" aria-label="Breadcrumb">
            <a href="{{ route($rp . 'index') }}">Beranda</a><i class="bi bi-chevron-right" aria-hidden="true"></i><span aria-current="page">{{ $title }}</span>
        </nav>
        <h1 class="rg-pagehead__title">{{ $title }}</h1>
        <p class="rg-lead">{{ $text }}</p>
    </div>
</section>
