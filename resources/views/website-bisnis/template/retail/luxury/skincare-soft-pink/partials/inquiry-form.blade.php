{{-- Form inquiry. Variabel: $compact (bool)
     - compact (preview beranda): TIDAK mengirim ke WhatsApp, hanya membuka halaman Inquiry dengan data terisi (GET).
     - penuh (halaman Inquiry): dikirim ke WhatsApp oleh skincare.js (data-inquiry-form). --}}
@php $compact = $compact ?? false; @endphp
<form class="iform" @if ($compact) action="{{ route($rp . 'inquiry') }}" method="get" @else data-inquiry-form novalidate @endif>
    <div class="iform__row">
        <label class="field">
            <span>Nama lengkap</span>
            <input type="text" name="name" autocomplete="name" placeholder="Nama Anda" required>
        </label>
        @unless ($compact)
            <label class="field">
                <span>Nomor WhatsApp</span>
                <input type="tel" name="phone" autocomplete="tel" inputmode="tel" placeholder="08xx xxxx xxxx" required>
            </label>
        @endunless
    </div>
    <div class="iform__row">
        @unless ($compact)
            <label class="field">
                <span>Topik</span>
                <select name="topic">
                    @foreach ($cfg['inquiry_topics'] as $key => $label)
                        <option value="{{ $key }}">{{ $label }}</option>
                    @endforeach
                </select>
            </label>
        @endunless
        <label class="field">
            <span>Produk (opsional)</span>
            <select name="product">
                <option value="">Belum memilih produk</option>
                @foreach ($cfg['products'] as $p)
                    <option value="{{ $p['slug'] }}" data-name="{{ $p['name'] }}">{{ $p['name'] }}</option>
                @endforeach
            </select>
        </label>
    </div>
    <label class="field">
        <span>Pesan</span>
        <textarea name="message" rows="{{ $compact ? 3 : 5 }}" placeholder="Tulis pertanyaan atau kebutuhan Anda" required></textarea>
    </label>
    <p class="form-error" data-form-error hidden></p>
    @if ($compact)
        <button class="btn btn--rose btn--lg" type="submit">Lanjut ke Halaman Inquiry <i class="bi bi-arrow-right" aria-hidden="true"></i></button>
    @else
        <button class="btn btn--rose btn--lg" type="submit"><i class="bi bi-whatsapp" aria-hidden="true"></i> Kirim via WhatsApp</button>
    @endif
</form>
