<section class="sec">
    <div class="lw-wrap">
        <div class="grid grid--4">
            @foreach ($c['options'] as $o)
                <article class="card card--pad opt">
                    <span class="tile__ic tile__ic--lg"><svg class="ic"><use href="#i-{{ $o['icon'] }}"/></svg></span>
                    <h2>{{ $o['name'] }}</h2>
                    <p>{{ $o['desc'] }}</p>
                    <b class="opt__price">+{{ $rp($o['price']) }}</b>
                    <a class="link" href="{{ $wa('Halo FreshWash, saya ingin menambahkan ' . $o['name'] . ' pada pesanan laundry saya.') }}" target="_blank" rel="noopener">Tambahkan via WhatsApp <svg class="ic"><use href="#i-arrow"/></svg></a>
                </article>
            @endforeach
        </div>
        <p class="note note--wide"><svg class="ic"><use href="#i-spark"/></svg>Service option dapat ditambahkan pada semua layanan dan dihitung per pesanan. Sebutkan pilihan Anda saat mengisi form atau mengonfirmasi dengan tim kami.</p>
        <div class="svc__act"><a class="btn btn--navy" href="{{ $url('contact') }}">Pesan Sekarang <svg class="ic"><use href="#i-arrow"/></svg></a><a class="link" href="{{ $url('turnaround') }}">Lihat estimasi waktu</a></div>
    </div>
</section>
