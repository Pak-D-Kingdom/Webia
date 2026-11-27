<div class="overlay" id="cartOverlay" data-close-cart></div>
<aside class="drawer" id="cartDrawer" aria-label="Keranjang belanja" aria-hidden="true">
    <header>
        <h3 class="text-xl">Keranjang <span class="dim text-base" id="cartDrawerCount"></span></h3>
        <button class="icon-btn" data-close-cart aria-label="Tutup keranjang">{{ $ic('close') }}</button>
    </header>
    <div class="body" id="cartDrawerBody"></div>
    <footer>
        <div class="sum-row total"><span>Total</span><span id="cartDrawerTotal">Rp 0</span></div>
        <div class="grid grid-cols-2 gap-3 mt-4">
            <a href="{{ $u('cart') }}" class="btn btn-ghost">Lihat Keranjang</a>
            <a href="{{ $u('checkout') }}" class="btn btn-primary">Checkout {{ $ic('arrow', 'ico-sm') }}</a>
        </div>
    </footer>
</aside>
