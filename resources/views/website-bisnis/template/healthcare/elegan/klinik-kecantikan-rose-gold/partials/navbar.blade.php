{{-- Navbar sticky: logo, menu, pencarian, notifikasi, CTA booking --}}
<header class="rg-header" id="rgHeader">
    <div class="rg-container rg-nav">
        <a class="rg-brand" href="{{ route($rp . 'index') }}" aria-label="{{ $c['brand']['name'] }} — beranda">
            @include($tpl . '.partials.logo')
            <span class="rg-brand__text">
                <strong>{{ $c['brand']['name'] }}</strong>
                <small>{{ $c['brand']['tagline'] }}</small>
            </span>
        </a>

        <nav class="rg-menu" id="rgMenu" aria-label="Navigasi utama">
            <ul class="rg-menu__list">
                @foreach ($c['nav'] as $item)
                    <li>
                        <a href="{{ route($rp . $item['route']) }}"
                           class="rg-menu__link {{ $page === $item['page'] ? 'is-active' : '' }}"
                           @if ($page === $item['page']) aria-current="page" @endif>{{ $item['label'] }}</a>
                    </li>
                @endforeach
            </ul>
            <a class="rg-btn rg-btn--primary rg-menu__cta" href="{{ route($rp . $c['cta']['route']) }}">
                <i class="bi bi-calendar2-check" aria-hidden="true"></i>{{ $c['cta']['label'] }}
            </a>
        </nav>

        <div class="rg-nav__tools">
            <div class="rg-pop">
                <button class="rg-iconbtn" type="button" data-rg-toggle="search" aria-expanded="false" aria-controls="rgSearch" aria-label="Cari halaman atau layanan">
                    <i class="bi bi-search" aria-hidden="true"></i>
                </button>
                <div class="rg-pop__panel rg-search" id="rgSearch" hidden>
                    <label class="rg-sr" for="rgSearchInput">Cari</label>
                    <input class="rg-input" id="rgSearchInput" type="search" placeholder="Cari layanan, dokter, FAQ..." autocomplete="off">
                    <ul class="rg-search__list" id="rgSearchList"></ul>
                    <script type="application/json" id="rgSearchData">
                        {!! json_encode(array_merge(
                            array_map(fn ($s) => ['t' => $s['name'], 'k' => 'Layanan', 'u' => route($rp . 'services') . '#' . $s['slug']], $c['services']),
                            array_map(fn ($d) => ['t' => $d['name'], 'k' => 'Dokter', 'u' => route($rp . 'doctors') . '#' . $d['slug']], $c['doctors']),
                            array_map(fn ($n) => ['t' => $n['label'], 'k' => 'Halaman', 'u' => route($rp . $n['route'])], $c['nav'])
                        ), JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP) !!}
                    </script>
                </div>
            </div>

            <div class="rg-pop">
                <button class="rg-iconbtn rg-iconbtn--dot" type="button" data-rg-toggle="notif" aria-expanded="false" aria-controls="rgNotif" aria-label="Notifikasi">
                    <i class="bi bi-bell" aria-hidden="true"></i>
                    <span class="rg-dot" aria-hidden="true">{{ count($c['notifications']) }}</span>
                </button>
                <div class="rg-pop__panel rg-notif" id="rgNotif" hidden>
                    <p class="rg-notif__title">Notifikasi</p>
                    <ul>
                        @foreach ($c['notifications'] as $n)
                            <li>
                                <i class="bi {{ $n['icon'] }}" aria-hidden="true"></i>
                                <span><strong>{{ $n['title'] }}</strong>{{ $n['text'] }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <button class="rg-iconbtn rg-burger" type="button" data-rg-toggle="menu" aria-expanded="false" aria-controls="rgMenu" aria-label="Buka menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</header>
