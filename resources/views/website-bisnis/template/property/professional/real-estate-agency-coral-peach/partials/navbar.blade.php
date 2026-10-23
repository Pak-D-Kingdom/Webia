{{-- Navbar sticky: logo, menu utama, pencarian cepat, CTA "Find Your Home". --}}
@php $b = $site['brand']; @endphp
<header class="navbar" data-navbar>
  <div class="container navbar__inner">
    <a class="logo" href="{{ route('coral-peach.home') }}" aria-label="{{ $b['name'] }} — beranda">
      <svg class="logo__mark" viewBox="0 0 48 48" fill="none" stroke="#E8654A" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
        <path d="M6 22 24 6l18 16"/><path d="M11 19v22h26V19"/><path d="M18 41V30a6 6 0 0 1 12 0v11"/><path d="M33 12V7h4v9" /><circle cx="24" cy="21" r="2.2" fill="#E8654A" stroke="none"/>
      </svg>
      <span class="logo__text"><strong>{{ $b['upper'] }}</strong><small>{{ $b['tagline'] }}</small></span>
    </a>

    <nav class="navbar__menu" id="primary-menu" aria-label="Navigasi utama" data-menu>
      <ul class="navbar__links">
        @foreach ($site['nav'] as $n)
          @php $active = $n['match'] && request()->routeIs($n['match']); @endphp
          <li><a href="{{ route($n['route']) }}{{ $n['hash'] ? '#'.$n['hash'] : '' }}" class="{{ $active ? 'is-active' : '' }}" @if($active) aria-current="page" @endif>{{ $n['label'] }}</a></li>
        @endforeach
      </ul>
      <a class="btn btn--primary navbar__cta navbar__cta--mobile" href="{{ route('coral-peach.property') }}">Find Your Home <svg class="icon" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
    </nav>

    <div class="navbar__actions">
      <button class="icon-btn" type="button" data-search-toggle aria-label="Cari properti" aria-expanded="false" aria-controls="quick-search"><svg class="icon" aria-hidden="true"><use href="#i-search"/></svg></button>
      <a class="btn btn--primary navbar__cta" href="{{ route('coral-peach.property') }}">Find Your Home <svg class="icon" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
      <button class="icon-btn navbar__burger" type="button" data-menu-toggle aria-label="Buka menu" aria-expanded="false" aria-controls="primary-menu"><svg class="icon" aria-hidden="true"><use href="#i-menu"/></svg></button>
    </div>
  </div>

  <form class="quick-search" id="quick-search" action="{{ route('coral-peach.property') }}" method="get" role="search" hidden>
    <div class="container quick-search__inner">
      <svg class="icon" aria-hidden="true"><use href="#i-search"/></svg>
      <label class="sr-only" for="quick-q">Cari properti</label>
      <input id="quick-q" type="search" name="q" placeholder="Cari nama properti atau lokasi…" autocomplete="off">
      <button class="btn btn--primary btn--sm" type="submit">Cari</button>
    </div>
  </form>
</header>
