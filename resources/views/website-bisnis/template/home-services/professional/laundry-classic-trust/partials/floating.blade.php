{{-- Tombol melayang: WhatsApp + AI Chatbot (FreshBot) --}}
<div class="fl" data-floating>
    <a class="fl__wa" href="{{ $wa() }}" target="_blank" rel="noopener" aria-label="Chat WhatsApp FreshWash" data-fl-wa>
        <svg class="ic"><use href="#i-whatsapp"/></svg>
        <span class="fl__label"><strong>Chat WhatsApp</strong><small>Balasan cepat, setiap hari</small></span>
    </a>

    <button type="button" class="fl__bot" data-bot-open aria-label="Buka FreshBot, asisten laundry" aria-expanded="false" aria-controls="bot-panel" data-fl-bot>
        <span class="fl__halo" aria-hidden="true"></span>
        <svg class="fab-bot" viewBox="0 0 64 64" aria-hidden="true">
            <defs>
                <linearGradient id="fbHead" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#ffffff"/><stop offset="1" stop-color="#cddae5"/></linearGradient>
                <linearGradient id="fbScr" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#26406a"/><stop offset="1" stop-color="#0b1524"/></linearGradient>
                <linearGradient id="fbEar" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#8cc0f0"/><stop offset="1" stop-color="#3d78b8"/></linearGradient>
                <filter id="fbGlow" x="-60%" y="-60%" width="220%" height="220%"><feGaussianBlur stdDeviation="1.3" result="b"/><feMerge><feMergeNode in="b"/><feMergeNode in="SourceGraphic"/></feMerge></filter>
            </defs>
            <path d="M32 13V6" stroke="#cddae5" stroke-width="2.2" stroke-linecap="round"/>
            <circle class="fab-ant" cx="32" cy="5" r="2.8" fill="#6fe0ff" filter="url(#fbGlow)"/>
            <path d="M12 34C10 10 54 10 52 34" fill="none" stroke="url(#fbEar)" stroke-width="3.2" stroke-linecap="round"/>
            <rect x="5" y="29" width="10" height="18" rx="5" fill="url(#fbEar)"/>
            <rect x="49" y="29" width="10" height="18" rx="5" fill="url(#fbEar)"/>
            <path d="M10 45c0 8 8 10 16 10" fill="none" stroke="url(#fbEar)" stroke-width="2" stroke-linecap="round"/>
            <circle cx="28" cy="55" r="2.5" fill="url(#fbEar)"/>
            <rect x="14" y="15" width="36" height="34" rx="15" fill="url(#fbHead)"/>
            <path d="M19 21c4-3.500 13-4.500 21-2.500" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" opacity=".9"/>
            <rect x="18" y="20" width="28" height="23" rx="10" fill="url(#fbScr)"/>
            <path d="M22 23c4-2 10-2.500 15-1" fill="none" stroke="#fff" stroke-opacity=".2" stroke-width="2" stroke-linecap="round"/>
            <g filter="url(#fbGlow)">
                <ellipse class="fab-eye" cx="26" cy="31.500" rx="3" ry="4" fill="#6fe0ff"/>
                <ellipse class="fab-eye" cx="38" cy="31.500" rx="3" ry="4" fill="#6fe0ff"/>
                <path d="M28.500 37.500q3.500 3 7 0" fill="none" stroke="#6fe0ff" stroke-width="1.800" stroke-linecap="round"/>
            </g>
            <path class="fab-spark" d="M57 13l1.200 3 3 1.200-3 1.200-1.200 3-1.200-3-3-1.200 3-1.200Z" fill="#fff"/>
            <path class="fab-spark fab-spark--2" d="M6 17l.9 2.200 2.200.9-2.200.9-.9 2.200-.9-2.200-2.200-.9 2.200-.9Z" fill="#fff"/>
        </svg>
        <span class="fl__badge" aria-hidden="true">1</span>
        <span class="fl__label"><strong>Tanya FreshBot</strong><small>Harga &amp; proses laundry, 24/7</small></span>
    </button>
</div>

<section class="bot" id="bot-panel" data-bot role="dialog" aria-label="FreshBot, asisten laundry" aria-modal="false" hidden>
    <header class="bot__head">
        <span class="bot__avatar"><img src="{{ $img('robot-freshbot.png') }}" alt=""></span>
        <div>
            <strong>{{ $c['chatbot']['name'] }}</strong>
            <small><i aria-hidden="true"></i> Online - tanya harga &amp; proses laundry</small>
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
