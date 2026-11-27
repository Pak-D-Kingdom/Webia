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
@section('title', 'Checkout — Astraly')
@section('page', 'checkout')

@section('content')
    @include($v . '.partials.page-hero', ['title' => '<span class="gt">Checkout</span>', 'crumbs' => [['Keranjang', $u('cart')], ['Checkout', null]]])
    <section class="section-sm"><div class="wrap">
        <div class="stepper"><span class="s on"><b>1</b> Keranjang</span><hr><span class="s on"><b>2</b> Detail &amp; Pembayaran</span><hr><span class="s"><b>3</b> Selesai</span></div>
        <div class="cart-layout">
            <form class="grid gap-6" id="checkoutForm" novalidate>
                <div class="glass p-6 grid gap-4"><h3 class="text-xl">Detail Pembeli</h3>
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div class="field"><label class="label" for="coName">Nama Lengkap</label><input class="input" id="coName" name="name" required placeholder="Nama lengkap"><span class="err-msg"></span></div>
                        <div class="field"><label class="label" for="coEmail">Email</label><input class="input" id="coEmail" name="email" type="email" required placeholder="email@contoh.com"><span class="err-msg"></span></div>
                        <div class="field"><label class="label" for="coPhone">No. WhatsApp</label><input class="input" id="coPhone" name="phone" inputmode="tel" required placeholder="08xxxxxxxxxx"><span class="err-msg"></span></div>
                        <div class="field"><label class="label" for="coCo">Perusahaan (opsional)</label><input class="input" id="coCo" name="company" placeholder="Nama perusahaan"></div>
                    </div>
                </div>
                <div class="glass p-6 grid gap-4"><h3 class="text-xl">Metode Pembayaran</h3>
                    <div class="pay-opt">@foreach ([['QRIS', 'wave', 'Semua e-wallet & m-banking'], ['Transfer Bank (VA)', 'wallet', 'BCA, Mandiri, BNI, BRI'], ['E-Wallet', 'bolt', 'GoPay, OVO, DANA, ShopeePay'], ['Kartu Kredit / Debit', 'lock', 'Visa, Mastercard, JCB']] as $p)<label><input type="radio" name="pay" value="{{ $p[0] }}" @checked($loop->first)><span class="po-ico">{{ $ic($p[1], 'ico-sm') }}</span><span><b>{{ $p[0] }}</b><small>{{ $p[2] }}</small></span></label>@endforeach</div>
                    <label class="check"><input type="checkbox" name="agree" required> Saya setuju dengan <a href="{{ $u('legal') }}" style="color:var(--cyan)">Syarat, Lisensi &amp; Kebijakan Refund</a>.</label><span class="err-msg" id="agreeErr"></span>
                </div>
                <button class="btn btn-primary btn-lg" type="submit" id="placeOrder">{{ $ic('lock', 'ico-sm') }} Bayar &amp; Selesaikan Pesanan</button>
            </form>
            <aside class="summary"><h3 class="text-xl mb-4">Pesananmu</h3><div class="grid gap-4" id="checkoutItems"></div>
                <div class="mt-5"><div class="sum-row"><span>Subtotal</span><span id="sumSub">Rp 0</span></div><div class="sum-row"><span>Diskon</span><span id="sumDisc" style="color:var(--emerald)">- Rp 0</span></div><div class="sum-row"><span>PPN 11%</span><span id="sumTax">Rp 0</span></div><div class="sum-row total"><span>Total</span><span id="sumTotal">Rp 0</span></div></div>
            </aside>
        </div>
    </div></section>
@endsection
