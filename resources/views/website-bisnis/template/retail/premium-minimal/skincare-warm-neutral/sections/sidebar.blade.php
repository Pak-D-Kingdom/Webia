<div class="panel side-cats" data-reveal>
    <h2 class="panel__title panel__title--sm">Kategori Produk</h2>
    <ul>
        @foreach ($skin['categories'] as $c)
            <li>
                <a href="{{ route('skincare-warm-neutral.catalog') }}{{ $c['slug'] === 'all' ? '' : '?kategori=' . $c['slug'] }}">
                    <i class="bi {{ $c['icon'] }}"></i><span>{{ $c['label'] }}</span><em>({{ $c['count'] }})</em>
                </a>
            </li>
        @endforeach
    </ul>
</div>

<a class="promo" href="{{ route('skincare-warm-neutral.price') }}" data-reveal>
    <img src="{{ asset($skin['img'] . '/promo-model.jpg') }}" alt="" width="170" height="268" loading="lazy">
    <div class="promo__txt">
        <h3>Diskon Spesial<br>Produk Skincare</h3>
        <span class="promo__pill"><small>up to</small> 50%</span>
        <span class="promo__btn">Lihat Promo <i class="bi bi-arrow-right"></i></span>
    </div>
</a>
