@php($c = $cafe['contact'])
<footer class="lm-footer">
    <div class="lm-container lm-footer__grid">
        <div class="lm-footer__brand">
            @include("$v.partials.logo", ['light' => true])
            <p>{{ $cafe['brand']['footer_text'] }}</p>
            <ul class="lm-social">
                @foreach ($cafe['social'] as $s)
                    <li><a href="{{ $s['url'] }}" target="_blank" rel="noopener" aria-label="{{ $s['name'] }}"><svg class="i" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg></a></li>
                @endforeach
            </ul>
        </div>

        <nav aria-labelledby="ft-links">
            <h3 class="lm-footer__h" id="ft-links">Quick Links</h3>
            <ul class="lm-footer__links">
                @foreach ($cafe['footer_nav'] as $n)
                    <li><a href="{{ $url($n['page'], $n['anchor']) }}">{{ $n['label'] }}</a></li>
                @endforeach
            </ul>
        </nav>

        <div>
            <h3 class="lm-footer__h">Kontak Kami</h3>
            <ul class="lm-footer__contact">
                <li><svg class="i" aria-hidden="true"><use href="#i-phone"/></svg><a href="tel:{{ preg_replace('/[^\d+]/', '', $c['phone']) }}">{{ $c['phone'] }}</a></li>
                <li><svg class="i" aria-hidden="true"><use href="#i-mail"/></svg><a href="mailto:{{ $c['email'] }}">{{ $c['email'] }}</a></li>
                <li><svg class="i" aria-hidden="true"><use href="#i-pin"/></svg><span>{{ $c['address_full'] }}</span></li>
            </ul>
        </div>

        <div>
            <h3 class="lm-footer__h">Ikuti Kami</h3>
            {{-- Statis: JS hanya memvalidasi email lalu memicu event "lm:newsletter" untuk disambungkan ke backend. --}}
            <form class="lm-news" novalidate>
                <label class="sr-only" for="news-email">Email</label>
                <input id="news-email" type="email" name="email" placeholder="{{ $cafe['footer']['newsletter_placeholder'] }}" autocomplete="email" required>
                <button type="submit" aria-label="Berlangganan"><svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></button>
            </form>
            <p class="lm-news__msg" role="status" hidden></p>
        </div>
    </div>

    <div class="lm-footer__line">
        <div class="lm-container lm-footer__bar">
            <p>&copy; {{ date('Y') }} {{ $cafe['brand']['title'] }}. All rights reserved.</p>
            <p>
                @foreach ($cafe['footer']['legal'] as $l)
                    <a href="{{ $l['url'] }}">{{ $l['label'] }}</a>@if (! $loop->last)<span aria-hidden="true"> | </span>@endif
                @endforeach
            </p>
        </div>
    </div>

    <div class="lm-footer__credit">
        <div class="lm-container"><p>{{ $cafe['footer']['credit'] }}</p></div>
    </div>

    <button class="lm-top" type="button" data-top aria-label="Kembali ke atas"><svg class="i" aria-hidden="true"><use href="#i-up"/></svg></button>
</footer>
