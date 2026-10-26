<section class="section section--tint" id="keranjang-preview">
    <div class="container cart-prev">
        <div class="panel cart-prev__box" data-reveal data-cart-mini>
            <div class="panel__head"><h2 class="panel__title panel__title--sm">Keranjang Kamu</h2><span class="muted" data-cart-mini-count>0 item</span></div>
            <ul class="mini-list" data-cart-mini-list></ul>
            <div class="empty empty--sm" data-cart-mini-empty><i class="bi bi-bag-heart"></i><p>Keranjang masih kosong. Pilih produk favoritmu dulu ya.</p></div>
            <div class="mini-total"><span>Subtotal</span><strong data-cart-mini-total>Rp 0</strong></div>
            <a class="btn btn--block" href="{{ route('skincare-warm-neutral.cart') }}">Buka Keranjang <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="cart-prev__info" data-reveal>
            <p class="kicker"><span></span>BELANJA ONLINE</p>
            <h2 class="sec-title">Checkout Mudah via WhatsApp</h2>
            <p class="sec-sub">Pilih produk, isi data pengiriman, dan pesananmu langsung terkirim ke admin kami.</p>
            <ol class="steps">
                <li><b>1</b><span>Pilih produk &amp; tambahkan ke keranjang</span></li>
                <li><b>2</b><span>Isi data pengiriman &amp; metode pembayaran</span></li>
                <li><b>3</b><span>Kirim pesanan via WhatsApp &amp; konfirmasi admin</span></li>
            </ol>
            <p class="muted small"><i class="bi bi-truck"></i> Gratis ongkir untuk pembelian di atas Rp {{ number_format($skin['free_shipping_min'], 0, ',', '.') }}</p>
        </div>
    </div>
</section>
