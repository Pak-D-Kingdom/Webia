{{-- Isi keranjang. Dirender oleh JS ke semua elemen [data-cart-panel] (drawer & sidebar toko) --}}
<div class="cartp" data-cart-panel>
    <div class="cartp__ship">
        <p data-cart-ship-text>Belanja min. Rp {{ number_format($cfg['free_shipping_min'], 0, ',', '.') }} untuk gratis ongkir.</p>
        <div class="meter" aria-hidden="true"><span data-cart-ship-bar></span></div>
    </div>
    <ul class="cartp__list" data-cart-list></ul>
    <p class="cartp__empty" data-cart-empty>Keranjang masih kosong. <a href="{{ route($rp . 'catalog') }}">Pilih produk</a></p>
    <div class="cartp__foot" data-cart-foot hidden>
        <dl class="cartp__sum"><dt>Subtotal</dt><dd data-cart-subtotal>Rp 0</dd></dl>
        <form class="cartp__form" data-checkout-form novalidate>
            <label>Nama lengkap <input type="text" name="name" autocomplete="name" required></label>
            <label>Alamat pengiriman <textarea name="address" rows="2" autocomplete="street-address" required></textarea></label>
            <p class="form-error" data-form-error hidden></p>
            <button class="btn btn--rose btn--block" type="submit"><i class="bi bi-whatsapp" aria-hidden="true"></i> Checkout via WhatsApp</button>
        </form>
        <button type="button" class="link-btn" data-cart-clear>Kosongkan keranjang</button>
    </div>
</div>
