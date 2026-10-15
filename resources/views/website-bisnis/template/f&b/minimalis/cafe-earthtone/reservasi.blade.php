@extends("$v.layouts.app")
@section('title', 'Reservasi – ' . config('cafe.name'))

@section('content')
    <section class="page-hero"><div class="container">
        <p class="crumbs"><a href="{{ route('webia.fnb.minimalis.home') }}">Beranda</a> / Reservasi</p>
        <h1>Reservasi Meja</h1>
        <p>Isi data di bawah ini. Tim kami akan menghubungi Anda lewat WhatsApp untuk konfirmasi.</p>
    </div></section>

    <div class="container section res-grid">
        <section class="panel" aria-labelledby="t-res">
            <h2 id="t-res"><svg class="i" aria-hidden="true"><use href="#i-calendar"/></svg> Form Reservasi</h2>
            {{-- Backend: buat route POST /reservations. JS saat ini hanya validasi & console.log. --}}
            <form id="reservationForm" method="POST" action="{{ url('/reservations') }}" data-endpoint="{{ url('/reservations') }}" novalidate>
                @csrf
                <div class="field"><label for="name">Nama lengkap</label>
                    <div class="input"><svg class="i" aria-hidden="true"><use href="#i-user"/></svg><input id="name" name="name" type="text" autocomplete="name" placeholder="Nama Anda" data-req></div>
                    <small class="err" data-err="name"></small></div>
                <div class="field"><label for="phone">No. WhatsApp</label>
                    <div class="input"><svg class="i" aria-hidden="true"><use href="#i-phone"/></svg><input id="phone" name="phone" type="tel" autocomplete="tel" placeholder="0812xxxxxxx" data-req></div>
                    <small class="err" data-err="phone"></small></div>
                <div class="field-row">
                    <div class="field"><label for="date">Tanggal</label>
                        <div class="input"><svg class="i" aria-hidden="true"><use href="#i-calendar"/></svg><input id="date" name="date" type="date" data-req></div>
                        <small class="err" data-err="date"></small></div>
                    <div class="field"><label for="time">Waktu</label>
                        <div class="input"><svg class="i" aria-hidden="true"><use href="#i-clock"/></svg>
                            <select id="time" name="time" data-req><option value="">Pilih Waktu</option>@foreach (config('cafe.times') as $t)<option>{{ $t }}</option>@endforeach</select></div>
                        <small class="err" data-err="time"></small></div>
                </div>
                <div class="field"><label for="guests">Jumlah orang</label>
                    <div class="input"><svg class="i" aria-hidden="true"><use href="#i-user"/></svg>
                        <select id="guests" name="guests" data-req><option value="">Jumlah Orang</option>@foreach (config('cafe.guests') as $g)<option>{{ $g }}</option>@endforeach</select></div>
                    <small class="err" data-err="guests"></small></div>
                <div class="field"><label for="notes">Catatan (opsional)</label>
                    <textarea id="notes" name="notes" rows="3" placeholder="Contoh: ulang tahun, butuh kursi bayi, area non-smoking"></textarea></div>
                <button class="btn btn--block" type="submit"><svg class="i" aria-hidden="true"><use href="#i-calendar"/></svg> Reservasi Sekarang</button>
                <p id="formMsg" class="form-msg" role="status"></p>
            </form>
        </section>

        <div class="res-side">
            @include("$v.sections.location")
            <section class="panel note">
                <h2>Perlu bantuan?</h2>
                <p>Untuk acara besar atau private event, hubungi kami langsung.</p>
                <a class="btn btn--ghost" href="https://wa.me/{{ config('cafe.whatsapp') }}" target="_blank" rel="noopener"><svg class="i" aria-hidden="true"><use href="#i-chat"/></svg> Chat via WhatsApp</a>
            </section>
        </div>
    </div>
@endsection
