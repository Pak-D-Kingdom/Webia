{{-- Form booking inquiry (statis, kirim lewat WhatsApp oleh JS). Param: $variant = inline | full, $uid --}}
@php $full = ($variant ?? 'inline') === 'full'; @endphp
<form class="ta-form ta-form--{{ $variant }}" data-ta-inquiry>
    <div class="ta-form__grid">
        <div class="ta-field">
            <label for="iq-nama-{{ $uid }}">Nama Lengkap</label>
            {{ $icon('user') }}
            <input id="iq-nama-{{ $uid }}" name="nama" type="text" placeholder="Nama Lengkap" autocomplete="name" required maxlength="80">
        </div>
        <div class="ta-field">
            <label for="iq-email-{{ $uid }}">Email</label>
            {{ $icon('mail') }}
            <input id="iq-email-{{ $uid }}" name="email" type="email" placeholder="Email" autocomplete="email" required maxlength="120">
        </div>
        <div class="ta-field">
            <label for="iq-dest-{{ $uid }}">Pilih Destinasi</label>
            {{ $icon('pin') }}
            <select id="iq-dest-{{ $uid }}" name="dest" required data-ta-select>
                <option value="">Pilih Destinasi</option>
                @foreach ($ta['destinations'] as $d)
                    <option value="{{ $d['slug'] }}">{{ $d['name'] }}, {{ $d['country'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="ta-field">
            <label for="iq-tgl-{{ $uid }}">Tanggal Keberangkatan</label>
            {{ $icon('calendar') }}
            <input id="iq-tgl-{{ $uid }}" name="tgl" type="date" data-ta-min-today placeholder="Tanggal Keberangkatan">
        </div>

        @if ($full)
            <div class="ta-field">
                <label for="iq-pax-{{ $uid }}">Jumlah Peserta</label>
                {{ $icon('users') }}
                <select id="iq-pax-{{ $uid }}" name="peserta" data-ta-select>
                    @foreach ([1, 2, 3, 4, 5, 6, 8, 10, 15, 20] as $n)
                        <option value="{{ $n }}" @selected($n === 2)>{{ $n }} Orang</option>
                    @endforeach
                </select>
            </div>
            <div class="ta-field">
                <label for="iq-wa-{{ $uid }}">No. WhatsApp</label>
                {{ $icon('phone') }}
                <input id="iq-wa-{{ $uid }}" name="wa" type="tel" placeholder="No. WhatsApp (opsional)" autocomplete="tel" maxlength="20">
            </div>
            <div class="ta-field ta-field--area ta-field--wide">
                <label for="iq-pesan-{{ $uid }}">Pesan</label>
                {{ $icon('chat') }}
                <textarea id="iq-pesan-{{ $uid }}" name="pesan" rows="4" placeholder="Ceritakan kebutuhan Anda, misalnya budget, tujuan, atau permintaan khusus." maxlength="600"></textarea>
            </div>
        @endif
    </div>

    <div class="ta-form__foot">
        <button class="ta-btn ta-btn--dark ta-form__submit" type="submit">Kirim Inquiry {{ $icon('arrow') }}</button>
        <p class="ta-form__status" data-ta-status role="status" aria-live="polite"></p>
    </div>
    @if ($full)
        <p class="ta-note">Setelah dikirim, WhatsApp akan terbuka dengan pesan yang sudah terisi. Tim kami membalas pada jam layanan.</p>
    @endif
</form>
