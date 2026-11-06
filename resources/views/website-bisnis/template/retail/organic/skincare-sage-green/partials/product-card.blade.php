{{--
    Kartu produk. Parameter: $p (data produk), $mode = 'home' | 'catalog' | 'shop'
--}}
@php
    $cfg ??= config('template.retail.organic.skincare-sage-green.skincare');
    $img = asset($cfg['assets']['img']);
    $mode ??= 'home';
@endphp
<article class="pcard pcard--{{ $mode }}" data-product-card
         data-slug="{{ $p['slug'] }}" data-category="{{ $p['category'] }}"
         data-name="{{ strtolower($p['name']) }}" data-price="{{ $p['price'] }}"
         data-status="{{ $p['status'] }}" data-rating="{{ $p['rating'] }}">
    <div class="pcard__media">
        @if($p['badge'])
            <span class="badge badge--{{ str_replace(' ', '-', strtolower($p['badge'])) }}">{{ $p['badge'] }}</span>
        @endif
        <button type="button" class="pcard__wish" data-wish="{{ $p['slug'] }}" aria-pressed="false" aria-label="Simpan {{ $p['name'] }} ke favorit">
            <svg class="ico"><use href="#i-heart"/></svg>
        </button>
        <button type="button" class="pcard__img" data-quickview="{{ $p['slug'] }}" aria-label="Lihat detail {{ $p['name'] }}">
            <img src="{{ $img }}/{{ $p['image'] }}" alt="{{ $p['name'] }}" width="340" height="250" loading="lazy" decoding="async">
        </button>
    </div>

    <div class="pcard__body">
        <h3 class="pcard__name"><button type="button" data-quickview="{{ $p['slug'] }}">{{ $p['name'] }}</button></h3>
        <p class="pcard__tag">{{ $p['tagline'] }}</p>

        <p class="pcard__price">
            <strong>Rp {{ number_format($p['price'], 0, ',', '.') }}</strong>
            @if($p['old_price'])
                <del>Rp {{ number_format($p['old_price'], 0, ',', '.') }}</del>
            @endif
        </p>

        <p class="pcard__meta">
            <span class="rating"><svg class="ico"><use href="#i-star"/></svg>{{ number_format($p['rating'], 1, '.', '') }} <small>({{ $p['reviews'] }})</small></span>
            <span class="stock stock--{{ $p['status'] }}"><i></i>
                @if($p['status'] === 'tersedia') Stok Tersedia @elseif($p['status'] === 'terbatas') Sisa {{ $p['stock'] }} @else Stok Habis @endif
            </span>
        </p>

        @if($p['status'] === 'habis')
            <a class="btn btn--block btn--soft" href="https://wa.me/{{ $cfg['whatsapp']['number'] }}?text={{ rawurlencode('Halo PureGlow, tolong kabari saya jika ' . $p['name'] . ' sudah tersedia kembali.') }}" target="_blank" rel="noopener noreferrer">
                <svg class="ico"><use href="#i-bell"/></svg> Kabari Saya
            </a>
        @else
            <button type="button" class="btn btn--block btn--primary" data-add-cart="{{ $p['slug'] }}">
                <svg class="ico"><use href="#i-plus"/></svg> Keranjang
            </button>
        @endif

        @if($mode === 'catalog')
            <div class="pcard__links">
                <button type="button" data-quickview="{{ $p['slug'] }}"><svg class="ico"><use href="#i-eye"/></svg> Detail</button>
                <a href="https://wa.me/{{ $cfg['whatsapp']['number'] }}?text={{ rawurlencode('Halo PureGlow, saya ingin bertanya tentang ' . $p['name'] . '.') }}" target="_blank" rel="noopener noreferrer"><svg class="ico"><use href="#i-whatsapp"/></svg> Tanya</a>
            </div>
        @endif
    </div>
</article>
