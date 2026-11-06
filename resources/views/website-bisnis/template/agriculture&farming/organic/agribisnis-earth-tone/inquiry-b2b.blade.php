@extends('website-bisnis.template.agriculture&farming.organic.agribisnis-earth-tone.layouts.app')

@section('title', 'Inquiry B2B - ' . $data['brand']['name'])
@section('page_key', 'b2b')

@section('content')
    @include($v . '.sections.page-banner', [
        'bannerKey'   => 'b2b',
        'bannerTitle' => $data['b2b']['title'],
        'bannerText'  => $data['b2b']['text'],
    ])

    <section class="inner">
        <div class="inner__wrap">
            <div class="split split--form">
                <aside class="card card--b2b card--b2b-side">
                    <img class="card__bgimg" src="{{ $img }}/harvest-bg.jpg" alt="" aria-hidden="true" loading="lazy">
                    <div class="card--b2b__stack">
                        <span class="metric__icon metric__icon--white"><svg class="ico"><use href="#i-handshake"></use></svg></span>
                        <h2>Mengapa bermitra dengan kami</h2>
                        <ul class="check-list">
                            @foreach ($data['b2b']['benefits'] as $b)
                                <li>
                                    <svg class="ico"><use href="#i-check"></use></svg>
                                    <div><strong>{{ $b['title'] }}</strong><span>{{ $b['text'] }}</span></div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>

                <form class="card form" id="b2bForm" data-wa-form data-wa-title="INQUIRY B2B" novalidate>
                    <h2>Formulir Inquiry B2B</h2>
                    <p>Isi data berikut. Pesan akan terbuka di WhatsApp tim kami untuk ditindaklanjuti.</p>
                    <div class="form-grid">
                        <div class="field"><label for="b2bCompany">Nama perusahaan</label><input type="text" id="b2bCompany" name="perusahaan" data-label="Perusahaan" required autocomplete="organization"></div>
                        <div class="field"><label for="b2bName">Nama kontak</label><input type="text" id="b2bName" name="nama" data-label="Nama" required autocomplete="name"></div>
                        <div class="field"><label for="b2bEmail">Email</label><input type="email" id="b2bEmail" name="email" data-label="Email" required autocomplete="email"></div>
                        <div class="field"><label for="b2bPhone">Nomor telepon / WhatsApp</label><input type="tel" id="b2bPhone" name="telepon" data-label="Telepon" required autocomplete="tel" inputmode="tel"></div>
                        <div class="field">
                            <label for="b2bType">Jenis usaha</label>
                            <select id="b2bType" name="jenis_usaha" data-label="Jenis usaha" required>
                                <option value="">Pilih jenis usaha</option>
                                @foreach ($data['b2b']['business_types'] as $t)<option>{{ $t }}</option>@endforeach
                            </select>
                        </div>
                        <div class="field">
                            <label for="b2bComm">Komoditas diminati</label>
                            <select id="b2bComm" name="komoditas" data-label="Komoditas" required>
                                <option value="">Pilih komoditas</option>
                                @foreach ($data['commodities'] as $c)<option value="{{ $c['name'] }}" data-slug="{{ $c['slug'] }}">{{ $c['name'] }}</option>@endforeach
                            </select>
                        </div>
                        <div class="field field--full"><label for="b2bVol">Perkiraan volume (ton / bulan)</label><input type="text" id="b2bVol" name="volume" data-label="Perkiraan volume" placeholder="mis. 10 ton / bulan"></div>
                        <div class="field field--full"><label for="b2bMsg">Pesan</label><textarea id="b2bMsg" name="pesan" data-label="Pesan" rows="4" placeholder="Ceritakan kebutuhan atau rencana kemitraan Anda"></textarea></div>
                    </div>
                    <button class="btn btn--primary" type="submit">Kirim via WhatsApp <svg class="ico"><use href="#i-whatsapp"></use></svg></button>
                    <p class="form-status" role="status" aria-live="polite"></p>
                </form>
            </div>
        </div>
    </section>

    @include($v . '.partials.explore', ['exploreKeys' => ['penawaran', 'komoditas', 'chatbot']])
@endsection
