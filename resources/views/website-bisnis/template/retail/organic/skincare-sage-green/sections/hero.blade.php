@php
    $cfg ??= config('template.retail.organic.skincare-sage-green.skincare');
    $img = asset($cfg['assets']['img']);
@endphp
<section class="hero" aria-labelledby="hero-title">
    <img class="hero__leaf-l" src="{{ $img }}/hero-bg-left.jpg" alt="" aria-hidden="true">
    <svg class="deco deco--hero-r" aria-hidden="true"><use href="#i-branch"/></svg>

    <div class="container hero__inner">
        <div class="hero__copy">
            <p class="eyebrow">{{ $cfg['hero']['eyebrow'] }}</p>
            <h1 id="hero-title">{{ $cfg['hero']['title'] }}</h1>
            <p class="hero__text">{{ $cfg['hero']['text'] }}</p>

            <ul class="trust">
                @foreach($cfg['hero']['trust'] as $t)
                    <li>
                        <span class="trust__ico"><svg class="ico" aria-hidden="true"><use href="#i-{{ $t['icon'] }}"/></svg></span>
                        <span><strong>{{ $t['title'] }}</strong>{{ $t['text'] }}</span>
                    </li>
                @endforeach
            </ul>

            <a class="btn btn--primary btn--lg" href="{{ route($cfg['route'] . 'catalog') }}">
                {{ $cfg['hero']['cta'] }} <svg class="ico" aria-hidden="true"><use href="#i-arrow-right"/></svg>
            </a>
        </div>

        <div class="hero__art" aria-hidden="true">
            <img src="{{ $img }}/hero-products.jpg" alt="" width="1434" height="771" fetchpriority="high">
        </div>

        @foreach($cfg['products'] as $fp)
            @if($fp['slug'] === $cfg['hero']['featured'])
                <aside class="featured" aria-labelledby="featured-title">
                    <div class="featured__head">
                        <h2 id="featured-title">Produk Pilihan<br>Untuk Kulit Sehatmu</h2>
                        <a class="link-arrow" href="{{ route($cfg['route'] . 'catalog') }}">Lihat Semua <svg class="ico" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
                    </div>
                    <div class="featured__card">
                        <div class="featured__media">
                            <span class="badge badge--best-seller">{{ $fp['badge'] }}</span>
                            <button type="button" data-quickview="{{ $fp['slug'] }}" aria-label="Lihat detail {{ $fp['name'] }}">
                                <img src="{{ $img }}/{{ $fp['image'] }}" alt="{{ $fp['name'] }}" width="135" height="133" loading="lazy">
                            </button>
                        </div>
                        <div class="featured__info">
                            <h3>{{ $fp['name'] }}</h3>
                            <p>{{ $fp['tagline'] }}</p>
                            <p class="pcard__price"><strong>Rp {{ number_format($fp['price'], 0, ',', '.') }}</strong> <del>Rp {{ number_format($fp['old_price'], 0, ',', '.') }}</del></p>
                            <p class="pcard__meta">
                                <span class="rating"><svg class="ico"><use href="#i-star"/></svg>{{ number_format($fp['rating'], 1, '.', '') }} <small>({{ $fp['reviews'] }})</small></span>
                                <span class="stock stock--{{ $fp['status'] }}"><i></i> Stok Tersedia</span>
                            </p>
                        </div>
                        <button type="button" class="round-btn" data-add-cart="{{ $fp['slug'] }}" aria-label="Tambah {{ $fp['name'] }} ke keranjang"><svg class="ico"><use href="#i-bag"/></svg></button>
                    </div>
                </aside>
            @endif
        @endforeach
    </div>
</section>
