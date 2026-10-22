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
    {{-- Form Booking / Viewing (4 langkah). Dipakai di halaman Booking & detail properti ($property = properti terkunci). --}}
    @php
        $locked = $property ?? null;
        $choices = $locked ? [$locked] : $t['properties'];
        $waBase = 'https://wa.me/'.$t['contact']['whatsapp'];
    @endphp
    <section class="panel booking" id="booking" aria-labelledby="h-booking">
        <h2 id="h-booking" class="sr-only">Formulir booking / viewing</h2>
        <form method="post" action="#" data-form data-wa="{{ $waBase }}" data-wa-title="Booking / Viewing" data-success="WhatsApp terbuka dengan data booking Anda. Tekan kirim di WhatsApp untuk menyelesaikan.">
            @csrf
            <fieldset class="bk-step">
                <legend><span class="bk-step__no">1</span>Pilih Properti</legend>
                <div class="bk-props">
                    @foreach ($choices as $p)
                        <label class="bk-prop">
                            <input type="radio" name="properti" value="{{ $p['slug'] }}" required data-wa-value="{{ $p['name'] }}" @checked($locked || request('properti') === $p['slug'])>
                            <span class="bk-prop__box"><b>{{ $p['name'] }}</b><small>{{ $p['city'] }}</small><svg class="i" aria-hidden="true"><use href="#i-check"/></svg></span>
                        </label>
                    @endforeach
                </div>
            </fieldset>

            <fieldset class="bk-step">
                <legend><span class="bk-step__no">2</span>Jadwal Kunjungan</legend>
                <div class="bk-grid">
                    <label class="field"><span class="sr-only">Tanggal kunjungan</span><svg class="i" aria-hidden="true"><use href="#i-calendar"/></svg><input name="tanggal" required data-picker="date" placeholder="Pilih Tanggal"></label>
                    <label class="field"><span class="sr-only">Jumlah pengunjung</span><svg class="i" aria-hidden="true"><use href="#i-user"/></svg>
                        <select name="pengunjung">
                            @foreach ($t['booking']['visitors'] as $v)<option>{{ $v }}</option>@endforeach
                        </select>
                    </label>
                </div>
                <span class="bk-label" id="slot-label">Pilih Jam Kunjungan</span>
                <div class="slots" role="radiogroup" aria-labelledby="slot-label">
                    @foreach ($t['booking']['slots'] as $slot)
                        <label class="slot"><input type="radio" name="waktu" value="{{ $slot }}" required><span>{{ $slot }}</span></label>
                    @endforeach
                </div>
            </fieldset>

            <fieldset class="bk-step">
                <legend><span class="bk-step__no">3</span>Data Diri</legend>
                <div class="bk-grid">
                    <label class="field"><span class="sr-only">Nama lengkap</span><svg class="i" aria-hidden="true"><use href="#i-user"/></svg><input name="nama" required autocomplete="name" maxlength="80" placeholder="Nama Lengkap"></label>
                    <label class="field"><span class="sr-only">Nomor WhatsApp</span><svg class="i" aria-hidden="true"><use href="#i-phone"/></svg><input name="telepon" type="tel" required autocomplete="tel" pattern="[0-9+\s\-]{8,16}" title="Gunakan 8–16 digit angka" placeholder="No. WhatsApp"></label>
                    <label class="field bk-grid__full"><span class="sr-only">Email</span><svg class="i" aria-hidden="true"><use href="#i-mail"/></svg><input name="email" type="email" autocomplete="email" maxlength="120" placeholder="Email (opsional)"></label>
                </div>
            </fieldset>

            <fieldset class="bk-step">
                <legend><span class="bk-step__no">4</span>Catatan <small>(opsional)</small></legend>
                <label class="field field--ta"><span class="sr-only">Catatan</span><svg class="i" aria-hidden="true"><use href="#i-edit"/></svg><textarea name="catatan" rows="3" maxlength="400" placeholder="Misalnya: ingin melihat area taman, atau membawa anak kecil"></textarea></label>
            </fieldset>

            <div class="bk-submit">
                <button class="btn btn--primary" type="submit">Booking Sekarang <svg class="i" aria-hidden="true"><use href="#i-arrow"/></svg></button>
                <p class="form-note"><svg class="i" aria-hidden="true"><use href="#i-check"/></svg>Data booking Anda akan dikirim melalui WhatsApp.</p>
            </div>
            <p class="form-status" role="status" data-form-status></p>
        </form>
    </section>
@endif
