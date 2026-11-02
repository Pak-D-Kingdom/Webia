@php
    $searchPages = collect($site['nav'])
        ->filter(fn ($i) => $i['route'])
        ->map(fn ($i) => ['label' => $i['label'], 'route' => $i['route'], 'icon' => $i['icon'] ?? 'chevron-right'])
        ->values()
        ->all();
    $searchPages[] = ['label' => 'Tanya AI Assistant', 'route' => 'ai-assistant', 'icon' => 'chat'];
    $searchPages[] = ['label' => 'Minta Penawaran Harga', 'route' => 'penawaran', 'icon' => 'clipboard'];
@endphp
<header class="lg-nav" data-nav>
    <div class="lg-wrap lg-nav__in">
        <a class="lg-logo" href="{{ $to('home') }}" aria-label="{{ $site['brand']['name'] }} - Beranda">
            <img src="{{ $img('logo-mark.svg') }}" width="40" height="40" alt="">
            <span class="lg-logo__txt"><strong>{{ strtoupper($site['brand']['name']) }}</strong><small>{{ $site['brand']['tagline'] }}</small></span>
        </a>

        <nav class="lg-nav__menu" id="lg-menu" aria-label="Navigasi utama" data-menu>
            <ul>
                @foreach ($site['nav'] as $item)
                    @php $isActive = $item['route'] && request()->routeIs($rp.$item['route']); @endphp
                    <li>
                        <a href="{{ $to($item['route']) }}"
                           class="{{ $isActive ? 'is-active' : '' }}"
                           @if ($isActive) aria-current="page" @endif
                           @if (! $item['route']) data-soon @endif>
                            <span class="lg-nav__ic" aria-hidden="true"><svg class="lg-ic"><use href="#i-{{ $item['icon'] ?? 'chevron-right' }}"></use></svg></span>
                            <span class="lg-nav__lbl">{{ $item['label'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
            <a class="lg-btn lg-btn--primary lg-nav__cta lg-nav__cta--mobile" href="{{ $to($site['nav_cta']['route']) }}">{{ $site['nav_cta']['label'] }}<svg class="lg-ic" aria-hidden="true"><use href="#i-arrow-right"></use></svg></a>
        </nav>

        <div class="lg-nav__tools">
            <button type="button" class="lg-iconbtn" data-search-btn aria-label="Cari halaman" aria-expanded="false" aria-controls="lg-search"><svg class="lg-ic" aria-hidden="true"><use href="#i-search"></use></svg></button>
            <a class="lg-btn lg-btn--primary lg-nav__cta" href="{{ $to($site['nav_cta']['route']) }}">{{ $site['nav_cta']['label'] }}<svg class="lg-ic" aria-hidden="true"><use href="#i-arrow-right"></use></svg></a>
            <button type="button" class="lg-iconbtn lg-burger" data-menu-btn aria-controls="lg-menu" aria-expanded="false" aria-label="Buka menu">
                <svg class="lg-ic lg-burger__open" aria-hidden="true"><use href="#i-menu"></use></svg>
                <svg class="lg-ic lg-burger__close" aria-hidden="true"><use href="#i-close"></use></svg>
            </button>
        </div>
    </div>

    <div class="lg-search" id="lg-search" data-search hidden role="dialog" aria-label="Cari halaman">
        <label class="lg-search__field" for="lg-search-input">
            <svg class="lg-ic" aria-hidden="true"><use href="#i-search"></use></svg>
            <input id="lg-search-input" type="search" placeholder="Cari halaman, mis. tracking atau gudang" autocomplete="off" data-search-input>
            <kbd aria-hidden="true">Esc</kbd>
        </label>
        <p class="lg-menu__label">Halaman</p>
        <ul class="lg-search__list" data-search-list>
            @foreach ($searchPages as $p)
                <li>
                    <a href="{{ $to($p['route']) }}">
                        <span class="lg-search__ic" aria-hidden="true"><svg class="lg-ic"><use href="#i-{{ $p['icon'] }}"></use></svg></span>
                        <span class="lg-search__lbl">{{ $p['label'] }}</span>
                        <svg class="lg-ic lg-search__go" aria-hidden="true"><use href="#i-chevron-right"></use></svg>
                    </a>
                </li>
            @endforeach
        </ul>
        <p class="lg-search__empty" data-search-empty hidden>Halaman tidak ditemukan. Coba kata kunci lain.</p>
    </div>
</header>
