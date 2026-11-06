@extends('website-bisnis.template.property.professional.real-estate-agency-coral-peach.layouts.app')

@section('title', 'Booking / Viewing — '.$site['brand']['name'])
@section('meta_description', 'Jadwalkan kunjungan (viewing) properti Coral Homes. Pilih tanggal dan waktu yang sesuai untuk Anda.')
@section('body_class', 'page-booking')

@section('content')
  @php $bk = $site['booking']; $c = $site['contact']; @endphp
  @include('website-bisnis.template.property.professional.real-estate-agency-coral-peach.partials.page-header', ['image' => $site['page_images']['booking'], 'crumb' => 'Booking / Viewing', 'title' => $bk['title'], 'subtitle' => $bk['subtitle']])

  <div class="container section booking-layout">
    <section class="panel" aria-labelledby="bkf-title">
      <h2 class="panel__title" id="bkf-title">Form Booking</h2>
      <p class="panel__sub">Isi data berikut, tim kami akan mengonfirmasi jadwal Anda.</p>
      <form class="form form--grid" action="#" method="post" novalidate data-validate-form data-booking data-prefill data-form-name="booking" data-closed='@json($bk['closed_weekdays'])'
            data-whatsapp="{{ $c['whatsapp_leads'] }}"
            data-wa-intro="Halo Coral Homes, saya ingin booking viewing properti."
            data-success="WhatsApp dibuka dengan data booking Anda. Tekan tombol kirim di WhatsApp untuk menyelesaikan.">
        @csrf
        <div class="field field--stack" data-field>
          <span class="field__icon"><svg class="icon" aria-hidden="true"><use href="#i-user"/></svg></span>
          <label for="bk-name">Nama Lengkap</label>
          <input id="bk-name" name="name" data-wa-label="Nama" type="text" required minlength="3" autocomplete="name" placeholder="Nama lengkap Anda">
          <small class="field__error" role="alert"></small>
        </div>
        <div class="field field--stack" data-field>
          <span class="field__icon"><svg class="icon" aria-hidden="true"><use href="#i-phone"/></svg></span>
          <label for="bk-phone">No. Telepon / WhatsApp</label>
          <input id="bk-phone" name="phone" data-wa-label="No. Telepon / WhatsApp" type="tel" required data-type="phone" autocomplete="tel" inputmode="tel" placeholder="08xx xxxx xxxx">
          <small class="field__error" role="alert"></small>
        </div>
        <div class="field field--stack field--full" data-field>
          <span class="field__icon"><svg class="icon" aria-hidden="true"><use href="#i-mail"/></svg></span>
          <label for="bk-email">Email</label>
          <input id="bk-email" name="email" type="email" required autocomplete="email" inputmode="email" placeholder="nama@email.com">
          <small class="field__error" role="alert"></small>
        </div>
        <div class="field field--stack field--full" data-field>
          <span class="field__icon"><svg class="icon" aria-hidden="true"><use href="#i-home"/></svg></span>
          <label for="bk-unit">Properti yang Ingin Dikunjungi</label>
          <div class="select select--plain"><select id="bk-unit" name="property" required data-wa-label="Properti"><option value="">Pilih properti</option>@foreach ($site['properties'] as $p)<option value="{{ $p['slug'] }}">{{ $p['name'] }} — {{ $p['location'] }}</option>@endforeach</select><svg class="icon" aria-hidden="true"><use href="#i-chevron-down"/></svg></div>
          <small class="field__error" role="alert"></small>
        </div>
        <div class="field field--stack" data-field>
          <span class="field__icon"><svg class="icon" aria-hidden="true"><use href="#i-calendar"/></svg></span>
          <label for="bk-date">Pilih Tanggal</label>
          <input id="bk-date" name="date" type="date" required data-date data-wa-label="Tanggal">
          <small class="field__error" role="alert"></small>
        </div>
        <div class="field field--stack" data-field>
          <span class="field__icon"><svg class="icon" aria-hidden="true"><use href="#i-clock"/></svg></span>
          <label for="bk-time">Pilih Waktu</label>
          <div class="select select--plain"><select id="bk-time" name="time" required data-wa-label="Waktu"><option value="">----</option>@foreach ($bk['slots'] as $t)<option value="{{ $t }}">{{ $t }} WIB</option>@endforeach</select><svg class="icon" aria-hidden="true"><use href="#i-chevron-down"/></svg></div>
          <small class="field__error" role="alert"></small>
        </div>
        <div class="field field--stack field--full field--area" data-field>
          <span class="field__icon"><svg class="icon" aria-hidden="true"><use href="#i-pencil"/></svg></span>
          <label for="bk-note">Catatan (opsional)</label>
          <textarea id="bk-note" name="note" rows="3" data-wa-label="Catatan" placeholder="Jumlah peserta, kebutuhan khusus, dll."></textarea>
        </div>
        <div class="field--full">
          <button class="btn btn--primary btn--block" type="submit"><span>Booking Sekarang</span> <svg class="icon" aria-hidden="true"><use href="#i-arrow-right"/></svg></button>
          <p class="form__note"><svg class="icon" aria-hidden="true"><use href="#i-whatsapp"/></svg>Data booking Anda akan dikirim melalui WhatsApp</p>
          <p class="form__status" role="status" aria-live="polite" hidden></p>
        </div>
      </form>
    </section>

    <aside class="booking-side">
      <section class="panel">
        <h2 class="panel__title">Alur Viewing</h2>
        <ol class="steps">
          @foreach ($bk['steps'] as $st)
            <li><span class="steps__num">{{ $loop->iteration }}</span><div><strong>{{ $st['title'] }}</strong><p>{{ $st['text'] }}</p></div></li>
          @endforeach
        </ol>
      </section>
      <section class="panel">
        <h2 class="panel__title">Jam Operasional</h2>
        <ul class="footer-like">
          <li><svg class="icon" aria-hidden="true"><use href="#i-clock"/></svg>{{ $c['hours'] }}</li>
          <li><svg class="icon" aria-hidden="true"><use href="#i-pin"/></svg>{{ $c['address'] }}</li>
          <li><svg class="icon" aria-hidden="true"><use href="#i-phone"/></svg><a href="tel:{{ $c['phone_link'] }}">{{ $c['phone'] }}</a></li>
        </ul>
      </section>
    </aside>
  </div>
@endsection
