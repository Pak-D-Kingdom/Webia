<header class="fd-header" data-fd-header>
    <div class="fd-wrap fd-nav">
        <a class="fd-brand" href="{{ $r('index') }}" aria-label="{{ $fd['brand']['name'] }} {{ $fd['brand']['suffix'] }} — Beranda">
            <img src="{{ $i('logo.svg') }}" alt="" width="52" height="52">
            <span><strong>{{ $fd['brand']['name'] }}</strong><em>{{ $fd['brand']['suffix'] }}</em></span>
        </a>
        <nav class="fd-menu" id="fd-menu" aria-label="Navigasi utama">
            <ul>
                @foreach ($fd['nav'] as $n)
                    @php $active = $current === 'foundation-classic-trust.' . $n['route']; @endphp
                    <li><a href="{{ $r($n['route']) }}" @class(['is-active' => $active]) @if($active) aria-current="page" @endif>{{ $n['label'] }}</a></li>
                @endforeach
            </ul>
            <div class="fd-menu__cta">
                <a class="fd-btn fd-btn--gold fd-btn--block" href="{{ $r('donation') }}">Donasi Sekarang <svg class="fd-ico"><use href="#fd-i-arrow"/></svg></a>
            </div>
        </nav>
        <div class="fd-nav__tools">
            <button type="button" class="fd-searchbtn" data-fd-search-open aria-haspopup="dialog" aria-controls="fd-search">
                <svg class="fd-ico"><use href="#fd-i-search"/></svg><span>Cari</span><kbd>/</kbd>
            </button>
            <a class="fd-btn fd-btn--gold fd-nav__donate" href="{{ $r('donation') }}"><span>Donasi<span class="fd-btn__more"> Sekarang</span></span> <svg class="fd-ico"><use href="#fd-i-arrow"/></svg></a>
            <button type="button" class="fd-burger" data-fd-burger aria-label="Buka menu" aria-expanded="false" aria-controls="fd-menu"><svg class="fd-ico"><use href="#fd-i-menu"/></svg></button>
        </div>
    </div>
</header>

<div class="fd-sm" id="fd-search" hidden role="dialog" aria-modal="true" aria-label="Cari halaman">
    <div class="fd-sm__backdrop" data-fd-search-close></div>
    <div class="fd-sm__panel">
        <form class="fd-sm__form" role="search" onsubmit="return false">
            <svg class="fd-ico"><use href="#fd-i-search"/></svg>
            <input type="search" id="fd-search-input" placeholder="Cari halaman: donasi, relawan, laporan…" autocomplete="off" aria-controls="fd-search-list" aria-label="Kata kunci pencarian">
            <button type="button" class="fd-sm__esc" data-fd-search-close aria-label="Tutup pencarian">Esc</button>
        </form>
        <div class="fd-sm__pop">
            <span>Populer:</span>
            <button type="button" data-fd-search-q="donasi">Donasi</button>
            <button type="button" data-fd-search-q="relawan">Relawan</button>
            <button type="button" data-fd-search-q="laporan">Laporan keuangan</button>
            <button type="button" data-fd-search-q="program">Program</button>
        </div>
        <p class="fd-sm__label" data-fd-search-label>Semua halaman</p>
        <ul class="fd-sm__list" id="fd-search-list" role="listbox" aria-label="Hasil pencarian"></ul>
        <div class="fd-sm__empty" data-fd-search-empty hidden>
            <img src="{{ $i('bot-head.svg') }}" alt="" width="64" height="56">
            <p>Tidak ada halaman yang cocok dengan “<b data-fd-search-term></b>”.</p>
            <button type="button" class="fd-btn fd-btn--navy fd-btn--sm" data-fd-search-ask>Tanyakan ke HarapanBot</button>
        </div>
        <div class="fd-sm__foot"><span><kbd>↑</kbd><kbd>↓</kbd> pilih</span><span><kbd>Enter</kbd> buka</span><span><kbd>Esc</kbd> tutup</span></div>
    </div>
</div>
