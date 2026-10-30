<section class="sec">
    <div class="lw-wrap">
        <div class="card card--pad" data-tabs>
            <div class="toolbar">
                <div class="seg" role="tablist" aria-label="Jenis harga">
                    <button type="button" role="tab" class="is-on" aria-selected="true" data-tab="item">Harga Per Item</button>
                    <button type="button" role="tab" aria-selected="false" data-tab="kg">Harga Per Kg</button>
                </div>
                <label class="field field--search"><svg class="ic"><use href="#i-search"/></svg>
                    <input type="search" data-price-filter placeholder="Cari layanan atau item..." aria-label="Cari harga"></label>
            </div>

            @foreach (['item' => 'Satuan', 'kg' => 'Kiloan'] as $mode => $unit)
                <div role="tabpanel" data-panel="{{ $mode }}" @if ($mode === 'kg') hidden @endif>
                    <table class="ptable">
                        <thead><tr><th scope="col">{{ $mode === 'item' ? 'Item' : 'Layanan' }}</th><th scope="col" class="r">{{ $mode === 'item' ? 'Harga / item' : 'Harga / kg' }}</th></tr></thead>
                        <tbody>
                            @foreach ($c['prices'][$mode] as $p)
                                <tr data-name="{{ strtolower($p['name']) }}">
                                    <td><svg class="ic"><use href="#i-{{ $p['icon'] }}"/></svg>{{ $p['name'] }}</td>
                                    <td class="r"><b>{{ $rp($p['price']) }}</b></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p class="empty" data-empty hidden>Tidak ada hasil. Coba kata kunci lain atau <a href="{{ $wa('Halo FreshWash, saya ingin menanyakan harga laundry.') }}" target="_blank" rel="noopener">tanya via WhatsApp</a>.</p>
                </div>
            @endforeach

            <p class="note"><svg class="ic"><use href="#i-shield"/></svg>{{ $c['prices']['note'] }}</p>
            <div class="svc__act"><a class="btn btn--navy" href="{{ $url('contact') }}">Pesan Sekarang <svg class="ic"><use href="#i-arrow"/></svg></a><a class="link" href="{{ $url('options') }}">Lihat service options</a></div>
        </div>
    </div>
</section>
