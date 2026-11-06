<header class="lm-nav" id="navbar">
    <div class="lm-container lm-nav__in">
        @include("$v.partials.logo")

        <button class="lm-nav__toggle" type="button" aria-expanded="false" aria-controls="nav-panel" aria-label="Buka menu">
            <svg class="i" aria-hidden="true"><use href="#i-menu"/></svg>
        </button>

        <div class="lm-nav__panel" id="nav-panel">
            <nav aria-label="Navigasi utama">
                <ul class="lm-nav__list">
                    @foreach ($cafe['nav'] as $n)
                        <li><a href="{{ $url($n['page'], $n['anchor']) }}" data-spy>{{ $n['label'] }}</a></li>
                    @endforeach
                </ul>
            </nav>
            <div class="lm-nav__actions">
                <a class="lm-icon-btn" href="{{ $url('home', '#faq') }}" data-faq-focus aria-label="Cari jawaban atau bertanya">
                    <svg class="i" aria-hidden="true"><use href="#i-search"/></svg>
                </a>
                <a class="lm-btn lm-btn--gold lm-btn--pill lm-btn--sm" href="{{ $url('reservasi') }}">{{ $cafe['booking']['nav_cta'] }}</a>
            </div>
        </div>
    </div>
</header>
