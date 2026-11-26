<header class="navbar" id="navbar">
    <div class="wrap">
        <a href="{{ $u('') }}" class="logo" aria-label="{{ $dam['brand']['name'] }} — Beranda">
            <span class="logo-mark"><svg viewBox="0 0 24 24">{!! $dam['icons']['logo'] !!}</svg></span>
            <span>Astra<em>ly</em></span>
        </a>

        <ul class="menu" role="menubar">
            @foreach ($dam['nav'] as $item)
                @php($key = $item['href'] === '' ? 'home' : $item['href'])
                <li role="none">
                    <a role="menuitem" href="{{ $u($item['href']) }}" class="nlink {{ $current === $key ? 'on' : '' }}">
                        {{ $item['label'] }}
                        @if (!empty($item['mega']) || !empty($item['children']))
                            {{ $ic('chev') }}
                        @endif
                    </a>
                    @if (!empty($item['mega']))
                        <div class="dd mega">
                            @foreach ($dam['categories'] as $slug => $c)
                                <a href="{{ $u('explore-assets') }}?cat={{ $slug }}">
                                    <span class="di">{{ $ic($c['icon']) }}</span>
                                    <span><strong>{{ $c['name'] }}</strong><small>{{ \Illuminate\Support\Str::limit($c['desc'], 52) }}</small></span>
                                </a>
                            @endforeach
                            <div class="mega-foot">
                                <span>Lihat semua <b>{{ $all->count() }}+</b> aset terkurasi</span>
                                <a href="{{ $u('explore-assets') }}" class="btn btn-primary btn-sm" style="display:inline-flex">Jelajahi Semua {{ $ic('arrow', 'ico-sm') }}</a>
                            </div>
                        </div>
                    @elseif (!empty($item['children']))
                        <div class="dd">
                            @foreach ($item['children'] as $ch)
                                <a href="{{ $u($ch[1]) }}"><span class="di">{{ $ic('sparkle') }}</span><span><strong>{{ $ch[0] }}</strong><small>{{ $ch[2] }}</small></span></a>
                            @endforeach
                        </div>
                    @endif
                </li>
            @endforeach
        </ul>

        <div class="nav-actions">
            <button class="icon-btn" data-open-search aria-label="Cari aset">{{ $ic('search') }}</button>
            <a class="icon-btn" href="{{ $u('wishlist') }}" aria-label="Wishlist">{{ $ic('heart') }}<span class="dot" data-wish-count>0</span></a>
            <button class="icon-btn" data-open-cart aria-label="Keranjang">{{ $ic('cart') }}<span class="dot" data-cart-count>0</span></button>
            <a class="icon-btn hidden sm:grid" href="{{ $u('user-profile') }}" aria-label="Profil">{{ $ic('user') }}</a>
            <a href="{{ $u('become-a-creator') }}" class="btn btn-primary btn-sm nav-cta">{{ $ic('rocket', 'ico-sm') }} Jadi Kreator</a>
            <button class="icon-btn burger" data-open-menu aria-label="Buka menu" aria-expanded="false">{{ $ic('menu') }}</button>
        </div>
    </div>
</header>
