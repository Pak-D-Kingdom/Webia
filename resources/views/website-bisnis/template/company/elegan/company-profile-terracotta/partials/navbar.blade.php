<header class="cp-nav" id="cp-nav">
    <div class="cp-wrap cp-nav__in">
        <a class="cp-brand" href="#beranda" aria-label="{{ $c['brand']['name'] }}">
            @include("$v.partials.logo")
            <span><b>{{ strtoupper($c['brand']['name']) }}</b><small>{{ $c['brand']['tagline'] }}</small></span>
        </a>
        <nav aria-label="Navigasi utama">
            <ul class="cp-menu" id="cp-menu">
                @foreach ($c['nav'] as $n)
                    <li><a href="{{ $n['u'] }}">{{ $n['t'] }}</a></li>
                @endforeach
            </ul>
        </nav>
        <div class="cp-nav__act">
            <button class="cp-iconbtn" type="button" aria-label="Cari">{{ $ic('search') }}</button>
            <a class="cp-btn cp-hide-s" href="#kontak">Hubungi Kami {{ $ic('arrow') }}</a>
            <button class="cp-iconbtn cp-burger" type="button" aria-label="Buka menu" aria-controls="cp-menu" aria-expanded="false"><span></span></button>
        </div>
    </div>
</header>
