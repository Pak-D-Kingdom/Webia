<header class="header"><div class="container nav">
    @include("$v.partials.logo")
    <nav id="navLinks" class="nav__links" aria-label="Navigasi utama">
        @foreach (config('cafe.nav_top') as [$label, $r, $hash])
            <a href="{{ $pageUrl($r, $hash) }}"
               @class(['active' => ($hash === '' && $currentPage === $r) || ($loop->first && $currentPage === 'home')])>{{ $label }}</a>
        @endforeach
    </nav>
    <div class="nav__tools">
        <button class="icon-btn" aria-label="Cari"><svg class="i" aria-hidden="true"><use href="#i-search"/></svg></button>
        <a class="btn nav__cta" href="{{ $pageUrl('reservasi') }}"><svg class="i" aria-hidden="true"><use href="#i-calendar"/></svg> Reservasi Sekarang</a>
        <button id="navToggle" class="icon-btn burger" aria-label="Buka menu" aria-expanded="false" aria-controls="navLinks">☰</button>
    </div>
</div></header>
