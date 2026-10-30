@php $c = $site['contact']; @endphp
<div class="lg-topbar">
    <div class="lg-wrap lg-topbar__in">
        <ul class="lg-topbar__info">
            <li class="lg-topbar__loc"><svg class="lg-ic" aria-hidden="true"><use href="#i-pin"></use></svg>{{ $c['location'] }}</li>
            <li class="lg-topbar__hrs"><svg class="lg-ic" aria-hidden="true"><use href="#i-clock"></use></svg>{{ $c['hours'] }}</li>
            <li><a href="tel:{{ $c['phone_raw'] }}"><svg class="lg-ic" aria-hidden="true"><use href="#i-phone"></use></svg>{{ $c['phone'] }}</a></li>
            <li class="lg-topbar__mail"><a href="mailto:{{ $c['email'] }}"><svg class="lg-ic" aria-hidden="true"><use href="#i-mail"></use></svg>{{ $c['email'] }}</a></li>
        </ul>
        <ul class="lg-topbar__links">
            @foreach ($site['topbar']['links'] as $l)
                <li class="lg-topbar__extra"><a href="{{ $to($l['route']) }}" @if (! $l['route']) data-soon @endif>{{ $l['label'] }}</a></li>
            @endforeach
            <li class="lg-lang" data-dropdown>
                <button type="button" class="lg-lang__btn" data-dropdown-btn aria-expanded="false" aria-haspopup="menu" aria-controls="lg-lang-menu" aria-label="Pilih bahasa">
                    <span class="lg-flag" aria-hidden="true"></span><span>ID</span>
                    <svg class="lg-ic lg-lang__caret" aria-hidden="true"><use href="#i-chevron-down"></use></svg>
                </button>
                <div class="lg-menu" id="lg-lang-menu" role="menu" data-dropdown-menu hidden>
                    <p class="lg-menu__label">Pilih bahasa</p>
                    <button type="button" class="lg-menu__item is-active" role="menuitemradio" aria-checked="true">
                        <span class="lg-flag" aria-hidden="true"></span>
                        <span class="lg-menu__txt"><b>Indonesia</b><small>Bahasa Indonesia</small></span>
                        <svg class="lg-ic lg-menu__check" aria-hidden="true"><use href="#i-check"></use></svg>
                    </button>
                    <button type="button" class="lg-menu__item" role="menuitemradio" aria-checked="false" data-soon="Versi English segera hadir.">
                        <span class="lg-flag lg-flag--en" aria-hidden="true">EN</span>
                        <span class="lg-menu__txt"><b>English</b><small>English version</small></span>
                        <em class="lg-menu__tag">Segera</em>
                    </button>
                </div>
            </li>
        </ul>
    </div>
</div>
