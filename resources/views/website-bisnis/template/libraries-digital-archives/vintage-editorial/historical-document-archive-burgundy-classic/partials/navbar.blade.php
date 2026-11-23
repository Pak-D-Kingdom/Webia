<header class="hda-nav" data-nav>
    <div class="hda-container hda-nav__in">
        <a class="hda-logo" href="{{ $hu('home') }}" aria-label="{{ $hda['site']['name'] }} — Home">
            <img src="{{ $ha('ui/logo.svg') }}" alt="" width="46" height="35">
            <span class="hda-logo__t"><strong>HISTORICAL</strong><small>Document Archive</small></span>
        </a>
        <nav class="hda-menu" aria-label="Main navigation">
            @foreach($hda['nav'] as $n)
            <div class="hda-menu__item" data-menu>
                @if(!empty($n['children']))
                <a class="hda-menu__link {{ $navKey == $n['label'] ? 'is-active' : '' }}" href="{{ $hu($n['route']) }}" aria-haspopup="true" aria-expanded="false" data-menu-link>{{ $n['label'] }}<svg class="hda-icon"><use href="#i-down"/></svg></a>
                <div class="hda-drop" role="menu">
                    @foreach($n['children'] as $ch)
                    <a href="{{ $hu($ch['route']) }}" role="menuitem"><strong>{{ $ch['label'] }}</strong><span>{{ $ch['desc'] }}</span></a>
                    @endforeach
                </div>
                @else
                <a class="hda-menu__link {{ $navKey == $n['label'] ? 'is-active' : '' }}" href="{{ $hu($n['route']) }}">{{ $n['label'] }}</a>
                @endif
            </div>
            @endforeach
        </nav>
        <div class="hda-nav__tools">
            <button type="button" class="hda-nav__search" data-navsearch-toggle aria-label="Open search" aria-expanded="false"><svg class="hda-icon" style="width:20px;height:20px"><use href="#i-search"/></svg></button>
            <a class="hda-btn hda-btn--primary hda-nav__cta" href="{{ $hu('documents') }}">Explore Archive <svg class="hda-icon hda-arrow"><use href="#i-arrow"/></svg></a>
            <button type="button" class="hda-burger" data-drawer-open aria-label="Open menu" aria-expanded="false"><svg class="hda-icon"><use href="#i-menu"/></svg></button>
        </div>
    </div>
    <div class="hda-navsearch" data-navsearch>
        <div class="hda-container">
            <form action="{{ $hu('search') }}" method="get" role="search">
                <input type="search" name="q" placeholder="Search by keyword, title, or topic…" aria-label="Search the archive">
                <button class="hda-btn hda-btn--primary" type="submit">Search</button>
            </form>
        </div>
    </div>
</header>
<div class="hda-drawer" data-drawer aria-hidden="true">
    <div class="hda-drawer__scrim" data-drawer-close></div>
    <aside class="hda-drawer__panel" role="dialog" aria-label="Menu">
        <div class="hda-drawer__head"><strong>HISTORICAL DOCUMENT ARCHIVE</strong><button type="button" data-drawer-close aria-label="Close menu" style="color:inherit"><svg class="hda-icon" style="width:22px;height:22px"><use href="#i-x"/></svg></button></div>
        <div class="hda-drawer__body">
            @foreach($hda['nav'] as $n)
            @if(!empty($n['children']))
            <div class="hda-acc">
                <button type="button" class="hda-acc__btn" aria-expanded="false" data-acc>{{ $n['label'] }}<svg class="hda-icon"><use href="#i-down"/></svg></button>
                <div class="hda-acc__panel">
                    @foreach($n['children'] as $ch)
                    <a href="{{ $hu($ch['route']) }}">{{ $ch['label'] }}</a>
                    @endforeach
                </div>
            </div>
            @else
            <a class="hda-acc__btn" href="{{ $hu($n['route']) }}">{{ $n['label'] }}</a>
            @endif
            @endforeach
            <a class="hda-btn hda-btn--primary hda-btn--block" style="margin-top:18px" href="{{ $hu('documents') }}">Explore Archive</a>
        </div>
    </aside>
</div>
