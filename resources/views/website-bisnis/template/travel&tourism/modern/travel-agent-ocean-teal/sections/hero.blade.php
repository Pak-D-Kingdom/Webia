{{-- Hero banner (beranda) + form pencarian --}}
<section class="ta-hero" aria-labelledby="ta-hero-title">
    <div class="ta-hero__media">
        <img src="{{ $img('hero.jpg') }}" alt="Wisatawan menikmati pemandangan pulau tropis dan laut toska" fetchpriority="high">
    </div>

    <div class="ta-container ta-hero__in">
        <div class="ta-hero__copy">
            <p class="ta-eyebrow">Jelajahi dunia, raih cerita terbaik</p>
            <h1 class="ta-hero__title" id="ta-hero-title">Liburan Impian Anda Dimulai <span class="ta-script">di Sini</span></h1>
            <p class="ta-hero__lead">Temukan destinasi terbaik, paket tour menarik, dan pengalaman tak terlupakan bersama {{ $ta['brand']['name'] }}.</p>
        </div>

        <form class="ta-search" id="cari" action="{{ $routes['paket-tour'] }}" method="get" role="search" aria-label="Cari paket tour">
            <div class="ta-search__field">
                <span class="ta-search__ico" aria-hidden="true">{{ $icon('pin') }}</span>
                <div class="ta-search__body">
                    <label for="ta-s-dest">Destinasi</label>
                    <select id="ta-s-dest" name="dest" data-ta-select>
                        <option value="">Pilih destinasi</option>
                        @foreach ($ta['destinations'] as $d)
                            <option value="{{ $d['slug'] }}">{{ $d['name'] }}, {{ $d['country'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="ta-search__field">
                <span class="ta-search__ico" aria-hidden="true">{{ $icon('calendar') }}</span>
                <div class="ta-search__body">
                    <label for="ta-s-tgl">Tanggal Keberangkatan</label>
                    <input id="ta-s-tgl" type="date" name="tgl" data-ta-min-today>
                </div>
            </div>
            <div class="ta-search__field">
                <span class="ta-search__ico" aria-hidden="true">{{ $icon('users') }}</span>
                <div class="ta-search__body">
                    <label for="ta-s-pax">Jumlah Peserta</label>
                    <select id="ta-s-pax" name="peserta" data-ta-select>
                        @foreach ([1, 2, 3, 4, 5, 6, 8, 10] as $n)
                            <option value="{{ $n }}" @selected($n === 2)>{{ $n }} Orang</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button class="ta-btn ta-btn--dark ta-search__btn" type="submit">
                {{ $icon('search') }} Cari Paket <span class="ta-btn__dot">{{ $icon('arrow') }}</span>
            </button>
        </form>
    </div>

    <svg class="ta-wave" viewBox="0 0 1440 90" preserveAspectRatio="none" aria-hidden="true">
        <path d="M0 52c120 30 240 36 380 14S650 6 820 16s330 50 620 8V90H0Z" fill="currentColor"/>
    </svg>
    <svg class="ta-hero__swash" viewBox="0 0 320 90" aria-hidden="true">
        <path d="M0 60c40-30 90-40 140-22s110 26 180-8V90H0Z" fill="#7fd3d6" opacity=".55"/>
        <path d="M0 74c50-22 100-26 150-10s100 20 170-4V90H0Z" fill="#26b5bd" opacity=".6"/>
    </svg>
</section>
