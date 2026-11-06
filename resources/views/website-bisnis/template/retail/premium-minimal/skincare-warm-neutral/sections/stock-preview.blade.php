<section class="section section--tint" id="stok-preview">
    <div class="container">
        <div class="sec-head" data-reveal>
            <div><p class="kicker"><span></span>KETERSEDIAAN</p><h2 class="sec-title">Cek Stok Sebelum Memesan</h2><p class="sec-sub">Pantau ketersediaan produk favoritmu secara langsung.</p></div>
            <a class="link" href="{{ route('skincare-warm-neutral.stock') }}">Lihat Semua Stok <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="sgrid sgrid--prev" data-reveal>
            @foreach (array_slice($skin['products'], 2, 6) as $p)
                @include($ns . '.partials.stock-card', ['p' => $p])
            @endforeach
        </div>
    </div>
</section>
