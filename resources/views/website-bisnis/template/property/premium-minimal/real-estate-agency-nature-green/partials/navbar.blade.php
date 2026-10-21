{{-- Navbar hanya: Home, Location, Contact. Halaman lain diakses lewat "Lihat Semua" & footer. --}}
<header class="navbar" data-navbar>
    <div class="container container--nav navbar__in">
        <a class="brand" href="{{ $r('home') }}" aria-label="{{ $t['brand']['name'] }} — beranda">
            <span class="brand__mark"><svg class="i" aria-hidden="true"><use href="#i-leaf"/></svg></span>
            <span class="brand__txt"><strong>GREENESTATE</strong><small>{{ $t['brand']['tagline'] }}</small></span>
        </a>

        <nav class="nav" id="nav" aria-label="Menu utama">
            <a href="{{ $r('home') }}" @class(['is-active' => $active === 'home']) @if($active === 'home') aria-current="page" @endif>Home</a>
            <a href="{{ $r('home') }}#location">Location</a>
            <a href="{{ $r('home') }}#inquiry">Contact</a>
            <a class="btn btn--primary nav__cta" href="{{ $r('home') }}#inquiry">Get In Touch <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </nav>

        <div class="navbar__actions">
            <button class="icon-btn" type="button" aria-label="Cari properti" aria-expanded="false" data-search-toggle><svg class="i" aria-hidden="true"><use href="#i-search"/></svg></button>
            <a class="btn btn--primary navbar__cta" href="{{ $r('home') }}#inquiry">Get In Touch <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            <button class="icon-btn nav-toggle" type="button" aria-label="Buka menu" aria-controls="nav" aria-expanded="false" data-nav-toggle>
                <svg class="i i--open" aria-hidden="true"><use href="#i-menu"/></svg><svg class="i i--close" aria-hidden="true"><use href="#i-close"/></svg>
            </button>
        </div>
    </div>

    <form class="search-box" action="{{ $r('properties') }}" method="get" role="search" hidden data-search-box>
        <label class="sr-only" for="q">Cari properti</label>
        <svg class="i" aria-hidden="true"><use href="#i-search"/></svg>
        <input id="q" name="q" type="search" placeholder="Cari nama atau lokasi properti" autocomplete="off">
        <button class="btn btn--primary" type="submit">Cari</button>
    </form>
</header>
