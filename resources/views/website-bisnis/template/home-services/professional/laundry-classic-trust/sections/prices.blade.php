<section class="sec">
    <div class="lw-wrap pgrid">
        <div class="card card--pad" data-tabs>
            <div class="toolbar">
                <div class="seg" role="tablist" aria-label="Jenis harga">
                    <button type="button" role="tab" class="is-on" aria-selected="true" data-tab="item">Harga Per Item</button>
                    <button type="button" role="tab" aria-selected="false" data-tab="kg">Harga Per Kg</button>
                </div>
                <label class="field field--search"><svg class="ic"><use href="#i-search"/></svg>
                    <input type="search" data-price-filter placeholder="Cari layanan atau item..." aria-label="Cari harga"></label>
            </div>

            @foreach (['item', 'kg'] as $mode)
                <div role="tabpanel" data-panel="{{ $mode }}" @if ($mode === 'kg') hidden @endif>
                    <table class="ptable">
                        <thead><tr><th scope="col">{{ $mode === 'item' ? 'Item' : 'Layanan' }}</th><th scope="col" class="r">{{ $mode === 'item' ? 'Harga / item' : 'Harga / kg' }}</th></tr></thead>
                        <tbody>
                            @foreach ($c['prices'][$mode] as $p)
                                <tr data-name="{{ strtolower($p['name']) }}">
                                    <td><div class="prow"><span class="bub bub--sm"><svg class="ic"><use href="#i-{{ $p['icon'] }}"/></svg></span>{{ $p['name'] }}</div></td>
                                    <td class="r"><b>{{ $rp($p['price']) }}</b></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p class="empty" data-empty hidden>Tidak ada hasil. Coba kata kunci lain atau <a href="{{ $wa('Halo FreshWash, saya ingin menanyakan harga laundry.') }}" target="_blank" rel="noopener">tanya via WhatsApp</a>.</p>
                </div>
            @endforeach
        </div>

        <aside class="pside" aria-label="Informasi harga">
            <div class="card"><h2>Catatan harga</h2><p>{{ $c['prices']['note'] }}</p><a class="btn btn--navy btn--block" href="{{ $url('contact') }}">Pesan Sekarang <svg class="ic"><use href="#i-arrow"/></svg></a></div>
            <div class="card"><h2>Bingung memilih layanan?</h2><p>Tanyakan ke FreshBot atau langsung ke tim kami lewat WhatsApp.</p>
                <button type="button" class="btn btn--ghost btn--block" data-bot-open><svg class="ic"><use href="#i-chat"/></svg>Tanya FreshBot</button>
                <a class="btn btn--wa btn--block" href="{{ $wa('Halo FreshWash, saya ingin menanyakan harga laundry.') }}" target="_blank" rel="noopener"><svg class="ic"><use href="#i-whatsapp"/></svg>Chat WhatsApp</a></div>
            <div class="card"><h2>Ingin hasil lebih maksimal?</h2><p>Tambahkan pengharum, packing vakum, atau perawatan khusus.</p><a class="btn btn--ghost btn--block" href="{{ $url('options') }}">Lihat Service Options</a></div>
        </aside>
    </div>
</section>
