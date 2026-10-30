@php
    $isActive = function ($item) use ($cfg) {
        $p = $cfg['route_prefix'];
        if (isset($item['children'])) {
            foreach ($item['children'] as $ch) { if (request()->routeIs($p.$ch['route'])) return true; }
            return false;
        }
        return request()->routeIs($p.$item['route']);
    };
    $current = fn ($r) => request()->routeIs($cfg['route_prefix'].$r);
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
                @foreach ($cfg['nav'] as $n => $item)
                    @if (isset($item['children']))
                        <li class="fm-nav__item fm-nav__item--drop {{ $isActive($item) ? 'is-active' : '' }}" data-fm-drop>
                            <button type="button" class="fm-nav__link" id="fm-drop-btn-{{ $n }}" aria-expanded="false" aria-controls="fm-drop-{{ $n }}">
                                {{ $item['label'] }}
                                <svg class="fm-i fm-i--xs fm-nav__caret" aria-hidden="true"><use href="#i-chevron"/></svg>
                            </button>
                            <ul class="fm-menu" id="fm-drop-{{ $n }}" aria-labelledby="fm-drop-btn-{{ $n }}">
                                @foreach ($item['children'] as $ch)
                                    <li>
                                        <a class="fm-menu__item {{ $current($ch['route']) ? 'is-current' : '' }}" href="{{ $route($ch['route']) }}" @if ($current($ch['route'])) aria-current="page" @endif>
                                            <span class="fm-menu__ico"><svg class="fm-i" aria-hidden="true"><use href="#i-{{ $ch['icon'] ?? 'arrow' }}"/></svg></span>
                                            <span class="fm-menu__txt">
                                                <strong>{{ $ch['label'] }}</strong>
                                                @if (!empty($ch['desc']))<small>{{ $ch['desc'] }}</small>@endif
                                            </span>
                                            <svg class="fm-i fm-i--xs fm-menu__go" aria-hidden="true"><use href="#i-right"/></svg>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li class="fm-nav__item {{ $isActive($item) ? 'is-active' : '' }}">
                            <a class="fm-nav__link" href="{{ $route($item['route']) }}" @if ($isActive($item)) aria-current="page" @endif>{{ $item['label'] }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </nav>

        <button type="button" class="fm-burger" data-fm-drawer-open aria-controls="fm-drawer" aria-expanded="false" aria-label="Buka menu">
            <svg class="fm-i" aria-hidden="true"><use href="#i-menu"/></svg>
        </button>
    </div>
</header>

{{-- Drawer mobile & tablet (dropdown menjadi accordion).
     Sengaja di LUAR <header>: header memakai backdrop-filter sehingga elemen fixed di dalamnya akan terpotong. --}}
    <div class="fm-drawer" id="fm-drawer" data-fm-drawer hidden>
        <div class="fm-drawer__backdrop" data-fm-drawer-close></div>
        <aside class="fm-drawer__panel" role="dialog" aria-modal="true" aria-label="Menu navigasi">
            <div class="fm-drawer__head">
                <strong class="fm-drawer__brand">{{ $cfg['brand']['name'] }}</strong>
                <button type="button" class="fm-iconbtn" data-fm-drawer-close aria-label="Tutup menu"><svg class="fm-i" aria-hidden="true"><use href="#i-x"/></svg></button>
            </div>
            <ul class="fm-drawer__list">
                @foreach ($cfg['nav'] as $n => $item)
                    @if (isset($item['children']))
                        @php $open = $isActive($item); @endphp
                        <li class="fm-acc {{ $open ? 'is-open' : '' }}" data-fm-acc>
                            <button type="button" class="fm-acc__btn" aria-expanded="{{ $open ? 'true' : 'false' }}" aria-controls="fm-acc-{{ $n }}">
                                <span>{{ $item['label'] }}</span>
                                <svg class="fm-i fm-i--xs fm-acc__caret" aria-hidden="true"><use href="#i-chevron"/></svg>
                            </button>
                            <ul class="fm-acc__panel" id="fm-acc-{{ $n }}" @unless ($open) hidden @endunless>
                                @foreach ($item['children'] as $ch)
                                    <li>
                                        <a href="{{ $route($ch['route']) }}" class="{{ $current($ch['route']) ? 'is-active' : '' }}">
                                            <span class="fm-menu__ico"><svg class="fm-i" aria-hidden="true"><use href="#i-{{ $ch['icon'] ?? 'arrow' }}"/></svg></span>
                                            <span class="fm-menu__txt"><strong>{{ $ch['label'] }}</strong>@if (!empty($ch['desc']))<small>{{ $ch['desc'] }}</small>@endif</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li><a href="{{ $route($item['route']) }}" class="fm-drawer__link {{ $isActive($item) ? 'is-active' : '' }}">{{ $item['label'] }}</a></li>
                    @endif
                @endforeach
                <li class="fm-drawer__group">Lainnya</li>
                <li><a href="{{ $route('hero') }}" class="fm-drawer__link {{ $current('hero') ? 'is-active' : '' }}">Hero Banner</a></li>
                <li><a href="{{ $route('ai-chatbot') }}" class="fm-drawer__link {{ $current('ai-chatbot') ? 'is-active' : '' }}">AI Chatbot (FAQ)</a></li>
            </ul>
            <a class="fm-btn fm-btn--dark fm-drawer__cta" href="https://wa.me/{{ $cfg['contact']['whatsapp'] }}?text={{ rawurlencode($cfg['contact']['whatsapp_greeting']) }}" target="_blank" rel="noopener">
                Hubungi Kami <svg class="fm-i" aria-hidden="true"><use href="#i-arrow"/></svg>
            </a>
        </aside>
    </div>
