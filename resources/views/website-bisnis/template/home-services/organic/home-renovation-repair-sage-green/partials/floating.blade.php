{{-- Tombol melayang: AI Chatbot (Service & Estimate FAQ) + WhatsApp --}}
<div class="hr-chat" id="hrChat" data-chat role="dialog" aria-label="AI Chatbot Renovaku" aria-hidden="true" hidden>
    <div class="hr-chat__head">
        <span class="hr-chat__avatar">@include($vp.'robot')</span>
        <div class="hr-chat__who"><strong>Asisten Renovaku</strong><small><i class="hr-dot"></i> Service & Estimate FAQ</small></div>
        <button type="button" class="hr-iconbtn" data-chat-close aria-label="Tutup chat">{{ $i('close') }}</button>
    </div>
    <div class="hr-chat__log" data-chat-log aria-live="polite"></div>
    <div class="hr-chat__quick" data-chat-quick></div>
    <form class="hr-chat__form" data-chat-form autocomplete="off">
        <label class="sr-only" for="hrChatInput">Pertanyaan Anda</label>
        <input id="hrChatInput" type="text" data-chat-input placeholder="Tulis pertanyaan Anda…" maxlength="200">
        <button type="submit" aria-label="Kirim pertanyaan">{{ $i('send') }}</button>
    </form>
</div>

<div class="hr-float">
    <button type="button" class="hr-chatfab" data-chat-toggle aria-expanded="false" aria-controls="hrChat">
        <span class="hr-chatfab__robot">@include($vp.'robot')</span>
        <span class="hr-chatfab__label"><strong>AI Chatbot</strong><small>Service & Estimate FAQ</small></span>
        <span class="hr-chatfab__go">{{ $i('arrow') }}</span>
    </button>
    <a class="hr-wa" href="https://wa.me/{{ $cfg['site']['whatsapp'] }}?text={{ rawurlencode('Halo Renovaku, saya ingin konsultasi renovasi rumah.') }}" target="_blank" rel="noopener noreferrer" aria-label="Chat WhatsApp Renovaku">
        {{ $i('whatsapp') }}<span>WhatsApp</span>
    </a>
</div>
