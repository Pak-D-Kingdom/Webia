<footer class="uh-footer">
    <div class="uh-container uh-footer__grid">
        <div class="uh-footer__brand">
            <a class="uh-brand" href="{{ $r('home') }}">
                <img class="uh-brand__logo" src="{{ $img('logo.svg') }}" alt="" width="56" height="56" loading="lazy">
                <span class="uh-brand__text"><strong>{{ $d['brand']['name'] }}</strong><small>{{ $d['brand']['tagline'] }}</small></span>
            </a>
        </div>

        <nav class="uh-footer__col" aria-label="Navigasi footer">
            <h3>Navigasi</h3>
            <ul>
                @foreach (array_slice($d['menu'], 0, 5) as [$key, $label])
                    <li><a href="{{ $r($key) }}">{{ $label }}</a></li>
                @endforeach
            </ul>
        </nav>

        <nav class="uh-footer__col" aria-label="Informasi footer">
            <h3>Informasi</h3>
            <ul>
                @foreach (array_slice($d['menu'], 5) as [$key, $label])
                    <li><a href="{{ $r($key) }}">{{ $label }}</a></li>
                @endforeach
                <li><a href="{{ $wa($d['contact']['wa_text']) }}" target="_blank" rel="noopener">Kontak</a></li>
            </ul>
        </nav>

        <div class="uh-footer__col">
            <h3>Kontak Kami</h3>
            <ul class="uh-footer__contact">
                <li><svg class="uh-ico" aria-hidden="true"><use href="#i-phone"/></svg><a href="tel:{{ preg_replace('/[^0-9+]/', '', $d['contact']['phone']) }}">{{ $d['contact']['phone'] }}</a></li>
                <li><svg class="uh-ico" aria-hidden="true"><use href="#i-mail"/></svg><a href="mailto:{{ $d['contact']['email'] }}">{{ $d['contact']['email'] }}</a></li>
                <li><svg class="uh-ico" aria-hidden="true"><use href="#i-pin"/></svg><span>{{ $d['contact']['address'] }}</span></li>
            </ul>
        </div>

        <div class="uh-footer__col">
            <h3>Ikuti Kami</h3>
            <ul class="uh-footer__social">
                @foreach ($d['social_footer'] as $s)
                    <li><a href="{{ $s['url'] }}" target="_blank" rel="noopener" aria-label="{{ $s['label'] }}"><svg class="uh-ico" aria-hidden="true"><use href="#i-{{ $s['key'] }}"/></svg></a></li>
                @endforeach
            </ul>
        </div>

        <div class="uh-footer__tagline" aria-hidden="true">
            <p><span>{{ $d['footer']['script_1'] }}</span><span>{{ $d['footer']['script_2'] }}</span></p>
            <img src="{{ $img('footer-skyline.svg') }}" alt="" loading="lazy">
        </div>
    </div>

    <div class="uh-footer__bar">
        <div class="uh-container uh-footer__bar-in">
            <p>&copy; {{ date('Y') }} {{ $d['brand']['name'] }}. Semua hak dilindungi.</p>
            <ul>
                <li><button type="button" data-dialog="uh-dlg-terms">Syarat &amp; Ketentuan</button></li>
                <li><button type="button" data-dialog="uh-dlg-privacy">Kebijakan Privasi</button></li>
                <li><a href="{{ $r('chat') }}">FAQ</a></li>
            </ul>
        </div>
    </div>
    <div class="uh-footer__credit">
        <div class="uh-container"><p>&copy; 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.</p></div>
    </div>
</footer>

<dialog class="uh-dialog" id="uh-dlg-terms" aria-labelledby="uh-dlg-terms-t">
    <h2 id="uh-dlg-terms-t">Syarat &amp; Ketentuan</h2>
    <p>{{ $d['footer']['terms'] }}</p>
    <button type="button" class="uh-btn uh-btn--gold" data-dialog-close>Tutup</button>
</dialog>
<dialog class="uh-dialog" id="uh-dlg-privacy" aria-labelledby="uh-dlg-privacy-t">
    <h2 id="uh-dlg-privacy-t">Kebijakan Privasi</h2>
    <p>{{ $d['footer']['privacy'] }}</p>
    <button type="button" class="uh-btn uh-btn--gold" data-dialog-close>Tutup</button>
</dialog>
