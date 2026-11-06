{{-- Komponen chat FAQ. Variabel opsional: $chatId (id unik input). Dihidupkan oleh foundation.js ([data-fh-chat]). --}}
@php
    $chatId = $chatId ?? 'fh-chat-input';
@endphp
<div class="fh-chat" data-fh-chat>
    <div class="fh-chat__log" data-fh-log role="log" aria-live="polite" aria-label="Percakapan dengan {{ $cfg['brand']['bot'] }}"></div>
    <div class="fh-chat__chips" data-fh-chips aria-label="Pertanyaan cepat"></div>
    <form class="fh-chat__form" data-fh-form novalidate>
        <label class="fh-sr" for="{{ $chatId }}">Tulis pertanyaan Anda</label>
        <input id="{{ $chatId }}" type="text" name="q" maxlength="200" autocomplete="off" placeholder="{{ $cfg['chatbot']['placeholder'] }}" required>
        <button type="submit" aria-label="Kirim pertanyaan">{{ $icon('send') }}</button>
    </form>
</div>
