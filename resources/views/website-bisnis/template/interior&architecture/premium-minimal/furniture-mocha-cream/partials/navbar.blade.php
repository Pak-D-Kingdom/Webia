@php
    $isActive = function ($item) use ($cfg) {
        $p = $cfg['route_prefix'];
        if (isset($item['children'])) {
            foreach ($item['children'] as $ch) { if (request()->routeIs($p.$ch['route'])) return true; }
            return false;
        }
        return request()->routeIs($p.$item['route']);
    };
@endphp
<header class="fm-header" data-fm-header>
    <div class="fm-container fm-header__in">
        <a class="fm-brand" href="{{ $route('home') }}" aria-label="{{ $cfg['brand']['name'] }} — beranda">
            <svg class="fm-brand__logo" viewBox="0 0 40 40" aria-hidden="true">
                <path d="M4 19 20 6l16 13" /><path d="M8 17v17h24V17" /><path d="M15 34V23h10v11M15 28.500h10M20 23v11" />
            </svg>
            <span class="fm-brand__txt">
                <strong>{{ $cfg['brand']['name'] }}</strong>
                <small>{{ $cfg['brand']['tagline'] }}</small>
            </span>
        </a>

        <nav class="fm-nav" aria-label="Navigasi utama">
            <ul class="fm-nav__list">
                @foreach ($cfg['nav'] as $item)
                    @if (isset($item['children']))
                        <li class="fm-nav__item fm-nav__item--drop {{ $isActive($item) ? 'is-active' : '' }}" data-fm-drop>
                            <button type="button" class="fm-nav__link" aria-expanded="false" aria-haspopup="true">
                                {{ $item['label'] }} <svg class="fm-i fm-i--xs" aria-hidden="true"><use href="#i-chevron"/></svg>
                            </button>
                            <ul class="fm-nav__sub">
                                @foreach ($item['children'] as $ch)
                                    <li><a href="{{ $route($ch['route']) }}" @if(request()->routeIs($cfg['route_prefix'].$ch['route'])) aria-current="page" @endif>{{ $ch['label'] }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li class="fm-nav__item {{ $isActive($item) ? 'is-active' : '' }}">
                            <a class="fm-nav__link" href="{{ $route($item['route']) }}" @if($isActive($item)) aria-current="page" @endif>{{ $item['label'] }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </nav>

        <button type="button" class="fm-burger" data-fm-drawer-open aria-controls="fm-drawer" aria-expanded="false" aria-label="Buka menu">
            <svg class="fm-i" aria-hidden="true"><use href="#i-menu"/></svg>
        </button>
    </div>

    {{-- Drawer mobile & tablet --}}
    <div class="fm-drawer" id="fm-drawer" data-fm-drawer hidden>
        <div class="fm-drawer__backdrop" data-fm-drawer-close></div>
        <aside class="fm-drawer__panel" role="dialog" aria-modal="true" aria-label="Menu navigasi">
            <div class="fm-drawer__head">
                <strong class="fm-drawer__brand">{{ $cfg['brand']['name'] }}</strong>
                <button type="button" class="fm-iconbtn" data-fm-drawer-close aria-label="Tutup menu"><svg class="fm-i" aria-hidden="true"><use href="#i-x"/></svg></button>
            </div>
            <ul class="fm-drawer__list">
                @foreach ($cfg['nav'] as $item)
                    @if (isset($item['children']))
                        <li class="fm-drawer__group">{{ $item['label'] }}</li>
                        @foreach ($item['children'] as $ch)
                            <li><a href="{{ $route($ch['route']) }}" class="{{ request()->routeIs($cfg['route_prefix'].$ch['route']) ? 'is-active' : '' }}">{{ $ch['label'] }}</a></li>
                        @endforeach
                    @else
                        <li><a href="{{ $route($item['route']) }}" class="{{ $isActive($item) ? 'is-active' : '' }}">{{ $item['label'] }}</a></li>
                    @endif
                @endforeach
                <li class="fm-drawer__group">Lainnya</li>
                <li><a href="{{ $route('hero') }}" class="{{ request()->routeIs($cfg['route_prefix'].'hero') ? 'is-active' : '' }}">Hero Banner</a></li>
                <li><a href="{{ $route('ai-chatbot') }}" class="{{ request()->routeIs($cfg['route_prefix'].'ai-chatbot') ? 'is-active' : '' }}">AI Chatbot (FAQ)</a></li>
            </ul>
            <a class="fm-btn fm-btn--dark fm-drawer__cta" href="https://wa.me/{{ $cfg['contact']['whatsapp'] }}?text={{ rawurlencode($cfg['contact']['whatsapp_greeting']) }}" target="_blank" rel="noopener">
                Hubungi Kami <svg class="fm-i" aria-hidden="true"><use href="#i-arrow"/></svg>
            </a>
        </aside>
    </div>
</header>
