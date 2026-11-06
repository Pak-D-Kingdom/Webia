{{-- Logika chat dikendalikan skincare.js lewat atribut data-chat-* (dipakai kartu AI di beranda & panel floating) --}}
<div class="chat" data-chat>
    <div class="chat__log" data-chat-log role="log" aria-live="polite"></div>
    <div class="chat__chips" data-chat-chips>
        @foreach ($cfg['faq'] as $f)
            <button type="button" class="chip" data-chat-q="{{ $f['q'] }}">{{ $f['q'] }}</button>
        @endforeach
    </div>
    <form class="chat__form" data-chat-form autocomplete="off">
        <input type="text" name="q" placeholder="Tulis pertanyaan Anda..." maxlength="200" aria-label="Tulis pertanyaan Anda" required>
        <button type="submit" class="chat__send" aria-label="Kirim pertanyaan"><i class="bi bi-send-fill" aria-hidden="true"></i></button>
    </form>
</div>
