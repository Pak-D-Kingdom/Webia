@php $isPreview = !empty($preview); @endphp

@if ($isPreview)
    {{-- Preview beranda: tanpa pilih tanggal/waktu, langsung ke halaman Booking / Viewing --}}
    <section class="panel side-card booking-card" id="booking" aria-labelledby="h-booking">
        <header class="side-card__head">
            <span class="side-card__ico"><svg class="i" aria-hidden="true"><use href="#i-calendar"/></svg></span>
            <div><h2 id="h-booking" class="side-card__title">Booking / Viewing</h2><p class="panel__sub">Jadwalkan kunjungan properti Anda</p></div>
        </header>
        <div class="booking-card__media media"><img src="{{ $img($t['booking_image']) }}" alt="Ruang keluarga yang bisa Anda kunjungi" loading="lazy" data-fallback></div>
        <a class="btn btn--primary btn--block" href="{{ $r('booking') }}">Booking Sekarang <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></a>
    </section>
@else
    @php $prop = $property ?? null; @endphp
    <section class="panel {{ $prop ? 'side-card' : '' }}" id="booking" aria-labelledby="h-booking">
        @if ($prop)
            <header class="side-card__head">
                <span class="side-card__ico"><svg class="i" aria-hidden="true"><use href="#i-calendar"/></svg></span>
                <div><h2 id="h-booking" class="side-card__title">Booking / Viewing</h2><p class="panel__sub">Jadwalkan kunjungan properti Anda</p></div>
            </header>
        @else
            <h2 id="h-booking" class="sr-only">Formulir booking / viewing</h2>
        @endif
        <form class="form-grid {{ !empty($stack) ? 'form-grid--stack' : '' }}" method="post" action="#" data-form data-success="Booking diterima! Tim kami akan mengonfirmasi jadwal viewing Anda.">
            @csrf
            <label class="field"><span class="sr-only">Nama lengkap</span><svg class="i" aria-hidden="true"><use href="#i-user"/></svg><input name="nama" required autocomplete="name" placeholder="Nama Lengkap"></label>
            <label class="field"><span class="sr-only">Nomor WhatsApp</span><svg class="i" aria-hidden="true"><use href="#i-phone"/></svg><input name="telepon" type="tel" required autocomplete="tel" pattern="[0-9+\s\-]{8,16}" title="Gunakan 8–16 digit angka" placeholder="Nomor WhatsApp"></label>
            <label class="field"><span class="sr-only">Email</span><svg class="i" aria-hidden="true"><use href="#i-mail"/></svg><input name="email" type="email" autocomplete="email" placeholder="Email (opsional)"></label>
            @if ($prop)
                <input type="hidden" name="properti" value="{{ $prop['slug'] }}">
            @else
                <label class="field"><span class="sr-only">Properti</span><svg class="i" aria-hidden="true"><use href="#i-home"/></svg>
                    <select name="properti" required>
                        <option value="" disabled @selected(!request('properti'))>Pilih Properti</option>
                        @foreach ($t['properties'] as $p)<option value="{{ $p['slug'] }}" @selected(request('properti') === $p['slug'])>{{ $p['name'] }}</option>@endforeach
                    </select>
                </label>
            @endif
            <label class="field"><span class="sr-only">Tanggal</span><svg class="i" aria-hidden="true"><use href="#i-calendar"/></svg><input name="tanggal" required data-picker="date" placeholder="Pilih Tanggal"></label>
            <label class="field"><span class="sr-only">Waktu</span><svg class="i" aria-hidden="true"><use href="#i-clock"/></svg><input name="waktu" required data-picker="time" placeholder="Pilih Waktu"></label>
            <label class="field field--ta field--full"><span class="sr-only">Catatan</span><svg class="i" aria-hidden="true"><use href="#i-edit"/></svg><textarea name="catatan" rows="3" placeholder="Catatan (opsional)"></textarea></label>
            <div class="field--full">
                <button class="btn btn--primary {{ $prop ? 'btn--block' : '' }}" type="submit">Booking Sekarang <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></button>
                <p class="form-status" role="status" data-form-status></p>
            </div>
        </form>
    </section>
@endif
