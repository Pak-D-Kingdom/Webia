{{-- Footer: brand, navigasi, layanan, kontak, newsletter, kredit --}}
@php
    $footLink = fn (array $i) => route($rp.$i['route']).(isset($i['anchor']) ? '#'.$i['anchor'] : '');
@endphp
<footer class="footer">
    <svg class="footer__wave" viewBox="0 0 1440 70" preserveAspectRatio="none" aria-hidden="true"><path d="M0 40c120 30 240 30 360 8s240-44 360-38 240 42 360 46 240-24 360-40v54H0z"/></svg>
    <div class="container footer__grid">
        <div class="footer__brand">
            <a class="brand" href="{{ route($rp.'home') }}">
                <img src="{{ $img }}logo-mark-footer.png" alt="" width="42" height="42" loading="lazy">
                <span class="brand__txt"><strong>{{ $t['brand']['name'] }}</strong><small>{{ $t['brand']['tagline'] }}</small></span>
            </a>
            <ul class="social social--lg" aria-label="Sosial media">
                @foreach ($t['socials'] as $s)
                    <li><a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" rel="noopener"><i class="bi {{ $s['icon'] }}" aria-hidden="true"></i></a></li>
                @endforeach
            </ul>
        </div>

        <nav class="footer__col" aria-label="Navigasi footer">
            <h3>Navigasi</h3>
            <ul>@foreach ($t['footer']['nav'] as $i)<li><a href="{{ $footLink($i) }}">{{ $i['label'] }}</a></li>@endforeach</ul>
        </nav>

        <nav class="footer__col" aria-label="Layanan">
            <h3>Layanan</h3>
            <ul>@foreach ($t['footer']['services'] as $i)<li><a href="{{ $footLink($i) }}" @if (! empty($i['chat'])) data-chat-trigger aria-haspopup="dialog" aria-controls="el-chat" @endif>{{ $i['label'] }}</a></li>@endforeach</ul>
        </nav>

        <div class="footer__col">
            <h3>Kontak Kami</h3>
            <ul class="footer__contact">
                <li><i class="bi bi-geo-alt-fill" aria-hidden="true"></i><span>{{ $t['contact']['address'] }}</span></li>
                <li><i class="bi bi-envelope-fill" aria-hidden="true"></i><a href="mailto:{{ $t['contact']['email'] }}">{{ $t['contact']['email'] }}</a></li>
                <li><i class="bi bi-telephone-fill" aria-hidden="true"></i><a href="tel:{{ $t['contact']['phone_e164'] }}">{{ $t['contact']['phone'] }}</a></li>
            </ul>
        </div>

        <div class="footer__col footer__news">
            <h3>{{ $t['newsletter']['title'] }}</h3>
            <form class="newsletter" method="get" action="https://wa.me/{{ $t['contact']['form_whatsapp'] }}" target="_blank" novalidate data-wa-form="newsletter">
                <label class="sr-only" for="nl-email">Email</label>
                <input id="nl-email" type="email" name="email" placeholder="{{ $t['newsletter']['placeholder'] }}" autocomplete="email" required>
                <button type="submit" aria-label="Berlangganan"><i class="bi bi-send-fill" aria-hidden="true"></i></button>
            </form>
            <p class="form__note" role="status" aria-live="polite" data-form-note></p>
            <img class="footer__books" src="{{ $img }}books-plant.png" alt="" loading="lazy" width="110" height="88">
        </div>
    </div>

    <div class="container footer__bottom">
        <p>{{ $t['brand']['credit'] }}</p>
    </div>
</footer>
