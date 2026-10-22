@php($r = $e['route'])
<footer class="nl-footer">
    <div class="nl-container nl-footer__grid">
        <div class="nl-footer__brand">
            <a class="nl-brand" href="{{ route($r.'home') }}">
                <svg class="nl-brand__mark" viewBox="0 0 36 36" aria-hidden="true"><use href="#i-logo"/></svg>
                <span class="nl-brand__txt"><strong>{{ $e['brand']['name'] }}</strong><small>{{ $e['brand']['tagline'] }}</small></span>
            </a>
        </div>

        <nav aria-label="Navigasi footer">
            <h3>Navigasi</h3>
            <ul>@foreach($e['footer']['navigasi'] as $l)<li><a href="{{ route($r.$l['route']) }}">{{ $l['label'] }}</a></li>@endforeach</ul>
        </nav>

        <nav aria-label="Akses cepat">
            <h3>Akses Cepat</h3>
            <ul>@foreach($e['footer']['akses'] as $l)<li><a href="{{ route($r.$l['route']) }}">{{ $l['label'] }}</a></li>@endforeach</ul>
        </nav>

        <div>
            <h3>Kontak Kami</h3>
            <ul class="nl-footer__contact">
                <li><svg class="ic"><use href="#i-pin"/></svg><span>{{ $e['topbar']['address'] }}</span></li>
                <li><svg class="ic"><use href="#i-mail"/></svg><a href="mailto:{{ $e['topbar']['email'] }}">{{ $e['topbar']['email'] }}</a></li>
                <li><svg class="ic"><use href="#i-phone"/></svg><a href="tel:{{ $e['topbar']['phone_href'] }}">{{ $e['topbar']['phone'] }}</a></li>
            </ul>
        </div>

        <div>
            <h3>Ikut Kami</h3>
            <ul class="nl-footer__social">
                @foreach($e['socials'] as $s)<li><a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}"><svg class="ic"><use href="#i-{{ $s['icon'] }}"/></svg></a></li>@endforeach
            </ul>
        </div>

        <div class="nl-footer__news">
            <h3>Dapatkan Update Terbaru</h3>
            <form class="nl-news" data-newsletter novalidate>
                <label class="nl-sr" for="nl-news-email">Alamat email</label>
                <input id="nl-news-email" type="email" name="email" placeholder="Masukkan email kamu..." autocomplete="email" required>
                <button type="submit" aria-label="Kirim"><svg class="ic"><use href="#i-send"/></svg></button>
            </form>
            <p class="nl-form-msg" data-news-msg role="status" aria-live="polite"></p>
        </div>
    </div>

    <div class="nl-footer__bottom">
        <div class="nl-container"><p>{{ $e['brand']['credit'] }}</p></div>
    </div>
</footer>
