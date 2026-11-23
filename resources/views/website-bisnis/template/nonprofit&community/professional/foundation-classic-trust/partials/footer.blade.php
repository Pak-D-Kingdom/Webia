@php
    $c = $fd['contact'];
    $maps = 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode($c['address']);
    $wa = 'https://wa.me/' . $c['whatsapp'] . '?text=' . rawurlencode('Halo Harapan Untuk Negeri Foundation, saya ingin bertanya.');
@endphp
<footer class="fd-footer">
    <div class="fd-footer__waves" aria-hidden="true">
        <svg class="fd-footer__wave fd-footer__wave--b" viewBox="0 0 2880 70" preserveAspectRatio="none" aria-hidden="true"><path d="M0 70V34C200 4 420 2 660 26s520 40 780 6C1640 4 1860 2 2100 26s520 40 780 6V70z"/></svg>
        <svg class="fd-footer__wave" viewBox="0 0 2880 70" preserveAspectRatio="none" aria-hidden="true"><path d="M0 70V34C200 4 420 2 660 26s520 40 780 6C1640 4 1860 2 2100 26s520 40 780 6V70z"/></svg>
    </div>
    <div class="fd-footer__bg" aria-hidden="true">
        <img class="fd-footer__mark" src="{{ $i('logo-light.svg') }}" alt="" width="520" height="520">
        <span class="fd-fheart" style="--x:6%;--d:0s;--s:.9"></span><span class="fd-fheart" style="--x:28%;--d:-3s;--s:.7"></span><span class="fd-fheart" style="--x:52%;--d:-6s;--s:1"></span><span class="fd-fheart" style="--x:74%;--d:-2s;--s:.8"></span><span class="fd-fheart" style="--x:92%;--d:-8s;--s:.7"></span>
    </div>

    <div class="fd-wrap fd-footer__in">
        <section class="fd-fcard fd-fcard--brand" aria-label="Tentang yayasan">
            <a class="fd-brand" href="{{ $r('index') }}" aria-label="{{ $fd['brand']['name'] }} {{ $fd['brand']['suffix'] }}">
                <img src="{{ $i('logo-light.svg') }}" alt="" width="60" height="60">
                <span><strong>{{ $fd['brand']['name'] }}</strong><em>{{ $fd['brand']['suffix'] }}</em></span>
            </a>
            <p class="fd-footer__about">Lembaga filantropi yang bekerja bersama masyarakat, relawan, dan mitra untuk pendidikan, kesehatan, ekonomi, dan lingkungan yang lebih baik.</p>
            <div class="fd-footer__social">
                @foreach ($fd['social'] as $s)
                    <a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" title="{{ $s['label'] }}" @if($s['url'] !== '#') target="_blank" rel="noopener" @endif><svg class="fd-ico"><use href="#fd-i-{{ $s['key'] }}"/></svg></a>
                @endforeach
            </div>
        </section>

        <section class="fd-fcard fd-fcard--nav" aria-label="Tautan">
            @foreach ($fd['footer_nav'] as $title => $items)
                <nav class="fd-footer__col" aria-label="{{ $title }}">
                    <h4>{{ $title }}</h4>
                    <ul>
                        @foreach ($items as $it)
                            <li><a href="{{ $r($it[1]) }}"><span class="fd-footer__dot"></span>{{ $it[0] }}</a></li>
                        @endforeach
                    </ul>
                </nav>
            @endforeach
        </section>

        <section class="fd-fcard fd-fcard--contact fd-footer__col" id="kontak" aria-label="Kontak">
            <h4>Kontak Kami</h4>
            <ul class="fd-contact">
                <li><a href="{{ $maps }}" target="_blank" rel="noopener"><span class="fd-contact__ico"><svg class="fd-ico"><use href="#fd-i-pin"/></svg></span><span>{{ $c['address'] }}</span></a></li>
                <li><a href="{{ $c['phone_href'] }}"><span class="fd-contact__ico"><svg class="fd-ico"><use href="#fd-i-phone"/></svg></span><span>{{ $c['phone'] }}</span></a></li>
                <li><a href="mailto:{{ $c['email'] }}"><span class="fd-contact__ico"><svg class="fd-ico"><use href="#fd-i-mail"/></svg></span><span>{{ $c['email'] }}</span></a></li>
            </ul>
            <a class="fd-btn fd-btn--ghost fd-btn--sm fd-footer__wa" href="{{ $wa }}" target="_blank" rel="noopener"><svg class="fd-ico"><use href="#fd-i-whatsapp"/></svg>Chat WhatsApp</a>
        </section>
    </div>

    <div class="fd-wrap">
        <div class="fd-dlstrip">
            <span class="fd-dlstrip__ico"><svg class="fd-ico"><use href="#fd-i-doc"/></svg></span>
            <div><h4>Download Profile</h4><p>Kenali yayasan kami lebih dekat lewat dokumen profil lengkap.</p></div>
            <a class="fd-btn fd-btn--gold" href="{{ $i('profile-harapan-untuk-negeri.pdf') }}" download><svg class="fd-ico"><use href="#fd-i-download"/></svg>Download PDF</a>
        </div>
    </div>
    <div class="fd-footer__bar">
        <div class="fd-wrap fd-footer__barin">
            <span>{{ $fd['brand']['copyright'] }}</span>
            <span class="fd-legal">
                <a href="#" data-fd-toast="Halaman Kebijakan Privasi akan segera tersedia.">Kebijakan Privasi</a><i></i>
                <a href="#" data-fd-toast="Halaman Syarat & Ketentuan akan segera tersedia.">Syarat &amp; Ketentuan</a>
            </span>
        </div>
    </div>
    <div class="fd-credit">{{ $fd['brand']['credit'] }}</div>
</footer>
