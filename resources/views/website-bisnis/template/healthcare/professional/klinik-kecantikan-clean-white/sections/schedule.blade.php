{{--
    Jadwal Praktik
    $full = false → panel preview di beranda (3 slot + tombol ubah tanggal)
    $full = true  → halaman Jadwal (chip 7 hari + seluruh slot + tombol booking)
    Root berupa <div>; pembungkus <section>/grid disediakan halaman pemanggil.
    JS (data-gl-schedule) mengganti isi slot saat tanggal diubah; markup awal dirender server (tanpa JS tetap tampil).
--}}
@php
    $full  = $full ?? false;
    $now   = \Carbon\Carbon::now('Asia/Jakarta')->startOfDay();
    $docs  = collect($clinic['doctors'])->keyBy('id');
    $label = fn ($d) => $clinic['weekdays'][$d->dayOfWeek] . ', ' . $d->day . ' ' . $clinic['months'][$d->month - 1] . ' ' . $d->year;
    $slots = $clinic['schedule'][$now->dayOfWeek] ?? [];
    if (! $full) { $slots = array_slice($slots, 0, 3); }
@endphp

@if (! $full)
    <div class="gl-panel gl-schedule" id="jadwal" data-gl-schedule data-mode="preview">
        <div class="gl-panel__intro">
            <span class="gl-panel__icon"><svg class="gl-ic" aria-hidden="true"><use href="#gl-i-calendar"/></svg></span>
            <h2 class="gl-panel__title">Jadwal Praktik</h2>
            <p class="gl-panel__text">Lihat jadwal dokter dan pilih waktu yang sesuai dengan Anda.</p>
            <a class="gl-btn gl-btn--outline gl-btn--sm" href="{{ route('klinik-kecantikan.schedule') }}">
                Lihat Semua Jadwal
                <svg class="gl-ic gl-ic--sm" aria-hidden="true"><use href="#gl-i-arrow-right"/></svg>
            </a>
        </div>

        <div class="gl-schedule__card">
            <div class="gl-schedule__top">
                <p class="gl-schedule__date" data-gl-date-label>{{ $label($now) }}</p>
                <label class="gl-btn gl-btn--outline gl-btn--xs gl-datebtn">
                    <svg class="gl-ic gl-ic--sm" aria-hidden="true"><use href="#gl-i-calendar"/></svg>
                    Ubah Tanggal
                    <input type="date" value="{{ $now->format('Y-m-d') }}" min="{{ $now->format('Y-m-d') }}" data-gl-date-input aria-label="Pilih tanggal jadwal">
                </label>
            </div>

            <ul class="gl-slots" data-gl-slots>
                @foreach ($slots as $slot)
                    @php $doc = $docs[$slot['doctor']]; @endphp
                    <li class="gl-slot {{ $slot['status'] === 'full' ? 'is-full' : '' }}">
                        <p class="gl-slot__time">{{ $slot['time'] }}</p>
                        <p class="gl-slot__doctor">{{ $doc['name'] }}</p>
                        <p class="gl-slot__role">{{ $doc['role'] }}</p>
                        <span class="gl-status {{ $slot['status'] === 'full' ? 'gl-status--full' : '' }}">{{ $slot['status'] === 'full' ? 'Penuh' : 'Tersedia' }}</span>
                    </li>
                @endforeach
            </ul>

            <a class="gl-link gl-schedule__more" href="{{ route('klinik-kecantikan.schedule') }}">
                Lihat Jadwal Lengkap
                <svg class="gl-ic gl-ic--sm" aria-hidden="true"><use href="#gl-i-arrow-right"/></svg>
            </a>
        </div>
    </div>
@else
    <div class="gl-schedule gl-schedule--full" data-gl-schedule data-mode="full">
        <div class="gl-card gl-schedule__card gl-schedule__card--full">
            <div class="gl-schedule__top">
                <div>
                    <p class="gl-schedule__kicker">Jadwal praktik untuk</p>
                    <h2 class="gl-schedule__date" data-gl-date-label>{{ $label($now) }}</h2>
                </div>
                <label class="gl-btn gl-btn--outline gl-btn--sm gl-datebtn">
                    <svg class="gl-ic gl-ic--sm" aria-hidden="true"><use href="#gl-i-calendar"/></svg>
                    Ubah Tanggal
                    <input type="date" value="{{ $now->format('Y-m-d') }}" min="{{ $now->format('Y-m-d') }}" data-gl-date-input aria-label="Pilih tanggal jadwal">
                </label>
            </div>

            <div class="gl-days" role="group" aria-label="Pilih hari">
                @for ($i = 0; $i < 7; $i++)
                    @php $d = $now->copy()->addDays($i); @endphp
                    <button type="button" class="gl-day {{ $i === 0 ? 'is-active' : '' }}" data-gl-day="{{ $d->format('Y-m-d') }}" aria-pressed="{{ $i === 0 ? 'true' : 'false' }}">
                        <span>{{ mb_substr($clinic['weekdays'][$d->dayOfWeek], 0, 3) }}</span>
                        <strong>{{ $d->day }}</strong>
                    </button>
                @endfor
            </div>

            <ul class="gl-slots gl-slots--full" data-gl-slots>
                @foreach ($slots as $slot)
                    @php $doc = $docs[$slot['doctor']]; $isFull = $slot['status'] === 'full'; @endphp
                    <li class="gl-slot {{ $isFull ? 'is-full' : '' }}">
                        <p class="gl-slot__time">{{ $slot['time'] }}</p>
                        <p class="gl-slot__doctor">{{ $doc['name'] }}</p>
                        <p class="gl-slot__role">{{ $doc['role'] }}</p>
                        <span class="gl-status {{ $isFull ? 'gl-status--full' : '' }}">{{ $isFull ? 'Penuh' : 'Tersedia' }}</span>
                        @unless ($isFull)
                            <a class="gl-btn gl-btn--primary gl-btn--xs" href="{{ route('klinik-kecantikan.appointment', ['dokter' => $doc['id'], 'tanggal' => $now->format('Y-m-d'), 'jam' => substr($slot['time'], 0, 5)]) }}">Booking</a>
                        @endunless
                    </li>
                @endforeach
            </ul>

            <p class="gl-note">Jadwal dapat berubah sewaktu-waktu. Konfirmasi akhir diberikan admin melalui WhatsApp.</p>
        </div>
    </div>
@endif
