@php $f = $agro['footer']; @endphp
<footer class="footer" id="siteFooter">
    <div class="footer__leaf footer__leaf--l" aria-hidden="true"></div>
    <div class="footer__leaf footer__leaf--r" aria-hidden="true"></div>

    <div class="container footer__grid">
        <div class="footer__brand">
            <a class="brand brand--light" href="{{ route('agribisnis-classic-trust.home') }}" aria-label="AgroTrade â€” beranda">
                <img class="brand__logo" src="{{ $img('logo-agrotrade.svg') }}" width="48" height="42" alt="">
                <span class="brand__txt">
                    <strong>AgroTrade</strong>
                    <small>Quality Harvests, Global Markets</small>
                </span>
            </a>
            <p class="footer__about">{{ $f['about'] }}</p>
            <ul class="social" aria-label="Media sosial">
                @foreach (['facebook' => 'Facebook', 'instagram' => 'Instagram', 'linkedin' => 'LinkedIn', 'youtube' => 'YouTube'] as $ic => $label)
                    <li>
                        <a href="#" data-placeholder aria-label="{{ $label }} AgroTrade">
                            <svg class="i" aria-hidden="true"><use href="#i-{{ $ic }}"/></svg>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        @foreach ($f['cols'] as $col)
            <nav class="footer__col" aria-label="{{ $col[0] }}">
                <h3>{{ $col[0] }}</h3>
                <ul>
                    @foreach ($col[1] as $link)
                        @php
                            $parts = explode('#', $link[1], 2);
                            $href = route('agribisnis-classic-trust.' . $parts[0]) . (isset($parts[1]) ? '#' . $parts[1] : '');
                        @endphp
                        <li><a href="{{ $href }}">{{ $link[0] }}</a></li>
                    @endforeach
                </ul>
            </nav>
        @endforeach

        <div class="footer__col footer__col--contact">
            <h3>{{ $f['contact_title'] }}</h3>
            <ul>
                @foreach ($f['contacts'] as $c)
                    <li class="footer__contact">
                        <svg class="i" aria-hidden="true"><use href="#i-{{ $c[0] }}"/></svg>
                        @if ($c[0] === 'phone')
                            <a href="tel:{{ preg_replace('/[^+\d]/', '', $c[1]) }}">{{ $c[1] }}</a>
                        @elseif ($c[0] === 'mail')
                            <a href="mailto:{{ $c[1] }}">{{ $c[1] }}</a>
                        @else
                            <span>{{ $c[1] }}</span>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="footer__bar">
        <div class="container footer__bar-in">
            <p>{{ $f['copy_left'] }}</p>
        </div>
    </div>
    <div class="footer__credit">
        <div class="container">
            <p>{{ $f['credit'] }}</p>
        </div>
    </div>
</footer>
