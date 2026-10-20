{{-- ===================== NAVBAR ===================== --}}
<header class="rea-nav" data-nav>
    <div class="rea-container rea-nav__inner">
        <a class="rea-brand" href="#top" aria-label="{{ $site['name'] }} - back to top">
            <svg class="rea-brand__logo" aria-hidden="true" focusable="false"><use href="#i-logo"></use></svg>
            <span class="rea-brand__text">
                <span class="rea-brand__name">{{ strtoupper($site['name']) }}</span>
                <span class="rea-brand__tag">{{ strtoupper($site['tagline']) }}</span>
            </span>
        </a>

        <nav class="rea-nav__menu" id="rea-menu" aria-label="Main navigation" data-nav-menu>
            <ul class="rea-nav__list">
                @foreach ($nav as $item)
                    <li>
                        <a class="rea-nav__link {{ ($item['active'] ?? false) ? 'is-active' : '' }}"
                           href="{{ $item['href'] }}" @if ($item['active'] ?? false) aria-current="true" @endif>{{ $item['label'] }}</a>
                    </li>
                @endforeach
            </ul>
            <a class="rea-btn rea-btn--dark rea-nav__cta rea-nav__cta--mobile" href="#inquiry">Get In Touch {{ $icon('arrow') }}</a>
        </nav>

        <div class="rea-nav__actions">
            <button class="rea-iconbtn" type="button" aria-label="Search this page" aria-expanded="false" aria-controls="rea-search" data-search-toggle>{{ $icon('search') }}</button>
            <a class="rea-btn rea-btn--dark rea-nav__cta" href="#inquiry">Get In Touch {{ $icon('arrow') }}</a>
            <button class="rea-iconbtn rea-nav__toggle" type="button" aria-label="Open menu" aria-expanded="false" aria-controls="rea-menu" data-nav-toggle>
                {{ $icon('menu', 'rea-icon--menu') }}{{ $icon('x', 'rea-icon--close') }}
            </button>
        </div>
    </div>

    <div class="rea-search" id="rea-search" data-search-panel hidden>
        <div class="rea-container">
            <form class="rea-search__form" role="search" data-search-form>
                <label class="rea-sr" for="rea-search-input">Search this page</label>
                {{ $icon('search') }}
                <input id="rea-search-input" type="search" name="q" placeholder="Search: price, gallery, location, booking…" autocomplete="off">
                <button class="rea-btn rea-btn--gold" type="submit">Search</button>
            </form>
            <p class="rea-search__hint" data-search-hint aria-live="polite"></p>
        </div>
    </div>
</header>
