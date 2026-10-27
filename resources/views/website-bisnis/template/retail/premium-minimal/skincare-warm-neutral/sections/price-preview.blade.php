<section class="section" id="harga-preview">
    <div class="container">
        <div class="sec-head" data-reveal>
            <div><p class="kicker"><span></span>HARGA</p><h2 class="sec-title">Harga Terbaik untuk Kulit Sehat</h2><p class="sec-sub">Harga transparan dengan diskon hingga 50% untuk produk pilihan.</p></div>
            <a class="link" href="{{ route('skincare-warm-neutral.price') }}">Lihat Semua Harga <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="panel panel--flush" data-reveal>
            @include($ns . '.partials.price-table', ['items' => array_slice($skin['products'], 0, 5), 'full' => false])
        </div>
    </div>
</section>
