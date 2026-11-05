<footer class="hf-footer" id="kontak">
    <div class="hf-wide hf-footer__grid">
        <div class="hf-footer__brand">
            <a class="hf-brand" href="{{ route($rp.'home') }}" aria-label="{{ $f['brand']['name'] }} {{ $f['brand']['suffix'] }}">@include($v.'.partials.logo')</a>
            <p class="hf-footer__about">{{ $f['footer']['about'] }}</p>
            <p class="hf-footer__rights">{{ $f['brand']['rights'] }}</p>
        </div>

        <div class="hf-footer__col">
            <h4>{{ $f['footer']['nav_title'] }}</h4>
            <ul>
                <li><a href="{{ route($rp.'home') }}">Beranda</a></li>
                <li><a href="{{ route($rp.'mission-vision') }}">Tentang Kami</a></li>
                <li><a href="{{ route($rp.'programs') }}">Program Kami</a></li>
                <li><a href="{{ route($rp.'impact') }}">Dampak</a></li>
            </ul>
        </div>

        <div class="hf-footer__col">
            <h4>{{ $f['footer']['services_title'] }}</h4>
            <ul>
                <li><a href="{{ route($rp.'donation') }}">Donasi</a></li>
                <li><a href="{{ route($rp.'volunteer') }}">Relawan</a></li>
                <li><a href="{{ route($rp.'news') }}">Berita &amp; Acara</a></li>
                <li><a href="#kontak">Kontak</a></li>
            </ul>
        </div>

        <div class="hf-footer__col hf-footer__contact">
            <h4>{{ $f['footer']['contact_title'] }}</h4>
            <ul>
                <li><svg class="hf-i" aria-hidden="true"><use href="#i-pin"/></svg><span>{{ $f['contact']['address'] }}</span></li>
                <li><svg class="hf-i" aria-hidden="true"><use href="#i-phone"/></svg><a href="{{ $f['contact']['phone_href'] }}">{{ $f['contact']['phone'] }}</a></li>
                <li><svg class="hf-i" aria-hidden="true"><use href="#i-mail"/></svg><a href="mailto:{{ $f['contact']['email'] }}">{{ $f['contact']['email'] }}</a></li>
            </ul>
            <div class="hf-footer__social">
                @foreach($f['socials'] as $s)
                    <a href="{{ $s['url'] }}" data-soon aria-label="{{ $s['label'] }}"><svg class="hf-i hf-i--fill" aria-hidden="true"><use href="#i-{{ $s['key'] }}"/></svg></a>
                @endforeach
            </div>
        </div>

        <div class="hf-footer__col hf-footer__profile">
            <h4>{{ $f['footer']['profile_title'] }}</h4>
            <a class="hf-btn hf-btn--dark hf-btn--sm" href="#" data-soon="Profil lembaga (PDF) akan tersedia pada versi produksi."><svg class="hf-i" aria-hidden="true"><use href="#i-download"/></svg> {{ $f['footer']['profile_button'] }}</a>
            <div class="hf-footer__legal">
                @foreach($f['footer']['legal'] as $l)
                    <a href="#" data-soon>{{ $l['label'] }}</a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="hf-footer__credit">
        <div class="hf-wide"><p>{{ $f['brand']['credit'] }}</p></div>
    </div>
</footer>
