@php
    $waText = 'Halo ' . $site['brand']['name'] . ', saya ingin berkonsultasi mengenai desain arsitektur.';
@endphp

<div class="abd-fabs" id="abd-fabs">
    <a class="abd-fab abd-fab--wa" href="https://wa.me/{{ $site['contact']['whatsapp'] }}?text={{ rawurlencode($waText) }}"
       target="_blank" rel="noopener noreferrer" aria-label="Chat lewat WhatsApp">
        <span class="abd-fab__wave" aria-hidden="true"></span>
        <span class="abd-fab__wave abd-fab__wave--2" aria-hidden="true"></span>
        <svg class="i" aria-hidden="true"><use href="#i-whatsapp"/></svg>
        <span class="abd-fab__tip">Chat WhatsApp</span>
    </a>

    <button type="button" class="abd-fab abd-fab--bot" data-chat-open aria-label="Buka ArchiBot, asisten FAQ layanan arsitektur" aria-expanded="false" aria-controls="abd-chat">
        <span class="abd-fab__orbit" aria-hidden="true"></span>
        <span class="abd-fab__face" aria-hidden="true"><img src="{{ $img('archibot.svg') }}" alt="" width="64" height="88" loading="lazy"></span>
        <span class="abd-fab__badge" aria-hidden="true"></span>
        <span class="abd-fab__tip abd-fab__tip--bot">Tanya ArchiBot</span>
    </button>
</div>

<section class="abd-chat" id="abd-chat" role="dialog" aria-modal="false" aria-labelledby="abd-chat-title" hidden>
    <header class="abd-chat__head">
        <span class="abd-chat__avatar" aria-hidden="true"><img src="{{ $img('archibot.svg') }}" alt="" width="40" height="55"></span>
        <div class="abd-chat__who">
            <h2 id="abd-chat-title">ArchiBot</h2>
            <p><i class="abd-chat__on" aria-hidden="true"></i>FAQ layanan arsitektur</p>
        </div>
        <button type="button" class="abd-iconbtn abd-iconbtn--light" data-chat-close aria-label="Tutup chat"><svg class="i" aria-hidden="true"><use href="#i-close"/></svg></button>
    </header>
    <div class="abd-chat__body" id="abd-chat-body" aria-live="polite"></div>
    <div class="abd-chat__quick" id="abd-chat-quick"></div>
    <form class="abd-chat__form" id="abd-chat-form" autocomplete="off">
        <input type="text" id="abd-chat-input" placeholder="Tulis pertanyaan Anda..." maxlength="200" aria-label="Pertanyaan Anda">
        <button type="submit" class="abd-chat__send" aria-label="Kirim pertanyaan"><svg class="i" aria-hidden="true"><use href="#i-send"/></svg></button>
    </form>
</section>
