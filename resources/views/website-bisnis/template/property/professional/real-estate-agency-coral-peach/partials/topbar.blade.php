{{-- Topbar: hanya info kontak & sosial media (tanpa navigasi halaman). --}}
@php $c = $site['contact']; @endphp
<div class="topbar" role="region" aria-label="Informasi kontak">
  <div class="container topbar__inner">
    <ul class="topbar__list">
      <li><svg class="icon" aria-hidden="true"><use href="#i-pin"/></svg><span>{{ $c['address'] }}</span></li>
      <li class="hide-md"><svg class="icon" aria-hidden="true"><use href="#i-mail"/></svg><a href="mailto:{{ $c['email'] }}">{{ $c['email'] }}</a></li>
      <li class="hide-lg"><svg class="icon" aria-hidden="true"><use href="#i-whatsapp"/></svg><a href="mailto:{{ $c['email_extra'] }}">{{ $c['email_extra'] }}</a></li>
      <li class="hide-sm"><svg class="icon" aria-hidden="true"><use href="#i-clock"/></svg><span>{{ $c['hours'] }}</span></li>
    </ul>
    <div class="topbar__right">
      <ul class="topbar__social" aria-label="Sosial media">
        @foreach ($site['socials'] as $s)
          <li><a href="{{ $s['url'] }}" aria-label="{{ $s['name'] }}" rel="noopener"><svg class="icon" aria-hidden="true"><use href="#i-{{ $s['icon'] }}"/></svg></a></li>
        @endforeach
      </ul>
      <a class="topbar__phone hide-sm" href="tel:{{ $c['phone_link'] }}"><svg class="icon" aria-hidden="true"><use href="#i-phone"/></svg><span>{{ $c['phone'] }}</span></a>
    </div>
  </div>
</div>
