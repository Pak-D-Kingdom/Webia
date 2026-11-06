<section class="cats" aria-label="Kategori produk">
    <div class="container cats__inner">
        <ul class="cats__list">
            @foreach ($cfg['categories'] as $cat)
                <li>
                    <a class="cat" href="{{ route($rp . 'catalog') }}?cat={{ $cat['slug'] }}">
                        <span class="cat__icon"><i class="bi {{ $cat['icon'] }}" aria-hidden="true"></i></span>
                        <span class="cat__name">{{ $cat['name'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
        <form class="searchbar" action="{{ route($rp . 'catalog') }}" method="get" role="search">
            <i class="bi bi-search" aria-hidden="true"></i>
            <input type="search" name="q" placeholder="Cari produk, skincare, makeup, dll..." aria-label="Cari produk">
            <button class="searchbar__btn" type="submit" aria-label="Cari"><i class="bi bi-search" aria-hidden="true"></i></button>
        </form>
    </div>
</section>
