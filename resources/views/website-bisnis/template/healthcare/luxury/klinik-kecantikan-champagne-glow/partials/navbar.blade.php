{{-- Navbar sticky: logo, menu, pencarian, tombol Book Appointment, menu mobile --}}
<header class="cg-header" data-cg-header>
    <div class="cg-container cg-nav">
        <a class="cg-logo" href="{{ route('glow.home') }}" aria-label="{{ $c['brand']['name'] }} — beranda">
            <svg class="cg-logo__mark" aria-hidden="true"><use href="#ic-logo"/></svg>
            <span class="cg-logo__text">
                <strong>{{ $c['brand']['name'] }}</strong>
                <small>{{ $c['brand']['tagline'] }}</small>
            </span>
        </a>

        <nav class="cg-menu" id="cg-menu" aria-label="Navigasi utama" data-cg-menu>
            <ul class="cg-menu__list">
                @foreach ($c['nav'] as $item)
                    @continue(($item['in_navbar'] ?? true) === false)
                    @php
                        $isAnchor = isset($item['anchor']);
                        $href = route($item['route']) . ($isAnchor ? '#' . $item['anchor'] : '');
                        $isActive = ! $isAnchor && $active === $item['key'];
                    @endphp
                    <li>
                        <a href="{{ $href }}"
                           class="cg-menu__link {{ $isActive ? 'is-active' : '' }}"
                           @if ($isActive) aria-current="page" @endif
                           @if ($isAnchor) data-cg-anchor="{{ $item['anchor'] }}" @endif>
                            {{ $item['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>

            {{-- Hanya tampil di mobile/tablet (di dalam drawer) --}}
            <div class="cg-menu__foot">
                <a class="cg-btn cg-btn--primary cg-btn--block" href="{{ route('glow.appointment') }}">
                    Book Appointment <i class="bi bi-arrow-right" aria-hidden="true"></i>
                </a>
                <ul class="cg-menu__contact">
                    <li><i class="bi bi-geo-alt" aria-hidden="true"></i> {{ $c['contact']['address'] }}</li>
                    <li><a href="tel:{{ $c['contact']['phone_raw'] }}"><i class="bi bi-telephone" aria-hidden="true"></i> {{ $c['contact']['phone'] }}</a></li>
                    <li><a href="mailto:{{ $c['contact']['email'] }}"><i class="bi bi-envelope" aria-hidden="true"></i> {{ $c['contact']['email'] }}</a></li>
                </ul>
            </div>
        </nav>

        <div class="cg-nav__actions">
            <button type="button" class="cg-icon-btn cg-icon-btn--lg" data-cg-search-open aria-label="Cari di situs">
                <i class="bi bi-search" aria-hidden="true"></i>
            </button>
            <a class="cg-btn cg-btn--primary cg-nav__cta" href="{{ route('glow.appointment') }}">
                Book Appointment <i class="bi bi-arrow-right" aria-hidden="true"></i>
            </a>
            <button type="button" class="cg-burger" data-cg-burger aria-expanded="false" aria-controls="cg-menu" aria-label="Buka menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>

    {{-- Panel pencarian cepat (halaman, layanan, dokter, FAQ, kebijakan) --}}
    <div class="cg-search" data-cg-search hidden>
        <div class="cg-container">
            <form class="cg-search__form" role="search" onsubmit="return false">
                <i class="bi bi-search" aria-hidden="true"></i>
                <input type="search" placeholder="Cari layanan, dokter, atau pertanyaan…" aria-label="Cari" autocomplete="off" data-cg-search-input>
                <button type="button" class="cg-icon-btn" data-cg-search-close aria-label="Tutup pencarian"><i class="bi bi-x-lg" aria-hidden="true"></i></button>
            </form>
            <ul class="cg-search__results" data-cg-search-results></ul>
        </div>
    </div>
</header>
<div class="cg-scrim" data-cg-scrim hidden></div>
