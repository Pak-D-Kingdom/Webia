@php
    $cfg ??= config('template.retail.organic.skincare-sage-green.skincare');
    $img = asset($cfg['assets']['img']);
@endphp
<footer class="site-footer">
    <svg class="deco deco--footer-l" aria-hidden="true"><use href="#i-branch"/></svg>
    <svg class="deco deco--footer-r" aria-hidden="true"><use href="#i-branch"/></svg>

    <div class="container footer__grid">
        <div class="footer__brand">
            <a class="brand brand--light" href="{{ route($cfg['route'] . 'home') }}">
                <span class="brand__mark"><svg class="ico" aria-hidden="true"><use href="#i-logo"/></svg></span>
                <span class="brand__text">
                    <strong>{{ $cfg['brand']['name'] }}</strong>
                    <small>{{ $cfg['brand']['tagline'] }}</small>
                </span>
            </a>
            <p>{{ $cfg['footer']['text'] }}</p>
        </div>

        <nav class="footer__col" aria-label="Navigasi footer">
            <h3>Navigasi</h3>
            <ul>
                @foreach($cfg['nav'] as $item)
                    <li><a href="{{ route($cfg['route'] . $item['route']) }}">{{ $item['label'] }}</a></li>
                @endforeach
            </ul>
        </nav>

        <div class="footer__col">
            <h3>Customer Care</h3>
            <ul>
                <li><button type="button" data-ai-open>AI FAQ</button></li>
                <li><a href="{{ route($cfg['route'] . 'inquiry') }}">Kirim Inquiry</a></li>
                <li><a href="{{ route($cfg['route'] . 'stock') }}">Cek Ketersediaan Stok</a></li>
                <li><a href="{{ route($cfg['route'] . 'price') }}">Daftar Harga</a></li>
                <li><a href="https://wa.me/{{ $cfg['whatsapp']['number'] }}" target="_blank" rel="noopener noreferrer">Chat WhatsApp</a></li>
            </ul>
        </div>

        <div class="footer__col footer__col--contact">
            <h3>Kontak Kami</h3>
            <ul>
                <li><svg class="ico" aria-hidden="true"><use href="#i-pin"/></svg><span>{{ $cfg['contact']['address'] }}</span></li>
                <li><svg class="ico" aria-hidden="true"><use href="#i-mail"/></svg><a href="mailto:{{ $cfg['contact']['email'] }}">{{ $cfg['contact']['email'] }}</a></li>
                <li><svg class="ico" aria-hidden="true"><use href="#i-phone"/></svg><a href="https://wa.me/{{ $cfg['whatsapp']['number'] }}" target="_blank" rel="noopener noreferrer">{{ $cfg['whatsapp']['display'] }}</a></li>
            </ul>
        </div>

        <div class="footer__col">
            <h3>Ikuti Kami</h3>
            <ul class="footer__social">
                @foreach($cfg['socials'] as $s)
                    <li><a href="{{ $s['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $s['label'] }}"><svg class="ico" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg></a></li>
                @endforeach
            </ul>
            <h3 class="footer__sub">Metode Pembayaran</h3>
            <p class="footer__pay">Transfer Bank · E-Wallet · Virtual Account</p>
        </div>
    </div>

    <div class="footer__bottom">
        <div class="container">
            <p>{{ $cfg['footer']['credit'] }}</p>
        </div>
    </div>
</footer>
