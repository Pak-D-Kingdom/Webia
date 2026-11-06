{{-- Header halaman dalam. Membaca $meta (judul, lead, crumb, gambar) dari config pages[$page]. --}}
<section class="fh-pagehead" aria-labelledby="fh-pagehead-title">
    <img class="fh-pagehead__leaves" src="{{ $img('hero-leaves.jpg') }}" alt="" aria-hidden="true" width="232" height="514">
    <div class="fh-wrap fh-pagehead__in">
        <div class="fh-pagehead__copy">
            <nav class="fh-crumb" aria-label="Breadcrumb">
                <a href="{{ $url('') }}">Beranda</a>
                <span aria-hidden="true">/</span>
                <span aria-current="page">{{ $meta['crumb'] }}</span>
            </nav>
            <p class="fh-script fh-pagehead__script">{{ $cfg['hero']['script'] }}</p>
            <h1 id="fh-pagehead-title">{{ $meta['heading'] }}</h1>
            <p class="fh-pagehead__lead">{{ $meta['lead'] }}</p>
        </div>
        <div class="fh-pagehead__art" aria-hidden="true">
            <img src="{{ $img($meta['image']) }}" alt="">
        </div>
    </div>
</section>
