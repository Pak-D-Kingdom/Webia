@php
    $waLink = 'https://wa.me/' . $agro['whatsapp']['number'] . '?text=' . rawurlencode($agro['whatsapp']['greeting']);
@endphp
<div class="dock" id="floatDock">
    <div class="dock__hint" id="botHint" hidden>
        <button type="button" class="dock__hint-close" id="botHintClose" aria-label="Tutup sapaan">
            <svg class="i i--sm" aria-hidden="true"><use href="#i-x"/></svg>
        </button>
        <p><strong>{{ $agro['ai']['robot_bubble'][0] }}</strong><br>{{ $agro['ai']['robot_bubble'][1] }}</p>
    </div>

    <a class="fab fab--wa" href="{{ $waLink }}" target="_blank" rel="noopener" aria-label="Chat WhatsApp AgroTrade">
        <span class="fab__ico"><svg class="i" aria-hidden="true"><use href="#i-whatsapp"/></svg></span>
        <span class="fab__txt">WhatsApp</span>
    </a>

    <button type="button" class="fab fab--ai" id="chatToggle" aria-haspopup="dialog" aria-expanded="false" aria-controls="chatPanel">
        <span class="fab__bot" aria-hidden="true"><img src="{{ $img('agrobot.svg') }}" alt="" width="46" height="55"></span>
        <span class="fab__ico fab__ico--ai"><svg class="i" aria-hidden="true"><use href="#i-chat"/></svg></span>
        <span class="fab__txt">AI Chat</span>
        <span class="fab__ping" aria-hidden="true"></span>
    </button>
</div>

<section class="chat" id="chatPanel" role="dialog" aria-modal="false" aria-labelledby="chatTitle" hidden>
    <header class="chat__head">
        <span class="chat__avatar"><img src="{{ $img('agrobot.svg') }}" alt="" width="40" height="48"></span>
        <div class="chat__who">
            <h2 id="chatTitle">AgroBot</h2>
            <p><span class="chat__dot" aria-hidden="true"></span> Asisten AI AgroTrade · komoditas &amp; kemitraan</p>
        </div>
        <button type="button" class="chat__close" id="chatClose" aria-label="Tutup chat">
            <svg class="i" aria-hidden="true"><use href="#i-x"/></svg>
        </button>
    </header>

    <div class="chat__log" id="chatLog" role="log" aria-live="polite"></div>

    <div class="chat__chips" id="chatChips"></div>

    <form class="chat__form" id="chatForm" autocomplete="off">
        <label class="sr-only" for="chatInput">Tulis pertanyaan Anda</label>
        <input type="text" id="chatInput" placeholder="Tanyakan harga, pengiriman, kemitraan…" maxlength="200">
        <button type="submit" class="chat__send" aria-label="Kirim pertanyaan">
            <svg class="i" aria-hidden="true"><use href="#i-send"/></svg>
        </button>
    </form>
    <p class="chat__note">Jawaban otomatis. Untuk penawaran resmi, <a href="{{ $waLink }}" target="_blank" rel="noopener">hubungi tim kami via WhatsApp</a>.</p>
</section>
