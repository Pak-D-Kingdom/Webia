@extends($v.'layouts.app')

@section('title', 'Minta Penawaran Harga - '.$site['brand']['name'])

@section('content')
    @php $q = $site['quotation']; $selected = request('layanan'); @endphp

    @include($v.'partials.page-header', ['ph' => [
        'crumb' => 'Minta Penawaran',
        'title' => $q['title'],
        'text'  => $q['text'],
        'image' => 'quote-ship.jpg',
    ]])

    <section class="lg-wrap lg-sec">
        <div class="lg-quotepage">
            <aside class="lg-quotepage__side">
                <img src="{{ $img($q['image']) }}" alt="" aria-hidden="true">
                <div>
                    <h2>Kenapa memilih {{ $site['brand']['name'] }}?</h2>
                    <ul class="lg-check lg-check--light">
                        @foreach ($q['benefits'] as $b)
                            <li><svg class="lg-ic" aria-hidden="true"><use href="#i-check"></use></svg>{{ $b }}</li>
                        @endforeach
                    </ul>
                    <p class="lg-quotepage__contact"><svg class="lg-ic" aria-hidden="true"><use href="#i-phone"></use></svg>{{ $site['contact']['phone'] }}</p>
                </div>
            </aside>

            <form class="lg-form" data-quote-form novalidate>
                <h2>Formulir permintaan penawaran</h2>
                <p class="lg-form__note">Data akan dikirim ke tim kami melalui WhatsApp. Kolom bertanda * wajib diisi.</p>

                <div class="lg-form__grid">
                    <div class="lg-field">
                        <label for="q-nama">Nama lengkap *</label>
                        <input id="q-nama" name="nama" type="text" required autocomplete="name">
                    </div>
                    <div class="lg-field">
                        <label for="q-perusahaan">Perusahaan</label>
                        <input id="q-perusahaan" name="perusahaan" type="text" autocomplete="organization">
                    </div>
                    <div class="lg-field">
                        <label for="q-telepon">No. telepon / WhatsApp *</label>
                        <input id="q-telepon" name="telepon" type="tel" required autocomplete="tel" inputmode="tel">
                    </div>
                    <div class="lg-field">
                        <label for="q-email">Email</label>
                        <input id="q-email" name="email" type="email" autocomplete="email">
                    </div>
                    <div class="lg-field lg-field--full">
                        <label for="q-layanan">Jenis layanan *</label>
                        <select id="q-layanan" name="layanan" required data-preselect="{{ $selected }}">
                            <option value="">Pilih layanan</option>
                            @foreach ($site['services']['items'] as $s)
                                <option value="{{ $s['title'] }}" @if ($selected === $s['title']) selected @endif>{{ $s['title'] }}</option>
                            @endforeach
                            @if ($selected && ! collect($site['services']['items'])->contains('title', $selected))
                                <option value="{{ $selected }}" selected>{{ $selected }}</option>
                            @endif
                        </select>
                    </div>
                    <div class="lg-field">
                        <label for="q-asal">Kota / negara asal *</label>
                        <input id="q-asal" name="asal" type="text" required>
                    </div>
                    <div class="lg-field">
                        <label for="q-tujuan">Kota / negara tujuan *</label>
                        <input id="q-tujuan" name="tujuan" type="text" required>
                    </div>
                    <div class="lg-field">
                        <label for="q-barang">Jenis barang</label>
                        <select id="q-barang" name="barang">
                            <option value="">Pilih jenis barang</option>
                            @foreach ($q['cargo_types'] as $ct)
                                <option value="{{ $ct }}">{{ $ct }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="lg-field">
                        <label for="q-berat">Estimasi berat / volume</label>
                        <input id="q-berat" name="berat" type="text" placeholder="Mis. 250 kg atau 3 cbm">
                    </div>
                    <div class="lg-field lg-field--full">
                        <label for="q-catatan">Catatan tambahan</label>
                        <textarea id="q-catatan" name="catatan" rows="4" placeholder="Jadwal penjemputan, kebutuhan khusus, dll."></textarea>
                    </div>
                </div>

                <button class="lg-btn lg-btn--primary" type="submit"><svg class="lg-ic" aria-hidden="true"><use href="#i-whatsapp"></use></svg>{{ $q['cta'] }} via WhatsApp</button>
                <p class="lg-form__status" data-quote-status role="status" aria-live="polite"></p>
            </form>
        </div>
    </section>
@endsection
