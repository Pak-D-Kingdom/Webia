<footer class="hr-footer">
    <div class="hr-footer__wave" aria-hidden="true">
        <svg viewBox="0 0 1440 90" preserveAspectRatio="none"><path d="M0 46c120 36 240 40 360 14S600 6 720 14s240 46 360 44 240-30 360-48v80H0z"/></svg>
    </div>
    <div class="hr-footer__leaves" aria-hidden="true">
        <svg class="hr-leaf hr-leaf--f1" viewBox="0 0 120 200"><path d="M10 190C-10 120 20 40 90 6c14 70-6 150-80 184z" fill="#8fb082" opacity=".22"/></svg>
        <svg class="hr-leaf hr-leaf--f2" viewBox="0 0 120 200"><path d="M110 190C130 120 100 40 30 6c-14 70 6 150 80 184z" fill="#b4cba7" opacity=".16"/></svg>
    </div>

    <div class="hr-container hr-footer__inner">
        <section class="hr-footer__cta" aria-label="Ajakan konsultasi">
            <div>
                <p class="hr-footer__kicker">{{ $i('leaf') }} Mulai dari obrolan ringan</p>
                <h2>Siap mewujudkan rumah impian Anda?</h2>
                <p>Ceritakan kebutuhan Anda. Tim kami mendampingi dari survei lokasi sampai serah terima.</p>
            </div>
            <div class="hr-footer__ctabtns">
                <a class="hr-btn hr-btn--gold hr-btn--lg" href="{{ $go('booking-survei') }}">{{ $i('calendar') }}<span>Booking Survei</span></a>
                <a class="hr-btn hr-btn--light hr-btn--lg" href="https://wa.me/{{ $cfg['site']['whatsapp'] }}?text={{ rawurlencode('Halo Renovaku, saya ingin konsultasi renovasi rumah.') }}" target="_blank" rel="noopener noreferrer">{{ $i('whatsapp') }}<span>Chat WhatsApp</span></a>
            </div>
        </section>

        <div class="hr-footer__grid">
            <div class="hr-footer__brand">
                <a class="hr-logo hr-logo--light" href="{{ $go('home') }}">
                    @include($vp.'logo', ['light' => true])
                    <span class="hr-logo__text"><strong>{{ $cfg['site']['name'] }}</strong><small>{{ $cfg['site']['tagline'] }}</small></span>
                </a>
                <p>Renovasi &amp; perbaikan rumah yang rapi, transparan, dan bernilai lebih tinggi.</p>
                <ul class="hr-footer__contact">
                    <li>{{ $i('pin') }}<a href="{{ $cfg['site']['maps_url'] }}" target="_blank" rel="noopener noreferrer">{{ $cfg['site']['address'] }}</a></li>
                    <li>{{ $i('phone') }}<a href="{{ $cfg['site']['phone_href'] }}">{{ $cfg['site']['phone'] }}</a></li>
                    <li>{{ $i('whatsapp') }}<a href="https://wa.me/{{ $cfg['site']['whatsapp'] }}" target="_blank" rel="noopener noreferrer">{{ $cfg['site']['whatsapp_display'] }}</a></li>
                    <li>{{ $i('mail') }}<a href="mailto:{{ $cfg['site']['email'] }}">{{ $cfg['site']['email'] }}</a></li>
                </ul>
            </div>
            <div>
                <h3>Navigasi</h3>
                <ul class="hr-footer__links">
                    <li><a href="{{ $go('home') }}">Beranda</a></li>
                    <li><a href="{{ $go('layanan') }}">Layanan</a></li>
                    <li><a href="{{ $go('paket-layanan') }}">Paket Layanan</a></li>
                    <li><a href="{{ $go('galeri') }}">Galeri</a></li>
                    <li><a href="{{ $go('proyek') }}">Proyek Kami</a></li>
                </ul>
            </div>
            <div>
                <h3>Informasi</h3>
                <ul class="hr-footer__links">
                    <li><a href="{{ $go('proses-kerja') }}">Tentang Kami</a></li>
                    <li><a href="{{ $go('area-layanan') }}">Area Layanan</a></li>
                    <li><button type="button" data-chat-ask="FAQ">FAQ</button></li>
                    <li><a href="{{ $go('permintaan-penawaran') }}">Kontak</a></li>
                    <li><button type="button" data-chat-ask="Lowongan karir">Karir</button></li>
                </ul>
            </div>
            <div>
                <h3>Ikuti Kami</h3>
                <ul class="hr-footer__social">
                    @foreach ($cfg['social'] as $s)
                        @if (in_array($s['icon'], ['facebook', 'instagram', 'youtube', 'linkedin']))
                            <li><a href="{{ $s['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $s['label'] }}">{{ $i($s['icon']) }}<span>{{ $s['label'] }}</span></a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="hr-footer__news">
                <h3>Berlangganan Newsletter</h3>
                <p>Dapatkan update terbaru dari Renovaku!</p>
                <form class="hr-news" data-newsletter novalidate>
                    <label class="sr-only" for="hrNewsEmail">Email Anda</label>
                    <span class="hr-news__ico">{{ $i('mail') }}</span>
                    <input id="hrNewsEmail" type="email" name="email" placeholder="Email Anda" autocomplete="email" required>
                    <button type="submit" aria-label="Berlangganan">{{ $i('send') }}</button>
                </form>
                <p class="hr-news__msg" data-newsletter-msg role="status" aria-live="polite"></p>
            </div>
        </div>

        <div class="hr-footer__bar">
            <p>{{ $cfg['site']['copyright'] }}</p>
            <ul>
                <li><button type="button" data-chat-ask="Syarat & ketentuan">Syarat &amp; Ketentuan</button></li>
                <li><button type="button" data-chat-ask="Kebijakan privasi">Kebijakan Privasi</button></li>
                <li><button type="button" data-chat-ask="Bantuan">Bantuan</button></li>
            </ul>
            <button type="button" class="hr-totop" data-top>{{ $i('arrow-up') }}<span>Ke atas</span></button>
        </div>
        <p class="hr-footer__credit">{{ $cfg['site']['credit'] }}</p>
    </div>
</footer>
