<footer class="abd-footer" id="kontak">
    <div class="abd-footer__skyline" aria-hidden="true"><img src="{{ $img('footer-skyline.svg') }}" alt="" width="1600" height="150" loading="lazy"></div>
    <div class="abd-footer__leaves" aria-hidden="true" style="background-image:url('{{ $img('leaves.svg') }}')"></div>

    <div class="abd-container abd-footer__grid">
        <div class="abd-footer__brand" data-reveal>
            <a class="abd-brand abd-brand--light" href="{{ $u() }}" aria-label="{{ $site['brand']['name'] }} — beranda">
                <svg class="abd-brand__mark" viewBox="0 0 48 48" aria-hidden="true"><use href="#i-logo"/></svg>
                <span class="abd-brand__txt"><strong>{{ $site['brand']['name'] }}</strong><small>{{ $site['brand']['tagline'] }}</small></span>
            </a>
            <p class="abd-footer__slogan">{{ $site['brand']['slogan'] }}</p>
            <ul class="abd-footer__social" aria-label="Media sosial">
                @foreach ($site['socials'] as $s)
                    <li><a href="{{ $s['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $s['label'] }}"><svg class="i" aria-hidden="true"><use href="#i-{{ $s['key'] }}"/></svg></a></li>
                @endforeach
            </ul>
        </div>

        <nav class="abd-footer__col" data-reveal aria-label="Navigasi footer">
            <h3>Navigasi</h3>
            <ul class="abd-footer__links">
                @foreach ($site['footer']['nav'] as [$label, $path])
                    <li><a href="{{ $path === '#kontak' ? '#kontak' : $u($path) }}"><svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg><span>{{ $label }}</span></a></li>
                @endforeach
            </ul>
        </nav>

        <div class="abd-footer__col" data-reveal>
            <h3>Layanan Kami</h3>
            <ul class="abd-footer__links">
                @foreach ($site['footer']['services'] as $s)
                    <li><a href="{{ $u('/layanan') }}"><svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg><span>{{ $s }}</span></a></li>
                @endforeach
            </ul>
        </div>

        <div class="abd-footer__col abd-footer__contact" data-reveal>
            <h3>Kontak Kami</h3>
            <ul>
                <li><span class="abd-footer__ico"><svg class="i" aria-hidden="true"><use href="#i-pin"/></svg></span><span>{{ $site['contact']['address'] }}</span></li>
                <li><span class="abd-footer__ico"><svg class="i" aria-hidden="true"><use href="#i-phone"/></svg></span><a href="tel:{{ $site['contact']['phone_href'] }}">{{ $site['contact']['phone'] }}</a></li>
                <li><span class="abd-footer__ico"><svg class="i" aria-hidden="true"><use href="#i-mail"/></svg></span><a href="mailto:{{ $site['contact']['email'] }}">{{ $site['contact']['email'] }}</a></li>
                <li><span class="abd-footer__ico"><svg class="i" aria-hidden="true"><use href="#i-clock"/></svg></span><span>{{ $site['contact']['hours'] }}</span></li>
            </ul>
        </div>

        <div class="abd-footer__col abd-footer__dl" data-reveal>
            <h3>Download Company Profile</h3>
            <a class="abd-dlcard" href="{{ $img('company-profile.pdf') }}" download="ArchiDesign-Company-Profile.pdf">
                <span class="abd-dlcard__ico" aria-hidden="true"><svg class="i"><use href="#i-doc"/></svg></span>
                <span class="abd-dlcard__txt"><strong>Company Profile</strong><small>Dokumen PDF · {{ $site['brand']['name'] }}</small></span>
                <span class="abd-dlcard__go" aria-hidden="true"><svg class="i"><use href="#i-download"/></svg></span>
            </a>
        </div>
    </div>

    <div class="abd-footer__bar">
        <div class="abd-container abd-footer__bar-in">
            <p class="abd-footer__credit">{{ $site['footer']['credit'] }}</p>
            <ul class="abd-footer__legal">
                <li><button type="button" data-legal="privasi">Kebijakan Privasi</button></li>
                <li><button type="button" data-legal="syarat">Syarat &amp; Ketentuan</button></li>
                <li><button type="button" class="abd-totop" data-top aria-label="Kembali ke atas"><svg class="i" aria-hidden="true"><use href="#i-up"/></svg><span>Ke atas</span></button></li>
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
        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" alt="" id="abd-lightbox-img">
        <p id="abd-lightbox-cap"></p>
    </div>
</dialog>
