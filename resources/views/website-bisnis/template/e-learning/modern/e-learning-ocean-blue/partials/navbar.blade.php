<header class="el-navbar" data-navbar>
    <div class="el-container el-navbar__inner">
        <a class="el-brand" href="{{ route('elearning.home') }}" aria-label="{{ $e['brand']['name'] }} — beranda">
            <img src="{{ $img('logo-mark.png') }}" alt="" width="48" height="41">
            <span class="el-brand__text"><strong>{{ $e['brand']['name'] }}</strong><small>{{ $e['brand']['tagline'] }}</small></span>
        </a>

        <nav class="el-nav" id="elNav" aria-label="Navigasi utama" data-nav-panel>
            <ul class="el-nav__list">
                @foreach ($e['nav'] as $item)
                    @php $isChat = ($item['action'] ?? null) === 'chat'; @endphp
                    <li>
                        @if ($isChat)
                            <button type="button" class="el-nav__link" data-open-chat>{{ $item['label'] }}</button>
                        @else
                            <a class="el-nav__link {{ request()->routeIs($item['route']) ? 'is-active' : '' }}"
                               href="{{ route($item['route']) }}"
                               @if (request()->routeIs($item['route'])) aria-current="page" @endif>{{ $item['label'] }}</a>
                        @endif
                    </li>
                @endforeach
            </ul>
            <a class="el-btn el-btn--primary el-nav__login el-nav__login--mobile" href="{{ route('elearning.member-area') }}">
                <svg class="el-ico" aria-hidden="true"><use href="#i-user"/></svg>Login / Register
            </a>
        </nav>

        <div class="el-navbar__actions">
            <div class="el-search-wrap">
                <button type="button" class="el-icon-btn" aria-label="Cari program" aria-expanded="false" aria-controls="elSearch" data-search-toggle>
                    <svg class="el-ico" aria-hidden="true"><use href="#i-search"/></svg>
                </button>
                <form class="el-search" id="elSearch" action="{{ route('elearning.programs') }}" method="get" role="search" hidden>
                    <label class="el-sr" for="elSearchInput">Cari program</label>
                    <input id="elSearchInput" type="search" name="q" placeholder="Cari program, mis. Python" autocomplete="off">
                    <button type="submit" class="el-btn el-btn--primary el-btn--sm">Cari</button>
                </form>
            </div>
            <a class="el-btn el-btn--primary el-nav__login el-nav__login--desktop" href="{{ route('elearning.member-area') }}">
                <svg class="el-ico" aria-hidden="true"><use href="#i-user"/></svg>Login / Register
            </a>
            <button type="button" class="el-icon-btn el-burger" aria-label="Buka menu" aria-expanded="false" aria-controls="elNav" data-nav-toggle>
                <svg class="el-ico" aria-hidden="true"><use href="#i-menu"/></svg>
            </button>
        </div>
    </div>
</header>
