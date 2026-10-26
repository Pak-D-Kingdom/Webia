@php $c = $cfg['contact']; @endphp
<footer class="footer">
    <img class="footer__leaf" src="{{ $img }}/leaf-footer-right.png" alt="" aria-hidden="true" loading="lazy">
    <div class="container">
        <div class="footer__grid">
            <div class="footer__brand">
                <a class="brand brand--light" href="{{ route($rp . 'index') }}">
                    <svg class="brand__mark" aria-hidden="true"><use href="#bz-flower"/></svg>
                    <span class="brand__text"><strong>{{ $cfg['brand']['name'] }}</strong><small>{{ $cfg['brand']['tagline'] }}</small></span>
                </a>
            </div>

            <nav class="footer__col" aria-label="Navigasi footer">
                <h2>Navigasi</h2>
                <ul>
                    <li><a href="{{ route($rp . 'index') }}">Home</a></li>
                    <li><a href="{{ route($rp . 'catalog') }}">Katalog Produk</a></li>
                    <li><a href="{{ route($rp . 'price') }}">Daftar Harga</a></li>
                    <li><a href="{{ route($rp . 'stock') }}">Stok &amp; Ketersediaan</a></li>
                    <li><a href="{{ route($rp . 'inquiry') }}">Inquiry</a></li>
                    <li><a href="{{ route($rp . 'shop') }}">Toko Online</a></li>
                </ul>
            </nav>

            <nav class="footer__col" aria-label="Customer care">
                <h2>Customer Care</h2>
                <ul>
                    <li><button type="button" class="link-btn" data-open-chat>FAQ</button></li>
                    <li><a href="{{ route($rp . 'inquiry') }}?topic=pengiriman">Pengiriman</a></li>
                    <li><a href="{{ route($rp . 'inquiry') }}?topic=retur">Retur &amp; Refund</a></li>
                    <li><a href="{{ route($rp . 'inquiry') }}">Syarat &amp; Ketentuan</a></li>
                    <li><a href="{{ route($rp . 'inquiry') }}">Privacy Policy</a></li>
                </ul>
            </nav>

            <div class="footer__col">
                <h2>Kontak Kami</h2>
                <ul class="footer__contact">
                    <li><i class="bi bi-geo-alt" aria-hidden="true"></i><span>{{ $c['address'] }}</span></li>
                    <li><i class="bi bi-envelope" aria-hidden="true"></i><a href="mailto:{{ $c['email'] }}">{{ $c['email'] }}</a></li>
                    <li><i class="bi bi-telephone" aria-hidden="true"></i><a href="tel:+{{ $c['whatsapp'] }}">+{{ substr($c['whatsapp'], 0, 2) }} {{ substr($c['whatsapp'], 2, 3) }} {{ substr($c['whatsapp'], 5, 4) }} {{ substr($c['whatsapp'], 9) }}</a></li>
                </ul>
            </div>

            <div class="footer__col">
                <h2>Ikuti Kami</h2>
                <ul class="footer__social">
                    @foreach ($cfg['social'] as $s)
                        <li><a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" rel="noopener"><i class="bi {{ $s['icon'] }}" aria-hidden="true"></i></a></li>
                    @endforeach
                </ul>
            </div>

            <div class="footer__col">
                <h2>Download Aplikasi</h2>
                <div class="store-badges">
                    <a href="#" class="store-badge"><i class="bi bi-google-play" aria-hidden="true"></i><span><small>Get it on</small>Google Play</span></a>
                    <a href="#" class="store-badge"><i class="bi bi-apple" aria-hidden="true"></i><span><small>Download on the</small>App Store</span></a>
                </div>
            </div>
        </div>

        <div class="footer__bottom">
            <p>&copy; 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.</p>
            <p class="footer__legal"><a href="{{ route($rp . 'inquiry') }}">Privacy Policy</a><span aria-hidden="true">|</span><a href="{{ route($rp . 'inquiry') }}">Terms &amp; Conditions</a></p>
        </div>
    </div>
</footer>
