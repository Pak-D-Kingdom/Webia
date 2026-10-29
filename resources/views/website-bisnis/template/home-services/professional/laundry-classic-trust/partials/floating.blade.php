{{-- Tombol melayang: WhatsApp + AI Chatbot (FreshBot) --}}
<div class="fl" data-floating>
    <a class="fl__wa" href="{{ $wa() }}" target="_blank" rel="noopener" aria-label="Chat WhatsApp FreshWash">
        <svg class="ic"><use href="#i-whatsapp"/></svg>
        <span class="fl__tip">Chat WhatsApp</span>
    </a>

    <button type="button" class="fl__bot" data-bot-open aria-label="Buka FreshBot, asisten laundry" aria-expanded="false" aria-controls="bot-panel">
        <span class="fl__ring" aria-hidden="true"></span>
        <svg class="fab-bot" viewBox="0 0 64 64" aria-hidden="true">
            <path d="M13 32C12 9 52 9 51 32" fill="none" stroke="#9cc4ea" stroke-width="4" stroke-linecap="round"/>
            <rect x="9" y="27" width="8" height="15" rx="4" fill="#9cc4ea"/><rect x="47" y="27" width="8" height="15" rx="4" fill="#9cc4ea"/>
            <path d="M13 40c0 7 7 9 13 9" fill="none" stroke="#9cc4ea" stroke-width="2.4" stroke-linecap="round"/><circle cx="28" cy="49" r="2.6" fill="#9cc4ea"/>
            <rect x="16" y="17" width="32" height="30" rx="13" fill="#fff"/>
            <rect x="20" y="21" width="24" height="20" rx="9" fill="#18273d"/>
            <ellipse class="fab-eye" cx="27.500" cy="30" rx="2.700" ry="3.600" fill="#6fd8ff"/>
            <ellipse class="fab-eye" cx="36.500" cy="30" rx="2.700" ry="3.600" fill="#6fd8ff"/>
            <path d="M28 35.500q4 3 8 0" fill="none" stroke="#6fd8ff" stroke-width="2" stroke-linecap="round"/>
        </svg>
        <span class="fl__dot" aria-hidden="true"></span>
        <span class="fl__bubble" data-bot-bubble>Tanya FreshBot yuk!</span>
    </button>
</div>

<section class="bot" id="bot-panel" data-bot role="dialog" aria-label="FreshBot, asisten laundry" aria-modal="false" hidden>
    <header class="bot__head">
        <img src="{{ $img('robot.svg') }}" alt="" width="46" height="46" class="bot__avatar">
        <div>
            <strong>{{ $c['chatbot']['name'] }}</strong>
            <small><i aria-hidden="true"></i> Online - tanya harga & proses laundry</small>
        </div>
        <button type="button" class="nb__icon" data-bot-close aria-label="Tutup chatbot"><svg class="ic"><use href="#i-close"/></svg></button>
    </header>

    <div class="bot__log" data-bot-log aria-live="polite"></div>

    <div class="bot__chips" data-bot-chips>
        @foreach ($c['chatbot']['chips'] as $chip)
            <button type="button" data-bot-ask="{{ $chip }}">{{ $chip }}</button>
        @endforeach
    </div>

    <form class="bot__form" data-bot-form autocomplete="off">
        <input type="text" name="q" placeholder="Tulis pertanyaan Anda..." aria-label="Tulis pertanyaan" maxlength="200" required>
        <button type="submit" aria-label="Kirim pertanyaan"><svg class="ic"><use href="#i-send"/></svg></button>
    </form>
</section>
