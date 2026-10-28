<section id="reservasi-cepat" class="panel" aria-labelledby="t-book">
    <h2 id="t-book"><svg class="i" aria-hidden="true"><use href="#i-calendar"/></svg> Reservasi / Booking</h2>
    {{-- Form singkat: kirim pilihan ke halaman Reservasi (GET) --}}
    <form action="{{ $pageUrl('reservasi') }}" method="GET">
        <div class="field"><label class="sr" for="q-date">Pilih Tanggal</label>
            <div class="input"><svg class="i" aria-hidden="true"><use href="#i-calendar"/></svg><input id="q-date" name="date" type="date" required></div></div>
        <div class="field"><label class="sr" for="q-time">Pilih Waktu</label>
            <div class="input"><svg class="i" aria-hidden="true"><use href="#i-clock"/></svg>
                <select id="q-time" name="time" required><option value="">Pilih Waktu</option>@foreach (config('cafe.times') as $t)<option>{{ $t }}</option>@endforeach</select></div></div>
        <div class="field"><label class="sr" for="q-guests">Jumlah Orang</label>
            <div class="input"><svg class="i" aria-hidden="true"><use href="#i-user"/></svg>
                <select id="q-guests" name="guests" required><option value="">Jumlah Orang</option>@foreach (config('cafe.guests') as $g)<option>{{ $g }}</option>@endforeach</select></div></div>
        <button class="btn btn--block" type="submit"><svg class="i" aria-hidden="true"><use href="#i-calendar"/></svg> Reservasi Sekarang</button>
    </form>
</section>
