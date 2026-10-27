<div class="container">
    <div class="catbar" data-reveal>
        <ul class="catbar__list">
            @foreach (array_filter($skin['categories'], fn ($c) => $c['img']) as $c)
                <li>
                    <a href="{{ route('skincare-warm-neutral.catalog') }}?kategori={{ $c['slug'] }}">
                        <img src="{{ asset($skin['img'] . '/' . $c['img']) }}" alt="" width="144" height="144" loading="lazy">
                        <span>{{ $c['label'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
        <form class="catbar__search" action="{{ route('skincare-warm-neutral.catalog') }}" method="get" role="search">
            <i class="bi bi-search"></i>
            <input type="search" name="q" placeholder="Cari produk skincare, makeup, dll..." aria-label="Cari produk">
        </form>
    </div>
</div>
