@php $c = $fd['contact']; @endphp
<footer class="fd-footer">
    <svg class="fd-footer__wave" viewBox="0 0 1440 70" preserveAspectRatio="none" aria-hidden="true"><path d="M0 70V34C200 4 420 2 660 26s520 40 780 6V70z"/></svg>
    <div class="fd-footer__bg" aria-hidden="true">
        <span class="fd-fheart" style="--x:6%;--d:0s;--s:.9"></span><span class="fd-fheart" style="--x:28%;--d:-3s;--s:.7"></span><span class="fd-fheart" style="--x:52%;--d:-6s;--s:1"></span><span class="fd-fheart" style="--x:74%;--d:-2s;--s:.8"></span><span class="fd-fheart" style="--x:92%;--d:-8s;--s:.7"></span>
    </div>
    <div class="fd-wrap fd-footer__in">
        <div class="fd-footer__brand">
            <a class="fd-brand" href="{{ $r('index') }}" aria-label="{{ $fd['brand']['name'] }} {{ $fd['brand']['suffix'] }}">
                <img src="{{ $i('logo-light.svg') }}" alt="" width="60" height="60">
                <span><strong>{{ $fd['brand']['name'] }}</strong><em>{{ $fd['brand']['suffix'] }}</em></span>
            </a>
            <p class="fd-footer__about">Lembaga filantropi yang bekerja bersama masyarakat, relawan, dan mitra untuk pendidikan, kesehatan, ekonomi, dan lingkungan yang lebih baik.</p>
            <p class="fd-footer__copy">{{ $fd['brand']['copyright'] }}</p>
        </div>
        @foreach ($fd['footer_nav'] as $title => $items)
            <nav class="fd-footer__col" aria-label="{{ $title }}">
                <h4>{{ $title }}</h4>
                <ul>
                    @foreach ($items as $it)
                        <li><a href="{{ $r($it[1]) }}"><svg class="fd-ico"><use href="#fd-i-arrow"/></svg>{{ $it[0] }}</a></li>
                    @endforeach
                </ul>
            </nav>
        @endforeach
        <div class="fd-footer__col" id="kontak">
            <h4>Kontak Kami</h4>
            <ul class="fd-contact">
                <li><span class="fd-contact__ico"><svg class="fd-ico"><use href="#fd-i-pin"/></svg></span><span>{{ $c['address'] }}</span></li>
                <li><span class="fd-contact__ico"><svg class="fd-ico"><use href="#fd-i-phone"/></svg></span><a href="{{ $c['phone_href'] }}">{{ $c['phone'] }}</a></li>
                <li><span class="fd-contact__ico"><svg class="fd-ico"><use href="#fd-i-mail"/></svg></span><a href="mailto:{{ $c['email'] }}">{{ $c['email'] }}</a></li>
            </ul>
            <div class="fd-footer__social">
                @foreach ($fd['social'] as $s)
                    <a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" @if($s['url'] !== '#') target="_blank" rel="noopener" @endif><svg class="fd-ico"><use href="#fd-i-{{ $s['key'] }}"/></svg></a>
                @endforeach
            </div>
        </div>
        <div class="fd-footer__dl">
            <h4>Download Profile</h4>
            <div class="fd-dlcard">
                <span class="fd-dlcard__ico"><svg class="fd-ico"><use href="#fd-i-doc"/></svg></span>
                <p>Kenali yayasan kami lebih dekat lewat dokumen profil.</p>
                <a class="fd-btn fd-btn--gold fd-btn--sm" href="{{ $i('profile-harapan-untuk-negeri.pdf') }}" download><svg class="fd-ico"><use href="#fd-i-download"/></svg>Download PDF</a>
            </div>
        </div>
    </div>
    <div class="fd-footer__bar">
        <div class="fd-wrap fd-footer__barin">
            <span class="fd-legal">
                <a href="#" data-fd-toast="Halaman Kebijakan Privasi akan segera tersedia.">Kebijakan Privasi</a><i></i>
                <a href="#" data-fd-toast="Halaman Syarat & Ketentuan akan segera tersedia.">Syarat &amp; Ketentuan</a>
            </span>
        </div>
    </div>
    <div class="fd-credit">{{ $fd['brand']['credit'] }}</div>
</footer>
