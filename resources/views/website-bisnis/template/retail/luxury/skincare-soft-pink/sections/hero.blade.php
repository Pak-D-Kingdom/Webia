@php
    $h  = $cfg['hero'];
    $fp = collect($cfg['products'])->firstWhere('id', $h['featured_product_id']);
@endphp
<section class="hero" id="beranda">
    <img class="hero__leaf hero__leaf--l" src="{{ $img }}/leaf-hero-left.png" alt="" aria-hidden="true">
    <img class="hero__leaf hero__leaf--r" src="{{ $img }}/leaf-hero-right.png" alt="" aria-hidden="true">
    <div class="container hero__grid">
        <div class="hero__copy">
            <span class="hero__badge">{{ $h['badge'] }}</span>
            <h1>{{ $h['title'] }}</h1>
            <p class="hero__text">{{ $h['text'] }}</p>
            <ul class="hero__features">
                @foreach ($h['features'] as $f)
                    <li><i class="bi {{ $f['icon'] }}" aria-hidden="true"></i><span><strong>{{ $f['title'] }}</strong>{{ $f['sub'] }}</span></li>
                @endforeach
            </ul>
            <a class="btn btn--rose btn--lg" href="{{ route($rp . 'catalog') }}">Jelajahi Sekarang <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
        </div>

        <div class="hero__visual">
            <img src="{{ $img }}/hero-model.jpg" alt="Model Belleza dengan rangkaian produk skincare premium" width="1140" height="516" fetchpriority="high">
        </div>

        @if ($fp)
            <aside class="fav" aria-label="Produk favorit">
                <div class="fav__head">
                    <h2>Produk Favorit</h2>
                    <a class="more" href="{{ route($rp . 'catalog') }}">Lihat Semua <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
                </div>
                <p class="fav__sub">Pilihan terbaik untuk kamu</p>
                <div class="fav__body">
                    <div class="fav__img">
                        <img src="{{ $img }}/{{ $fp['image'] }}" alt="{{ $fp['name'] }}" width="417" height="435" loading="lazy">
                        @if ($fp['badge'])<span class="badge badge--{{ $fp['badge_class'] }}">{{ $fp['badge'] }}</span>@endif
                    </div>
                    <div class="fav__info">
                        <h3>{{ $fp['name'] }}</h3>
                        <p class="fav__desc">{{ $fp['desc'] }}</p>
                        <p class="pcard__price"><strong>{{ $fp['price_fmt'] }}</strong> <s>{{ $fp['old_fmt'] }}</s></p>
                        <p class="pcard__info">
                            <span class="rate"><i class="bi bi-star-fill" aria-hidden="true"></i> {{ $fp['rating'] }} ({{ $fp['reviews'] }})</span>
                            <span class="stock stock--{{ $fp['status'] }}"><i class="bi bi-circle-fill" aria-hidden="true"></i> {{ $fp['status_label'] }}</span>
                        </p>
                    </div>
                    @include($ns . '.partials.add-control', ['p' => $fp, 'mode' => 'icon'])
                </div>
            </aside>
        @endif
    </div>
</section>
