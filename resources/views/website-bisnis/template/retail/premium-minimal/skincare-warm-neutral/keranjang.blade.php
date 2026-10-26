@extends($ns . '.layouts.app')

@section('title', 'Keranjang — ' . $skin['name'])
@section('description', 'Keranjang belanja dan checkout GlowEra via WhatsApp.')

@section('content')
    @include($ns . '.partials.page-header', ['title' => 'Keranjang', 'text' => 'Periksa pesananmu lalu checkout lewat WhatsApp.'])

    <section class="section section--pt0">
        <div class="container cart-layout" data-cart-page>
            <div class="cart-main">
                <div class="panel">
                    <div class="panel__head">
                        <h2 class="panel__title panel__title--sm">Produk Pilihan</h2>
                        <button type="button" class="link-btn" data-cart-clear>Kosongkan</button>
                    </div>
                    <ul class="cart-list" data-cart-list></ul>
                    <div class="empty" data-cart-empty hidden>
                        <i class="bi bi-bag-heart"></i>
                        <h3>Keranjang masih kosong</h3>
                        <p>Yuk, pilih produk skincare favoritmu.</p>
                        <a class="btn btn--sm" href="{{ route('skincare-warm-neutral.catalog') }}">Lihat Katalog</a>
                    </div>
                </div>

                <div class="panel" data-cart-checkout>
                    <h2 class="panel__title panel__title--sm">Data Pengiriman</h2>
                    <form class="form" id="checkoutForm" data-wa-form data-wa-cart data-wa-title="Halo {{ $skin['name'] }}, saya ingin memesan:" novalidate>
                        <div class="form__grid">
                            <div class="field"><label for="co-nama">Nama penerima <em>*</em></label>
                                <input id="co-nama" name="nama" data-label="Nama" type="text" autocomplete="name" required></div>
                            <div class="field"><label for="co-wa">No. WhatsApp <em>*</em></label>
                                <input id="co-wa" name="whatsapp" data-label="No. WhatsApp" type="tel" inputmode="tel" autocomplete="tel" data-type="phone" required></div>
                            <div class="field field--full"><label for="co-alamat">Alamat lengkap <em>*</em></label>
                                <textarea id="co-alamat" name="alamat" data-label="Alamat" rows="3" autocomplete="street-address" required></textarea></div>
                            <div class="field"><label for="co-kota">Kota / Kode pos <em>*</em></label>
                                <input id="co-kota" name="kota" data-label="Kota / Kode pos" type="text" required></div>
                            <div class="field"><label for="co-bayar">Metode pembayaran</label>
                                <select id="co-bayar" name="pembayaran" data-label="Pembayaran">
                                    @foreach ($skin['payments'] as $m)<option>{{ $m }}</option>@endforeach
                                </select></div>
                            <div class="field field--full"><label for="co-catatan">Catatan</label>
                                <textarea id="co-catatan" name="catatan" data-label="Catatan" rows="2" placeholder="Opsional"></textarea></div>
                        </div>
                        <p class="form-msg" data-form-msg hidden></p>
                    </form>
                </div>
            </div>

            <aside class="panel cart-side" data-cart-summary>
                <h2 class="panel__title panel__title--sm">Ringkasan Pesanan</h2>
                <dl class="sum">
                    <div><dt>Subtotal (<span data-cart-qty>0</span> item)</dt><dd data-cart-subtotal>Rp 0</dd></div>
                    <div><dt>Ongkos kirim</dt><dd data-cart-ship>—</dd></div>
                    <div class="sum__total"><dt>Total</dt><dd data-cart-total>Rp 0</dd></div>
                </dl>
                <div class="ship" data-cart-ship-note>
                    <p></p>
                    <div class="bar bar--in"><i style="width: 0%"></i></div>
                </div>
                <button type="submit" form="checkoutForm" class="btn btn--block btn--lg" data-cart-submit><i class="bi bi-whatsapp"></i> Checkout via WhatsApp</button>
                <ul class="trust-mini">
                    <li><i class="bi bi-shield-check"></i> Produk 100% original</li>
                    <li><i class="bi bi-wallet2"></i> Pembayaran aman &amp; fleksibel</li>
                    <li><i class="bi bi-headset"></i> Layanan {{ $skin['contact']['hours'] }}</li>
                </ul>
            </aside>
        </div>
    </section>
@endsection
