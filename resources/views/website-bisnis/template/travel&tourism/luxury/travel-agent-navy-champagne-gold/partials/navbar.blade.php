{{-- Navbar: logo + menu utama (sticky). Mobile: tombol hamburger --}}
<header class="ga-nav" data-nav>
    <div class="ga-container ga-nav__in">
        <a class="ga-logo" href="{{ $url() }}" aria-label="{{ $brand['name'] }} — beranda">
            <svg class="ga-logo__mark" viewBox="0 0 48 48" aria-hidden="true" focusable="false">
                <g fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M24 7c4 5 5 11 0 19-5-8-4-14 0-19z"/>
                    <path d="M24 26c-2-6-8-9-14-8 1 7 6 12 14 12"/>
                    <path d="M24 26c2-6 8-9 14-8-1 7-6 12-14 12"/>
                    <path d="M13 36c3 2 6 3 11 3s8-1 11-3"/>
                </g>
            </svg>
            <span class="ga-logo__text">
                <strong>{{ $brand['name'] }}</strong>
                <small>{{ $brand['tagline'] }}</small>
            </span>
        </a>

        <button class="ga-nav__toggle" type="button" aria-expanded="false" aria-controls="ga-menu" data-nav-toggle>
            <span class="ga-nav__ic ga-nav__ic--open">{!! $icon('menu') !!}</span>
            <span class="ga-nav__ic ga-nav__ic--close">{!! $icon('close') !!}</span>
            <span class="ga-sr">Buka menu</span>
        </button>

        <nav class="ga-nav__menu" id="ga-menu" aria-label="Navigasi utama" data-nav-menu>
            <ul>
                @foreach ($t['nav'] as $item)
                    @php $active = $page === $item['key']; @endphp
                    <li>
                        <a href="{{ $url($item['path']) }}" class="{{ $active ? 'is-active' : '' }}" @if ($active) aria-current="page" @endif>{{ $item['label'] }}</a>
                    </li>
                @endforeach
            </ul>
            <a class="ga-btn ga-btn--gold ga-btn--sm ga-nav__cta" href="{{ $url('inquiry') }}" @if ($page === 'inquiry') aria-current="page" @endif>Booking Inquiry</a>
        </nav>
    </div>
</header>
