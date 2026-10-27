<section class="section" id="inquiry-preview">
    <div class="container">
        <div class="iq-band" data-reveal>
            <div class="iq-band__info">
                <img class="iq-band__model" src="{{ asset($skin['img'] . '/promo-model.jpg') }}" alt="" aria-hidden="true" loading="lazy" width="170" height="268">
                <p class="kicker"><span></span>INQUIRY &amp; KONSULTASI</p>
                <h2 class="sec-title">{{ $skin['inquiry']['title'] }}</h2>
                <p class="sec-sub">{{ $skin['inquiry']['text'] }}</p>

                <ul class="iq-perks">
                    @foreach ($skin['inquiry']['perks'] as $perk)
                        <li>
                            <span class="iq-perks__ic"><i class="bi {{ $perk['icon'] }}"></i></span>
                            <span><b>{{ $perk['title'] }}</b><small>{{ $perk['text'] }}</small></span>
                        </li>
                    @endforeach
                </ul>

                <p class="iq-band__hours"><i class="bi bi-clock-fill"></i> Layanan {{ $skin['contact']['hours'] }} · {{ $skin['contact']['phone'] }}</p>
            </div>

            {{-- Form pratinjau: TIDAK dikirim ke WhatsApp. Submit hanya membuka halaman Inquiry & Konsultasi (data ikut terisi). --}}
            <form class="iq-band__card" action="{{ route('skincare-warm-neutral.inquiry') }}" method="get">
                <span class="iq-band__badge"><i class="bi bi-chat-heart"></i></span>
                <h3>Mulai Konsultasi</h3>
                <p class="muted small">Isi singkat di bawah, lalu lengkapi dan kirim di halaman Inquiry &amp; Konsultasi.</p>

                <div class="field">
                    <label for="pv-nama">Nama</label>
                    <input id="pv-nama" name="nama" type="text" autocomplete="name" placeholder="Nama kamu">
                </div>
                <div class="field">
                    <label for="pv-produk">Produk yang diminati</label>
                    <select id="pv-produk" name="produk">
                        @foreach ($skin['products'] as $pr)<option>{{ $pr['name'] }}</option>@endforeach
                        <option>Produk lain / konsultasi</option>
                    </select>
                </div>
                <div class="field">
                    <label for="pv-pesan">Pertanyaan singkat</label>
                    <textarea id="pv-pesan" name="pesan" rows="3" placeholder="Contoh: kulitku berminyak, produk apa yang cocok?"></textarea>
                </div>
                <button type="submit" class="btn btn--block btn--lg">Lanjut ke Inquiry &amp; Konsultasi <i class="bi bi-arrow-right"></i></button>
            </form>
        </div>
    </div>
</section>
