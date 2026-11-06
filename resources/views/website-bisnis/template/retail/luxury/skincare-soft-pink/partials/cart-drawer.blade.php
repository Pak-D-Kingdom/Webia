<div class="overlay" data-overlay hidden></div>
<aside class="drawer" id="cart-drawer" role="dialog" aria-modal="true" aria-label="Keranjang belanja" data-drawer hidden>
    <div class="drawer__head">
        <h2>Keranjang Belanja</h2>
        <button class="icon-btn" type="button" data-drawer-close aria-label="Tutup keranjang"><i class="bi bi-x-lg" aria-hidden="true"></i></button>
    </div>
    @include($ns . '.partials.cart-panel')
</aside>
