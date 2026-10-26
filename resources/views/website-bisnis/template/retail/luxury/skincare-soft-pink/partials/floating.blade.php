{{-- Floating WhatsApp + AI chatbot (maskot robot Belleza) --}}
<div class="fab-stack">
    <a class="fab fab--wa" href="https://wa.me/{{ $cfg['contact']['whatsapp'] }}?text={{ rawurlencode('Halo Belleza, saya ingin bertanya tentang produk.') }}"
       target="_blank" rel="noopener" aria-label="Chat WhatsApp {{ $cfg['brand']['name'] }}" data-wa-float>
        <span class="fab__ring" aria-hidden="true"></span>
        <i class="bi bi-whatsapp" aria-hidden="true"></i>
        <span class="fab__label">Chat WhatsApp</span>
        <span class="fab__online" aria-hidden="true"></span>
    </a>

    <div class="fab-ai">
        <p class="fab-tip" data-chat-tip hidden>Ada yang bisa Belleza bantu? <button type="button" aria-label="Tutup sapaan" data-chat-tip-close><i class="bi bi-x" aria-hidden="true"></i></button></p>
        <button class="fab fab--ai" type="button" aria-label="Buka asisten AI Belleza" aria-expanded="false" aria-controls="ai-panel" data-chat-toggle>
            <span class="fab__ring" aria-hidden="true"></span>
            <span class="fab__ring fab__ring--2" aria-hidden="true"></span>
            <i class="fab__petal fab__petal--1" aria-hidden="true"></i>
            <i class="fab__petal fab__petal--2" aria-hidden="true"></i>
            <i class="fab__petal fab__petal--3" aria-hidden="true"></i>
            <svg class="mascot" viewBox="0 0 100 100" aria-hidden="true" focusable="false">
                <g class="mascot__bob">
                    <g class="mascot__flower">
                        <circle cx="70" cy="22" r="4.2" fill="#e98fa0"/>
                        <circle cx="70" cy="14.5" r="4.4" fill="#f6b8c2"/><circle cx="77" cy="19.6" r="4.4" fill="#f6b8c2"/>
                        <circle cx="74.4" cy="27.6" r="4.4" fill="#f6b8c2"/><circle cx="65.6" cy="27.6" r="4.4" fill="#f6b8c2"/>
                        <circle cx="63" cy="19.6" r="4.4" fill="#f6b8c2"/>
                        <circle cx="70" cy="22" r="2.6" fill="#fbe3a6"/>
                    </g>
                    <circle cx="13" cy="56" r="8" fill="#f3b5bd"/><circle cx="87" cy="56" r="8" fill="#f3b5bd"/>
                    <rect x="17" y="28" width="66" height="56" rx="26" fill="#fff" stroke="#efcdd2" stroke-width="2"/>
                    <rect x="25" y="38" width="50" height="34" rx="16" fill="#2b2430"/>
                    <g class="mascot__eyes">
                        <ellipse cx="39" cy="53" rx="5" ry="6.2" fill="none" stroke="#fff" stroke-width="2.4"/>
                        <ellipse cx="61" cy="53" rx="5" ry="6.2" fill="none" stroke="#fff" stroke-width="2.4"/>
                    </g>
                    <path d="M43 62.5q7 6 14 0" fill="none" stroke="#fff" stroke-width="2.4" stroke-linecap="round"/>
                    <circle cx="31" cy="64" r="3" fill="#f59bab" opacity=".75"/><circle cx="69" cy="64" r="3" fill="#f59bab" opacity=".75"/>
                </g>
            </svg>
        </button>
    </div>
</div>

<section class="chatpanel" id="ai-panel" role="dialog" aria-label="Asisten AI Belleza" data-chat-panel hidden>
    <header class="chatpanel__head">
        <img src="{{ $img }}/mascot-face.jpg" alt="" width="46" height="46">
        <div>
            <h2>Belleza AI</h2>
            <p><span class="dot" aria-hidden="true"></span> Asisten FAQ produk</p>
        </div>
        <button class="icon-btn icon-btn--light" type="button" data-chat-close aria-label="Tutup asisten"><i class="bi bi-x-lg" aria-hidden="true"></i></button>
    </header>
    @include($ns . '.partials.chat-box')
    <p class="chatpanel__foot">Butuh bantuan langsung? <a href="https://wa.me/{{ $cfg['contact']['whatsapp'] }}" target="_blank" rel="noopener">Chat WhatsApp</a></p>
</section>
