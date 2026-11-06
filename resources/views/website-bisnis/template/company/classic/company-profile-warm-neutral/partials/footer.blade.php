{{-- FOOTER: logo, navigasi, sosial media, hak cipta, dan kredit WEBIA by D-KREASI --}}
<footer class="cp-footer">
    <svg class="cp-footer__leaf" width="240" height="340" aria-hidden="true" focusable="false"><use href="#cp-branch"></use></svg>

    <div class="cp-container cp-footer__inner">
        <a class="cp-brand cp-brand--light" href="{{ $page('beranda') }}" aria-label="{{ $company['name'] }} — ke beranda">
            <img class="cp-brand__mark" src="{{ $img('logo-leaf-light.png') }}" alt="" width="200" height="168" loading="lazy">
            <span class="cp-brand__text">
                <span class="cp-brand__name">NUSANTARA KREASI</span>
                <span class="cp-brand__tag">{{ $company['tagline'] }}</span>
            </span>
        </a>

        <nav class="cp-footer__nav" aria-label="Navigasi footer">
            @foreach ($footerNav as $column)
                <ul>
                    @foreach ($column as $item)
                        <li><a href="{{ $item['href'] }}">{{ $item['label'] }}</a></li>
                    @endforeach
                </ul>
            @endforeach
        </nav>

        <div class="cp-footer__follow">
            <h2 class="cp-footer__heading">Ikuti Kami</h2>
            <ul class="cp-social cp-social--footer">
                @foreach ($social as $item)
                    <li><a class="cp-social__link" href="{{ $item['url'] }}" aria-label="{{ $item['label'] }}">{!! $icon($item['icon']) !!}</a></li>
                @endforeach
            </ul>
        </div>

        <p class="cp-footer__copy">© 2025 {{ $company['name'] }}. All rights reserved.</p>
    </div>

    <div class="cp-footer__credit">
        <div class="cp-container">
            <p>© 2026 WEBIA by D-KREASI. Seluruh hak cipta dilindungi.</p>
        </div>
    </div>
</footer>
