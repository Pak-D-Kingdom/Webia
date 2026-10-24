{{-- Floating WhatsApp (kiri bawah) + AI Chatbot (kanan bawah) + panel chat --}}
@php
    $waUrl = 'https://wa.me/'.$t['contact']['whatsapp'].'?text='.rawurlencode($t['contact']['whatsapp_text']);
@endphp

<a class="fab-wa" href="{{ $waUrl }}" target="_blank" rel="noopener" aria-label="Chat via WhatsApp">
    <span class="fab-wa__ring" aria-hidden="true"></span>
    <span class="fab-wa__ring fab-wa__ring--2" aria-hidden="true"></span>
    <i class="bi bi-whatsapp" aria-hidden="true"></i>
    <i class="bi bi-star-fill fab-wa__star" aria-hidden="true"></i>
    <span class="fab-wa__tip">Chat via WhatsApp</span>
</a>

<div class="fab-ai" data-ai>
    <p class="fab-ai__hint" data-ai-hint hidden>
        <span>Hai! Ada yang bisa kubantu?</span>
        <button type="button" data-ai-hint-close aria-label="Tutup sapaan"><i class="bi bi-x" aria-hidden="true"></i></button>
    </p>
    <button class="fab-ai__btn" type="button" data-chat-open aria-expanded="false" aria-controls="el-chat" aria-label="Buka {{ $t['ai']['name'] }}">
        <span class="fab-ai__halo" aria-hidden="true"></span>
        <img src="{{ $img }}ai-robot.jpg" alt="" width="306" height="282">
        <span class="fab-ai__live" aria-hidden="true"></span>
        <i class="bi bi-stars fab-ai__spark fab-ai__spark--a" aria-hidden="true"></i>
        <i class="bi bi-star-fill fab-ai__spark fab-ai__spark--b" aria-hidden="true"></i>
    </button>
</div>

<section class="chat" id="el-chat" role="dialog" aria-labelledby="chat-title" hidden data-chat data-chat-welcome data-chat-panel>
    <header class="chat__head">
        <img class="chat__avatar" src="{{ $img }}ai-robot.jpg" alt="" width="44" height="44">
        <div class="chat__who">
            <h2 id="chat-title">{{ $t['ai']['name'] }}</h2>
            <p><span class="dot" aria-hidden="true"></span> Online</p>
        </div>
        <button class="icon-btn" type="button" data-chat-close aria-label="Tutup chat"><i class="bi bi-x-lg" aria-hidden="true"></i></button>
    </header>
    <div class="chat__log" data-chat-log role="log" aria-live="polite"></div>
    <div class="chat__chips" data-chat-chips>
        @foreach ($t['ai']['quick'] as $qi)
            <button type="button" class="chip-q" data-q="{{ $qi }}">{{ $t['ai']['faq'][$qi]['q'] }}</button>
        @endforeach
    </div>
    <form class="chat__form" data-chat-form autocomplete="off">
        <label class="sr-only" for="chat-input">Pertanyaan</label>
        <input id="chat-input" type="text" name="message" placeholder="{{ $t['ai']['placeholder'] }}" maxlength="200">
        <button type="submit" aria-label="Kirim"><i class="bi bi-send-fill" aria-hidden="true"></i></button>
    </form>
</section>
