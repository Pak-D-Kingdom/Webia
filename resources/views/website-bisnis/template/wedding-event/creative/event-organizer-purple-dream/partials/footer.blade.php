<footer class="eo-footer">
    <div class="eo-footer__glow" aria-hidden="true"></div>
    <div class="eo-container eo-footer__grid">
        <div class="eo-footer__brand">
            <a class="eo-brand eo-brand--light" href="{{ url($eo['base']) }}" aria-label="{{ $eo['brand']['name'] }} - Beranda">
                <img class="eo-brand__mark" src="{{ asset($eo['assets']['img']) }}/logo-mark.svg" alt="" width="42" height="42" loading="lazy">
                <span class="eo-brand__text"><strong>{{ $eo['brand']['name'] }}</strong><small>{{ $eo['brand']['tagline'] }}</small></span>
            </a>
            <p>{{ $eo['brand']['footer_text'] }}</p>
        </div>

        <nav class="eo-footer__col" aria-label="Navigasi footer">
            <h3>Navigasi</h3>
            <ul>
                @foreach($eo['footer_nav'] as $link)
                <li><a href="{{ url($eo['base'].$link['path']) }}">{{ $link['label'] }}</a></li>
                @endforeach
            </ul>
        </nav>

        <nav class="eo-footer__col" aria-label="Informasi">
            <h3>Informasi</h3>
            <ul>
                @foreach($eo['footer_info'] as $link)
                <li><a href="{{ url($eo['base'].$link['path']) }}">{{ $link['label'] }}</a></li>
                @endforeach
            </ul>
        </nav>

        <div class="eo-footer__col">
            <h3>Ikuti Kami</h3>
            <ul class="eo-footer__social">
                @foreach($eo['socials'] as $soc)
                <li><a href="{{ $soc['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $soc['label'] }}"><svg class="eo-i" aria-hidden="true"><use href="#{{ $soc['icon'] }}"/></svg></a></li>
                @endforeach
            </ul>
        </div>

        <div class="eo-footer__col eo-footer__col--news">
            <h3>Berlangganan Newsletter</h3>
            <p>Dapatkan update event terbaru kami.</p>
            <form class="eo-news" data-eo-newsletter novalidate>
                <label class="eo-sr" for="eo-news-email">Email Anda</label>
                <input id="eo-news-email" type="email" name="email" placeholder="Email Anda" autocomplete="email" required>
                <button type="submit" aria-label="Kirim langganan"><svg class="eo-i" aria-hidden="true"><use href="#i-send"/></svg></button>
            </form>
            <p class="eo-news__msg" data-eo-news-msg role="status" aria-live="polite"></p>
        </div>
    </div>

    <div class="eo-footer__bar">
        <div class="eo-container eo-footer__barinner">
            <p>{{ $eo['brand']['copyright'] }}</p>
            <ul>
                <li><button type="button" data-eo-legal="terms">{{ $eo['legal']['terms']['title'] }}</button></li>
                <li><button type="button" data-eo-legal="privacy">{{ $eo['legal']['privacy']['title'] }}</button></li>
            </ul>
        </div>
    </div>
    <div class="eo-footer__credit">
        <p>{{ $eo['brand']['credit'] }}</p>
    </div>
</footer>
