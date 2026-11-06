{{-- Booking/Viewing di beranda: kartu ajakan (tanpa input tanggal/waktu). "Booking Sekarang" langsung membuka WhatsApp. --}}
@php
  $bk = $site['booking']; $c = $site['contact']; $img = $site['assets']['img'];
  $waUrl = 'https://wa.me/'.$c['whatsapp_leads'].'?text='.rawurlencode($bk['wa_text']);
@endphp
<section class="panel book-card" id="booking" aria-labelledby="bk-title">
  <img class="book-card__leaf" src="{{ asset($img.'/leaf-branch.svg') }}" alt="" aria-hidden="true" loading="lazy">

  <div class="book-card__head">
    <span class="book-card__badge"><svg class="icon" aria-hidden="true"><use href="#i-calendar-check"/></svg></span>
    <div>
      <h2 class="panel__title" id="bk-title">{{ $bk['title'] }}</h2>
      <p class="book-card__hours"><svg class="icon" aria-hidden="true"><use href="#i-clock"/></svg>{{ $c['hours'] }}</p>
    </div>
  </div>

  <p class="book-card__text">{{ $bk['home_text'] }}</p>

  <ol class="book-steps">
    @foreach ($bk['steps'] as $st)
      <li><span class="book-steps__num">{{ $loop->iteration }}</span><div><strong>{{ $st['title'] }}</strong><small>{{ $st['text'] }}</small></div></li>
    @endforeach
  </ol>

  <div class="book-card__actions">
    <a class="btn btn--primary btn--block" href="{{ $waUrl }}" target="_blank" rel="noopener noreferrer"><svg class="icon" aria-hidden="true"><use href="#i-whatsapp"/></svg><span>Booking Sekarang</span> <svg class="icon" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
    <a class="book-card__link" href="{{ route('coral-peach.booking') }}">Atur jadwal lengkap <svg class="icon" aria-hidden="true"><use href="#i-arrow-right"/></svg></a>
  </div>
</section>
