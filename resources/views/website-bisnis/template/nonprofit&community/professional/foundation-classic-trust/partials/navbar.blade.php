<header class="fd-header" data-fd-header>
    <div class="fd-wrap fd-nav">
        <a class="fd-brand" href="{{ $r('index') }}" aria-label="{{ $fd['brand']['name'] }} {{ $fd['brand']['suffix'] }} — Beranda">
            <img src="{{ $i('logo.png') }}" alt="" width="46" height="46">
            <span><strong>{{ $fd['brand']['name'] }}</strong><em>{{ $fd['brand']['suffix'] }}</em></span>
        </a>
        <nav class="fd-menu" id="fd-menu" aria-label="Navigasi utama">
            <ul>
                @foreach ($fd['nav'] as $n)
                    <li><a href="{{ $r($n['route']) }}" @class(['is-active' => $current === 'foundation-classic-trust.' . $n['route']]) @if($current === 'foundation-classic-trust.' . $n['route']) aria-current="page" @endif>{{ $n['label'] }}</a></li>
                @endforeach
            </ul>
        </nav>
        <div class="fd-nav__tools">
            <button type="button" class="fd-iconbtn" data-fd-search-toggle aria-label="Cari halaman" aria-expanded="false" aria-controls="fd-search"><svg class="fd-ico"><use href="#fd-i-search"/></svg></button>
            <a class="fd-btn fd-btn--gold" href="{{ $r('donation') }}">Donasi Sekarang <svg class="fd-ico"><use href="#fd-i-arrow"/></svg></a>
            <button type="button" class="fd-iconbtn fd-burger" data-fd-burger aria-label="Buka menu" aria-expanded="false" aria-controls="fd-menu"><svg class="fd-ico"><use href="#fd-i-menu"/></svg></button>
        </div>
    </div>
    <div class="fd-search" id="fd-search">
        <div class="fd-wrap">
            <form role="search">
                <input type="search" placeholder="Cari halaman, mis. donasi, relawan, laporan…" aria-label="Kata kunci pencarian" autocomplete="off">
                <button class="fd-btn fd-btn--navy" type="submit">Cari</button>
            </form>
            <p class="fd-search__hint">Tekan Esc untuk menutup.</p>
        </div>
    </div>
</header>
