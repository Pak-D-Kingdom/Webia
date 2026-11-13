<footer class="hr-footer">
    <div class="hr-container">
        <div class="hr-footer__grid">
            <div class="hr-footer__brand">
                <a class="hr-logo hr-logo--light" href="{{ $go('home') }}">
                    @include($vp.'logo', ['light' => true])
                    <span class="hr-logo__text"><strong>{{ $cfg['site']['name'] }}</strong><small>{{ $cfg['site']['tagline'] }}</small></span>
                </a>
                <p>Renovasi & perbaikan rumah yang rapi, transparan, dan bernilai lebih tinggi.</p>
            </div>
            <div>
                <h4>Navigasi</h4>
                <ul>
                    <li><a href="{{ $go('home') }}">Beranda</a></li>
                    <li><a href="{{ $go('layanan') }}">Layanan</a></li>
                    <li><a href="{{ $go('paket-layanan') }}">Paket Layanan</a></li>
                    <li><a href="{{ $go('galeri') }}">Galeri</a></li>
                </ul>
            </div>
            <div>
                <h4>Informasi</h4>
                <ul>
                    <li><a href="{{ $go('proses-kerja') }}">Tentang Kami</a></li>
                    <li><button type="button" data-chat-ask="FAQ">FAQ</button></li>
                    <li><a href="{{ $go('permintaan-penawaran') }}">Kontak</a></li>
                    <li><button type="button" data-chat-ask="Lowongan karir">Karir</button></li>
                </ul>
            </div>
            <div>
                <h4>Ikuti Kami</h4>
                <ul class="hr-social hr-social--foot">
                    @foreach ($cfg['social'] as $s)
                        @if (in_array($s['icon'], ['facebook', 'instagram', 'youtube', 'linkedin']))
                            <li><a href="{{ $s['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $s['label'] }}">{{ $i($s['icon']) }}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="hr-footer__news">
                <h4>Berlangganan Newsletter</h4>
                <p>Dapatkan update terbaru dari Renovaku!</p>
                <form class="hr-news" data-newsletter novalidate>
                    <label class="sr-only" for="hrNewsEmail">Email Anda</label>
                    <input id="hrNewsEmail" type="email" name="email" placeholder="Email Anda" autocomplete="email" required>
                    <button type="submit" aria-label="Berlangganan">{{ $i('send') }}</button>
                </form>
                <p class="hr-news__msg" data-newsletter-msg role="status" aria-live="polite"></p>
            </div>
        </div>
        <div class="hr-footer__bar">
            <p>{{ $cfg['site']['copyright'] }}</p>
            <ul>
                <li><button type="button" data-chat-ask="Syarat & ketentuan">Syarat & Ketentuan</button></li>
                <li><button type="button" data-chat-ask="Kebijakan privasi">Kebijakan Privasi</button></li>
                <li><button type="button" data-chat-ask="Bantuan">Bantuan</button></li>
            </ul>
        </div>
        <p class="hr-footer__credit">{{ $cfg['site']['credit'] }}</p>
    </div>
</footer>
