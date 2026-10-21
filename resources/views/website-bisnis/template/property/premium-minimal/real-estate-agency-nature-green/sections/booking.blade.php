@php $isPreview = !empty($preview); @endphp

@if ($isPreview)
    {{-- Preview beranda: pilih tanggal & waktu, lanjut ke halaman Booking / Viewing --}}
    <section class="panel side-card" id="booking" aria-labelledby="h-booking">
        <header class="side-card__head">
            <span class="side-card__ico"><svg class="i" aria-hidden="true"><use href="#i-calendar"/></svg></span>
            <div><h2 id="h-booking" class="side-card__title">Booking / Viewing</h2><p class="panel__sub">Jadwalkan kunjungan properti Anda</p></div>
        </header>
        <form action="{{ $r('booking') }}" method="get">
            <label class="field"><span class="sr-only">Tanggal</span><svg class="i" aria-hidden="true"><use href="#i-calendar"/></svg><input name="tanggal" data-picker="date" placeholder="Pilih Tanggal" value="{{ request('tanggal') }}"></label>
            <label class="field"><span class="sr-only">Waktu</span><svg class="i" aria-hidden="true"><use href="#i-clock"/></svg><input name="waktu" data-picker="time" placeholder="Pilih Waktu" value="{{ request('waktu') }}"></label>
            <button class="btn btn--primary btn--block" type="submit">Booking Sekarang <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></button>
        </form>
    </section>
@else
    <section class="panel" id="booking" aria-labelledby="h-booking">
        <h2 id="h-booking" class="sr-only">Formulir booking / viewing</h2>
        <form class="form-grid" method="post" action="#" data-form data-success="Booking diterima! Tim kami akan mengonfirmasi jadwal viewing Anda.">
            @csrf
            <label class="field"><span class="sr-only">Nama lengkap</span><svg class="i" aria-hidden="true"><use href="#i-user"/></svg><input name="nama" required autocomplete="name" placeholder="Nama Lengkap"></label>
            <label class="field"><span class="sr-only">Nomor WhatsApp</span><svg class="i" aria-hidden="true"><use href="#i-phone"/></svg><input name="telepon" type="tel" required autocomplete="tel" pattern="[0-9+\s\-]{8,16}" title="Gunakan 8–16 digit angka" placeholder="Nomor WhatsApp"></label>
            <label class="field"><span class="sr-only">Email</span><svg class="i" aria-hidden="true"><use href="#i-mail"/></svg><input name="email" type="email" autocomplete="email" placeholder="Email (opsional)"></label>
            <label class="field"><span class="sr-only">Properti</span><svg class="i" aria-hidden="true"><use href="#i-home"/></svg>
                <select name="properti" required>
                    <option value="" disabled selected>Pilih Properti</option>
                    @foreach ($t['properties'] as $p)<option value="{{ $p['slug'] }}">{{ $p['name'] }}</option>@endforeach
                </select>
            </label>
            <label class="field"><span class="sr-only">Tanggal</span><svg class="i" aria-hidden="true"><use href="#i-calendar"/></svg><input name="tanggal" required data-picker="date" placeholder="Pilih Tanggal" value="{{ request('tanggal') }}"></label>
            <label class="field"><span class="sr-only">Waktu</span><svg class="i" aria-hidden="true"><use href="#i-clock"/></svg><input name="waktu" required data-picker="time" placeholder="Pilih Waktu" value="{{ request('waktu') }}"></label>
            <label class="field field--ta field--full"><span class="sr-only">Catatan</span><svg class="i" aria-hidden="true"><use href="#i-edit"/></svg><textarea name="catatan" rows="3" placeholder="Catatan (opsional)"></textarea></label>
            <div class="field--full">
                <button class="btn btn--primary" type="submit">Booking Sekarang <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></button>
                <p class="form-status" role="status" data-form-status></p>
            </div>
        </form>
    </section>
@endif
