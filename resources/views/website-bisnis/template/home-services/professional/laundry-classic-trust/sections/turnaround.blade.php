<section class="sec">
    <div class="lw-wrap">
        <div class="grid grid--4">
            @foreach ($c['turnaround'] as $t)
                <article class="card card--pad tat">
                    <span class="tile__ic tile__ic--lg"><svg class="ic"><use href="#i-{{ $t['icon'] }}"/></svg></span>
                    <h2>{{ $t['name'] }}</h2>
                    <b class="tat__time">{{ $t['time'] }}</b>
                    <p>{{ $t['desc'] }}</p>
                </article>
            @endforeach
        </div>
        <div class="card card--pad infobox">
            <h2>Perlu diketahui</h2>
            <ul class="checks">
                <li><svg class="ic"><use href="#i-check"/></svg>Waktu dihitung sejak pakaian kami terima dan konfirmasi selesai.</li>
                <li><svg class="ic"><use href="#i-check"/></svg>Layanan Express hanya untuk pesanan masuk sebelum pukul 14.00.</li>
                <li><svg class="ic"><use href="#i-check"/></svg>Bahan khusus atau noda berat dapat membutuhkan waktu tambahan; kami akan memberi kabar.</li>
            </ul>
            <div class="svc__act"><a class="btn btn--navy" href="{{ $url('contact') }}">Pesan Sekarang <svg class="ic"><use href="#i-arrow"/></svg></a><a class="link" href="{{ $url('services') }}">Lihat layanan</a></div>
        </div>
    </div>
</section>
