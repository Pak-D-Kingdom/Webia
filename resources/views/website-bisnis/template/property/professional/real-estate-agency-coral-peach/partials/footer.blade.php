{{-- Footer: logo, navigasi, kontak, sosial media, tombol ke atas + kredit WEBIA by D-KREASI. --}}
@php $b = $site['brand']; $c = $site['contact']; $img = $site['assets']['img']; @endphp
<footer class="footer">
  <img class="footer__leaf" src="{{ asset($img.'/leaf-branch.svg') }}" alt="" aria-hidden="true" loading="lazy">
  <div class="container footer__grid">
    <div class="footer__brand">
      <a class="logo logo--light" href="{{ route('coral-peach.home') }}" aria-label="{{ $b['name'] }}">
        <svg class="logo__mark" viewBox="0 0 48 48" fill="none" stroke="#fff" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M6 22 24 6l18 16"/><path d="M11 19v22h26V19"/><path d="M18 41V30a6 6 0 0 1 12 0v11"/><path d="M33 12V7h4v9"/><circle cx="24" cy="21" r="2.2" fill="#fff" stroke="none"/>
        </svg>
        <span class="logo__text"><strong>{{ $b['upper'] }}</strong><small>{{ $b['tagline'] }}</small></span>
      </a>
    </div>

    <nav class="footer__col" aria-label="Navigasi footer">
      <h2 class="footer__title">Navigasi</h2>
      <ul class="footer__nav">
        @foreach ($site['nav'] as $n)
          <li><a href="{{ route($n['route']) }}{{ $n['hash'] ? '#'.$n['hash'] : '' }}">{{ $n['label'] }}</a></li>
        @endforeach
      </ul>
    </nav>

    <div class="footer__col">
      <h2 class="footer__title">Kontak Kami</h2>
      <ul class="footer__contact">
        <li><svg class="icon" aria-hidden="true"><use href="#i-phone"/></svg><a href="tel:{{ $c['phone_link'] }}">{{ $c['phone'] }}</a></li>
        <li><svg class="icon" aria-hidden="true"><use href="#i-mail"/></svg><a href="mailto:{{ $c['email'] }}">{{ $c['email'] }}</a></li>
        <li><svg class="icon" aria-hidden="true"><use href="#i-pin"/></svg><span>{{ $c['address'] }}</span></li>
      </ul>
    </div>

    <div class="footer__col">
      <h2 class="footer__title">Ikuti Kami</h2>
      <ul class="footer__social">
        @foreach ($site['socials'] as $s)
          <li><a href="{{ $s['url'] }}" aria-label="{{ $s['name'] }}" rel="noopener"><svg class="icon" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg></a></li>
        @endforeach
      </ul>
    </div>

    <button class="to-top" type="button" data-to-top aria-label="Kembali ke atas"><svg class="icon" aria-hidden="true"><use href="#i-arrow-up"/></svg></button>
  </div>

  <div class="footer__credit">
    <div class="container"><p>{{ $site['footer']['credit'] }}</p></div>
  </div>
</footer>
