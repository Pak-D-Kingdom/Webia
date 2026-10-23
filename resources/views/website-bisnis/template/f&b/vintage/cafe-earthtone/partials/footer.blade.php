@php
    $links = collect($cafe['footer']['links'])->map(function ($l) use ($cafe) {
        $l['href'] = route($cafe['routes'][$l['route']]) . (isset($l['anchor']) ? '#' . $l['anchor'] : '');
        return $l;
    });
    $half = (int) ceil($links->count() / 2);
@endphp
<footer class="kl-footer">
    <img class="kl-footer__leaf kl-footer__leaf--left" src="{{ $img('leaf-left.png') }}" alt="" aria-hidden="true" width="180" height="238" loading="lazy">
    <img class="kl-footer__leaf kl-footer__leaf--right" src="{{ $img('leaf-right.png') }}" alt="" aria-hidden="true" width="302" height="238" loading="lazy">

    <div class="kl-footer__inner">
        <div class="kl-footer__brand">
            <a class="kl-footer__logo" href="{{ route($cafe['routes']['home']) }}" aria-label="{{ $cafe['brand']['name'] }}">
                <img src="{{ $img('footer-logo-icon.png') }}" alt="" width="38" height="26" loading="lazy">
                <span class="kl-footer__logo-name">{{ $cafe['brand']['name'] }}</span>
                <span class="kl-footer__logo-tag">{{ $cafe['brand']['tagline'] }}</span>
            </a>
            <p class="kl-footer__slogan">{{ $cafe['brand']['slogan'] }}</p>
        </div>

        <nav class="kl-footer__col kl-footer__links" aria-labelledby="kl-ft-links">
            <h2 class="kl-footer__title" id="kl-ft-links">Quick Links</h2>
            <div class="kl-footer__linkgrid">
                <ul>@foreach ($links->take($half) as $l)<li><a href="{{ $l['href'] }}">{{ $l['label'] }}</a></li>@endforeach</ul>
                <ul>@foreach ($links->slice($half) as $l)<li><a href="{{ $l['href'] }}">{{ $l['label'] }}</a></li>@endforeach</ul>
            </div>
        </nav>

        <div class="kl-footer__col">
            <h2 class="kl-footer__title">Kontak Kami</h2>
            <ul class="kl-footer__contact">
                <li><svg class="kl-icon" aria-hidden="true"><use href="#kl-i-phone"/></svg><a href="tel:+{{ $cafe['contact']['wa_number'] }}">{{ $cafe['contact']['phone'] }}</a></li>
                <li><svg class="kl-icon" aria-hidden="true"><use href="#kl-i-mail"/></svg><a href="mailto:{{ $cafe['contact']['email'] }}">{{ $cafe['contact']['email'] }}</a></li>
                <li><svg class="kl-icon" aria-hidden="true"><use href="#kl-i-pin"/></svg><span>{{ $cafe['contact']['address'] }}</span></li>
            </ul>
        </div>

        <div class="kl-footer__col">
            <h2 class="kl-footer__title">Ikuti Kami</h2>
            <ul class="kl-socials">
                @foreach ($cafe['socials'] as $s)
                    <li>
                        <a href="{{ $s['url'] }}" target="_blank" rel="noopener" aria-label="{{ $s['label'] }}">
                            <svg class="kl-icon" aria-hidden="true"><use href="#kl-i-{{ $s['key'] }}"/></svg>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <p class="kl-footer__copy">© {{ date('Y') }} {{ $cafe['footer']['copyright'] }}</p>
    </div>

    <div class="kl-footer__credit">
        <p>{{ $cafe['footer']['credit'] }}</p>
    </div>
</footer>
