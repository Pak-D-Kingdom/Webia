{{-- Lokasi & Akses: peta interaktif (Google Maps embed) langsung tampil, alamat, poin akses, tombol Google Maps.
     Variabel opsional: $stack (true = peta di atas, kartu alamat di bawah). --}}
@php $l = $site['location']; $c = $site['contact']; $img = $site['assets']['img']; $stack = $stack ?? false; @endphp
<section class="panel" id="location" aria-labelledby="loc-title">
  <header class="panel__head">
    <div><h2 class="panel__title" id="loc-title">{{ $l['title'] }}</h2><p class="panel__sub">{{ $l['subtitle'] }}</p></div>
  </header>
  <div class="loc {{ $stack ? 'loc--stack' : '' }}">
    <div class="loc__map">
      <img src="{{ asset($img.'/'.$l['map']) }}" alt="" aria-hidden="true" loading="lazy" width="576" height="390">
      <span class="loc__pin" aria-hidden="true">
        <svg viewBox="0 0 32 42"><path d="M16 1C8 1 2 7 2 15c0 10.5 14 26 14 26s14-15.5 14-26C30 7 24 1 16 1z" fill="#E8654A"/><circle cx="16" cy="15" r="5.5" fill="#fff"/></svg>
      </span>
      <iframe src="{{ $l['embed_url'] }}" title="Peta lokasi {{ $site['brand']['name'] }}: {{ $c['address'] }}" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
    </div>
    <div class="loc__card">
      <h3>{{ $c['address_line1'] }}</h3>
      <p>{{ $c['address_line2'] }}</p>
      <ul class="check-list">
        @foreach ($l['points'] as $pt)
          <li><svg class="icon" aria-hidden="true"><use href="#i-check"/></svg>{{ $pt }}</li>
        @endforeach
      </ul>
      <a class="btn btn--primary btn--sm" href="{{ $c['maps_url'] }}" target="_blank" rel="noopener noreferrer">Lihat di Google Maps <svg class="icon" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
    </div>
  </div>
</section>
