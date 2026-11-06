<section class="panel" id="katalog-preview" data-reveal>
    <div class="panel__head">
        <div>
            <h2 class="panel__title">Produk Terbaru</h2>
            <p class="panel__sub">Jangan lewatkan koleksi terbaru kami, dengan kualitas terbaik untuk kulitmu.</p>
        </div>
        <a class="link" href="{{ route('skincare-warm-neutral.catalog') }}">Lihat Semua <i class="bi bi-arrow-right"></i></a>
    </div>
    <div class="pgrid">
        @foreach (array_slice($skin['products'], 0, 4) as $p)
            @include($ns . '.partials.product-card', ['p' => $p])
        @endforeach
    </div>
    @include($ns . '.sections.services')
</section>
