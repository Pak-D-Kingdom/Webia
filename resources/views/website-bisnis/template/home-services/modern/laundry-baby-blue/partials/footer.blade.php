<footer class="lb-footer" style="--lb-footer-bg: url('{{ asset($laundry['assets']['img'] . '/footer-bg.webp') }}')">
    <div class="lb-footer__wave" aria-hidden="true">
        <svg viewBox="0 0 1440 60" preserveAspectRatio="none"><path d="M0 28C180 58 320 4 520 20s340 40 520 14 280-30 400-6v32H0z"/></svg>
    </div>
    <img class="lb-footer__basket" src="{{ asset($laundry['assets']['img'] . '/basket-towels.webp') }}" alt="" aria-hidden="true" width="408" height="288" loading="lazy">
    <div class="lb-container lb-footer__inner">
        <div class="lb-footer__brand">
            <a class="lb-brand lb-brand--footer" href="{{ route('webia.laundry-baby-blue.home') }}">
                <img class="lb-brand__logo" src="{{ asset($laundry['assets']['img'] . '/logo-cloud.png') }}" alt="" width="62" height="50" loading="lazy">
                <span class="lb-brand__text"><strong>Blue<span>Laundry</span></strong><small>{{ $brand['tagline'] }}</small></span>
            </a>
            <p class="lb-footer__slogan"><strong>{{ $brand['slogan'] }}</strong>{{ $brand['slogan2'] }}</p>
        </div>

        <div class="lb-footer__cols">
            @foreach ($laundry['footer']['columns'] as $col)
                <nav class="lb-footer__col" aria-label="{{ $col['title'] }}">
                    <h2>{{ $col['title'] }}</h2>
                    <ul>
                        @foreach ($col['links'] as [$label, $route])
                            <li><a href="{{ route('webia.laundry-baby-blue.' . $route) }}">{{ $label }}</a></li>
                        @endforeach
                        @if ($col['title'] === 'Hubungi Kami')
                            <li><a href="https://wa.me/{{ $contact['whatsapp'] }}" target="_blank" rel="noopener">WhatsApp</a></li>
                            <li><a href="mailto:{{ $contact['email'] }}">Email</a></li>
                        @endif
                    </ul>
                </nav>
            @endforeach
            <div class="lb-footer__col lb-footer__col--social">
                <h2>Ikuti Kami</h2>
                <ul class="lb-social lb-social--footer">
                    @foreach ($laundry['social'] as $s)
                        <li><a href="{{ $s['url'] }}" aria-label="{{ $s['label'] }}" target="_blank" rel="noopener"><svg class="lb-i" aria-hidden="true"><use href="#i-{{ $s['key'] }}"/></svg></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="lb-footer__credit">
        <div class="lb-container"><p>{{ $laundry['footer']['credit'] }}</p></div>
    </div>
</footer>
