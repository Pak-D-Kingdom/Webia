<footer class="lw-footer">
    <div class="lw-container lw-footer__grid">
        <div class="lw-footer__brand">
            <a class="lw-brand" href="{{ $r('home') }}">
                <img src="{{ $img($c['img']['logo']) }}" alt="" width="46" height="46">
                <span class="lw-brand__txt">
                    <span class="lw-brand__name">{{ $c['brand']['name'] }}</span>
                    <span class="lw-brand__tag">{{ $c['brand']['tagline'] }}</span>
                </span>
            </a>
            <p>{{ $c['hero']['text'] }}</p>
        </div>

        <nav aria-label="Navigasi footer">
            <h3>Navigasi</h3>
            <ul>
                @foreach ($c['nav'] as $item)
                    <li><a href="{{ $r($item['route']) }}">{{ $item['label'] }}</a></li>
                @endforeach
            </ul>
        </nav>

        <nav aria-label="Informasi">
            <h3>Informasi</h3>
            <ul>
                @foreach ($c['nav_more'] as $item)
                    <li><a href="{{ $r($item['route']) }}">{{ $item['label'] }}</a></li>
                @endforeach
                <li><button type="button" data-lw-chat-open>FAQ Chatbot</button></li>
            </ul>
        </nav>

        <div>
            <h3>Kontak Kami</h3>
            <ul class="lw-footer__contact">
                <li><svg class="lw-i"><use href="#i-pin"/></svg>{{ $c['contact']['address'] }}</li>
                <li><svg class="lw-i"><use href="#i-phone"/></svg><a href="tel:{{ preg_replace('/\s+/', '', $c['contact']['phone']) }}">{{ $c['contact']['phone'] }}</a></li>
                <li><svg class="lw-i"><use href="#i-mail"/></svg><a href="mailto:{{ $c['contact']['email'] }}">{{ $c['contact']['email'] }}</a></li>
            </ul>
        </div>

        <div>
            <h3>Ikuti Kami</h3>
            <ul class="lw-footer__social">
                @foreach ($c['social'] as $s)
                    <li><a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" target="_blank" rel="noopener"><svg class="lw-i"><use href="#i-{{ $s['icon'] }}"/></svg></a></li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="lw-footer__bottom">
        <div class="lw-container lw-footer__bottom-in">
            <p class="lw-footer__tag"><img src="{{ $img($c['img']['logo']) }}" alt="" width="22" height="22">{{ $c['brand']['tagline'] }}</p>
            <p class="lw-footer__credit">{{ $c['brand']['credit'] }}</p>
        </div>
    </div>
</footer>
