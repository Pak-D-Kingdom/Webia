@php($rp = $e['route'])
<header class="nl-nav" data-nav>
    <div class="nl-container nl-nav__in">
        <a class="nl-brand" href="{{ $r($rp.'home') }}" aria-label="{{ $e['brand']['name'] }} – beranda">
            <svg class="nl-brand__mark" viewBox="0 0 36 36" aria-hidden="true"><use href="#i-logo"/></svg>
            <span class="nl-brand__txt"><strong>{{ $e['brand']['name'] }}</strong><small>{{ $e['brand']['tagline'] }}</small></span>
        </a>

        <nav class="nl-nav__menu" id="nl-menu" aria-label="Navigasi utama" data-nav-menu>
            <ul class="nl-nav__links">
                @foreach($e['nav'] as $item)
                    <li>
                        @if(($item['action'] ?? null) === 'ai')
                            <button type="button" class="nl-nav__ai" data-ai-open aria-haspopup="dialog" aria-controls="nl-ai" aria-expanded="false">
                                <svg class="ic"><use href="#i-sparkle"/></svg>{{ $item['label'] }}
                            </button>
                        @else
                            <a href="{{ $r($rp.$item['route']) }}" @class(['is-active' => $isActive($rp.$item['route'])]) @if($isActive($rp.$item['route'])) aria-current="page" @endif>{{ $item['label'] }}</a>
                        @endif
                    </li>
                @endforeach
            </ul>
            <div class="nl-nav__cta">
                <a class="nl-btn nl-btn--ghost" href="{{ $r($rp.'member-area') }}">Login</a>
                <a class="nl-btn nl-btn--primary" href="{{ $r($rp.'registration') }}">Get Started <svg class="ic"><use href="#i-arrow"/></svg></a>
            </div>
        </nav>

        <div class="nl-nav__tools">
            <a class="nl-iconbtn" href="{{ $r($rp.'programs') }}#cari" data-sx-open aria-haspopup="dialog" aria-label="Cari program, teacher, atau halaman" title="Cari (tekan /)"><svg class="ic"><use href="#i-search"/></svg></a>
            <button class="nl-iconbtn nl-nav__toggle" type="button" aria-expanded="false" aria-controls="nl-menu" aria-label="Buka menu" data-nav-toggle>
                <svg class="ic"><use href="#i-menu"/></svg>
            </button>
        </div>
    </div>
</header>
