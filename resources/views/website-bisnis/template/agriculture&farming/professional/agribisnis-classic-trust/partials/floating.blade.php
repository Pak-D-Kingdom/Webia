@php
    $waLink = 'https://wa.me/' . $agro['whatsapp']['number'] . '?text=' . rawurlencode($agro['whatsapp']['greeting']);
@endphp
<div class="dock" id="floatDock">
    <div class="hint" id="botHint" role="status" hidden>
        <button type="button" class="hint__close" id="botHintClose" aria-label="Tutup sapaan">
            <svg class="i i--sm" aria-hidden="true"><use href="#i-x"/></svg>
        </button>
        <div class="hint__head">
            <span class="hint__av"><img src="{{ $img('agrobot.svg') }}" alt="" width="30" height="36"></span>
            <div>
                <strong>{{ $agro['ai']['robot_bubble'][0] }}</strong>
                <small>{{ $agro['ai']['robot_bubble'][1] }}</small>
            </div>
        </div>
        <p class="hint__typing" aria-hidden="true"><span class="typing"><i></i><i></i><i></i></span></p>
        <p class="hint__msg" hidden>Ada yang bisa saya bantu seputar komoditas, harga, atau kemitraan?</p>
        <div class="hint__chips" hidden>
            @foreach (array_slice($agro['ai']['chips'], 0, 2) as $chip)
                <button type="button" data-chat-ask="{{ $chip }}">{{ $chip }}</button>
            @endforeach
        </div>
    </div>

    <a class="fab fab--wa" href="{{ $waLink }}" target="_blank" rel="noopener" aria-label="Chat WhatsApp AgroTrade">
        <span class="fab__ico"><svg class="i" aria-hidden="true"><use href="#i-whatsapp"/></svg></span>
        <span class="fab__lbl"><b>WhatsApp</b><small>Balas cepat</small></span>
    </a>

    <button type="button" class="fab fab--ai" id="chatToggle" aria-haspopup="dialog" aria-expanded="false" aria-controls="chatPanel" aria-label="Buka AI Chat AgroBot">
        <span class="fab__avatar" aria-hidden="true">
            <img src="{{ $img('agrobot.svg') }}" alt="" width="42" height="50">
            <span class="fab__online"></span>
        </span>
        <span class="fab__lbl"><b>AI Chat</b><small>Tanya AgroBot</small></span>
        <span class="fab__badge" id="chatBadge" aria-hidden="true">1</span>
        <span class="fab__ping" aria-hidden="true"></span>
    </button>
</div>

<section class="chat" id="chatPanel" role="dialog" aria-modal="false" aria-labelledby="chatTitle" hidden>
    <header class="chat__head">
        <span class="chat__avatar"><img src="{{ $img('agrobot.svg') }}" alt="" width="40" height="48"></span>
        <div class="chat__who">
            <h2 id="chatTitle">AgroBot</h2>
            <p><span class="chat__dot" aria-hidden="true"></span> Online · Asisten AI AgroTrade</p>
        </div>
        <div class="chat__tools">
            <a class="chat__tool" href="{{ $waLink }}" target="_blank" rel="noopener" aria-label="Lanjut ke WhatsApp" title="Lanjut ke WhatsApp">
                <svg class="i" aria-hidden="true"><use href="#i-whatsapp"/></svg>
            </a>
            <button type="button" class="chat__tool" id="chatReset" aria-label="Mulai percakapan baru" title="Percakapan baru">
                <svg class="i" aria-hidden="true"><use href="#i-refresh"/></svg>
            </button>
            <button type="button" class="chat__tool" id="chatClose" aria-label="Tutup chat" title="Tutup">
                <svg class="i" aria-hidden="true"><use href="#i-x"/></svg>
            </button>
        </div>
    </header>

    <div class="chat__log" id="chatLog" role="log" aria-live="polite"></div>

    <div class="chat__chips" id="chatChips" aria-label="Pertanyaan cepat"></div>

    <form class="chat__form" id="chatForm" autocomplete="off">
        <label class="sr-only" for="chatInput">Tulis pertanyaan Anda</label>
        <input type="text" id="chatInput" placeholder="Tulis pertanyaan Anda…" maxlength="200" enterkeyhint="send">
        <button type="submit" class="chat__send" aria-label="Kirim pertanyaan">
            <svg class="i" aria-hidden="true"><use href="#i-send"/></svg>
        </button>
    </form>
    <p class="chat__note">Jawaban otomatis dari FAQ. Untuk penawaran resmi, gunakan <a href="{{ route('agribisnis-classic-trust.penawaran') }}">formulir penawaran</a> atau WhatsApp.</p>
</section>
