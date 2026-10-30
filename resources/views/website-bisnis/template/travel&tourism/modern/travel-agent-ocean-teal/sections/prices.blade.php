{{-- Prices: hanya halaman penuh. Tidak ada preview di beranda. --}}


    <section class="ta-section" aria-label="Daftar harga">
        <div class="ta-container">
            <div class="ta-price-grid">
                @foreach ($ta['prices'] as $pr)
                    <article @class(['ta-pricecard', 'is-popular' => $pr['popular']])>
                        @if ($pr['popular'])<span class="ta-badge ta-badge--float">{{ $icon('star', 'ta-ic--fill') }} Paling dipilih</span>@endif
                        <h2>{{ $pr['name'] }}</h2>
                        <p class="ta-pricecard__desc">{{ $pr['desc'] }}</p>
                        <p class="ta-pricecard__price"><small>Mulai dari</small><strong>{{ $rp($pr['price']) }}</strong><small>/orang</small></p>
                        <ul class="ta-checks">
                            @foreach ($pr['features'] as $f)<li>{{ $icon('check') }}{{ $f }}</li>@endforeach
                        </ul>
                        <a class="ta-btn {{ $pr['popular'] ? 'ta-btn--primary' : 'ta-btn--outline' }}" href="{{ $routes['inquiry'] }}?paket={{ $pr['code'] }}">Pilih {{ $pr['name'] }}</a>
                    </article>
                @endforeach
            </div>

            <div class="ta-inc">
                <div class="ta-panel">
                    <h2 class="ta-h3">Sudah termasuk</h2>
                    <ul class="ta-checks">@foreach ($ta['price_included'] as $x)<li>{{ $icon('check') }}{{ $x }}</li>@endforeach</ul>
                </div>
                <div class="ta-panel">
                    <h2 class="ta-h3">Belum termasuk</h2>
                    <ul class="ta-checks ta-checks--no">@foreach ($ta['price_excluded'] as $x)<li>{{ $icon('close') }}{{ $x }}</li>@endforeach</ul>
                </div>
            </div>

            <div class="ta-panel ta-table-wrap">
                <h2 class="ta-h3">Harga per destinasi</h2>
                <div class="ta-table-scroll">
                    <table class="ta-table">
                        <thead><tr><th scope="col">Paket</th><th scope="col">Durasi</th><th scope="col">Lokasi</th><th scope="col" class="ta-r">Harga / orang</th></tr></thead>
                        <tbody>
                            @foreach ($ta['packages'] as $p)
                                <tr>
                                    <th scope="row">{{ $p['title'] }}</th>
                                    <td>{{ $p['duration'] }}</td>
                                    <td>{{ $p['location'] }}</td>
                                    <td class="ta-r"><strong>{{ $rp($p['price']) }}</strong></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <p class="ta-note">{{ $ta['price_note'] }}</p>
            </div>
        </div>
    </section>

