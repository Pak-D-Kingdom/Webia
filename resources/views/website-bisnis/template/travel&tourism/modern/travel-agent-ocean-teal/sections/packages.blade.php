{{-- Tour packages. $mode: preview | page --}}
@php $full = ($mode ?? 'preview') === 'page'; @endphp

@if (! $full)
    <article class="ta-panel ta-panel--packages" aria-labelledby="ta-pkg-title">
        @include($ns . '.partials.section-head', [
            'ico' => 'suitcase', 'id' => 'ta-pkg-title', 'title' => 'Paket Tour Unggulan',
            'sub' => 'Pilihan paket tour terbaik dengan harga bersaing dan fasilitas lengkap.',
            'href' => $routes['paket-tour'], 'label' => 'Lihat Semua Paket',
        ])
        <div class="ta-pkg-grid">
            @foreach (array_slice($ta['packages'], 0, 4) as $p)
                @include($ns . '.partials.package-card', ['p' => $p, 'full' => false])
            @endforeach
        </div>
    </article>
@else
    <section class="ta-section" aria-label="Daftar paket tour">
        <div class="ta-container">
            <div class="ta-toolbar" data-ta-filter data-param="dest">
                <div class="ta-toolbar__row">
                    <div class="ta-chips" role="group" aria-label="Filter destinasi">
                        <button type="button" class="ta-chip is-active" data-filter="*" aria-pressed="true">Semua</button>
                        @foreach ($ta['destinations'] as $d)
                            <button type="button" class="ta-chip" data-filter="{{ $d['slug'] }}" aria-pressed="false">{{ $d['name'] }}</button>
                        @endforeach
                    </div>
                    <label class="ta-searchbox" id="cari">
                        {{ $icon('search') }}
                        <span class="ta-sr">Cari paket</span>
                        <input type="search" placeholder="Cari paket atau lokasi..." data-ta-search>
                    </label>
                </div>
                <p class="ta-count" data-ta-count aria-live="polite"></p>

                <div class="ta-grid ta-grid--pkg" data-ta-items>
                    @foreach ($ta['packages'] as $p)
                        @include($ns . '.partials.package-card', ['p' => $p, 'full' => true])
                    @endforeach
                </div>
                <div class="ta-empty" data-ta-empty hidden>
                    <p>Paket tidak ditemukan. Coba pilih destinasi lain atau ubah kata kunci.</p>
                    <a class="ta-btn ta-btn--primary ta-btn--sm" href="{{ $routes['inquiry'] }}">Tanya tim kami</a>
                </div>
            </div>
        </div>
    </section>
@endif
