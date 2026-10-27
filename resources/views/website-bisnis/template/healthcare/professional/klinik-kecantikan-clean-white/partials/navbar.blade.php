{{-- Navbar utama (sticky). Lokasi = anchor di beranda. --}}
<header class="gl-navbar" data-gl-navbar>
    <div class="gl-container gl-navbar__inner">
        <a class="gl-brand" href="{{ route('klinik-kecantikan.home') }}" aria-label="{{ $clinic['brand']['name'] }} — ke beranda">
            <svg class="gl-brand__logo" aria-hidden="true"><use href="#gl-i-lotus"/></svg>
            <span class="gl-brand__text">
                <strong>{{ $clinic['brand']['name'] }}</strong>
                <small>{{ $clinic['brand']['tagline'] }}</small>
            </span>
        </a>

        <nav class="gl-nav" id="gl-nav" aria-label="Navigasi utama" data-gl-nav>
            <ul class="gl-nav__list">
                @foreach ($clinic['nav'] as $item)
                    @php
                        $active = ! $item['hash'] && request()->routeIs($item['route']);
                        $href   = route($item['route']) . ($item['hash'] ? '#' . $item['hash'] : '');
                    @endphp
                    <li>
                        <a class="gl-nav__link {{ $active ? 'is-active' : '' }}" href="{{ $href }}" @if ($active) aria-current="page" @endif>{{ $item['label'] }}</a>
                    </li>
                @endforeach
            </ul>
            <a class="gl-btn gl-btn--primary gl-nav__cta" href="{{ route('klinik-kecantikan.appointment') }}">Booking Appointment</a>
        </nav>

        <div class="gl-navbar__actions">
            <button type="button" class="gl-iconbtn" data-gl-toggle="search" aria-expanded="false" aria-controls="gl-search" aria-label="Cari">
                <svg class="gl-ic" aria-hidden="true"><use href="#gl-i-search"/></svg>
            </button>
            <button type="button" class="gl-iconbtn gl-iconbtn--bell" data-gl-toggle="notif" aria-expanded="false" aria-controls="gl-notif" aria-label="Pemberitahuan">
                <svg class="gl-ic" aria-hidden="true"><use href="#gl-i-bell"/></svg>
                <span class="gl-iconbtn__dot" aria-hidden="true"></span>
            </button>
            <a class="gl-btn gl-btn--primary gl-navbar__cta" href="{{ route('klinik-kecantikan.appointment') }}">Booking Appointment</a>
            <button type="button" class="gl-iconbtn gl-burger" data-gl-toggle="menu" aria-expanded="false" aria-controls="gl-nav" aria-label="Buka menu">
                <svg class="gl-ic gl-burger__open" aria-hidden="true"><use href="#gl-i-menu"/></svg>
                <svg class="gl-ic gl-burger__close" aria-hidden="true"><use href="#gl-i-x"/></svg>
            </button>
        </div>
    </div>

    {{-- Panel pencarian --}}
    <div class="gl-drop gl-search" id="gl-search" data-gl-panel="search" hidden>
        <div class="gl-container">
            <label class="gl-search__field">
                <svg class="gl-ic" aria-hidden="true"><use href="#gl-i-search"/></svg>
                <input type="search" placeholder="Cari layanan, dokter, atau halaman..." autocomplete="off" data-gl-search-input aria-label="Cari di website">
            </label>
            <ul class="gl-search__results" data-gl-search-results aria-live="polite"></ul>
        </div>
    </div>

    {{-- Panel pemberitahuan --}}
    <div class="gl-drop gl-notif" id="gl-notif" data-gl-panel="notif" hidden>
        <div class="gl-container">
            <div class="gl-notif__box">
                <h2 class="gl-notif__title">Pemberitahuan</h2>
                <ul>
                    @foreach ($clinic['notifications'] as $n)
                        <li>
                            <strong>{{ $n['title'] }}</strong>
                            <span>{{ $n['text'] }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</header>
