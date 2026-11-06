<footer class="fh-footer" id="kontak">
    <div class="fh-footer__leaves" aria-hidden="true"></div>

    <div class="fh-wrap fh-footer__grid">
        <div class="fh-footer__brand">
            <a class="fh-logo fh-logo--light" href="{{ $url('') }}" aria-label="{{ $cfg['brand']['name'] }} {{ $cfg['brand']['suffix'] }} — beranda">
                <img src="{{ $img('logo-leaf.png') }}" alt="" width="54" height="43" loading="lazy">
                <span class="fh-logo__text"><strong>{{ $cfg['brand']['name'] }}</strong><small>{{ $cfg['brand']['suffix'] }}</small></span>
            </a>
            <p>{{ $cfg['brand']['tagline'] }}.</p>
        </div>

        <div class="fh-footer__col">
            <h3>Navigasi</h3>
            <ul>
                @foreach ($cfg['footer']['nav'] as $l)
                    <li><a href="{{ $url($l[1]) }}">{{ $l[0] }}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="fh-footer__col">
            <h3>Layanan</h3>
            <ul>
                @foreach ($cfg['footer']['service'] as $l)
                    <li><a href="{{ $url($l[1]) }}">{{ $l[0] }}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="fh-footer__col fh-footer__contact">
            <h3>Kontak Kami</h3>
            <ul>
                <li>{{ $icon('pin') }}<span>{{ $cfg['contact']['address_short'] }}</span></li>
                <li>{{ $icon('phone') }}<a href="tel:{{ $cfg['contact']['phone_link'] }}">{{ $cfg['contact']['phone'] }}</a></li>
                <li>{{ $icon('mail') }}<a href="mailto:{{ $cfg['contact']['email'] }}">{{ $cfg['contact']['email'] }}</a></li>
            </ul>
            <div class="fh-footer__social">
                @foreach ($cfg['social'] as $s)
                    <a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" rel="noopener">{{ $icon($s['key']) }}</a>
                @endforeach
            </div>
        </div>

        <div class="fh-footer__col fh-footer__dl">
            <h3>Download Profile</h3>
            <a class="fh-btn fh-btn--gold-outline" href="#" data-fh-noop="Tautkan tombol ini ke berkas PDF profil yayasan.">{{ $icon('download') }}Download PDF</a>
        </div>
    </div>

    <div class="fh-wrap fh-footer__bar">
        <p>{{ $cfg['footer']['copy'] }}</p>
        <p class="fh-footer__legal"><a href="#" data-fh-noop="Halaman Kebijakan Privasi belum dihubungkan.">Kebijakan Privasi</a><span aria-hidden="true">|</span><a href="#" data-fh-noop="Halaman Syarat &amp; Ketentuan belum dihubungkan.">Syarat &amp; Ketentuan</a></p>
    </div>

    <div class="fh-footer__credit">
        <p>{{ $cfg['footer']['credit'] }}</p>
    </div>
</footer>
