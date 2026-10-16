<header class="header"><div class="container nav">
    @include("$v.partials.logo")
    <nav id="navLinks" class="nav__links" aria-label="Navigasi utama">
        @foreach (config('cafe.nav_top') as [$label, $r, $hash])
            <a href="{{ route('webia.fnb.minimalis.' . $r) . $hash }}"
               @class(['active' => ($hash === '' && request()->routeIs('webia.fnb.minimalis.' . $r)) || ($loop->first && request()->routeIs('webia.fnb.minimalis.home'))])>{{ $label }}</a>
        @endforeach
    </nav>
    <div class="nav__tools">
        <button class="icon-btn" aria-label="Cari"><svg class="i" aria-hidden="true"><use href="#i-search"/></svg></button>
        <a class="btn nav__cta" href="{{ route('webia.fnb.minimalis.reservasi') }}"><svg class="i" aria-hidden="true"><use href="#i-calendar"/></svg> Reservasi Sekarang</a>
        <button id="navToggle" class="icon-btn burger" aria-label="Buka menu" aria-expanded="false" aria-controls="navLinks">☰</button>
    </div>
</div></header>
