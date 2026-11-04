<footer class="lw-footer">
    <img class="lw-footer__leaf" src="{{ $img($c['img']['leaf_r']) }}" alt="" aria-hidden="true" loading="lazy">

    <div class="lw-container lw-footer__grid">
        <div class="lw-footer__brand">
            <a class="lw-brand" href="{{ $r('home') }}" aria-label="{{ $c['brand']['name'] }} — beranda">
                <img src="{{ $img($c['img']['logo']) }}" alt="" width="46" height="46" loading="lazy">
                <span class="lw-brand__txt">
                    <span class="lw-brand__name">{{ $c['brand']['name'] }}</span>
                    <span class="lw-brand__tag">{{ $c['brand']['tagline'] }}</span>
                </span>
            </a>
            <p>{{ $c['hero']['text'] }}</p>
            <h3 class="lw-footer__sub">Ikuti Kami</h3>
            <ul class="lw-footer__social">
                @foreach ($c['social'] as $s)
                    <li><a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" target="_blank" rel="noopener"><svg class="lw-i"><use href="#i-{{ $s['icon'] }}"/></svg></a></li>
                @endforeach
            </ul>
        </div>

        <nav aria-label="Navigasi footer">
            <h3>Navigasi</h3>
            <ul class="lw-footer__links">
                @foreach ($c['nav'] as $item)
                    <li><a href="{{ $r($item['route']) }}">{{ $item['label'] }}</a></li>
                @endforeach
            </ul>
        </nav>

        <nav aria-label="Informasi">
            <h3>Informasi</h3>
            <ul class="lw-footer__links">
                @foreach ($c['nav_more'] as $item)
                    <li><a href="{{ $r($item['route']) }}">{{ $item['label'] }}</a></li>
                @endforeach
                <li><button type="button" data-lw-chat-open>FAQ Chatbot</button></li>
            </ul>
        </nav>

        <div>
            <h3>Kontak Kami</h3>
            <ul class="lw-footer__contact">
                <li><span class="lw-ico"><svg class="lw-i"><use href="#i-pin"/></svg></span><span>{{ $c['contact']['address'] }}</span></li>
                <li><span class="lw-ico"><svg class="lw-i"><use href="#i-phone"/></svg></span><a href="tel:{{ preg_replace('/\s+/', '', $c['contact']['phone']) }}">{{ $c['contact']['phone'] }}</a></li>
                <li><span class="lw-ico"><svg class="lw-i"><use href="#i-mail"/></svg></span><a href="mailto:{{ $c['contact']['email'] }}">{{ $c['contact']['email'] }}</a></li>
                <li><span class="lw-ico"><svg class="lw-i"><use href="#i-clock"/></svg></span><span>{{ $c['contact']['hours'] }}</span></li>
            </ul>
            <a class="lw-btn lw-btn--sm lw-footer__cta" href="{{ $r('inquiry') }}">{{ $c['inquiry']['cta'] }} <svg class="lw-i"><use href="#i-arrow"/></svg></a>
        </div>
    </div>

    <div class="lw-footer__bottom">
        <div class="lw-container lw-footer__bottom-in">
            <p class="lw-footer__credit">{{ $c['brand']['credit'] }}</p>
            <p class="lw-footer__tag"><img src="{{ $img($c['img']['logo']) }}" alt="" width="22" height="22" loading="lazy">{{ $c['brand']['tagline'] }}</p>
            <button type="button" class="lw-totop" data-lw-totop aria-label="Kembali ke atas"><svg class="lw-i"><use href="#i-up"/></svg></button>
        </div>
    </div>
</footer>
