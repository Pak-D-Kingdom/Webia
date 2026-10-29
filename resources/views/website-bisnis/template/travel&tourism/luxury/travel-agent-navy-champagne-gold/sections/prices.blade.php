{{-- Prices: hanya halaman Harga (tidak ada preview di beranda) --}}

    <section class="ga-block" aria-label="Daftar harga">
        <div class="ga-container">
            <ul class="ga-plans">
                @foreach ($t['price_plans'] as $pl)
                    <li class="ga-plan {{ $pl['popular'] ? 'is-popular' : '' }}">
                        @if ($pl['popular'])<span class="ga-plan__badge">Paling diminati</span>@endif
                        <h2>{{ $pl['label'] }}</h2>
                        <p class="ga-plan__price">{{ $idr($pl['price']) }}</p>
                        <p class="ga-muted">mulai dari / orang</p>
                        <p>{{ $pl['desc'] }}</p>
                        <a class="ga-btn {{ $pl['popular'] ? 'ga-btn--gold' : 'ga-btn--outline' }} ga-btn--sm" href="{{ $url('inquiry') }}?paket={{ urlencode($pl['label']) }}">Pilih Paket</a>
                    </li>
                @endforeach
            </ul>

            <div class="ga-two">
                <section class="ga-card ga-listcard">
                    <h2>Sudah termasuk</h2>
                    <ul class="ga-checks">
                        @foreach ($t['price_includes'] as $x)<li>{!! $icon('check') !!}<span>{{ $x }}</span></li>@endforeach
                    </ul>
                </section>
                <section class="ga-card ga-listcard ga-listcard--no">
                    <h2>Belum termasuk</h2>
                    <ul class="ga-checks ga-checks--no">
                        @foreach ($t['price_excludes'] as $x)<li>{!! $icon('close') !!}<span>{{ $x }}</span></li>@endforeach
                    </ul>
                </section>
            </div>

            <section class="ga-card ga-tablecard" aria-labelledby="ga-tbl-title">
                <h2 id="ga-tbl-title">Harga per paket tour</h2>
                <div class="ga-tablewrap" tabindex="0">
                    <table class="ga-table">
                        <thead><tr><th scope="col">Paket</th><th scope="col">Destinasi</th><th scope="col">Durasi</th><th scope="col">Harga / orang</th><th scope="col"><span class="ga-sr">Aksi</span></th></tr></thead>
                        <tbody>
                            @foreach ($t['packages'] as $p)
                                <tr>
                                    <th scope="row">{{ $p['name'] }}</th>
                                    <td>{{ $p['destination'] }}</td>
                                    <td>{{ $p['duration'] }}</td>
                                    <td class="ga-gold-text">{{ $idr($p['price']) }}</td>
                                    <td><a class="ga-link" href="{{ $url('inquiry') }}?paket={{ urlencode($p['name']) }}">Inquiry</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>

            <ul class="ga-notes">
                @foreach ($t['price_notes'] as $n)<li>{{ $n }}</li>@endforeach
            </ul>
        </div>
    </section>

