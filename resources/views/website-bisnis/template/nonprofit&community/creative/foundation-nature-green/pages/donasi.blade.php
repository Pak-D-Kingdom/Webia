{{-- Halaman Opsi Donasi. Semua form dikirim ke WhatsApp lewat foundation.js ([data-fh-wa-form]). --}}
@include($v('partials.page-header'))

<section class="fh-sec">
    <div class="fh-wrap">
        <div class="fh-tabs" data-fh-tabs>
            <div class="fh-tabs__list" role="tablist" aria-label="Pilih cara berdonasi">
                @foreach ($cfg['donation']['options'] as $o)
                    <button type="button" role="tab" class="fh-tab" id="tab-{{ $o['key'] }}" data-fh-tab="{{ $o['key'] }}" aria-controls="{{ $o['key'] }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}" tabindex="{{ $loop->first ? '0' : '-1' }}">
                        <span class="fh-tab__ic"><img src="{{ $img($o['icon']) }}" alt="" width="34" height="34"></span>
                        <span class="fh-tab__txt">
                            <strong>{{ $o['label'] }}@if ($o['note']) <i class="fh-tab__tag">Online</i>@endif</strong>
                            <small>{{ $o['text'] }}</small>
                        </span>
                        <span class="fh-tab__check" aria-hidden="true">{{ $icon('check') }}</span>
                    </button>
                @endforeach
            </div>

            <div class="fh-tabs__panels">
                {{-- 1. Donasi online --}}
                <div class="fh-tabpanel" role="tabpanel" id="online" aria-labelledby="tab-online">
                    <div class="fh-donate">
                        <div class="fh-donate__info">
                            <aside class="fh-infocard">
                                <img class="fh-infocard__art" src="{{ $img('quote-globe.png') }}" alt="" aria-hidden="true" width="340" height="290" loading="lazy">
                                <span class="fh-infocard__badge">{{ $icon('heart') }}Online</span>
                                <h2>Donasi Sekarang</h2>
                                <p>Pilih nominal, isi data singkat, lalu lanjutkan ke WhatsApp. Tim kami akan mengirim petunjuk pembayaran dan bukti donasi.</p>
                                <ul class="fh-benefits">
                                    <li><span class="fh-benefits__ic">{{ $icon('heart') }}</span><div><strong>Tanpa batas minimal</strong><small>Mulai dari berapa pun yang Anda mampu.</small></div></li>
                                    <li><span class="fh-benefits__ic">{{ $icon('leaf') }}</span><div><strong>Pilih program tujuan</strong><small>Arahkan donasi ke bidang yang Anda pedulikan.</small></div></li>
                                    <li><span class="fh-benefits__ic">{{ $icon('file') }}</span><div><strong>Bukti lewat WhatsApp</strong><small>Konfirmasi dan kabar penyaluran dikirim langsung.</small></div></li>
                                </ul>
                            </aside>
                        </div>
                        <form class="fh-form fh-panel" data-fh-wa-form data-wa-title="Halo GreenHope, saya ingin berdonasi:">
                            <h3 class="fh-form__title"><span>{{ $icon('heart') }}</span>Detail donasi</h3>
                            <fieldset class="fh-amounts">
                                <legend>Pilih nominal</legend>
                                @foreach ($cfg['donation']['amounts'] as $a)
                                    <label class="fh-amount"><input type="radio" name="nominal" value="{{ $money($a) }}" data-label="Nominal" {{ $loop->index === 1 ? 'checked' : '' }}><span>{{ $money($a) }}</span></label>
                                @endforeach
                            </fieldset>
                            <div class="fh-field">
                                <label for="don-custom">Atau isi nominal lain (Rp)</label>
                                <input id="don-custom" name="nominal_lain" type="text" inputmode="numeric" pattern="[0-9.]*" placeholder="Contoh: 150000" data-label="Nominal" data-overrides="nominal" data-format="rupiah">
                            </div>
                            <div class="fh-field">
                                <label for="don-program">Untuk program</label>
                                <select id="don-program" name="program" data-label="Untuk program">
                                    <option>Di mana saja yang paling dibutuhkan</option>
                                    @foreach ($cfg['programs'] as $p)
                                        <option>{{ $p['title'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="fh-field">
                                <label for="don-nama">Nama Anda</label>
                                <input id="don-nama" name="nama" type="text" required maxlength="80" autocomplete="name" data-label="Nama">
                            </div>
                            <div class="fh-field">
                                <label for="don-pesan">Pesan atau doa (opsional)</label>
                                <textarea id="don-pesan" name="pesan" rows="3" maxlength="300" data-label="Pesan"></textarea>
                            </div>
                            <div class="fh-summary" aria-live="polite">
                                <span>Total donasi Anda</span>
                                <strong data-fh-summary>{{ $money($cfg['donation']['amounts'][1]) }}</strong>
                            </div>
                            <button class="fh-btn fh-btn--dark" type="submit">{{ $icon('whatsapp') }}Lanjut ke WhatsApp</button>
                        </form>
                    </div>
                </div>

                {{-- 2. Transfer bank --}}
                <div class="fh-tabpanel" role="tabpanel" id="bank" aria-labelledby="tab-bank" hidden>
                    <div class="fh-donate">
                        <div class="fh-donate__info">
                            <aside class="fh-infocard">
                                <img class="fh-infocard__art" src="{{ $img('quote-globe.png') }}" alt="" aria-hidden="true" width="340" height="290" loading="lazy">
                                <span class="fh-infocard__badge">{{ $icon('shield') }}Rekening resmi</span>
                                <h2>Transfer Bank</h2>
                                <p>Transfer ke salah satu rekening resmi atas nama <strong>{{ $cfg['donation']['account_name'] }}</strong>, lalu konfirmasi lewat WhatsApp.</p>
                            </aside>
                            <ul class="fh-banks">
                                @foreach ($cfg['donation']['banks'] as $b)
                                    <li class="fh-panel">
                                        <img src="{{ $img($b['logo']) }}" alt="{{ $b['bank'] }}" width="96" height="54" loading="lazy">
                                        <div><strong>{{ $b['number'] }}</strong><small>a.n. {{ $cfg['donation']['account_name'] }}</small></div>
                                        <button class="fh-btn fh-btn--ghost-dark fh-btn--sm" type="button" data-fh-copy="{{ str_replace(' ', '', $b['number']) }}">Salin</button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <form class="fh-form fh-panel" data-fh-wa-form data-wa-title="Halo GreenHope, saya sudah melakukan transfer donasi:">
                            <h3 class="fh-form__title"><span>{{ $icon('check') }}</span>Konfirmasi transfer</h3>
                            <div class="fh-field">
                                <label for="bank-nama">Nama pengirim</label>
                                <input id="bank-nama" name="nama" type="text" required maxlength="80" autocomplete="name" data-label="Nama pengirim">
                            </div>
                            <div class="fh-field">
                                <label for="bank-tujuan">Bank tujuan</label>
                                <select id="bank-tujuan" name="bank" data-label="Bank tujuan">
                                    @foreach ($cfg['donation']['banks'] as $b)
                                        <option>{{ $b['bank'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="fh-field">
                                <label for="bank-nominal">Nominal (Rp)</label>
                                <input id="bank-nominal" name="nominal" type="text" inputmode="numeric" pattern="[0-9.]*" required placeholder="Contoh: 250000" data-label="Nominal" data-format="rupiah">
                            </div>
                            <button class="fh-btn fh-btn--dark" type="submit">{{ $icon('whatsapp') }}Kirim Konfirmasi</button>
                        </form>
                    </div>
                </div>

                {{-- 3. Donasi barang --}}
                <div class="fh-tabpanel" role="tabpanel" id="barang" aria-labelledby="tab-barang" hidden>
                    <div class="fh-donate">
                        <div class="fh-donate__info">
                            <aside class="fh-infocard">
                                <img class="fh-infocard__art" src="{{ $img('quote-globe.png') }}" alt="" aria-hidden="true" width="340" height="290" loading="lazy">
                                <span class="fh-infocard__badge">{{ $icon('gift') }}Barang layak pakai</span>
                                <h2>Donasi Barang</h2>
                                <p>Barang yang Anda sumbangkan kami salurkan ke rumah belajar, sekolah, dan desa binaan. Barang yang kami terima:</p>
                                <ul class="fh-benefits">
                                    @foreach ($cfg['donation']['goods'] as $g)
                                        <li><span class="fh-benefits__ic">{{ $icon(['file', 'gift', 'leaf', 'shield'][$loop->index] ?? 'gift') }}</span><div><strong>{{ $g }}</strong></div></li>
                                    @endforeach
                                </ul>
                            </aside>
                        </div>
                        <form class="fh-form fh-panel" data-fh-wa-form data-wa-title="Halo GreenHope, saya ingin donasi barang:">
                            <h3 class="fh-form__title"><span>{{ $icon('gift') }}</span>Detail donasi barang</h3>
                            <div class="fh-field">
                                <label for="brg-nama">Nama Anda</label>
                                <input id="brg-nama" name="nama" type="text" required maxlength="80" autocomplete="name" data-label="Nama">
                            </div>
                            <div class="fh-field">
                                <label for="brg-jenis">Jenis dan jumlah barang</label>
                                <textarea id="brg-jenis" name="barang" rows="3" required maxlength="300" placeholder="Contoh: 40 buku cerita anak" data-label="Barang"></textarea>
                            </div>
                            <div class="fh-field">
                                <label for="brg-kota">Kota asal</label>
                                <input id="brg-kota" name="kota" type="text" required maxlength="60" autocomplete="address-level2" data-label="Kota">
                            </div>
                            <div class="fh-field">
                                <label for="brg-metode">Cara penyerahan</label>
                                <select id="brg-metode" name="metode" data-label="Penyerahan">
                                    <option>Diantar sendiri ke kantor GreenHope</option>
                                    <option>Mohon dijemput</option>
                                </select>
                            </div>
                            <button class="fh-btn fh-btn--dark" type="submit">{{ $icon('whatsapp') }}Kirim ke WhatsApp</button>
                        </form>
                    </div>
                </div>

                {{-- 4. Donasi rutin --}}
                <div class="fh-tabpanel" role="tabpanel" id="rutin" aria-labelledby="tab-rutin" hidden>
                    <div class="fh-donate">
                        <div class="fh-donate__info">
                            <aside class="fh-infocard">
                                <img class="fh-infocard__art" src="{{ $img('quote-globe.png') }}" alt="" aria-hidden="true" width="340" height="290" loading="lazy">
                                <span class="fh-infocard__badge">{{ $icon('calendar') }}Setiap bulan</span>
                                <h2>Donasi Rutin</h2>
                                <p>Berbagi setiap bulan membuat program kami bisa direncanakan lebih panjang. Pilih paket yang paling nyaman untuk Anda.</p>
                                <ul class="fh-benefits">
                                    <li><span class="fh-benefits__ic">{{ $icon('calendar') }}</span><div><strong>Pengingat bulanan</strong><small>Dikirim lewat WhatsApp, tanpa repot.</small></div></li>
                                    <li><span class="fh-benefits__ic">{{ $icon('check') }}</span><div><strong>Fleksibel</strong><small>Dapat dihentikan atau diubah kapan saja.</small></div></li>
                                    <li><span class="fh-benefits__ic">{{ $icon('file') }}</span><div><strong>Laporan berkala</strong><small>Laporan dampak khusus untuk donatur rutin.</small></div></li>
                                </ul>
                            </aside>
                        </div>
                        <form class="fh-form fh-panel" data-fh-wa-form data-wa-title="Halo GreenHope, saya ingin berdonasi rutin bulanan:">
                            <fieldset class="fh-plans">
                                <legend>Pilih paket bulanan</legend>
                                @foreach ($cfg['donation']['recurring'] as $r)
                                    <label class="fh-plan">
                                        <input type="radio" name="paket" value="{{ $r['label'] }} ({{ $money($r['amount']) }}/bulan)" data-label="Paket" {{ $loop->index === 1 ? 'checked' : '' }}>
                                        <span class="fh-plan__card">
                                            @if ($loop->index === 1)<i class="fh-plan__tag">Paling populer</i>@endif
                                            <b class="fh-plan__name">{{ $r['label'] }}</b>
                                            <em class="fh-plan__price">{{ $money($r['amount']) }}<small>/bulan</small></em>
                                            <span class="fh-plan__desc">{{ $r['text'] }}</span>
                                            <i class="fh-plan__check" aria-hidden="true">{{ $icon('check') }}</i>
                                        </span>
                                    </label>
                                @endforeach
                            </fieldset>
                            <div class="fh-field">
                                <label for="rtn-nama">Nama Anda</label>
                                <input id="rtn-nama" name="nama" type="text" required maxlength="80" autocomplete="name" data-label="Nama">
                            </div>
                            <div class="fh-field">
                                <label for="rtn-metode">Metode pembayaran</label>
                                <select id="rtn-metode" name="metode" data-label="Metode">
                                    <option>Transfer bank</option>
                                    <option>E-wallet</option>
                                </select>
                            </div>
                            <button class="fh-btn fh-btn--dark" type="submit">{{ $icon('whatsapp') }}Mulai Donasi Rutin</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="fh-sec fh-sec--soft">
    <div class="fh-wrap">
        <div class="fh-sec__head fh-reveal">
            <span class="fh-eyebrow">Langkah</span>
            <h2>Cara Berdonasi</h2>
            <p>Tiga langkah sederhana, dari memilih hingga menerima bukti donasi.</p>
        </div>
        <ol class="fh-steps">
            @foreach ($cfg['donation']['steps'] as $s)
                <li class="fh-reveal"><span class="fh-steps__n">{{ $loop->iteration }}</span><h3>{{ $s['title'] }}</h3><p>{{ $s['text'] }}</p></li>
            @endforeach
        </ol>
        <p class="fh-note fh-reveal">Ingin tahu ke mana donasi disalurkan? <a href="{{ $url('transparansi') }}">Lihat laporan keuangan kami</a>.</p>
    </div>
</section>
