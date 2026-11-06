@php $fav = collect($skin['products'])->firstWhere('favorite', true) ?? $skin['products'][0]; @endphp
<section class="hero" id="beranda">
    <img class="hero__leaf" src="{{ asset($skin['img'] . '/hero-leaf.jpg') }}" alt="" aria-hidden="true">
    <div class="container hero__in">
        <div class="hero__copy" data-reveal>
            <p class="kicker"><span></span>{{ $skin['hero']['kicker'] }}</p>
            <h1 class="hero__title">{!! nl2br(e($skin['hero']['title'])) !!}</h1>
            <p class="hero__text">{{ $skin['hero']['text'] }}</p>
            <ul class="hero__trust">
                @foreach ($skin['hero']['trust'] as $t)
                    <li><i class="bi {{ $t['icon'] }}"></i><span>{{ $t['line1'] }}<br>{{ $t['line2'] }}</span></li>
                @endforeach
            </ul>
            <a class="btn btn--lg" href="{{ route('skincare-warm-neutral.catalog') }}">Belanja Sekarang <i class="bi bi-arrow-right"></i></a>
        </div>

        <div class="hero__media" data-reveal>
            <img src="{{ asset($skin['img'] . '/hero.jpg') }}" alt="Model GlowEra bersama rangkaian produk skincare" width="1174" height="502" fetchpriority="high">
        </div>

        <aside class="fav" data-reveal aria-label="Produk Favorit">
            <div class="fav__head">
                <div><h2>Produk Favorit</h2><p>Pilihan terbaik untuk kulitmu</p></div>
                <a class="link" href="{{ route('skincare-warm-neutral.catalog') }}">Lihat Semua <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="fav__body" data-item data-id="{{ $fav['id'] }}" data-name="{{ $fav['name'] }}" data-price="{{ $fav['price'] }}" data-stock="{{ $fav['stock'] }}">
                <div class="fav__img">
                    <span class="badge badge--best">{{ $fav['badge'] }}</span>
                    <img src="{{ asset($skin['img'] . '/' . $fav['image']) }}" alt="{{ $fav['name'] }}" loading="lazy" width="272" height="292">
                </div>
                <div class="fav__info">
                    <h3>{{ $fav['name'] }}</h3>
                    <p>{{ $fav['desc'] }}</p>
                    <div class="price"><strong>Rp {{ number_format($fav['price'], 0, ',', '.') }}</strong><s>Rp {{ number_format($fav['old_price'], 0, ',', '.') }}</s></div>
                    <div class="fav__meta">
                        <span class="pcard__rate"><i class="bi bi-star-fill"></i><b>{{ number_format($fav['rating'], 1) }}</b><span>({{ $fav['reviews'] }})</span></span>
                        @include($ns . '.partials.stock-badge', ['stock' => $fav['stock']])
                    </div>
                    <button type="button" class="fav__cart" data-add-cart aria-label="Tambah {{ $fav['name'] }} ke keranjang"><i class="bi bi-cart3"></i></button>
                </div>
            </div>
        </aside>
    </div>
</section>
