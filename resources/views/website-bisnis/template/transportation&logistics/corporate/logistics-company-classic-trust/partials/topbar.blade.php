{{-- Topbar: info kontak (kiri) + tautan cepat & bahasa (kanan) --}}
<div class="topbar">
    <div class="container container--nav topbar__in">
        <ul class="topbar__info">
            @foreach ($c['topbar']['info'] as $it)
                <li class="topbar__item">
                    <svg class="ic" aria-hidden="true"><use href="#{{ $it['icon'] }}"/></svg>
                    @if (isset($it['href']))
                        <a href="{{ $it['href'] }}">{{ $it['text'] }}</a>
                    @else
                        <span>{{ $it['text'] }}</span>
                    @endif
                </li>
            @endforeach
        </ul>
        <ul class="topbar__links">
            @foreach ($c['topbar']['links'] as $l)
                <li><a href="{{ $route($l['route']) }}">{{ $l['label'] }}</a></li>
            @endforeach
            <li class="lang">
                <button type="button" class="lang__btn" data-lang-toggle aria-haspopup="true" aria-expanded="false">
                    <svg class="ic" aria-hidden="true"><use href="#i-globe"/></svg>
                    <span>ID</span>
                    <svg class="ic ic--xs" aria-hidden="true"><use href="#i-chevron-down"/></svg>
                </button>
                <ul class="lang__menu" data-lang-menu hidden>
                    <li><span class="lang__opt is-current" aria-current="true">Bahasa Indonesia (ID)</span></li>
                    <li><span class="lang__opt is-soon">English (EN) · segera hadir</span></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
