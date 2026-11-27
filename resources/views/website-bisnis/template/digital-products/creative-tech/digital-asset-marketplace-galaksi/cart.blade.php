@php
    $dam = config('template.digital-products.creative-tech.digital-asset-marketplace-galaksi.digital-asset-marketplace');
    $v = 'website-bisnis.template.digital-products.creative-tech.digital-asset-marketplace-galaksi';
    $u = fn ($p = '') => url(trim($dam['base_path'] . '/' . $p, '/'));
    $img = fn ($f) => asset($dam['assets_path']['images'] . '/' . $f);
    $rp = fn ($n) => $n ? 'Rp ' . number_format($n, 0, ',', '.') : 'Gratis';
    $ic = fn ($n, $c = '') => new \Illuminate\Support\HtmlString('<svg class="ico ' . $c . '" viewBox="0 0 24 24" aria-hidden="true">' . ($dam['icons'][$n] ?? '') . '</svg>');
    $stars = fn ($r) => new \Illuminate\Support\HtmlString('<span class="stars" aria-label="Rating ' . $r . '">' . collect(range(1, 5))->map(fn ($i) => '<svg viewBox="0 0 24 24"' . ($i <= round($r) ? '' : ' class="off"') . '><path d="M12 2l3 6.6 7.2.8-5.4 4.9 1.5 7.1L12 17.8 5.7 21.4l1.5-7.1L1.8 9.4 9 8.6z"/></svg>')->implode('') . '</span>');
    $aurl = fn ($a) => $u('product-details') . '?asset=' . $a['slug'];
    $cat = fn ($a) => $dam['categories'][$a['cat']];
    $cr = fn ($a) => $dam['creators'][$a['creator']];
    $all = collect($dam['assets']);
@endphp
@extends($v . '.layouts.app')
@section('title', 'Keranjang — Astraly')
@section('page', 'cart')

@section('content')
    @include($v . '.partials.page-hero', ['title' => 'Keranjang <span class="gt">Belanja</span>', 'crumbs' => [['Keranjang', null]]])
    <section class="section-sm"><div class="wrap">
        <div class="cart-layout">
            <div>
                <div class="grid gap-4" id="cartList"></div>
                <div class="empty hidden" id="cartEmpty">{{ $ic('cart') }}<h3 class="text-xl" style="color:var(--tx)">Keranjangmu masih kosong</h3><p class="mt-2">Temukan aset favoritmu dan tambahkan ke keranjang.</p><a href="{{ $u('explore-assets') }}" class="btn btn-primary mt-5">Jelajahi Aset</a></div>
                <button type="button" class="tiny mt-4" style="color:var(--rose)" id="cartClear">Kosongkan keranjang</button>
            </div>
            <aside class="summary">
                <h3 class="text-xl mb-4">Ringkasan Pesanan</h3>
                <div class="flex gap-2 mb-4"><input class="input" id="couponInput" placeholder="Kode promo (mis. ASTRA20)" aria-label="Kode promo"><button type="button" class="btn btn-ghost" id="couponApply">Pakai</button></div>
                <p class="tiny mb-3" id="couponMsg"></p>
                <div class="sum-row"><span>Subtotal</span><span id="sumSub">Rp 0</span></div>
                <div class="sum-row"><span>Diskon</span><span id="sumDisc" style="color:var(--emerald)">- Rp 0</span></div>
                <div class="sum-row"><span>PPN 11%</span><span id="sumTax">Rp 0</span></div>
                <div class="sum-row total"><span>Total</span><span id="sumTotal">Rp 0</span></div>
                <a href="{{ $u('checkout') }}" class="btn btn-primary btn-lg btn-block mt-5" id="toCheckout">Lanjut ke Checkout {{ $ic('arrow', 'ico-sm') }}</a>
                <p class="tiny dim mt-4 text-center">{{ $ic('lock', 'ico-sm') }} Pembayaran aman &amp; terenkripsi</p>
            </aside>
        </div>
    </div></section>
@endsection
