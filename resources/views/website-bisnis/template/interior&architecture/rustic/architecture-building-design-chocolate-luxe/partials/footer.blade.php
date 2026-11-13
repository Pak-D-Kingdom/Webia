<footer class="abd-footer" id="kontak">
    <div class="abd-footer__leaves" aria-hidden="true" style="background-image:url('{{ $img('leaves.svg') }}')"></div>
    <div class="abd-container abd-footer__grid">
        <div class="abd-footer__brand">
            <a class="abd-brand abd-brand--light" href="{{ $u() }}" aria-label="{{ $site['brand']['name'] }} — beranda">
                <svg class="abd-brand__mark" viewBox="0 0 48 48" aria-hidden="true"><use href="#i-logo"/></svg>
                <span class="abd-brand__txt"><strong>{{ $site['brand']['name'] }}</strong><small>{{ $site['brand']['tagline'] }}</small></span>
            </a>
            <p>{{ $site['brand']['slogan'] }}</p>
        </div>

        <div class="abd-footer__col">
            <h3>Navigasi</h3>
            <ul>
                @foreach ($site['footer']['nav'] as [$label, $path])
                    <li><a href="{{ $path === '#kontak' ? '#kontak' : $u($path) }}">{{ $label }}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="abd-footer__col">
            <h3>Layanan Kami</h3>
            <ul>
                @foreach ($site['footer']['services'] as $s)
                    <li><a href="{{ $u('/layanan') }}">{{ $s }}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="abd-footer__col abd-footer__contact">
            <h3>Kontak Kami</h3>
            <ul>
                <li><svg class="i" aria-hidden="true"><use href="#i-pin"/></svg><span>{{ $site['contact']['address'] }}</span></li>
                <li><svg class="i" aria-hidden="true"><use href="#i-phone"/></svg><a href="tel:{{ $site['contact']['phone_href'] }}">{{ $site['contact']['phone'] }}</a></li>
                <li><svg class="i" aria-hidden="true"><use href="#i-mail"/></svg><a href="mailto:{{ $site['contact']['email'] }}">{{ $site['contact']['email'] }}</a></li>
            </ul>
            <ul class="abd-footer__social" aria-label="Media sosial">
                @foreach ($site['socials'] as $s)
                    <li><a href="{{ $s['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $s['label'] }}"><svg class="i" aria-hidden="true"><use href="#i-{{ $s['key'] }}"/></svg></a></li>
                @endforeach
            </ul>
        </div>

        <div class="abd-footer__col abd-footer__dl">
            <h3>Download Company Profile</h3>
            <a class="abd-btn abd-btn--ghost-gold" href="{{ $img('company-profile.pdf') }}" download="ArchiDesign-Company-Profile.pdf">
                <svg class="i" aria-hidden="true"><use href="#i-download"/></svg><span>Download PDF</span>
            </a>
        </div>
    </div>

    <div class="abd-footer__bar">
        <div class="abd-container abd-footer__bar-in">
            <p class="abd-footer__credit">{{ $site['footer']['credit'] }}</p>
            <ul class="abd-footer__legal">
                <li><button type="button" data-legal="privasi">Kebijakan Privasi</button></li>
                <li><button type="button" data-legal="syarat">Syarat &amp; Ketentuan</button></li>
            </ul>
        </div>
    </div>
</footer>

<dialog class="abd-dialog" id="abd-legal" aria-labelledby="abd-legal-title">
    <div class="abd-dialog__box">
        <button type="button" class="abd-iconbtn abd-dialog__x" data-dialog-close aria-label="Tutup"><svg class="i" aria-hidden="true"><use href="#i-close"/></svg></button>
        <h2 id="abd-legal-title">Kebijakan Privasi</h2>
        <p data-legal-body></p>
    </div>
</dialog>

<dialog class="abd-dialog abd-dialog--lightbox" id="abd-lightbox" aria-label="Pratinjau gambar">
    <div class="abd-dialog__box">
        <button type="button" class="abd-iconbtn abd-dialog__x" data-dialog-close aria-label="Tutup"><svg class="i" aria-hidden="true"><use href="#i-close"/></svg></button>
        <img src="" alt="" id="abd-lightbox-img">
        <p id="abd-lightbox-cap"></p>
    </div>
</dialog>
