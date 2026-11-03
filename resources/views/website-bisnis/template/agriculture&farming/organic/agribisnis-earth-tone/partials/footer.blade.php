<footer class="footer" id="footer">
    <div class="footer__inner">
        <div class="footer__grid">
            <div class="footer__brand">
                <a class="brand brand--light" href="{{ $u['home'] }}" aria-label="{{ $data['brand']['name'] }}">
                    <img class="brand__leaf" src="{{ $img }}/logo-leaf-light.png" alt="" width="42" height="42">
                    <span class="brand__text">
                        <strong>{{ $data['brand']['name'] }}</strong>
                        <small>{{ $data['brand']['tagline'] }}</small>
                    </span>
                </a>
                <p>{{ $data['brand']['summary'] }}</p>
                <ul class="social">
                    @foreach ($data['social'] as $s)
                        <li><a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" @if($s['url'] !== '#') target="_blank" rel="noopener" @endif><svg class="ico"><use href="#i-{{ $s['key'] }}"></use></svg></a></li>
                    @endforeach
                </ul>
            </div>

            <nav class="footer__col" aria-label="Navigasi">
                <h3>Navigasi</h3>
                <ul>
                    <li><a href="{{ $u['home'] }}">Beranda</a></li>
                    <li><a href="{{ $u['komoditas'] }}">Komoditas</a></li>
                    <li><a href="{{ $u['home'] }}#tentang">Tentang Kami</a></li>
                    <li><a href="{{ $u['b2b'] }}">Kemitraan</a></li>
                </ul>
            </nav>

            <nav class="footer__col" aria-label="Informasi">
                <h3>Informasi</h3>
                <ul>
                    <li><a href="{{ $u['sertifikasi'] }}">Kualitas &amp; Sertifikasi</a></li>
                    <li><a href="{{ $u['kapasitas'] }}">Rantai Pasok yang Efisien</a></li>
                    <li><a href="{{ $u['chatbot'] }}">FAQ</a></li>
                    <li><a href="#kontak">Kontak</a></li>
                </ul>
            </nav>

            <nav class="footer__col" aria-label="Layanan kami">
                <h3>Layanan Kami</h3>
                <ul>
                    <li><a href="{{ $u['komoditas'] }}">Perdagangan Komoditas</a></li>
                    <li><a href="{{ $u['b2b'] }}">Kemitraan Bisnis</a></li>
                    <li><a href="{{ $u['chatbot'] }}">Konsultasi Agribisnis</a></li>
                    <li><a href="{{ $u['penawaran'] }}">Project Export</a></li>
                </ul>
            </nav>

            <div class="footer__col footer__contact" id="kontak">
                <h3>Hubungi Kami</h3>
                <ul>
                    <li><svg class="ico"><use href="#i-phone"></use></svg><a href="tel:{{ $data['contact']['phone_link'] }}">{{ $data['contact']['phone'] }}</a></li>
                    <li><svg class="ico"><use href="#i-mail"></use></svg><a href="mailto:{{ $data['contact']['email'] }}">{{ $data['contact']['email'] }}</a></li>
                    <li><svg class="ico"><use href="#i-pin"></use></svg><span>{{ $data['contact']['address'] }}</span></li>
                </ul>
            </div>
        </div>

        <div class="footer__bottom">
            <p>&copy; 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.</p>
        </div>
    </div>
</footer>
